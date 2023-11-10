// import { colorPicker } from "./colorPicker";
const colorPicker = document.querySelector('.color-picker fieldset')

const itsChrome = () => {

  if (!navigator.userAgent.includes("Chrome")) {
    console.log("it's not Chrome!");
    colorPicker.style.display = "none";
  }
};

export default itsChrome()
