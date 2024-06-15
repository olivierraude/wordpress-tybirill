/** APPLICATION DU THÈME */

export function applyTheme() {
  
  const colorThemes = document.querySelectorAll('[name="theme"]')
  const activeTheme = localStorage.getItem("theme")

  colorThemes.forEach((themeOption) => {
    if (themeOption.id === activeTheme) {
      themeOption.checked = true;
    }
  });
  
  const storeTheme = (theme) => {
    localStorage.setItem("theme", theme)
  }
  
  colorThemes.forEach((themeOption) => {
    themeOption.addEventListener('click', () => {
      storeTheme(themeOption.id)
    })
  })
};