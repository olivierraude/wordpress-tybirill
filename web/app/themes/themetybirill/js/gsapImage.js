const gsapImage = () => {
  /** ANIMATION DES IMAGES */

  const imgs = Array.prototype.slice.call(document.querySelectorAll('img')), logo = document.querySelector('.logo'), marginTop = document.querySelector('body').clientHeight - window.innerHeight, arrayImg = imgs.shift();

  // console.log(logo)
  // console.log(marginTop)
  let optionsLogo = {
    // root: null,
    rootMargin: `${marginTop}px 0px -80% 0px`,
    threshold: 0.5
  };

  let options = {
    // root: null,
    rootMargin: `${marginTop}px 0px -30% 0px`,
    threshold: 0
  };


  function handleLogo(entries) {
    // console.log(entries)
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = 0;
        entry.target.style.scale = 0.5;
      }
      else {
        entry.target.style.opacity = 1;
        entry.target.style.scale = 1;
      }
    });
  }


  function handleIntersect(entries) {
    // console.log(entries)
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.scale = 1;
      }
      else {
        entry.target.style.scale = 1.1;
      }
    });
  }


  const logObserver = new IntersectionObserver(handleLogo, optionsLogo);
  const observer = new IntersectionObserver(handleIntersect, options);

  logObserver.observe(logo);
  imgs.forEach(img => {
    observer.observe(img);
  });
};

export default gsapImage()