/** SÉLECTEUR DE THÈME : MASQUÉ SI LE NAVIGATEUR NE GÈRE PAS :has() */

export function hasSupport() {

  const colorPicker = document.querySelector('.color-picker fieldset');

  if (colorPicker && !CSS.supports('selector(:has(*))')) {
    colorPicker.style.display = 'none';
  }
};
