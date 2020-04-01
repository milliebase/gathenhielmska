<?php

declare(strict_types=1);


@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');



add_action('after_setup_theme', function () {
    // add_theme_support('title-tag');
    // add_theme_support( 'post-thumbnails' );

    add_theme_support('soil-clean-up');
    add_theme_support('soil-disable-asset-versioning');
    add_theme_support('soil-disable-trackbacks');
    add_theme_support('soil-js-to-footer');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
});

require get_template_directory() . '/plate.php';
require get_template_directory() . '/plugins/wp-event-manager.php';

//POST TYPES
require get_template_directory() . '/post-types/employer.php';
require get_template_directory() . '/post-types/in-house.php';
require get_template_directory() . '/post-types/archive-image.php';
require get_template_directory() . '/post-types/archive-video.php';
require get_template_directory() . '/post-types/news.php';

//FIELDS
require get_template_directory() . '/fields/employer.php';
require get_template_directory() . '/fields/in-house.php';
require get_template_directory() . '/fields/archive-image.php';
require get_template_directory() . '/fields/archive-video.php';



//TAXONMIES
require get_template_directory() . '/taxonomies/archive-category-image.php';
require get_template_directory() . '/taxonomies/archive-category-video.php';


add_filter('show_admin_bar', '__return_false');

add_filter('enter_title_here', 'wp_change_title_text');

add_action(
    'wp_enqueue_scripts',
    function () {
        wp_enqueue_style('app.css', get_stylesheet_directory_uri() . '/assets/styles/app.css');
        wp_enqueue_script('app.js', get_template_directory_uri() . '/assets/scripts/app.js');
    }
);

function wp_change_title_text($title)
{
    $screen = get_current_screen();

    if ('employer' == $screen->post_type) {
        $title = "Employer's name";
    }

    if ('in-house' == $screen->post_type) {
        $title = "Activity name";
    }

    if ('event' == $screen->post_type) {
        $title = "Event title";
    }

    return $title;
}


function archive_admin_menu()
{
    add_menu_page(
        'Archive',
        'Archive',
        'read',
        'archive',
        '',
        'dashicons-admin-media',
        40
    );
}

add_action('admin_menu', 'archive_admin_menu');
