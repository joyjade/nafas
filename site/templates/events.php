<?php snippet('nav') ?>
<div class="">
  <?php foreach($page->children()->listed() as $event) : ?>
    <h1><?= $event->title() ?></h1>
  <?php endforeach ?>
</div>
<?php snippet('footer') ?>