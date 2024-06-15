/** PROGRESSBAR SWIPER */

export function swiper() {

const swiper = new Swiper('.container-slider', {
    pagination: {
      el: '.swiper-pagination',
      type: 'progressbar',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
} 