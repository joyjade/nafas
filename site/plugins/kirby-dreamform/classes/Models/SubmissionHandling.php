<?php

namespace tobimori\DreamForm\Models;

use Exception;
use Kirby\Cms\App;
use Kirby\Toolkit\A;
use tobimori\DreamForm\Exceptions\PerformerException;
use tobimori\DreamForm\Exceptions\SuccessException;

/**
 * Handle the submission process
 */
trait SubmissionHandling
{
	abstract public function form(): FormPage;

	/**
	 * Apply a Kirby hook to the submission
	 * @internal
	 */
	public function applyHook(string $type = 'before'): SubmissionPage
	{
		if (!A::has(['before', 'after'], $type)) {
			throw new \Exception('[DreamForm] Unknown hook type');
		}

		return App::instance()->apply(
			"dreamform.submit:{$type}",
			['submission' => $this, 'form' => $this->form()],
			'submission'
		);
	}

	/**
	 * Handles the form submission precognitive guards
	 * @internal
	 */
	public function handlePrecognitiveGuards(): SubmissionPage
	{
		foreach ($this->form()->guards() as $guard) {
			$guard->precognitiveRun();
		}

		return $this;
	}

	/**
	 * Handles the form submission guards
	 * @internal
	 */
	public function handleGuards(bool $postValidation = false): SubmissionPage
	{
		foreach ($this->form()->guards() as $guard) {
			$postValidation ? $guard->postValidation($this) : $guard->run();
		}

		return $this;
	}

	/**
	 * Validates the fields and collects values from the request
	 * @internal
	 */
	public function handleFields()
	{
		$currentStep = App::instance()->request()->query()->get('dreamform-step', 1);
		$allFieldsEmpty = true;
		$hasRequiredFields = false;

		foreach ($this->form()->formFields($currentStep) as $field) {
			// skip "decorative" fields that don't have a value
			if (!$field::hasValue()) {
				continue;
			}

			// create a field instance & set the value from the request
			$field = $this->updateFieldFromRequest($field);

			// check if this field is required
			if ($field->block()->required()->toBool()) {
				$hasRequiredFields = true;
			}

			// validate the field
			$validation = $field->validate();

			$this->setField($field);
			if ($validation !== true) {
				// if the validation fails, set an error in the submission state
				$this->setError(field: $field->key(), message: $validation);
			} else {
				$this->removeError($field->key());
			}

			// check if at least one field is not empty
			if (!$field->isEmpty()) {
				$allFieldsEmpty = false;
			}
		}

		// only show empty fields error on final step when no required fields exist
		if ($this->isFinalStep() && $allFieldsEmpty && !$hasRequiredFields) {
			$this->setError(t('dreamform.submission.error.emptyFields'));
		} else {
			$this->removeError();
		}

		return $this;
	}

	/**
	 * Run the actions for the submission
	 * @internal
	 */
	public function handleActions(bool $force = false): SubmissionPage
	{
		if (
			$force ||
			($this->isFinalStep()
				&& $this->isSuccessful()
				&& $this->isHam())
		) {
			$this->updateState(['actionsdidrun' => true]);
			foreach ($this->createActions(force: $force) as $action) {
				try {
					$action->run();
				} catch (Exception $e) {
					// we only want to log "unknown" exceptions
					if (
						$e instanceof PerformerException || $e instanceof SuccessException
					) {
						if (!$e->shouldContinue()) {
							throw $e;
						}

						continue;
					}

					$this->addLogEntry([
						'text' => $e->getMessage(),
						'template' => [
							'type' => $action->type(),
						]
					], type: 'error', icon: 'alert', title: "dreamform.submission.log.error");
				}
			}
		}

		return $this;
	}

	/**
	 * Finishes the form submission or advances to the next step
	 * @internal
	 */
	public function finalize(): SubmissionPage
	{
		if (!$this->isSuccessful()) {
			return $this;
		}

		if ($this->isFinalStep()) {
			return $this->finish();
		}

		return $this->advanceStep();
	}

	/**
	 * Handles the after-submit hooks for the fields
	 * @internal
	 */
	public function handleAfterSubmitFields(): SubmissionPage
	{
		$currentStep = App::instance()->request()->query()->get('dreamform-step', 1);
		if ($this->isSuccessful()) {
			foreach ($this->form()->formFields($currentStep) as $field) {
				$field->afterSubmit($this);
			}
		}

		return $this;
	}
}
