<?php
/*
Template Name: Search Page
*/
get_header(); ?>
<?php echo do_shortcode('[searchandfilter fields="search,post_types"]'); ?>

<section class="result">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="result__item">
                <?php the_title(); ?>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Länk</a>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <div>0 resultat när du sökt efter <span><?php the_search_query(); ?></span></div>
    <?php endif; ?>
</section>

</div>
<?php get_footer(); ?>
