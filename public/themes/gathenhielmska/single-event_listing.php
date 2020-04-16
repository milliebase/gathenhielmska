<?php get_header(); ?>
<?php $organizer = ''; ?>

<article class="single-event">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
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
            ?>

            <?php
            $image = get_event_image($post->ID);
            $description = $post->post_content;
            $venue = get_event_venue($post->ID);
            $date = get_event_date($post->ID);
            $time = get_event_time_start($post->ID);
            $organizer = get_metadata('post', $post->ID, '_organizer_name', true);
            $event_month = get_event_month($post->ID);
            $month_index = (get_event_month_numb($post->ID) - 1);
            ?>

            <div class="hero">
                <?php if ($image) : ?>
                    <img src="<?php echo $image; ?>" alt="event-image" class="hero__image">
                <?php else : ?>
                    <img src="#" alt="placeholder img">
                <?php endif; ?>

                <div class="hero__content">
                    <div class="hero__content__text">
                        <h2><?php the_title(); ?></h2>
                        <?php if ($description) : ?>
                            <p><?php echo $description; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="explore">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.svg" alt="Arrow down">
                        <p>Utforska</p>
                    </div>
                </div>
            </div>

            <div class="info">
                <h2></h2>
                <?php if ($date && $time) : ?>
                    <p class="info__date-time"><?php echo "$date $months[$month_index] $time"; ?></p>
                <?php endif; ?>
                <?php if ($venue) : ?>
                    <p class="info__venue"><?php echo $venue; ?></p>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="info__description"><?php echo $description; ?></div>
                <?php endif; ?>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>



    <!-- display when the same organizer have more events -->
    <?php
    $args =
        [
            'post_type' => 'event_listing',
            'orderby'    => 'date',
            'order'      => 'ASC',
            'numberposts' => 3,
            'meta_key' => '_organizer_name',
            'meta_value' => "$organizer",
        ];

    $events = get_posts($args); ?>

    <?php if (count($events) > 2) : ?>
        <div class="also-play">
            <p>Spelas också: </p>

            <?php foreach ($events as $post) : setup_postdata($post); ?>

                <?php
                $date = get_event_date($post->ID);
                $startTime = get_event_time_start($post->ID);
                $endTime = get_event_time_end($post->ID);
                $event_month = get_event_month($post->ID);
                $month_index = (get_event_month_numb($post->ID) - 1);
                ?>

                <div>
                    <?php if ($date && $time) : ?>
                        <p class="date-time"><?php echo "$date $months[$month_index] $startTime-$endTime"; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div> <!-- /also-play -->
    <?php endif; ?>

    <div class="booking contact_us">
        <h2>Boka</h2>
        <?php echo do_shortcode('[ninja_form id=4]'); ?>
    </div>

    <div class="more-events">
        <?php $args = ['post_type' => 'event_listing', 'numberposts' => 2, 'orderby' => 'rand']; ?>
        <?php $events = get_posts($args); ?>
        <?php if (count($events)) : ?>
            <h2 class="more-events__title">Fler liknande evenemang:</h2>
            <div class="more-events__wrapper">
                <?php foreach ($events as $post) : setup_postdata($post); ?>
                    <?php
                    $image = get_event_image($post->ID);
                    $description = $post->post_content;
                    $venue = get_event_venue($post->ID);
                    $date = get_event_date($post->ID);
                    $time = get_event_time_start($post->ID);
                    $event_month = get_event_month($post->ID);
                    $month_index = (get_event_month_numb($post->ID) - 1);
                    ?>

                    <div class="event__item more-events__item">
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
    </div>
</article>
<?php get_footer(); ?>
