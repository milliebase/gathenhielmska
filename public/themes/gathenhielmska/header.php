<?php

$uri = get_template_directory_uri();

global $wp;

if (empty($wp->query_vars)) {
    $page = 'home';
}

if (array_key_exists('pagename', $wp->query_vars)) {
    $page = $wp->query_vars['pagename'];

    if (strpos($page, '/')) {
        $page = substr($page, strpos($page, '/') + 1);
    }
}

if (array_key_exists('post_type', $wp->query_vars)) {
    $page = $wp->query_vars['post_type'];

    if ($page === 'event_listing') {
        $page = 'single_event';
    }
}

$heroImg = get_field($page . '_hero_image');
$heroHead = get_field($page . '_hero_heading');
$heroText = get_field($page . '_hero_text');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#6d9aea">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="navbar">
        <div class="navbar__panel">
            <div class="navbar__buttons">
                <a href="<?php echo home_url(); ?>" class="<?php echo ($page !== 'home') ? "navbar__logo" : "navbar__logo navbar__logo--hidden" ?>">
                    <img src=" <?php echo $uri ?>/assets/images/logos/gathenhielmska.svg" alt="Gathenhielmska logo" />
                </a>

                <img src="<?php echo $uri ?>/assets/images/menu.svg" alt="Hamburger menu" class="navbar__burger" />
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="<?php echo ($page !== 'home') ? 'navbar__panel__wave' : 'navbar__panel__wave navbar__panel__wave--hidden'; ?>">
                <path fill=" #18595B" fill-opacity="1" d="M0,256L48,240C96,224,192,192,288,160C384,128,480,96,576,122.7C672,149,768,235,864,240C960,245,1056,171,1152,170.7C1248,171,1344,245,1392,282.7L1440,320L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>
        </div>

        <div class="navbar__overlay hidden">
            <div class="navbar__overlay__panel">
                <div class="language">
                    <img src="<?php echo $uri ?>/assets/images/language.svg" alt="Choose language icon">
                    <small>SV</small>
                </div>

                <img src="<?php echo $uri ?>/assets/images/exit.svg" alt="Exit menu button" class="navbar__overlay__exit">
            </div>

            <?php wp_nav_menu([
                'menu_class' => 'menu',
                'menu_id' => '',
                'container' => '',
                'theme_location' => 'header_menu'
            ]) ?>

            <div class="information">
                <img src="<?php echo $uri ?>/assets/images/logos/gathenhielmska_gradient.svg" alt="Gathenhielmska logo with gradient" class="information__logo">

                <div class="information__ctu">
                    <p>Login</p>

                    <a href="#">
                        <img src="<?php echo $uri ?>/assets/images/logos/facebook.svg" alt="Gathenhielmska Facebook link">
                    </a>

                    <a href="#">
                        <img src="<?php echo $uri ?>/assets/images/logos/instagram.svg" alt="Gathenhielmska Instagram link">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--/navbar-->
    <?php if ($page !== 'single_event') : ?>
        <section class=<?php echo ($page === 'home') ? 'hero__home' : 'hero' ?>>
            <?php if ($heroImg) : ?>
                <img src="<?php echo $heroImg['url']; ?>" alt="<?php echo ($heroImg['alt'] === '') ? "Hero image for $page page" :  $heroImg['alt']; ?>" class="hero__image">
            <?php endif; ?>

            <article class="hero__content <?php echo ($page === 'home') ? 'hero__content--home' : '' ?>">
                <div class=" hero__content__text">
                    <?php if ($page !== 'home') : ?>
                        <h1><?php the_title(); ?></h1>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logos/gathenhielmska.svg" alt="Gathenhielmska logo" />
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logos/gathenhielmska2.svg" alt="Gathenhielmska logo" />
                    <?php endif; ?>

                    <h2>
                        <?php if ($heroHead) : ?>
                            <?php echo $heroHead; ?>
                        <?php endif; ?>
                    </h2>

                    <p class=<?php echo ($page === 'home') ? 'home__text' : ''; ?>>
                        <?php if ($heroText) : ?>
                            <?php echo $heroText; ?>
                        <?php endif; ?>
                    </p>

                </div>

                <?php if ($page != 'home') : ?>
                    <div class="explore">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.svg" alt="Arrow down" />
                        <p>Utforska</p>
                    </div>
                <?php else : ?>
                    <Huset href="/about-today" class="button home__button">Huset idag</a>
                    <?php endif; ?>
            </article>
        </section>
    <?php endif; ?>

    <div class="wrapper">
