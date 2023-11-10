const pizza = document.querySelector('.pizza')

/** ANIMATION DE LA PIZZA */
const gsaPizza = () => {

  pizza.addEventListener('click', () => {
    pizza.style.display = "none";
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
