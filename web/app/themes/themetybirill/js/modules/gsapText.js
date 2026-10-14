/** ANIMATION DES TEXTES */

export function gsapText() {

  gsap.registerPlugin(ScrollTrigger);

  let mm = gsap.matchMedia();

  mm.add("(min-width:992px)", () => {

    gsap.to(
      ".text-about h2, .text-about p", {
      x: 0,
      opacity: 1,
      duration: 1,
      stagger: 0.2,
      scrollTrigger: {
        trigger: '.about',
        start: 'top 730px',
        end: 'top 280px',
        scrub: true,
      }
    });

    gsap.to(
      ".text-takeout h2, .text-takeout p", {
      x: 0,
      opacity: 1,
      duration: 1,
      stagger: 0.2,
      scrollTrigger: {
        trigger: '.takeout',
        start: 'top 600px',
        end: 'center center',
        scrub: true,
      }
    });

  });


  gsap.to(
    ".menu a", {
    y: 0,
    opacity: 1,
    duration: 1,
    scrollTrigger: {
      trigger: '.container.menu',
      start: 'top 750px',
      end: 'bottom 550px',
      scrub: true,
    }
  });
};
