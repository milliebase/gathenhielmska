<?php /* Template name: Contact */

get_header();

$contactHeroImg = get_field('contact_hero_image');
$contactHeroHead = get_field('contact_hero_heading');
$contactHeroText = get_field('contact_hero_text');

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

<?php get_footer();
