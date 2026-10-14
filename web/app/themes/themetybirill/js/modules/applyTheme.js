/** APPLICATION DU THÈME DE COULEUR (mémorisé dans le navigateur) */

export function applyTheme() {

  const colorThemes = document.querySelectorAll('[name="theme"]');

  // localStorage peut être indisponible (navigation privée, cookies bloqués)
  let activeTheme = null;
  try {
    activeTheme = localStorage.getItem('theme');
  } catch (e) {}

  colorThemes.forEach((themeOption) => {
    if (themeOption.id === activeTheme) {
      themeOption.checked = true;
    }

    themeOption.addEventListener('change', () => {
      try {
        localStorage.setItem('theme', themeOption.id);
      } catch (e) {}
    });
  });
};
