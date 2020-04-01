<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('in-house', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add new In-House activity'),
            'edit_item' => __('Edit In-House activity'),
            'name' => __('In-House activities'),
            'search_items' => __('Search In-House activity'),
            'singular_name' => __('In-House activity'),
        ],
        'supports' => [
            'title',
            'custom-fields',
        ],
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 20,
        'public' => true,
    ]);
});
