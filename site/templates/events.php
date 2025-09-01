<?php snippet('nav') ?>
<main>
  <?php foreach($page->children()->listed() as $event) : ?>
    <div class="event">
      <a href="<?= $event-> url() ?>">
      <h3>
        <?= $event->title() ?>
      </h3>
      <date><?= $event->date()->toDate('l, F jS') ?>, <?= $event->time()->toDate('g:i a')?></date>
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