<?php /* Template name: Contact */

get_header();

$employers = get_posts(['post_type' => 'employer']);
?>

<section class="contact">
    <h2 class="page__heading">Ledningsgrupp</h2>

    <article class="details">
        <?php if (count($employers)) : ?>

            <?php foreach ($employers as $post) : setup_postdata($post); ?>

                <div class="details__item">

                    <?php $employerImage = get_field('employer_image'); ?>

                    <?php if ($employerImage) : ?>
                        <img src="<?php echo $employerImage['url']; ?>" alt="<?php echo ($employerImage['alt'] != '') ? $employerImage['alt'] : '' ?>">
                    <?php endif; ?>

                    <div class="details__item__info">
                        <h3><?php the_title(); ?></h3>

                        <?php $employerProfession = get_field('employer_profession'); ?>

                        <?php if ($employerProfession) : ?>
                            <h4><?php echo $employerProfession; ?></h4>
                        <?php endif; ?>

                        <?php $employerEmail = get_field('employer_email'); ?>

                        <?php if ($employerEmail) : ?>
                            <p><span>E-post:</span> <?php echo $employerEmail; ?></p>
                        <?php endif; ?>

                        <?php $employerPhone = get_field('employer_phone'); ?>

                        <?php if ($employerPhone) : ?>
                            <p><span>Tele:</span> <?php echo $employerPhone; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </article>
</section>

<?php get_footer();
