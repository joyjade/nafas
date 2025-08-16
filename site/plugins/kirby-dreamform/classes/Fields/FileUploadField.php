<?php

namespace tobimori\DreamForm\Fields;

use Kirby\Api\Api;
use Kirby\Cms\App;
use Kirby\Content\Field as ContentField;
use Kirby\Filesystem\F;
use Kirby\Toolkit\A;
use ReflectionMethod;
use tobimori\DreamForm\DreamForm;
use tobimori\DreamForm\Models\SubmissionPage;

class FileUploadField extends Field
{
	public const TYPE = 'file-upload';

	public static function availableTypes(): array
	{
		return DreamForm::option('fields.fileUpload.types', []);
	}

	public static function blueprint(): array
	{
		return [
			'name' => t('dreamform.fields.upload.name'),
			'preview' => 'file-upload-field',
			'wysiwyg' => true,
			'icon' => 'upload',
			'tabs' => [
				'field' => [
					'label' => t('dreamform.field'),
					'fields' => [
						'key' => 'dreamform/fields/key',
						'label' => 'dreamform/fields/label',
						'allowMultiple' => [
							'label' => t('dreamform.fields.upload.multiple.label'),
							'type' => 'toggle',
							'default' => false,
						],
					]
				],
				'validation' => [
					'label' => t('dreamform.validation'),
					'fields' => [
						'required' => 'dreamform/fields/required',
						'maxSize' => [
							'label' => t('dreamform.fields.upload.maxSize.label'),
							'type' => 'number',
							'help' => tt('dreamform.fields.upload.maxSize.help', null, ['size' => ini_get('upload_max_filesize')]),
							'after' => 'MB',
							'width' => '1/2',
						],
						'allowedTypes' => [
							'label' => t('dreamform.fields.upload.allowedTypes.label'),
							'type' => 'multiselect',
							'options' => A::map(
								array_keys(static::availableTypes()),
								fn ($type) => [
									'value' => $type,
									'text' => t("dreamform.fields.upload.allowedTypes.{$type}")
								]
							)
						],
						'errorMessage' => 'dreamform/fields/error-message',
					]
				]
			]
		];
	}

	public function validate(): true|string
	{
		$files = array_values(A::filter($this->value()->value() ?? [], fn ($file) => $file['error'] === UPLOAD_ERR_OK));

		if ($this->block()->required()->toBool() && empty($files)) {
			return $this->errorMessage();
		}

		if (empty($files)) {
			return true;
		}

		$types = [];
		foreach ($this->block()->allowedTypes()->split() as $type) {
			if (isset(static::availableTypes()[$type])) {
				$types = A::merge($types, static::availableTypes()[$type]);
			}
		}

		foreach ($files as $file) {
			if (
				!empty($types) && !A::has($types, F::mime($file['tmp_name']))
				|| $file['size'] > ($this->block()->maxSize()->isNotEmpty() ? $this->block()->maxSize()->toInt() * 1024 * 1024 : INF)
			) {
				return $this->errorMessage();
			}
		}

		return true;
	}

	/**
	 * Check if the file upload field is empty
	 */
	public function isEmpty(): bool
	{
		$files = $this->value()->value();

		// if no files array, it's empty
		if (!is_array($files)) {
			return true;
		}

		// check if any file was successfully uploaded (error code 0 = UPLOAD_ERR_OK)
		$uploadedFiles = array_filter($files, fn ($file) => is_array($file) && isset($file['error']) && $file['error'] === UPLOAD_ERR_OK);

		return empty($uploadedFiles);
	}

	// abusing the sanitize method to get the file from the request
	protected function sanitize(ContentField $value): ContentField
	{
		$file = App::instance()->request()->files()->get($this->block()->key()->or($this->id())->value());

		if (!$file) {
			$file = [];
		}

		if (!array_is_list($file)) {
			$file = [$file];
		}

		return new ContentField($value->parent(), $this->key(), $file);
	}

	/**
	 * Store the file in the submission
	 */
	public function afterSubmit(SubmissionPage $submission): void
	{
		if ( // if submission storage is disabled, the file will not be saved (but can be used by e.g. the email action)
			DreamForm::option('storeSubmissions', true) !== true
			|| !$submission->form()->storeSubmissions()->toBool()
		) {
			return;
		}

		/** @var array $file */
		$files = array_values(A::filter($this->value()->value(), fn ($file) => $file['error'] === UPLOAD_ERR_OK));

		if (empty($files)) {
			return;
		}

		$kirby = App::instance();
		$pageFiles = [];
		$kirby->impersonate('kirby', function () use ($kirby, $submission, $files, &$pageFiles) {
			$api = $kirby->api();

			// this is a hack so we can use the api upload method
			$requestData = $api->requestData();
			$method = new ReflectionMethod(Api::class, 'setRequestData');
			$method->invoke($api, A::merge($requestData, [
				'files' => $files
			]));

			$api->upload(function ($source, $filename) use ($kirby, $submission, &$pageFiles) {
				$source = $kirby->apply(
					'dreamform.upload:before',
					['file' => $source, 'name' => $filename, 'field' => $this],
					'file'
				);

				$file = $submission->createFile([
					'source' => $source,
					'filename' => $filename,
					'template' => 'dreamform-upload',
					'content' => [
						'date' => date('Y-m-d H:i:s'),
					]
				]);

				$file = $kirby->apply(
					'dreamform.upload:after',
					['file' => $file, 'field' => $this],
					'file'
				);

				$pageFiles[] = $file;
			});

			// reset the request data
			$method->invoke($api, $requestData);
		});

		$this->value = new ContentField(
			$submission,
			$this->key(),
			A::join(A::map($pageFiles, fn ($file) => "- {$file->uuid()->toString()}\n"), '')
		);

		$submission->setField($this)->saveSubmission();
	}

	public function submissionBlueprint(): array|null
	{
		return [
			'label' => $this->block()->label()->value() ?? t('dreamform.fields.upload.name'),
			'type' => 'files'
		];
	}

	public static function group(): string
	{
		return 'advanced-fields';
	}
}
