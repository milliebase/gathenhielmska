<?php /* Template name: Event */ ?>

<?php get_header(); ?>

    <h2><?php the_title(); ?></h2>

    <?php echo (do_shortcode('[events per_page="6" orderby="event_start_date" ]')); ?>

<?php get_footer(); ?>
