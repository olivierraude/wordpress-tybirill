/** CARROUSEL PHOTOS ET VIDÉOS */

export function swiper() {

  if (!document.querySelector('.mySwiper')) return;

  new Swiper('.mySwiper', {
    spaceBetween: 60,
    centeredSlides: true,
    loop: true,
    grabCursor: true,
    speed: 1500,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    effect: 'coverflow',
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      scale: 0.85,
    },
    breakpoints: {
      320: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
};
