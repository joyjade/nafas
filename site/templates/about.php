<?php snippet('nav') ?>
<main class="">
  <section>
    <?= $page->intro()->toBlocks() ?>
  </section>
  <section>
    <?= $page->text()->kirbytext() ?>
  </section>
  <section>
    <?= $page->application()->toBlocks() ?>
  </section>

</main>
<?php snippet('footer') ?>