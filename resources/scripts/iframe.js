const playButtons = document.querySelectorAll('.video__play');

playButtons.forEach(button => {
  button.addEventListener('click', (e) => {
    e.srcElement.classList.add('hidden');

    const iframe = e.srcElement.previousElementSibling;

    iframe.src += "autoplay=1";

  })
});
