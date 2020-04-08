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

<h2><?php the_title(); ?></h2>
<article class="event">

    <?php if (count($events)) : ?>

        <?php foreach ($events as $post) : setup_postdata($post); ?>

            <?php
            $image = get_event_image($post->ID);
            $description = $post->post_content;
            $venue = get_event_venue($post->ID);
            $date = get_event_date($post->ID);
            $time = get_event_time($post->ID);
            $latestEventMonth = get_event_month($post->ID - 1);
            $currentEventMonth = get_event_month($post->ID);
            ?>

            <!-- display the first month title once-->
            <?php if (($todayMonth === $currentEventMonth) && $isItFirstTitle) : ?>
                <h1><?php echo $currentEventMonth; ?></h1>
                <?php $$isItFirstTitle = false; ?>
            <?php endif; ?>

            <!-- display the month title if it's a new month-->
            <?php if ($latestEventMonth !== $currentEventMonth) : ?>
                <h1><?php echo $currentEventMonth; ?></h1>
            <?php endif; ?>

            <div class="event__item">

                <h1><?php the_title(); ?></h1>

                <?php if ($image) : ?>
                    <img src="<?php echo $image; ?>" alt="" style="display:none;">
                <?php else : ?>
                    <img src="#" alt="placeholder img">
                <?php endif; ?>

                <?php if ($date) : ?>
                    <p><?php echo "$date"; ?></p>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p><?php echo $description; ?></p>
                <?php endif; ?>

                <?php if ($venue) : ?>
                    <p><?php echo $venue; ?></p>
                <?php endif; ?>

                <?php if ($date && $time) : ?>
                    <p><?php echo "$date $time"; ?></p>
                <?php endif; ?>

                <a href="<?php the_permalink($post); ?>"><button class=""></button></a>
            </div> <!-- /event-item -->

        <?php endforeach; ?>
    <?php endif; ?>
</article> <!-- /event -->

<?php get_footer(); ?>
