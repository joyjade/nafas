<?php snippet('nav') ?>
<div class="">
  <h1><?= $page->title() ?></h1>
  <?php snippet('dreamform/form', ['form' => $page->form()->toPage() ]); ?>
</div>
<?php snippet('footer') ?>