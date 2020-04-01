<?php

declare(strict_types=1);

// Add your own function to filter the fields
add_filter('event_manager_event_listing_data_fields', 'unset_fields_event_manager');

function unset_fields_event_manager($fields)
{
    foreach ($fields as $key => $value) {
        unset($fields[$key]);
    }

    // And return the modified fields
    return $fields;
}

add_filter('event_manager_event_listing_data_fields', 'add_fields_event_manager');

function add_fields_event_manager($fields)
{
    $fields['_event_title'] = [
        'label' => 'Event Title',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Event Title',
        'priority' => 1,
    ];

    $fields['_event_venue_name'] = [
        'label' => 'Venue Name',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Please enter the venue name',
        'priority' => 2,
    ];

    $fields['_event_banner'] = [
        'label' => 'Image',
        'type' => 'file',
        'required' => true,
        'priority' => 3,
        'ajax' => 1,
        'multiple' => '',
        'allowed_mime_types' => [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png',
        ]
    ];

    $fields['_event_description'] = [
        'label' => 'Description',
        'type' => 'wp-editor',
        'required' => true,
        'placeholder' => 'Please write a description about the event',
        'priority' => 4,
    ];

    $fields['_event_start_time'] = [
        'label' => 'Start time',
        'type' => 'time',
        'required' => true,
        'placeholder' => '',
        'priority' => 5,
    ];

    $fields['_event_start_date'] = [
        'label' => 'Start date',
        'type' => 'date',
        'required' => true,
        'placeholder' => '',
        'priority' => 6,
    ];

    $fields['_event_end_time'] = [
        'label' => 'End time',
        'type' => 'time',
        'required' => true,
        'placeholder' => '',
        'priority' => 7,
    ];

    $fields['_event_end_date'] = [
        'label' => 'End date',
        'type' => 'date',
        'required' => true,
        'placeholder' => '',
        'priority' => 8,
    ];

    $fields['_organizer_name'] = [
        'label' => 'Organizer name',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Enter the name of the organizer',
        'priority' => 9,
    ];

    $fields['_organizer_description'] = [
        'label' => 'Organizer description',
        'type' => 'wp-editor',
        'required' => true,
        'placeholder' => '',
        'priority' => 10,
    ];


    $fields['_organizer_email'] = [
        'label' => 'Organizer email',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Enter the email to the organizer',
        'priority' => 11,
    ];

    $fields['_organizer_website'] = [
        'label' => 'Organizer website',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Website URL e.g http://www.yourorganization.com',
        'priority' => 12,
    ];

    return $fields;
}

//Find all submenus or menus

// add_action('admin_init', 'wpse_136058_debug_admin_menu');

// function wpse_136058_debug_admin_menu()
// {

//     echo '<pre>' . print_r($GLOBALS['submenu'], TRUE) . '</pre>';
// }

add_action('admin_menu', 'remove_event_manager_subpages', 999);

function remove_event_manager_subpages()
{
    remove_submenu_page("edit.php?post_type=event_listing", "event-manager-form-editor");
    remove_submenu_page("edit.php?post_type=event_listing", "event-manager-addons");
}
