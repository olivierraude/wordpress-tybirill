import {itsChrome} from './modules/itsChrome.js';
import {applyTheme} from './modules/applyTheme.js';
import {nav} from './modules/nav.js';
import {gsaPizza} from './modules/gsaPizza.js';
import {gsapText} from './modules/gsapText.js';
import {gsapImage} from './modules/gsapImage.js';
import {swiper} from './modules/swiper.js';


// console.log('It\'s work dude!');
// console.log(logo);

/** LOADING */

// const logo = document.querySelector('.logo');

window.addEventListener('DOMContentLoaded', () => {
  // console.log(arrayImg)
  logo.style.opacity = 1
  logo.style.scale = 1

});

itsChrome()
applyTheme()
nav()
// swiper()
gsaPizza()
gsapText()
gsapImage()
