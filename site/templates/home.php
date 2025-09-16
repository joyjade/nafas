
<?php snippet('nav') ?>
<main>
  <section class="intro">
    <?php snippet('lungs', [ 'left' => true, 'right' => true, 'class' => ''], slots: true) ?>
      <?php slot('photo') ?>
        <figure>
          <img src="<?= $page->photo()->toFile()->url() ?>" alt="">
        </figure>
      <?php endslot() ?>
    <?php endsnippet() ?>
    
  </section>
  <section class="centered">
    <?= $page->intro()->toBlocks() ?>
  </section>
</main>
<?php snippet('footer') ?>