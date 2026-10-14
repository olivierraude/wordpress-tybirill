/** ANIMATION DE LA PIZZA */

export function gsaPizza() {
  
  const pizza = document.querySelector('.pizza');
  if (!pizza) return;

  pizza.addEventListener('click', () => {
    pizza.style.display = 'none';
  });


  gsap.to(
    ".pizza", {
    scrollTrigger: {
      trigger: 'body',
      start: 'top bottom',
      end: 'bottom top',
      scrub: true,
    },
    rotate: 1080,
    ease: 'none'
  });
};
