<?php

declare(strict_types=1);
// remove this when the proejct is over
function print_A($arry)
{
    print("<pre>" . print_r($arry, true) . "</pre>");
};


add_action('after_setup_theme', function () {
    add_theme_support('menus');
    add_theme_support('soil-clean-up');
    add_theme_support('soil-disable-asset-versioning');
    add_theme_support('soil-disable-trackbacks');
    add_theme_support('soil-js-to-footer');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
});

//Enqueue styles and scripts
add_action(
    'wp_enqueue_scripts',
    function () {

        wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,500,800,800i|Roboto+Condensed:300,300i,400,400i,600,700,700i', false);
        wp_enqueue_style('app.css', get_stylesheet_directory_uri() . '/assets/styles/app.css');
        wp_enqueue_script('app.js', get_template_directory_uri() . '/assets/scripts/app.js');

        if (is_page('visit')) {
            $key = getenv('API_KEY');
            wp_enqueue_script('google-map', "https://maps.googleapis.com/maps/api/js?key=$key", [], '3', true);
        }
    },
    9999
);

add_action('admin_menu', 'remove_admin_menu_items', 999);
add_action('admin_menu', 'add_archive_admin_menu');
add_action('admin_menu', 'customize_post_type_support', 40);

add_filter('show_admin_bar', '__return_false');
add_filter('enter_title_here', 'wp_change_title_text');
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

//ACF
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
//Hide ACF from admin_menu
// add_filter('acf/settings/show_admin', '__return_false');

register_nav_menu('header_menu', __('Header menu'));

//Add functionality
require get_template_directory() . '/plate.php';
require get_template_directory() . '/plugins/wp-event-manager.php';

//Register post-types
require get_template_directory() . '/post-types/employer.php';
require get_template_directory() . '/post-types/in-house-activity.php';
require get_template_directory() . '/post-types/archive-image.php';
require get_template_directory() . '/post-types/archive-video.php';
require get_template_directory() . '/post-types/article.php';

//Register fields
require get_template_directory() . '/fields/hero.php';
require get_template_directory() . '/fields/home.php';
require get_template_directory() . '/fields/event.php';
require get_template_directory() . '/fields/visit.php';
require get_template_directory() . '/fields/about-history.php';
require get_template_directory() . '/fields/about-today.php';
require get_template_directory() . '/fields/archive.php';
require get_template_directory() . '/fields/archive-image.php';
require get_template_directory() . '/fields/archive-video.php';
require get_template_directory() . '/fields/news.php';
require get_template_directory() . '/fields/contact.php';
require get_template_directory() . '/fields/employer.php';
require get_template_directory() . '/fields/in-house.php';


//Register taxonomies
require get_template_directory() . '/taxonomies/archive-category-image.php';
require get_template_directory() . '/taxonomies/archive-category-video.php';

//Output events



//Functions
if (!function_exists('my_acf_google_map_api')) {

    function my_acf_google_map_api($api)
    {
        $api['key'] = getenv('API_KEY');
        return $api;
    }
}

if (!function_exists('customize_post_type_support')) {

    /**
     * Customize the post type support in pages
     *
     * @return void
     */

    function customize_post_type_support()
    {
        remove_post_type_support('page', 'editor');
        remove_post_type_support('page', 'comments');
        remove_post_type_support('page', 'author');
        remove_meta_box('slugdiv', 'page', 'normal');
        remove_meta_box('edit-slug-box', 'page', 'normal');
    }
}


if (!function_exists('remove_admin_menu_items')) {

    /**
     * Function to remove specific items from admin_menu
     *
     * @return void
     */

    function remove_admin_menu_items()
    {
        remove_submenu_page("edit.php?post_type=event_listing", "event-manager-form-editor");
        remove_submenu_page("edit.php?post_type=event_listing", "event-manager-addons");
        remove_menu_page('edit.php');
    }
}

if (!function_exists('wp_change_title_text')) {

    /**
     * Change placeholder text depending on post-type
     *
     * @param string $title
     * @return void
     */

    function wp_change_title_text(string $title)
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
}

if (!function_exists('add_archive_admin_menu')) {

    /**
     * Add Archive to admin menu on dashboard
     *
     * @return void
     */

    function add_archive_admin_menu()
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
}

if (!function_exists('acf_excerpt')) {

    function acf_excerpt($field)
    {
        $text = get_field($field);

        if ($text !== '') {
            $text = strip_shortcodes($text);
            $text = apply_filters('the_content', $text);
            $text = str_replace("]]>", "]]>", $text);

            $text = substr($text, 0, strpos($text, '</p>') + 4);

            $excerpt_length = 35; // 35 words
            $excerpt_more = apply_filters('excerpt_more', '' . '...');
            $text = wp_trim_words($text, $excerpt_length, $excerpt_more);
        }

        return apply_filters('the_excerpt', $text);
    }
}

// Find all submenus or menus
// add_action('admin_init', 'wpse_136058_debug_admin_menu');

// function wpse_136058_debug_admin_menu()
// {

//     echo '<pre>' . print_r($GLOBALS['menu'], TRUE) . '</pre>';
// }

//Temporary solution for disabling adding own custom fields with Gutenberg-editor
// add_action('admin_head', 'my_custom_style');
// function my_custom_style()
// {
//     echo '<style>
//         #postcustom {
//             display:none;
//         }
//     </style>';
// }
