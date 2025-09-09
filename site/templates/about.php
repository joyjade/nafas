<?php snippet('nav') ?>
<main class="">
  <section>
    <?= $page->residency()->toBlocks() ?>
    <a class="button" href="/apply">Apply Now </a>
  </section>
  <section>
    <?= $page->application()->toBlocks() ?>
  </section>
  <section>
    <?= $page->team()->toBlocks() ?>
  </section>
  <section>
    <?= $page->space()->toBlocks() ?>
  </section>

</main>
<?php snippet('footer') ?>