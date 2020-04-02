<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_in-house-activity',
        'title' => 'Activity information',
        'fields' => [
            [
                'key' => 'profile_image',
                'label' => 'Profile image',
                'name' => 'profile',
                'type' => 'image',
                'max_size' => '2MB',
                'instructions' => 'Add a logo for the activity',
            ],
            [
                'key' => 'decription',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'instructions' => 'Describe the activity',
            ],
            [
                'key' => 'phone',
                'label' => 'Phone number',
                'name' => 'phone',
                'type' => 'number',
                'prepend' => '+46',
                'placeholder' => 'Phone number',
                'instructions' => 'Fill out the activitiesphone number',
            ],
            [
                'key' => 'email',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'E-mail',
                'instructions' => 'Fill out the activites email',
            ],
            [
                'key' => 'website_url',
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
    ]);
}
