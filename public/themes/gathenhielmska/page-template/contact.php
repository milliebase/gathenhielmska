<?php /* Template name: Contact */ ?>

<?php get_header(); ?>

<div class="row">
    <div class="col">
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

        <?php else : ?>
            <p>No posts.</p>
        <?php endif; ?>

        <?php $employer = get_posts(['post_type' => 'employer']); ?>

        <?php if (count($employer)) : ?>
            <article>
                <h2 class="h5">Personal</h2>
                <ul>
                    <?php foreach ($employer as $post) : setup_postdata($post); ?>
                        <li>
                            <?php the_title(); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endif; ?>

    </div><!-- /col -->
</div><!-- /row -->

<?php get_footer();
