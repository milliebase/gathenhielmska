<?php /* Template name: Events */

get_header();


if (isset($_GET['search']) && (!empty($_GET['search']))) {
    $search = trim(filter_var($_GET['search'], FILTER_SANITIZE_STRING));

    $args =
        [
            'post_type' => 'event_listing',
            'meta_key' => '_event_start_date',
            'orderby' => 'meta_value',
            'order'    => 'ASC',
            's'         => $search,
        ];
} elseif (isset($_GET['filter']) && (!empty($_GET['filter']))) {
    $filter = trim(filter_var($_GET['filter'], FILTER_SANITIZE_STRING));

    $args =
        [
            'post_type' => 'event_listing',
            'meta_key' => '_event_start_date',
            'orderby' => 'meta_value',
            'order'    => 'ASC',
            'tax_query' => [
                [
                    'taxonomy' => 'event_listing_category',
                    'field'    => 'name',
                    'terms'    => $filter,
                ],
            ],
        ];
} else {
    $args =
        [
            'post_type' => 'event_listing',
            'meta_key' => '_event_start_date',
            'orderby' => 'meta_value',
            'order'    => 'ASC',
        ];
}

$count = 0;
$events = get_posts($args);
$categories = get_terms(
    [
        'taxonomy' => 'event_listing_category',
        'hide_empty' => false,
    ]
);

?>

<article class="event-intro">
    <h2><?php the_title(); ?></h2>
    <div class="search">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="search-logo" class="search__logo">
        <form action="/events" method="get" id="form">
            <input type="text" name="search" placeholder="Sök..." class="search__input">
            <input type="submit" class="search__hide"></input>
        </form>
    </div>

<<<<<<< HEAD
<h2 class="event-title"><?php the_title(); ?></h2>
<div class="search-form">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="search-logo" class="search__logo">
    <form action="/events" method="get" id="form">
        <input type="text" name="search" placeholder="Sök..." class="search">
        <input type="submit" class="search__hide"></input>
    </form>
</div>

<div class="event-filter">
    <form action="/events" method="get" id="form">
        <div class="event-filter__form">
            <?php foreach ($categories as $category) : ?>
                <input type="submit" value="<?php echo $category->name; ?>" name="filter" class="event-filter__button">
            <?php endforeach; ?>
        </div>
    </form>
</div>
=======
    <div class="event-filter">
        <form action="/events" method="get" id="form">
            <div class="event-filter__form">
                <?php foreach ($categories as $category) : ?>
                    <input type="submit" value="<?php echo $category->name; ?>" name="filter" class="event-filter__button">
                <?php endforeach; ?>
            </div>
        </form>
    </div>
</article>
>>>>>>> master



<article class="event-list" id="event-result">
    <?php if (count($events)) : ?>
        <?php foreach ($events as $post) : setup_postdata($post); ?>

            <?php

            $venue = get_event_venue($post->ID);
            $date = get_list_event_date($post->ID);
            $time = get_event_time_start($post->ID);
            $year = get_event_year($post->ID);

            $event_month = get_event_month($post->ID);
            $reference = "+$count month";
            $month = date('F', strtotime($reference));
            ?>

            <!-- display the title of the month if it's a new month-->
            <?php if ($event_month === $month) : ?>
                <div class="event__month-title">
                    <h2><?php echo "$event_month $year"; ?></h2>
                </div>
                <?php $count++; ?>
            <?php endif; ?>

            <div class="event-list__item">
                <div class="event-list__item__wrapper">
                    <div class="time">
                        <?php if ($date && $time) : ?>
                            <p><?php echo $date; ?></p>
                            <p><?php echo $time; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="title-venue">
                        <p><?php the_title(); ?></p>
                        <?php if ($venue) : ?>
                            <p><?php echo $venue; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="booking-link">
                    <p><a href="<?php the_permalink($post); ?>">Boka</a></p>
                </div>
            </div> <!-- /event-item -->

        <?php endforeach; ?>
    <?php endif; ?>
</article>

<?php get_footer(); ?>
