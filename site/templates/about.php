<?php snippet('nav') ?>
<main class="">
  <section class="intro">
    <?= $page->intro()->toBlocks() ?>
    <?= $page->text()->kt() ?>
  </section>
  <section>
    <?= $page->residency()->toBlocks() ?>
  </section>
  <section>
    <?= $page->application()->toBlocks() ?>
  </section>

</main>
<?php snippet('footer') ?>