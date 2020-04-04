<?php /* Template name: Contact */

get_header();

$contactHeroImg = get_field('contact_hero_image');
$contactHeroHead = get_field('contact_hero_heading');
$contactHeroText = get_field('contact_hero_text');

$employers = get_posts(['post_type' => 'employer']);
?>

<section class="hero">
    <img src="<?php echo ($contactHeroImg) ? $contactHeroImg['url'] : '' ?>" alt="<?php echo ($contactHeroImg['alt'] === '') ? 'Hero image for contact page' :  $contactHeroImg['alt']; ?>" class="hero__image">

    <article class="hero__content">
        <div class="hero__content__text">
            <h1><?php the_title(); ?></h1>

            <h2>
                <?php if ($contactHeroHead) : ?>
                    <?php echo $contactHeroHead; ?>
                <?php endif; ?>
            </h2>

            <p>
                <?php if ($contactHeroText) : ?>
                    <?php echo $contactHeroText; ?>
                <?php endif; ?>
            </p>
        </div>

        <div class="explore">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.svg" alt="Arrow down">
            <p>Utforska</p>
        </div>
    </article>
</section>

<section class="contact">
    <h2 class="page__heading">Ledningsgrupp</h2>

    <article class="employer">
        <?php if (count($employers)) : ?>

            <?php foreach ($employers as $post) : setup_postdata($post); ?>

                <div class="employer__item">

                    <?php $employerImage = get_field('employer_image', $post->ID); ?>

                    <?php if ($employerImage) : ?>
                        <img src="<?php echo $employerImage['url']; ?>" alt="<?php echo ($employerImage['alt'] != '') ? $employerImage['alt'] : '' ?>">
                    <?php endif; ?>

                    <div class="employer__item__info">
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
