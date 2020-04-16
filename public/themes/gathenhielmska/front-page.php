<?php
get_header();
?>

<?php
$event_args =
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
                $months = [
                    'Januari',
                    'Februari',
                    'Mars',
                    'April',
                    'Maj',
                    'Juni',
                    'Juli',
                    'Augusti',
                    'September',
                    'Oktober',
                    'November',
                    'December'
                ];

                $image = get_event_image($post->ID);
                $description = $post->post_content;
                $venue = get_event_venue($post->ID);
                $date = get_event_date($post->ID);
                $time = get_event_time_start($post->ID);
                $event_month = get_event_month($post->ID);
                $month_index = (get_event_month_numb($post->ID) - 1);
                ?>
                <div class="event__item">
                    <?php if ($image) : ?>
                        <img src="<?php echo $image; ?>" alt="" class="event__item__image">
                    <?php else : ?>
                        <img src="#" alt="placeholder img" class="event__item__image">
                    <?php endif; ?>

                    <?php if ($date) : ?>
                        <div class="date-box">
                            <h2 class="date-box__date"><?php echo "$date $months[$month_index]"; ?></h2>
                        </div>
                    <?php endif; ?>


                    <div class="event-info">
                        <h3><?php the_title(); ?></h3>
                        <?php if ($venue) : ?>
                            <p><?php echo $venue; ?></p>
                        <?php endif; ?>

                        <?php if ($date && $time) : ?>
                            <p class="date-time"><?php echo "$date $months[$month_index] $time"; ?></p>
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
        <div class="home__wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#18595B" fill-opacity="1" d="M0,192L48,202.7C96,213,192,235,288,218.7C384,203,480,149,576,154.7C672,160,768,224,864,224C960,224,1056,160,1152,138.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#1f4a4b;"></path>
            </svg>
        </div>


        <div class="home__news__content">
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
        </div>

        <div class="home__bg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/illustrations/desktop_flower.png" alt="Flower decor">
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


        <div class="read_more">
            <h2 class="page__heading"><?php echo $inHousePage->post_title; ?></h2>

            <?php $inHouseReadMore = get_field('in-house_read_more', $id) ?>

            <div class="read_more__text">
                <?php if ($inHouseReadMore) : ?>
                    <p><?php echo $inHouseReadMore; ?></p>
                <?php endif; ?>

                <a href="<?php echo get_permalink($id); ?>" class="button">Verksamheter</a>
            </div>
        </div>

    </section>
<?php endif; ?>

<?php get_footer();
