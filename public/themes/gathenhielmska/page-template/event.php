<?php /* Template name: Event */ ?>

<?php get_header(); ?>

<div class="container">

    <h2 class="container__title"><?php the_title(); ?></h2>

    <?php echo (do_shortcode('[events per_page="6" orderby="event_start_date" ]')); ?>

</div>
<?php get_footer(); ?>
