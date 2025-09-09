
<?php snippet('nav');
  $intro = $site -> page('about');
?>
<main class="about">
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
      <span class="blue">)</span>
      <span class="sage">)</span>
      <span class="green">)</span>
      <span class="red">)</span>
      <span class="red">)</span>
    </div>
    </div>
    <?= $intro->intro()->toBlocks() ?>
    <?= $intro->text()->kt() ?>
  </section>
</main>
<?php snippet('footer') ?>