<?php snippet('nav') ?>
<main>
  <a class="back" href="<?=$page->parent()->url() ?>">
    <span class="left arrow">
      <?= asset('assets/icons/arrow-lines.svg')->read()?>
    </span>
    Back
  </a>
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



