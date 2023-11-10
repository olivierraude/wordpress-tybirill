import itsChrome from "./itsChrome.js";
import gsaPizza from "./gsaPizza.js";

console.log('It\'s work dude!');

/** LOCOMOTIVE SCROLL */

// const scroll = new LocomotiveScroll({
//     el: document.querySelector('[data-scroll-container]'),
//     smooth: true,
// });


const colorThemes = document.querySelectorAll('[name="theme"]'), 
      burgerButton = document.querySelector('.nav-toggler'),
      body = document.querySelector('body'),
      navigation = document.querySelector('nav'),
      navLink = document.querySelectorAll('nav a'),
      pizza = document.querySelector('.pizza'),
      footerLink = document.querySelector('.footer-nav a') 
      
// const itsChrome = () => {
//   console.log(colorPicker)
//   if (navigator.userAgent.indexOf("Chrome") != -1) {
//     colorPicker.style.display = "flex";
//   }
// }

/** LOCALSTORAGE FOR THEME **/
/* réf: https://www.youtube.com/watch?v=fyuao3G-2qg */

const applyTheme = () => {
  const activeTheme = localStorage.getItem("theme")
  colorThemes.forEach((themeOption) => {
    if (themeOption.id === activeTheme) {
      themeOption.checked = true
    }
  })
}

const storeTheme = (theme) => {
  localStorage.setItem("theme", theme)
}

colorThemes.forEach((themeOption) => {
  themeOption.addEventListener('click', () => {
    storeTheme(themeOption.id)
  })
})

document.onload = applyTheme()

/** ANIMATION DE LA NAVIGATION */

burgerButton.addEventListener('click', toggleNav)
navLink.forEach((link) => { link.addEventListener('click', toggleNav)})

function toggleNav() {
  console.log('I\'m in!')
  burgerButton.classList.toggle('active')
  navigation.style.top = `${window.scrollY}px`
  navigation.classList.toggle('active')
  pizza.classList.toggle('active')
  footerLink.classList.toggle('active')
  body.classList.toggle('stop-scrolling')
 
  let tween = gsap.to( ".nav li a", { 
    x: 0, 
    opacity: 1, 
    duration: 1,
    stagger: .1
  });
    
  revertTween(tween)
}

function revertTween(tween){
  burgerButton.addEventListener('click', () => { tween.revert()}) 
  navLink.forEach((link) =>  link.addEventListener('click', () => { tween.revert(link)}))
}


/** ANIMATION DES IMAGES */

const imgs = Array.prototype.slice.call(document.querySelectorAll('img')),
      logo = document.querySelector('.logo'),
      marginTop = document.querySelector('body').clientHeight - window.innerHeight,
      arrayImg = imgs.shift();

// console.log(logo)
// console.log(marginTop)

let optionsLogo = {
  // root: null,
  rootMargin:`${marginTop}px 0px -80% 0px`,
  threshold: 0.5
}

let options = {
  // root: null,
  rootMargin:`${marginTop}px 0px -30% 0px`,
  threshold: 0
}


function handleLogo(entries) { 
  // console.log(entries)
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = 0
      entry.target.style.scale = 0.5
    } 
    else {
      entry.target.style.opacity = 1
      entry.target.style.scale = 1
    }
  });
}


function handleIntersect(entries) { 
  // console.log(entries)
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.scale = 1
    } 
    else {
      entry.target.style.scale = 1.1
    }
  });
}


const logObserver = new IntersectionObserver(handleLogo, optionsLogo)
const observer = new IntersectionObserver(handleIntersect, options)

logObserver.observe(logo)
imgs.forEach(img => {
  observer.observe(img)
});

window.addEventListener('DOMContentLoaded', () => {
  // console.log(arrayImg)
  logo.style.opacity = 1
  logo.style.scale = 1

  itsChrome
  gsaPizza
})


//** GSap */
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



