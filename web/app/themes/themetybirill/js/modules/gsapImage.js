/** ANIMATION DES IMAGES */

export function gsapImage() {

  const logo = document.querySelector('.logo');
  if (!logo) return;

  // Toutes les images sauf la première (le logo de la navigation)
  const imgs = Array.from(document.querySelectorAll('img')).slice(1),
        marginTop = document.body.clientHeight - window.innerHeight;

  let optionsLogo = {
    rootMargin: `${marginTop}px 0px -80% 0px`,
    threshold: 0.5
  };

  let options = {
    rootMargin: `${marginTop}px 0px -30% 0px`,
    threshold: 0
  };


  function handleLogo(entries) {
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
  };


  function handleIntersect(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.scale = 1;
      }
      else {
        entry.target.style.scale = 1.1;
      }
    });
  };


  const logObserver = new IntersectionObserver(handleLogo, optionsLogo);
  const observer = new IntersectionObserver(handleIntersect, options);

  logObserver.observe(logo);
  imgs.forEach(img => {
    observer.observe(img);
  });
};