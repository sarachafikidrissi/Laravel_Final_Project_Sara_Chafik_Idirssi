import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// new ScrollCarousel(".my-carousel", {speed: 8, smartSpeed: true, autoplay: true});
// new ScrollCarousel(".my-carousel")

const carousel = document.querySelector(".my-carousel");
carousel.innerHTML += carousel.innerHTML;

new ScrollCarousel(".my-carousel", {
    autoplay: true,
    direction: 'tlr',
    smartSpeed: true,
    margin: 50,
  });