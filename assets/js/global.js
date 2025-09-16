document.addEventListener("DOMContentLoaded", function() { 
  mobileNav();

  setupNavHoverBackgrounds()
});



function mobileNav() {
  let hamb = document.querySelector('.hamb');
  let nav = document.querySelector('.m-nav');

  document.addEventListener('click', function(event) {
    if (event.target !== hamb && !hamb.contains(event.target)) {
      // console.log('outside element');
      hamb.classList.remove('show');
      nav.classList.remove('show');
    } else {
      // console.log('burger clicked')
      hamb.classList.toggle('show');
      nav.classList.toggle('show');
    }

    // if (hamb.classList.contains('show')) {
    //   if (event.target !== hamb && !hamb.contains(event.target)) {
    //     console.log('outside element');
    //     hamb.classList.remove('show');
    //   }
    // } else {
    //   // console.log('the nav is closed');
    //   if (event.target == hamb || hamb.contains(event.target)) {
    //     event.preventDefault;
    //     console.log('burger clicked')
    //     hamb.classList.toggle('show');
    //   }    
    // }
  });

}

function setupNavHoverBackgrounds() {
  const links = document.querySelectorAll('nav a');

  links.forEach(link => {
    console.log(link);
    const bgClass = 'hover-' + link.dataset.bg;

    link.addEventListener('mouseenter', () => {
      document.body.classList.add(bgClass);
    });

    link.addEventListener('mouseleave', () => {
      document.body.classList.remove(bgClass);
    });
  });
}