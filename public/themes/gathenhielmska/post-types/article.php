<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('article', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add article'),
            'edit_item' => __('Edit article'),
            'name' => __('Article'),
            'search_items' => __('Search article'),
            'singular_name' => __('Article'),
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
