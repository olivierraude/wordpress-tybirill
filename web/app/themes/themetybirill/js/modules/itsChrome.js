/** IDENTIFICATION DE LA NAVIGATION */

export function itsChrome() {
  
  const colorPicker = document.querySelector('.color-picker fieldset');
  console.log("it's not Chrome!");

  if (!navigator.userAgent.includes("Chrome")) {
    colorPicker.style.display = "none";
  }
};
