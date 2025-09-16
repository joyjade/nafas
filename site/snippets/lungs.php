
<div class="lung-container <?= $class ?>">
  <div class="lung">
    <?php if( $left ) : ?>
        <span class="red">(</span>
        <span class="blue">(</span>
        <span class="sage">(</span>
        <span class="red">(</span>
        <span class="sage">(</span>
      <?php endif ?>
    </div>
    <?php if ($photo = $slots->photo()): ?>
      <?= $photo ?>
      <?php endif ?>
      <div class="lung">
        <?php if( $right ) : ?>
      <span class="blue">)</span>
      <span class="sage">)</span>
      <span class="green">)</span>
      <span class="red">)</span>
      <span class="red">)</span>
      <?php endif ?>
    </div>
</div>