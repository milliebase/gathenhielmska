<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('news', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add news'),
            'edit_item' => __('Edit news'),
            'name' => __('News'),
            'search_items' => __('Search news'),
            'singular_name' => __('News'),
        ],
        'supports' => [
            'title',
            'custom-fields',
        ],
        'menu_icon' => 'dashicons-format-aside',
        'menu_position' => 20,
        'public' => true,
        'show_ui' => true,
    ]);
});
