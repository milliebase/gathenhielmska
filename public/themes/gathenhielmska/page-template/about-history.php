<?php /* Template name: About history */ ?>

<?php get_header(); ?>

<?php 
$heroImg = get_field('about/about-history' . '_hero_image');
 $historyYear = get_field( 'field_about_history_year') ;
 $historyTextBox = get_field('field_about_history_textbox');
//print("<pre>".print_r($heroImg,true)."</pre>");
//print("<pre>".print_r($historyYear,true)."</pre>");
//print("<pre>".print_r($historyTextBox['Textbox about history'][1],true)."</pre>");
?>
<section class="history">

</section>


<?php get_footer(); ?>
