<?php snippet('nav') ?>
<main>
  <?php foreach($page->children()->listed() as $event) : ?>
    <div class="event">
      <a href="<?= $event-> url() ?>">
      <h1>
        <?= $event->title() ?>
      </h1>
      <date><?= $event->start()->toDate('l, jS \of F, g:i') ?>-<?= $event->end()->toDate('g:i A') ?></date>
      <p>
        <?= $event->description() ?>
      </p>
      <!-- <?php if ($photo = $event->photo()->toFile()) : ?>
      <figure>
        <img src="<?= $photo->url() ?>" alt="<?= $photo->alt() ?>">
      </figure>
      <?php endif ?> -->
    </a>
    </div>
  <?php endforeach ?> 
</main>
<?php snippet('footer') ?>