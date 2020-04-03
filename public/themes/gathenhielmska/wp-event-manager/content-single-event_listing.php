<?php
global $post;
$start_date = get_event_start_date();
$end_date = get_event_end_date();
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

<?php
/**
 * single_event_listing_start hook
 */
do_action('single_event_listing_start');
?>
<!-- se-hero = single event hero :D -->

<?php
$uri = get_template_directory_uri();
$banner = get_event_banner();
if (isset($banner)) : ?>
    <article class="se-hero">
        <img class="se-hero__img" src="<?php echo $banner; ?>" alt="<?php the_title(); ?>" />
    <?php else : ?>
        <div class="se-hero__img"><?php display_event_banner(); ?></div>
    <?php endif; ?>

    <div class="se-hero__text">
        <h3 class="se-hero__title" itemprop="name"><?php the_title(); ?></h3>

        <div class="se-hero__description" itemprop="description" content="<?php echo apply_filters('display_event_description', get_the_content()); ?>">
            <?php do_action('single_event_overview_before'); ?>
            <?php do_action('single_event_overview_start'); ?>
            <?php echo apply_filters('display_event_description', get_the_content()); ?>
            <?php do_action('single_event_overview_end'); ?>
        </div>
    </div>
    <div class="se-hero__bottom">
        <img class="se-hero__explore" src="<?php echo $uri ?>/assets/images/arrow.svg" alt="arrow logo" />
        <p class="se-hero__bottom__text">Utforska</p>
    </div>

    </article><!-- /se-hero -->

    <article class="se-info">
        <h3>Fri Entré</h3>
        <div>
            <div class="se-info__date" itemprop="startDate" content="<?php echo $start_date; ?>">
                <?php display_event_start_date(); ?>
                <?php if (get_event_start_date() != get_event_end_date()) {
                    display_event_end_date();
                } ?>
            </div>

            <div class="se-info__time">
                <?php if (get_event_end_date() != '' || get_event_end_time()) {
                    _e(' Kl.', 'wp-event-manager');
                } ?>
                <?php if (get_event_start_time()) {
                    display_event_start_time();
                } ?>

            </div>
        </div>

        <div class="se-info__venue">
            <?php if (get_event_venue_name()) { ?>
            <?php display_event_venue_name();
            } ?>
        </div>

        <div class="se-hero__description" itemprop="description" content="<?php echo apply_filters('display_event_description', get_the_content()); ?>">
            <?php do_action('single_event_overview_before'); ?>
            <?php do_action('single_event_overview_start'); ?>
            <?php echo apply_filters('display_event_description', get_the_content()); ?>
            <?php do_action('single_event_overview_end'); ?>
        </div>
    </article><!-- se-info -->
