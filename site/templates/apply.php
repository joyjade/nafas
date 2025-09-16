<?php snippet('nav') ?>
<main class="">
  <?php if (!$submission?->isFinished() ) :?>
    <?= $page->text()->toBlocks() ?>
  <?php endif ?>
  <?php snippet('dreamform/form', [
    'form' => $page->form()->toPage(),
    'attr' => [
      // General attributes
      'field' => ['class' => 'field'],
      'row' => ['class' => 'row'],
    ]
    ]); ?>
</main>
<?php snippet('footer') ?>


	<!-- 'attr' => [
		// General attributes
		'form' => ['class' => 'form'],
		
		'column' => [],
		'field' => [],
		'label' => [],
		'error' => [],
		'input' => [],
		'button' => [],

		// Field-specific attributes
		'textarea' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
		],
		'text' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
		],
		'select' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
		],
		'number' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
		],
		'file' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
		],
		'email' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
		],
		'radio' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
			'row' => []
		],
		'checkbox' => [
			'field' => [],
			'label' => [],
			'error' => [],
			'input' => [],
			'row' => []
		],

		'success' => [], // Success message
		'inactive' => [], // Inactive message
	] -->