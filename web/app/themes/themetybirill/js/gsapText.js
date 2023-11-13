const gsapText = () => {

  /** ANIMATION DES TEXTES */
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
        // markers: true,
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
        // markers: true,
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
    // stagger: .2,
    scrollTrigger: {
      trigger: '.container.menu',
      // markers: true,
      start: 'top 750px',
      end: 'bottom 550px',
      scrub: true,
    }
  });
};

export default gsapText()
