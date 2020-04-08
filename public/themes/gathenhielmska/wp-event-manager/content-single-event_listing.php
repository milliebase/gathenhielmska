<?php
global $post;
$start_date = get_event_start_date();
$end_date = get_event_end_date();
$uri = get_template_directory_uri();
$banner = get_event_banner();
wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style('wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
?>


<?php if (get_option('event_manager_hide_expired_content', 1) && 'expired' === $post->post_status) : ?>
    <div class="event-manager-info wpem-alert wpem-alert-danger"><?php _e('This listing has been expired.', 'wp-event-manager'); ?></div>
<?php else : ?>
    <?php if (is_event_cancelled()) : ?>
        <div class="wpem-alert wpem-alert-danger">
            <span class="event-cancelled" itemprop="eventCancelled"><?php _e('This event has been cancelled', 'wp-event-manager'); ?></span>
        </div>
    <?php elseif (!attendees_can_apply() && 'preview' !== $post->post_status) : ?>
        <div class="wpem-alert wpem-alert-danger">
            <span class="listing-expired" itemprop="eventExpired"><?php _e('Registrations have closed', 'wp-event-manager'); ?></span>
        </div>
    <?php endif; ?>
<?php endif; ?>

<section class="se-hero">
    <?php if (isset($banner)) : ?>
        <img class="se-hero__image" src="<?php echo $banner; ?>" alt="<?php the_title(); ?>" />
    <?php else : ?>
        <div class="se-hero__image"><?php display_event_banner(); ?></div>
    <?php endif; ?>

    <article class="se-hero__content">
        <div class="se-hero__content__text">
            <h1 itemprop="name"><?php the_title(); ?></h1>

            <?php echo apply_filters('display_event_description', get_the_content()); ?>
        </div>
        <div class="explore">
            <img src="<?php echo $uri ?>/assets/images/arrow.svg" alt="arrow logo" />
            <p>Utforska</p>
        </div>
    </article>
</section><!-- /se-hero -->

<article class="se-info">
    <div class="se-info__date-time">
        <?php display_event_start_date(); ?>
        <?php if (get_event_start_date() != get_event_end_date()) {
            display_event_end_date();
        } ?>
        <?php if (get_event_start_time()) {
            display_event_start_time();
        } ?>
    </div>

    <div class="se-info__venue">
        <?php if (get_event_venue_name()) { ?>
        <?php display_event_venue_name();
        } ?>
    </div>

    <div class="se-info__description">
        <?php echo apply_filters('display_event_description', get_the_content()); ?>
    </div>
</article><!-- se-info -->



