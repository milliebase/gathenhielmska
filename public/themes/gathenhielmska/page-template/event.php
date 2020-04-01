<?php /* Template name: Event */
get_header(); ?>

<div class="row">
    <?php if (have_posts()) : ?>
        <!-- Start the loop -->
        <?php while (have_posts()) : ?>
            <!-- iterate the post index and set up the next post in line -->
            <?php the_post(); ?>
            <div>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </div>
        <?php endwhile; ?>
</div>

<?php else : ?>
    <p>No posts.</p>
<?php endif; ?>
<?php get_footer();
