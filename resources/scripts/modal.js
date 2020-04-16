'use strict';
// console.log('hej');

const overlay = document.querySelector('.modal-overlay');
const images = document.querySelectorAll('.image');



if (typeof images != "undefined" && images != null) {
  images.forEach(image => {
      image.addEventListener('click', (e) =>{
          overlay.classList.toggle('modal-overlay--open');
          e.target.classList.toggle('modal');
      })
  })
}

