import {hasSupport} from './modules/hasSupport.js';
import {applyTheme} from './modules/applyTheme.js';
import {nav} from './modules/nav.js';
import {gsaPizza} from './modules/gsaPizza.js';
import {gsapText} from './modules/gsapText.js';
import {gsapImage} from './modules/gsapImage.js';
import {swiper} from './modules/swiper.js';

/** APPARITION DU LOGO AU CHARGEMENT */

const logo = document.querySelector('.logo');

if (logo) {
  logo.style.opacity = 1;
  logo.style.scale = 1;
}

hasSupport();
applyTheme();
nav();
swiper();
gsaPizza();
gsapText();
gsapImage();
