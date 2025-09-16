<?php snippet('nav') ?>
<main class="">
  <div class="lung-container">
        <div class="lung">
          <span class="red">(</span>
          <span class="blue">(</span>
          <span class="sage">(</span>
          <span class="red">(</span>
          <span class="sage">(</span>
      </div>
      <figure>
        <!-- <?php dump($page->lead()->toFile()) ?> -->
          <img src="<?= $page->lead()->url() ?>" alt="">
        </figure>
      <div class="lung">
      </div>
  </div>
  <section>
    <?= $page->residency()->toBlocks() ?>
  </section>
  <div class="lung-container">
        <div class="lung">
      </div>
      <div class="lung">
        <span class="blue">)</span>
        <span class="sage">)</span>
        <span class="green">)</span>
        <span class="red">)</span>
        <span class="red">)</span>
      </div>
  </div>
  <section>
    <?= $page->application()->toBlocks() ?>
  </section>
  <div class="lung-container">
        <div class="lung">
          <span class="red">(</span>
          <span class="blue">(</span>
          <span class="sage">(</span>
          <span class="red">(</span>
          <span class="sage">(</span>
      </div>
      <div class="lung">
      </div>
  </div>
  <section>
    <?= $page->team()->toBlocks() ?>
  </section>
  <div class="lung-container">
        <div class="lung">
      </div>
      <div class="lung">
        <span class="blue">)</span>
        <span class="sage">)</span>
        <span class="green">)</span>
        <span class="red">)</span>
        <span class="red">)</span>
      </div>
  </div>
  <section>
    <?= $page->space()->toBlocks() ?>
  </section>

</main>
<?php snippet('footer') ?>