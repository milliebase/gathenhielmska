<?php get_header(); ?>

<article class="single-event">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php
            $image = get_event_image($post->ID);
            $description = $post->post_content;
            $venue = get_event_venue($post->ID);
            $date = get_event_date($post->ID);
            $time = get_event_time($post->ID);
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
                    <p class="info__date-time"><?php echo "$date $time"; ?></p>
                <?php endif; ?>
                <?php if ($venue) : ?>
                    <p class="info__venue"><?php echo $venue; ?></p>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="info__description"><?php echo $description; ?></div>
                <?php endif; ?>
            </div>

            <div class="more-events">

            </div>

            <div class="booking">

            </div>

        <?php endwhile; ?>

    <?php endif; ?>


</article>


<?php get_footer(); ?>
