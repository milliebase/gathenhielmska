<?php /* Template name: Visit */

get_header();
?>

<section class="visit">
    <div class="visit__opening_hours">
        <h2 class="page__heading"><?php echo get_field('opening_hours_heading'); ?></h2>

        <p><?php echo get_field('opening_hours_text'); ?></p>
    </div>

    <div class="visit__adress">
        <h2 class="page__heading"><?php echo get_field('location_heading'); ?></h2>
        <p><?php echo get_field('location_adress'); ?></p>
        <p><?php echo get_field('location_public_transport'); ?></p>
    </div>

    <div class="acf-map">
        <div class="marker" data-lat="57.698785" data-lng="11.934091"></div>
    </div>

    <div class="visit__parking">
        <h2 class="page__heading"><?php echo get_field('parking_heading'); ?></h2>
        <p><?php echo get_field('parking_text'); ?></p>
    </div>


</section>


<?php get_footer(); ?>
