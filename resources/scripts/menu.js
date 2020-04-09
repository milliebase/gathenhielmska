'use strict';

const body = document.querySelector('body');

const burger = document.querySelector('.navbar__burger');
const navPanel = document.querySelector('.navbar__panel');
const navOverlay = document.querySelector('.navbar__overlay');

const logo = document.querySelector('.navbar__logo');
const wave = document.querySelector('.navbar__panel__wave');
const exit = document.querySelector('.navbar__overlay__exit');

const about = document.querySelector('.menu-item-209 a');
const subMenu = document.querySelector('.sub-menu');

if (window.location.pathname === "/") {
  window.addEventListener('scroll', () => {
    if (window.pageYOffset > 5) {
      logo.classList.remove('navbar__logo--hidden');
      wave.classList.remove('navbar__panel__wave--hidden');
    } else {
      logo.classList.add('navbar__logo--hidden');
      wave.classList.add('navbar__panel__wave--hidden');
    }
  })
}

const toggleOverlay = () => {
  navOverlay.classList.toggle('hidden');
  navPanel.classList.toggle('hidden');
  body.classList.toggle('no-scroll');
}

burger.addEventListener('click', toggleOverlay);
exit.addEventListener('click', toggleOverlay);

about.addEventListener('click', (e) => {
  e.preventDefault();

  if (subMenu.style.display === '' || subMenu.style.display === 'none') {
    subMenu.style.display = 'block';
  } else {
    subMenu.style.display = 'none';
  }

})
