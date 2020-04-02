<?php /* Template name: Event */
get_header(); ?>

<?php echo(do_shortcode('[events per_page="6" orderby="event_start_date"]')); ?>

<?php get_footer(); ?>
