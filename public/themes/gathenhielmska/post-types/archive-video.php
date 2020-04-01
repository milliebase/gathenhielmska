<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('archive-video', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add new video'),
            'edit_item' => __('Edit video'),
            'name' => __('Videos'),
            'search_items' => __('Search video'),
            'singular_name' => __('Video'),
        ],
        'supports' => [
            'title',
            'custom-fields',
        ],
        'menu_icon' => 'dashicons-video-alt3',
        'menu_position' => 20,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'archive',
    ]);
});
