<?php
$start_date = get_event_start_date();
$start_time = get_event_start_time();
$end_date = get_event_end_date();
$end_time = get_event_end_time();
$event_type = get_event_type();
if (is_array($event_type) && isset($event_type[0]))
    $event_type = $event_type[0]->slug;
$banner = get_event_banner();

if (is_array($banner) && isset($banner[0]))
    $banner = $banner[0];
elseif (is_array($banner) && empty($banner))
    $banner = '';
else
    $banner = $banner;
?>
        <div <?php event_listing_class('wpem-event-layout-wrapper'); ?>>
            <a href="<?php display_event_permalink(); ?>" class="wpem-event-action-url event-style-color <?php echo $event_type; ?>">
                <div class="wpem-event-banner">
                    <div class="wpem-event-banner-img" style="background-image: url('<?php echo $banner  ?>')">

                        <!-- Hide in list View // Show in Box View -->
                        <?php do_action('event_already_registered_title'); ?>
                        <div class="wpem-event-date">
                            <div class="wpem-event-date-type">
                                <?php if (!empty($start_date)) { ?>
                                    <div class="wpem-from-date">
                                        <div class="wpem-date"><?php echo date_i18n('d', strtotime($start_date)); ?></div>
                                        <div class="wpem-month"><?php echo date_i18n('M', strtotime($start_date)); ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- Hide in list View // Show in Box View -->
                    </div>
                </div>

                    <div class="wpem-event-details">
                        <div class="wpem-event-title">
                            <h3 class="wpem-heading-text"><?php echo esc_html(get_the_title()); ?></h3>
                        </div>

                        <div>
                            <div class="event-info__date" itemprop="startDate" content="<?php echo $start_date; ?>">
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

                        <div class="event-info__venue">
                            <?php if (get_event_venue_name()) { ?>
                            <?php display_event_venue_name();
                            } ?>
                        </div>


                        <!-- Show in list View // Hide in Box View -->
                        <?php if (get_event_ticket_option()) {  ?>
                            <div class="wpem-event-ticket-type" class="wpem-event-ticket-type-text"><span class="wpem-event-ticket-type-text"><?php display_event_ticket_option(); ?></span></div>
                        <?php } ?>
                        <!-- Show in list View // Hide in Box View -->
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
