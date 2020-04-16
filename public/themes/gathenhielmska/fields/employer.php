<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_employer',
        'title' => 'Contact information',
        'fields' => [
            [
                'key' => 'employer_image',
                'label' => 'Profile image',
                'name' => 'profile',
                'type' => 'image',
                'instructions' => '',
                'conditional_logic' => 0,
                'default_value' => '',
                'max_size' => '2MB',
                'instructions' => 'Add a profile image of the employer.',
            ],
            [
                'key' => 'employer_profession',
                'label' => 'Your profession',
                'name' => 'profession',
                'type' => 'text',
                'required' => 1,
                'placeholder' => '',
                'instructions' => 'Fill out the employers profession.',
            ],
            [
                'key' => 'employer_phone',
                'label' => 'Phone number',
                'name' => 'phone',
                'type' => 'number',
                'required' => 1,
                'prepend' => '+46',
                'placeholder' => '07XXXXXXXXXXX',
                'instructions' => 'Fill out the employers phone number - no spaces between numbers.',
            ],
            [
                'key' => 'employer_email',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'required' => 1,
                'placeholder' => 'example@gmail.com',
                'instructions' => 'Fill out the employers email.',
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
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);
}
