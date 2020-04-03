<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_in-house-activity',
        'title' => 'Activity information',
        'fields' => [
            [
                'key' => 'in_house_logo',
                'label' => 'Logo',
                'name' => 'profile',
                'type' => 'image',
                'max_size' => '2MB',
                'instructions' => 'Add a logo for the activity',
            ],
            [
                'key' => 'in_house_decription',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'instructions' => 'Describe the activity',
            ],
            [
                'key' => 'in_house_phone',
                'label' => 'Phone number',
                'name' => 'phone',
                'type' => 'number',
                'prepend' => '+46',
                'placeholder' => 'Phone number',
                'instructions' => 'Fill out a contact phone number for the activity',
            ],
            [
                'key' => 'in_house_email',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'E-mail',
                'instructions' => 'Fill out a contact email for the activity',
            ],
            [
                'key' => 'in_house_website_url',
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
                    'value' => 'in-house',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);
}
