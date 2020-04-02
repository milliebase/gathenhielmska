<?php
global $post;
$start_date = get_event_start_date();
$end_date = get_event_end_date();
wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style('wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
?>
<div class="single_event_listing" itemscope itemtype="http://schema.org/Event">

    <?php
    $banner = get_event_banner();
    if (isset($banner)) :
    ?>
        <div class="single-event-img-wrapper">
            <img class="single-event-img-wrapper__img" src="<?php echo $banner; ?>" alt="<?php the_title(); ?>" />
        </div>
    <?php else : ?>
        <div class="wpem-event-single-image-wrapper">
            <div class="wpem-event-single-image"><?php display_event_banner(); ?></div>
        </div>
    <?php endif; ?>
</div>

<div class="wpem-main wpem-single-event-page">
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
        <?php
        /**
         * single_event_listing_start hook
         */
        do_action('single_event_listing_start');
        ?>
        <div class="wpem-single-event-wrapper">
            <div class="wpem-event-details">
                <div class="wpem-event-title">
                    <h3 class="wpem-heading-text" itemprop="name"><?php the_title(); ?></h3>
                </div>

                <div class="wpem-single-event-body">
                    <div class="wpem-row">
                        <div class="wpem-col-xs-12 wpem-col-sm-7 wpem-col-md-8 wpem-single-event-left-content">
                            <?php do_action('single_event_overview_before'); ?>
                            <div class="wpem-single-event-body-content" itemprop="description" content="<?php echo apply_filters('display_event_description', get_the_content()); ?>">
                                <?php do_action('single_event_overview_start'); ?>
                                <?php echo apply_filters('display_event_description', get_the_content()); ?>
                                <?php do_action('single_event_overview_end'); ?>
                            </div>
                            <?php do_action('single_event_overview_after'); ?>
                        </div>
                        <div class="wpem-col-xs-12 wpem-col-sm-5 wpem-col-md-4 wpem-single-event-right-content">
                            <div class="wpem-single-event-body-sidebar">
                                <?php do_action('single_event_listing_button_start'); ?>



                                <?php do_action('single_event_listing_button_end'); ?>

                                <div class="wpem-single-event-sidebar-info">

                                    <?php do_action('single_event_sidebar_start'); ?>
                                    <div class="clearfix">&nbsp;</div>
                                    <h3 class="wpem-heading-text"><?php _e('Date And Time', 'wp-event-manager') ?></h3>
                                    <div class="wpem-event-date-time">
                                        <span class="wpem-event-date-time-text" itemprop="startDate" content="<?php echo $start_date; ?>"><?php display_event_start_date(); ?> <?php if (get_event_start_time()) {
                                                                                                                                                                                    display_date_time_separator(); ?> <?php display_event_start_time();
                                                                                                                                                                                                                                } ?></span>
                                        <?php if (get_event_end_date() != '' || get_event_end_time()) {
                                            _e(' to', 'wp-event-manager');
                                        } ?>
                                        <br />
                                        <span class="wpem-event-date-time-text" itemprop="endDate" content="<?php echo $end_date; ?>">
                                            <?php if (get_event_start_date() != get_event_end_date()) {
                                                display_event_end_date();
                                            } ?>
                                            <?php if (get_event_end_date() != '' && get_event_end_time()) {
                                                display_date_time_separator();
                                            } ?>
                                            <?php if (get_event_end_time()) {
                                                display_event_end_time();
                                            } ?>
                                        </span>
                                    </div>

                                    <div itemprop="location" itemscope itemtype="http://schema.org/Place">
                                        <div class="clearfix">&nbsp;</div>
                                        <h3 class="wpem-heading-text"><?php _e('Location', 'wp-event-manager'); ?></h3>
                                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                            <?php if (get_event_address()) {
                                                display_event_address();
                                                echo ',';
                                            } ?> <?php display_event_location(); ?>
                                        </div>
                                        <?php if (get_event_venue_name()) {
                                        ?>
                                            <div class="clearfix">&nbsp;</div>
                                            <h3 class="wpem-heading-text" itemprop="name" content="<?php display_event_venue_name(); ?>"><?php _e('Venue', 'wp-event-manager'); ?></h3>
                                        <?php display_event_venue_name();
                                        } ?>
                                    </div>

                                    <?php if (get_option('event_manager_enable_event_types') && get_event_type()) { ?>
                                        <div class="clearfix">&nbsp;</div>
                                        <h3 class="wpem-heading-text"><?php _e('Event Types', 'wp-event-manager'); ?></h3>
                                        <div class="wpem-event-type"><?php display_event_type(); ?></div>
                                    <?php } ?>

                                    <?php if (get_option('event_manager_enable_categories') && get_event_category()) { ?>
                                        <div class="clearfix">&nbsp;</div>
                                        <h3 class="wpem-heading-text"><?php _e('Event Category', 'wp-event-manager'); ?></h3>
                                        <div class="wpem-event-category"><?php display_event_category(); ?></div>

                                    <?php } ?>
                                    <?php

                                    get_event_manager_template_part('content', 'single-event_listing-organizer');
                                    /**
                                     * single_event_listing_end hook
                                     */
                                    do_action('single_event_listing_end');
                                    ?>
                                <?php endif; ?>
                                <!-- Main if condition end -->

                                <!-- override the script if needed -->
                                <script type="text/javascript">
                                    jQuery(document).ready(function() {
                                        jQuery('.wpem-single-event-slider').slick({
                                            dots: true,
                                            infinite: true,
                                            speed: 500,
                                            fade: true,
                                            cssEase: 'linear',
                                            responsive: [{
                                                breakpoint: 992,
                                                settings: {
                                                    dots: true,
                                                    infinite: true,
                                                    speed: 500,
                                                    fade: true,
                                                    cssEase: 'linear',
                                                    adaptiveHeight: true
                                                }
                                            }]
                                        });

                                    });
                                </script>
