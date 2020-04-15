<?php

get_header();

$args = [
    'post_type' => 'article',
    'numberposts' => 3
];

$articles = get_posts($args);
$inHousePage = get_page_by_path('in-house');
?>

<?php if (count($articles)) : ?>
    <section class="home__news">

        <h2 class="page__heading">Nyheter</h2>

        <?php foreach ($articles as $post) : setup_postdata($post); ?>
            <div class="article__item">
                <h3><?php the_title(); ?></h3>

                <?php $articleText = get_field('article_text') ?>

                <?php if ($articleText) : ?>
                    <p><?php echo $articleText; ?></p>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>

        <a href="about/news">
            <span>Mer information</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_right.svg">
        </a>

        <div class="home__bg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/illustrations/flower.png" alt="Flower decor">
        </div>
    </section>
<?php endif; ?>

<?php if ($inHousePage) : ?>
    <?php $id = $inHousePage->ID; ?>

    <section class="home__in_house">
        <?php $inHouseImage = get_field('in-house_hero_image', $id); ?>

        <?php if ($inHouseImage) : ?>
            <img src="<?php echo $inHouseImage['url']; ?>" alt="<?php echo ($inHouseImage['alt'] != '') ? $inHouseImage['alt'] : '' ?>">
        <?php endif; ?>

        <h2 class="page__heading"><?php echo $inHousePage->post_title; ?></h2>

        <div class="read_more">
            <?php $inHouseReadMore = get_field('in-house_read_more', $id) ?>

            <?php if ($inHouseReadMore) : ?>
                <p><?php echo $inHouseReadMore; ?></p>
            <?php endif; ?>

            <a href="<?php echo get_permalink($id); ?>" class="button">Verksamheter</a>
        </div>

    </section>
<?php endif; ?>

<?php get_footer();
