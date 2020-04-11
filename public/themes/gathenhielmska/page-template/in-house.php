<?php /* Template name: In-house */

get_header();

$activities = get_posts(['post_type' => 'in-house-activity']);
?>

<section class="in_house">
    <article class="in_house__description">
        <h2 class="page__heading"><?php echo the_title(); ?></h2>
        <p><?php echo get_field('in-house_description'); ?></p>
    </article>

    <article class="details">
        <?php if (count($activities)) : ?>

            <?php foreach ($activities as $post) : setup_postdata($post); ?>

                <div class="details__item">
                    <?php $activityImage = get_field('activity_logo'); ?>

                    <?php if ($activityImage) : ?>
                        <img src="<?php echo $activityImage['url']; ?>" alt="<?php echo ($activityImage['alt'] != '') ? $activityImage['alt'] : '' ?>">
                    <?php endif; ?>

                    <div class="details__item__info">
                        <h3><?php the_title(); ?></h3>

                        <?php $activityProfession = get_field('activity_type'); ?>

                        <?php if ($activityProfession) : ?>
                            <h4><?php echo $activityProfession; ?></h4>
                        <?php endif; ?>

                        <?php $activityEmail = get_field('activity_email'); ?>

                        <?php if ($activityEmail) : ?>
                            <p><span>E-post:</span> <?php echo $activityEmail; ?></p>
                        <?php endif; ?>

                        <?php $activityPhone = get_field('activity_phone'); ?>

                        <?php if ($activityPhone) : ?>
                            <p><span>Tele:</span> <?php echo $activityPhone; ?></p>
                        <?php endif; ?>

                        <?php $activityWebsite = get_field('activity_website_url'); ?>

                        <?php if ($activityWebsite) : ?>
                            <a href="<? echo $activityWebsite; ?>">Länk till hemsida</a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </article>

</section>

<?php get_footer(); ?>
