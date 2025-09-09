<?php snippet('nav') ?>
<main class="">
  <section class="intro">
    <div class="lung-container">
      <div class="lung">
        <span class="red">(</span>
        <span class="blue">(</span>
        <span class="sage">(</span>
        <span class="red">(</span>
        <span class="sage">(</span>
    </div>
    <div class="lung">
        <span class="red">(</span>
        <span class="blue">(</span>
        <span class="sage">(</span>
        <span class="red">(</span>
        <span class="sage">(</span>
    </div>
    </div>
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