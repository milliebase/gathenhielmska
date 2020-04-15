<?php /* Template name: News */

get_header();

$args = [
    'post_type' => 'article',
    'numberposts' => 6
];

$articles = get_posts($args);
?>

<section class="news">
    <h2 class="page__heading"><?php the_title(); ?></h2>

    <article class="search">
    </article>

    <article class="articles">
        <?php if (count($articles)) : ?>
            <?php foreach ($articles as $post) : setup_postdata($post); ?>

                <div class="article__item">
                    <h3><?php the_title(); ?></h3>

                    <h4><?php echo get_the_date('Y-m-d'); ?></h4>

                    <?php echo acf_excerpt('article_text'); ?>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </article>


</section>

<?php get_footer(); ?>
