// import { burgerButton, navLink, navigation, pizza, footerLink, body } from "./main.js";

const burgerButton = document.querySelector('.nav-toggler'),
      body = document.querySelector('body'),
      navigation = document.querySelector('nav'),
      navLink = document.querySelectorAll('nav a'),
      pizza = document.querySelector('.pizza'),
      footerLink = document.querySelector('.footer-nav a')

      
/** ANIMATION DE LA NAVIGATION */
const nav = () => {
  burgerButton.addEventListener('click', toggleNav);
  navLink.forEach((link) => { link.addEventListener('click', toggleNav); });

  function toggleNav() {
    console.log('I\'m in!');
    burgerButton.classList.toggle('active');
    navigation.style.top = `${window.scrollY}px`;
    navigation.classList.toggle('active');
    pizza.classList.toggle('active');
    footerLink.classList.toggle('active');
    body.classList.toggle('stop-scrolling');

    let tween = gsap.to(".nav li a", {
      x: 0,
      opacity: 1,
      duration: 1,
      stagger: 0.1
    });

    revertTween(tween);
  }

  function revertTween(tween) {
    burgerButton.addEventListener('click', () => { tween.revert(); });
    navLink.forEach((link) => link.addEventListener('click', () => { tween.revert(link); }));
  }
};

console.log('Hello World!')
export default nav()
