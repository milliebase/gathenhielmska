'use strict';

const body = document.querySelector('body');

const burger = document.querySelector('.navbar__burger');
const navPanel = document.querySelector('.navbar__panel');
const navOverlay = document.querySelector('.navbar__overlay');

const logo = document.querySelector('.navbar__logo');
const wave = document.querySelector('.navbar__panel__wave');
const exit = document.querySelector('.navbar__overlay__exit');

const abouts = document.querySelectorAll('.menu-item-has-children');

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
  navOverlay.classList.toggle('navbar__overlay--show');
  navPanel.classList.toggle('navbar__panel--hide');
  body.classList.toggle('no-scroll');
}

burger.addEventListener('click', toggleOverlay);
exit.addEventListener('click', toggleOverlay);

abouts.forEach(about => {
  about.addEventListener('click', (e) => {
    const subMenu = about.querySelector('.sub-menu');

    e.preventDefault();

    if (subMenu.style.display === '' || subMenu.style.display === 'none') {
      subMenu.style.display = 'block';
    } else {
      subMenu.style.display = 'none';
    }

  })
});
