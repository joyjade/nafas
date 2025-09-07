
<?php snippet('nav') ?>
<main>
  <h3><?= $page->heading()->kirbytext() ?></h3>
  <?php foreach($page->children()->listed() as $event) : ?>
    <div class="event">
      <a href="<?= $event-> url() ?>">
      <date><?= $event->date()->toDate('l, F jS') ?></date>
      <p>
        <?= $event->title() ?>
      </p>
    </a>
    </div>
  <?php endforeach ?> 
</main>
<?php snippet('footer') ?>
