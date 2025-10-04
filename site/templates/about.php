<?php snippet('nav') ?>



<main class="">
  <?php snippet('lungs', [ 'left' => true, 'right' => false, 'class' => 'intro left-only' ], slots: true) ?>
    <?php slot('photo') ?>
      <figure>
        <img src="<?= $page->lead()->toFile()->url() ?>" alt="">
      </figure>
    <?php endslot() ?>
  <?php endsnippet() ?>

  <section>
    <?= $page->residency()->toBlocks() ?>
  </section>
  
  <?php snippet('lungs', [ 'left' => false, 'right' => true, 'class' => 'right-only' ]) ?>

  <section>
    <?= $page->application()->toBlocks() ?>
  </section>
  <?php snippet('lungs', [ 'left' => true, 'right' => false, 'class' => 'left-only' ]) ?>

  <section>
    <?= $page->team()->toBlocks() ?>
  </section>

  <?php snippet('lungs', [ 'left' => false, 'right' => true, 'class' => 'right-only' ]) ?>

  <section>
    <?= $page->space()->toBlocks() ?>
  </section>
  
  <?php snippet('lightbox') ?>
</main>
<?php snippet('footer', slots: true) ?>
  <?php slot('credit') ?>
  <p class="credit">Website by <a href="https://joy-jade.com/">JJ</a> | Made with <a href="https://getkirby.com/">Kirby</a></p>
  <?php endslot() ?>  
<?php endsnippet() ?>
