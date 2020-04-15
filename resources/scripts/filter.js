// const filterButtons = document.querySelectorAll('.filter__button');
// const newsContent = document.querySelector('.news__content');

// filterButtons.forEach(button => {
//   button.addEventListener('click', (e) => {

//       const template = "<?php echo do_shortcode('[ajax_load_more post_type=\"article\" no_results_text=\"No articles.\"] month=\"${e.target.dataset.month}\" '); ?>";

//       newsContent.innerHTML = template;

//   })
// });

const filterButtons = document.querySelectorAll('.filter__form label');
const filterForm = document.querySelector('.filter__form');

filterButtons.forEach(button => {
  button.addEventListener('click', () => {
    filterForm.submit();
  })
});
