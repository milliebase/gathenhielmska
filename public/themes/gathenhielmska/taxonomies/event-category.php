<?php

declare(strict_types=1);

add_action('init', function () {
    register_taxonomy('category', ['event'], [
        'hierarchical' => true,
        'labels' => [
            'add_new_item' => __('Add New Category'),
            'edit_item' => __('Edit Category'),
            'name' => __('Categories'),
            'search_items' => __('Search Categories'),
            'singular_name' => __('Category'),
        ],
        'show_admin_column' => true,
        'show_in_rest' => true,
    ]);
    register_taxonomy('organizer', ['event'], [
        'hierarchical' => true,
        'labels' => [
            'add_new_item' => __('Add New Organizer'),
            'edit_item' => __('Edit Organizer'),
            'name' => __('Organizers'),
            'search_items' => __('Search Organizers'),
            'singular_name' => __('Organizer'),
        ],
        'show_admin_column' => true,
        'show_in_rest' => true,
    ]);
});
