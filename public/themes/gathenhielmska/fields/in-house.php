<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_in-house_hero',
        'title' => 'Hero content',
        'fields' => [
            fieldshero('in-house')['img'],
            fieldshero('in-house')['heading'],
            fieldshero('in-house')['text']
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/in-house.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);

    acf_add_local_field_group([
        'key' => 'group_in-house_info',
        'title' => 'Page description',
        'fields' => [
            [
                'key' => 'in-house_description',
                'label' => 'Description',
                'name' => 'inhousedescription',
                'type' => 'textarea',
                'required' => 0,
                'placeholder' => 'Write a text about you in-house activities',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/in-house.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);

    acf_add_local_field_group([
        'key' => 'group_in-house_read_more',
        'title' => 'Read more',
        'fields' => [
            [
                'key' => 'in-house_read_more',
                'label' => 'Description',
                'name' => 'inhousereadmore',
                'type' => 'textarea',
                'required' => 0,
                'placeholder' => 'Write a text for the home page about in-house activities',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/in-house.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);

    acf_add_local_field_group([
        'key' => 'group_in-house-activity',
        'title' => 'Activity information',
        'fields' => [
            [
                'key' => 'activity_logo',
                'label' => 'Logo',
                'name' => 'activitylogo',
                'type' => 'image',
                'max_size' => '2MB',
                'instructions' => 'Add a logo for the activity',
            ],
            [
                'key' => 'activity_type',
                'label' => 'Type',
                'name' => 'activitytype',
                'type' => 'text',
                'instructions' => 'Type of activity ex. podcasting, theatre',
            ],
            [
                'key' => 'activity_decription',
                'label' => 'Description',
                'name' => 'activitydescription',
                'type' => 'textarea',
                'instructions' => 'Describe the activity',
            ],
            [
                'key' => 'activity_email',
                'label' => 'Email',
                'name' => 'activityemail',
                'type' => 'email',
                'placeholder' => 'E-mail',
                'instructions' => 'Fill out a contact email for the activity',
            ],
            [
                'key' => 'activity_phone',
                'label' => 'Phone number',
                'name' => 'activityphone',
                'type' => 'number',
                'prepend' => '+46',
                'placeholder' => 'Phone number',
                'instructions' => 'Fill out a contact phone number for the activity',
            ],
            [
                'key' => 'activity_website_url',
                'label' => 'Website',
                'name' => 'activitywebsiteurl',
                'type' => 'url',
                'placeholder' => 'Website',
                'instructions' => 'Fill out the activities website',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'in-house-activity',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
        'hide_on_screen' => [
            // 0 => 'permalink',
            3 => 'custom_fields',
        ],
    ]);
}
