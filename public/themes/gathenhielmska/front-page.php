<?php
get_header();
?>

<?php $event_args =
    [
        'post_type' => 'event_listing',
        'meta_key' => '_event_start_date',
        'orderby' => 'meta_value',
        'order'    => 'ASC',
    ];
$events = get_posts($event_args);
?>
<article class="event">
    <div class="event__box-title">
        <h2>Evenemang</h2>
        <a href="/events">Se alla evenemang</a>
    </div>
    <?php if (count($events)) : ?>
        <div class="event__wrapper">
            <?php foreach ($events as $post) : setup_postdata($post); ?>
                <?php
                $image = get_event_image($post->ID);
                $description = $post->post_content;
                $venue = get_event_venue($post->ID);
                $date = get_event_date($post->ID);
                $time = get_event_time_start($post->ID);
                ?>
                <div class="event__item">
                    <?php if ($image) : ?>
                        <img src="<?php echo $image; ?>" alt="" class="event__item__image">
                    <?php else : ?>
                        <img src="#" alt="placeholder img" class="event__item__image">
                    <?php endif; ?>

                    <?php if ($date) : ?>
                        <div class="date-box">
                            <h2 class="date-box__date"><?php echo "$date"; ?></h2>
                        </div>
                    <?php endif; ?>


                    <div class="event-info">
                        <h3><?php the_title(); ?></h3>
                        <?php if ($venue) : ?>
                            <p><?php echo $venue; ?></p>
                        <?php endif; ?>

                        <?php if ($date && $time) : ?>
                            <p class="date-time"><?php echo "$date $time"; ?></p>
                        <?php endif; ?>

                        <a href="<?php the_permalink($post); ?>"><button class="choose-event">Läs mer och boka</button></a>
                    </div>
                </div> <!-- /event-item -->
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</article>



<?php
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
