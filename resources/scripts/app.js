const logo = document.querySelector('.navbar__logo');
const wave = document.querySelector('.navbar__panel__wave');


window.addEventListener('scroll', () => {
  if (window.pageYOffset > 5) {
    logo.classList.remove('navbar__logo--hidden');
    wave.classList.remove('navbar__panel__wave--hidden');
  } else {
    logo.classList.add('navbar__logo--hidden');
    wave.classList.add('navbar__panel__wave--hidden');
  }
})

const burger = document.querySelector('.navbar__burger');
const navPanel = document.querySelector('.navbar__panel');
const navOverlay = document.querySelector('.navbar__overlay');

const exit = document.querySelector('.navbar__overlay__exit');

const about = document.querySelector('.menu-item-209');
const subMenu = document.querySelector('.sub-menu');

burger.addEventListener('click', () => {
  navOverlay.classList.remove('hidden');
  navPanel.classList.add('hidden');
})

exit.addEventListener('click', () => {
  navOverlay.classList.add('hidden');
  navPanel.classList.remove('hidden');
})

about.addEventListener('click', (e) => {
  e.preventDefault();

  if (subMenu.style.display === '' || subMenu.style.display === 'none') {
    subMenu.style.display = 'block';
  } else {
    subMenu.style.display = 'none';
  }

})
