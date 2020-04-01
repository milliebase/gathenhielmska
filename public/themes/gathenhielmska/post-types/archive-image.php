<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('archive-image', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add new image'),
            'edit_item' => __('Edit image'),
            'name' => __('Images'),
            'search_items' => __('Search images'),
            'singular_name' => __('Image'),
        ],
        'supports' => [
            'title',
            'custom-fields',
        ],
        'menu_icon' => 'dashicons-camera',
        'menu_position' => 20,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'archive',
    ]);
});
