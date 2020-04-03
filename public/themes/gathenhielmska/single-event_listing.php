<?php

/*
 * event detail pages use your themes single.php template and expand the content area to include other information.
 *
 * Template Name: event
 * @theme Name: gathenhielmska

 */

get_header();?>

<section>
    <!-- Start the Loop -->
    <?php while ( have_posts() ) : the_post(); ?>
        <?php  the_content(); ?>
        <?php the_title();?>
    <?php endwhile; ?>
    <!-- End the Loop -->
</section>

<?php get_footer(); ?>
