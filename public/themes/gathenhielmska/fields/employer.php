<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_employer',
        'title' => 'Contact information',
        'fields' => [
            [
                'key' => 'profile',
                'label' => 'Profile image',
                'name' => 'profile',
                'type' => 'image',
                'max_size' => '2MB',
                'instructions' => 'Add a profile image of the employer',
            ],
            [
                'key' => 'profession',
                'label' => 'Your profession',
                'name' => 'profession',
                'type' => 'text',
                'placeholder' => 'Profession',
                'instructions' => 'Fill out the employers profession',
            ],
            [
                'key' => 'phone',
                'label' => 'Phone number',
                'name' => 'phone',
                'type' => 'number',
                'prepend' => '+46',
                'placeholder' => 'Phone number',
                'instructions' => 'Fill out the employers phone number',
            ],
            [
                'key' => 'email',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'E-mail',
                'instructions' => 'Fill out the employers email',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'employer',
                ],
            ],
        ],
    ]);
}
