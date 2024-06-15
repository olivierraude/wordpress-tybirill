/** ANIMATION DE LA PIZZA */

export function gsaPizza() {
  
  const pizz = document.querySelector('.pizza')

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
