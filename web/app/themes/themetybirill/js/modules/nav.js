/** ANIMATION DE LA NAVIGATION */

export function nav() {

  const burgerButton = document.querySelector('.nav-toggler'),
        body = document.body,
        navigation = document.querySelector('nav'),
        navLinks = document.querySelectorAll('nav a'),
        pizza = document.querySelector('.pizza'),
        footerLink = document.querySelector('.footer-nav a');

  if (!burgerButton || !navigation) return;

  let tween = null;

  function toggleNav() {
    const isOpen = !navigation.classList.contains('active');

    burgerButton.classList.toggle('active', isOpen);
    burgerButton.setAttribute('aria-expanded', String(isOpen));
    burgerButton.setAttribute('aria-label', isOpen ? 'Fermer le menu' : 'Ouvrir le menu');
    navigation.style.top = `${window.scrollY}px`;
    navigation.classList.toggle('active', isOpen);
    pizza?.classList.toggle('active', isOpen);
    footerLink?.classList.toggle('active', isOpen);
    body.classList.toggle('stop-scrolling', isOpen);

    if (isOpen) {
      tween = gsap.to('.nav li a', {
        x: 0,
        opacity: 1,
        duration: 1,
        stagger: 0.1,
      });
    } else if (tween) {
      tween.revert();
      tween = null;
    }
  };

  // Un seul écouteur par élément, déclaré une fois
  burgerButton.addEventListener('click', toggleNav);
  navLinks.forEach((link) => link.addEventListener('click', () => {
    if (navigation.classList.contains('active')) toggleNav();
  }));
};
