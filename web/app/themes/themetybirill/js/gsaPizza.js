const pizz = document.querySelector('.pizza')

/** ANIMATION DE LA PIZZA */
const gsaPizza = () => {

  pizz.addEventListener('click', () => {
    pizz.style.display = "none";
  });


  gsap.to(
    ".pizza", {
    scrollTrigger: {
      trigger: 'body',
      start: 'top bottom',
      end: 'bottom top',
      scrub: true,
      // markers: true,
    },
    rotate: 1080,
    ease: 'none'
  });
};

export default gsaPizza()
