
<figure class="thumbnail">
  <img
      loading="lazy"
      alt="<?= $img->alt() ?>"
      src="<?= $img->url() ?>"
      aria-describedby=""
  >
  <?php if($img->caption()->isNotEmpty()) : ?>
    <figcaption>
      <?=$img->caption()->kirbytext()?>
    </figcaption>
  <?php endif ?>
</figure>