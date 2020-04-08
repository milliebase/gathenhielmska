<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_in-house-activity',
        'title' => 'Activity information',
        'fields' => [
            [
                'key' => 'in-house_logo',
                'label' => 'Logo',
                'name' => 'profile',
                'type' => 'image',
                'max_size' => '2MB',
                'instructions' => 'Add a logo for the activity',
            ],
            [
                'key' => 'in-house_decription',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'instructions' => 'Describe the activity',
            ],
            [
                'key' => 'in-house_phone',
                'label' => 'Phone number',
                'name' => 'phone',
                'type' => 'number',
                'prepend' => '+46',
                'placeholder' => 'Phone number',
                'instructions' => 'Fill out a contact phone number for the activity',
            ],
            [
                'key' => 'in-house_email',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'E-mail',
                'instructions' => 'Fill out a contact email for the activity',
            ],
            [
                'key' => 'in-house_website_url',
                'label' => 'Website',
                'name' => 'website_url',
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
}
