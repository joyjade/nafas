<div class="lightbox" id="lightbox">
  <span class="close" id="closeBtn">
    <?= asset('assets/icons/x.svg')->read()?>
  </span>
  <span class="nav left" id="prevBtn">
    <?= asset('assets/icons/arrow-lines.svg')->read()?>
  </span>
  <div class="lightbox-content">
    <img class="lightbox-image fade" id="lightboxImg" src="" alt="Enlarged Image">
    <p class="lightbox-caption" id="lightboxCaption"></p>
  </div>
  <span class="nav right" id="nextBtn">
    <?= asset('assets/icons/arrow-lines.svg')->read()?>
  </span>
</div>