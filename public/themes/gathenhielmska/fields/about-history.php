<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        [
            'key' => 'about-history_hero',
            'title' => 'Hero content',
            'fields' => [
                [
                    'key' => 'about/about-history_hero_image',
                    'label' => 'Hero image',
                    'name' => 'heroimage',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'max_size' => '2MB',
                    'instructions' => 'Add a hero for your about-history page.',
                ],
                [
                    'key' => 'about/about-history_hero_heading',
                    'label' => 'Heading for hero',
                    'name' => 'headingforhero',
                    'type' => 'text',
                    'required' => 0,
                    'placeholder' => '',
                ],
                [
                    'key' => 'about/about-history_hero_text',
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'required' => 0,
                    'placeholder' => 'Add text for your about-history page.',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-template/about/about-history.php',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'label_placement' => 'left',
            'instruction_placement' => 'field',
        ],
    );
}
