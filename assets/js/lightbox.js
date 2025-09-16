const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightboxImg');
const lightboxCaption = document.getElementById('lightboxCaption');
const closeBtn = document.getElementById('closeBtn');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

const figures = document.querySelectorAll('.thumbnail');

let currentIndex = 0;

// Collect image + caption data
const images = Array.from(figures).map(fig => {
  const img = fig.querySelector('img');
  const caption = fig.querySelector('figcaption');
  return {
    // src: img.srcset.split(',').pop().trim().split(' ')[0], for srcsets
    src: img.src,
    caption: caption ? caption.textContent : ''
  };
});

function showLightbox(index) {
  currentIndex = index;
  lightboxImg.classList.remove('in');
  lightboxImg.src = images[currentIndex].src;
  lightboxCaption.textContent = images[currentIndex].caption;

  lightbox.style.display = 'flex';
  document.body.style.overflow = 'hidden';

  // 👇 Only show arrows if more than 1 image
  const showArrows = images.length > 1;
  prevBtn.style.display = showArrows ? 'block' : 'none';
  nextBtn.style.display = showArrows ? 'block' : 'none';

  requestAnimationFrame(() => {
    lightboxImg.classList.add('in');
  });
}

function closeLightbox() {
  lightbox.style.display = 'none';
  document.body.style.overflow = '';
}

function showPrev() {
  currentIndex = (currentIndex - 1 + images.length) % images.length;
  showLightbox(currentIndex);
}

function showNext() {
  currentIndex = (currentIndex + 1) % images.length;
  showLightbox(currentIndex);
}

// Add click listeners
figures.forEach((fig, index) => {
  fig.querySelector('img').addEventListener('click', () => {
    showLightbox(index);
  });
});

closeBtn.addEventListener('click', closeLightbox);
lightbox.addEventListener('click', (e) => {
  if (e.target === lightbox) closeLightbox();
});

prevBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  showPrev();
});

nextBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  showNext();
});

document.addEventListener('keydown', (e) => {
  if (lightbox.style.display === 'flex') {
    if (e.key === 'ArrowLeft') showPrev();
    else if (e.key === 'ArrowRight') showNext();
    else if (e.key === 'Escape') closeLightbox();
  }
});
