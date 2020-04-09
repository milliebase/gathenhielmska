<?php /* Template name: Events */

get_header();

$args =
    [
        'post_type' => 'event_listing',
        'orderby'    => 'date',
        'order'      => 'ASC'
    ];

$events = get_posts($args);
$isItFirstTitle = true;
$todayMonth = (date('F'));
?>


<?php the_title(); ?>

<div class="search">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="Search" class="search">
</div>
<div class="filter">
</div>

<div class="view">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list.svg" alt="List-view" class="list-view">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/box.svg" alt="Box-view" class="box-view">
</div>

<article class="event">

    <?php if (count($events)) : ?>

        <?php foreach ($events as $post) : setup_postdata($post); ?>

            <?php
            $image = get_event_image($post->ID);
            $description = $post->post_content;
            $venue = get_event_venue($post->ID);
            $date = get_event_date($post->ID);
            $time = get_event_time($post->ID);
            $year = get_event_year($post->ID);
            $latestEventMonth = get_event_month($post->ID - 1);
            $currentEventMonth = get_event_month($post->ID);
            ?>

            <!-- display the first month title once-->
            <?php if (($todayMonth === $currentEventMonth) && $isItFirstTitle) : ?>
                <div class="event__month-title">
                    <h2><?php echo "$currentEventMonth $year"; ?></h2>
                </div>
                <?php $isItFirstTitle = false; ?>
            <?php endif; ?>

            <!-- display the month title if it's a new month-->
            <?php if ($latestEventMonth !== $currentEventMonth) : ?>
                <div class="event__month-title">
                    <h2><?php echo "$currentEventMonth $year"; ?></h2>
                </div>
            <?php endif; ?>


            <div class="event__item">
                <?php if ($image) : ?>
                    <img src="<?php echo $image; ?>" alt="" class="event__item__image">
                <?php else : ?>
                    <img src="#" alt="placeholder img" class="event__item__image">
                <?php endif; ?>

                <?php if ($date) : ?>
                    <div class="date-box">
                        <h2><?php echo "$date"; ?></h2>
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
    <?php endif; ?>
</article> <!-- /event box-view-->


<article class="event-list">

    <?php if (count($events)) : ?>

        <?php foreach ($events as $post) : setup_postdata($post); ?>

            <?php
            $venue = get_event_venue($post->ID);
            $listDate = get_list_event_date($post->ID);
            $time = get_event_time($post->ID);
            $year = get_event_year($post->ID);
            $latestEventMonth = get_event_month($post->ID - 1);
            $currentEventMonth = get_event_month($post->ID);
            ?>

            <!-- display the first month title once-->
            <?php if (($todayMonth === $currentEventMonth) && $isItFirstTitle) : ?>
                <div class="event__month-title">
                    <h2><?php echo "$currentEventMonth $year"; ?></h2>
                </div>
                <?php $isItFirstTitle = true; ?>
            <?php endif; ?>

            <!-- display the month title if it's a new month-->
            <?php if ($latestEventMonth !== $currentEventMonth) : ?>
                <div class="event__month-title">
                    <h2><?php echo "$currentEventMonth $year"; ?></h2>
                </div>
            <?php endif; ?>


            <div class="event-list__item">
                <div class="event-list__item__wrapper">
                    <div class="time">
                        <?php if ($listDate && $time) : ?>
                            <p><?php echo $listDate; ?></p>
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
