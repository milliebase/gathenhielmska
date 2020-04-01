<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('employer', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add new employer'),
            'edit_item' => __('Edit employer'),
            'name' => __('Employers'),
            'search_items' => __('Search employers'),
            'singular_name' => __('Employer'),
        ],
        'supports' => [
            'title',
            'custom-fields',
        ],
        'menu_icon' => 'dashicons-admin-users',
        'menu_position' => 20,
        'public' => true,
    ]);
});
