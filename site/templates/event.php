<?php snippet('nav') ?>
<main>
  <a href="<?=$page->parent()->url() ?>">Back to all Events</a>
  <section>
    <div class="heading">
      <date><?= $page->date()->toDate('l, F jS') ?>, <?= $page->time()->toDate('g:i a')?></date>
      <p>
        <?= $page->title() ?>
      </p>
    </div>
    <?php if ($photo = $page->photo()->toFile()) : ?>
      <figure>
        <img src="<?= $photo->url() ?>" alt="<?= $photo->alt() ?>">
      </figure>
      <?php endif ?>
    <?= $page->description()->kirbytext() ?>
  </section>
</main>
<?php snippet('footer') ?>



