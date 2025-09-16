<?php snippet('nav') ?>



<main class="">
  <?php snippet('lungs', [ 'left' => true, 'right' => false, 'class' => 'intro' ], slots: true) ?>
    <?php slot('photo') ?>
      <figure>
        <img src="<?= $page->lead()->toFile()->url() ?>" alt="">
      </figure>
    <?php endslot() ?>
  <?php endsnippet() ?>

  <section>
    <?= $page->residency()->toBlocks() ?>
  </section>
  
  <?php snippet('lungs', [ 'left' => false, 'right' => true, 'class' => '' ]) ?>

  <section>
    <?= $page->application()->toBlocks() ?>
  </section>
  <?php snippet('lungs', [ 'left' => true, 'right' => false, 'class' => '' ]) ?>

  <section>
    <?= $page->team()->toBlocks() ?>
  </section>

  <?php snippet('lungs', [ 'left' => false, 'right' => true, 'class' => '' ]) ?>

  <section>
    <?= $page->space()->toBlocks() ?>
  </section>
  
  <?php snippet('lightbox') ?>
</main>
<?php snippet('footer') ?>