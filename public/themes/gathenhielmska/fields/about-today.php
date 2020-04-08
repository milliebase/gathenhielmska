<?php

declare(strict_types=1);


if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        [
            'key' => 'group_about/about_today_hero',
            'title' => 'Hero content',
            'fields' => [
                fieldshero('about/about_today')['img'],
                fieldshero('about/about_today')['heading'],
                fieldshero('about/about_today')['text'],
                [
                    'key' => 'field_about_today_box',
                    'label' => 'about us',
                    'name' => 'today_box',
                    'type' => 'group',
                    'layout' => 'table',
                    'instructions' => '',
                    'collapsed' => 'field_about_today_boxes',
                    'required' => 0,
                ],
                [
                    'key' => 'field_about_today_textheader',
                    'label' => 'textbox header',
                    'name' => 'text',
                    'type' => 'text',
                    'layout' => 'block',
                ],
                [
                    'key' => 'field_about_today_textbox',
                    'label' => 'write somthing about Gathenhielmska',
                    'name' => 'text',
                    'type' => 'textarea',
                    'layout' => 'block',
                ], [
                    'key' => 'filed_about_today_texturl',
                    'label' => 'optional page url',
                    'name' => 'url',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                ], [
                    'key' => 'about_today_textbackground',
                    'label' => 'optional background',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'max_size' => '2MB',
                    'instructions' => 'background image.',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-template/about-today.php',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'page_attributes',
                11 => 'featured_image',
                12 => 'categories',
                13 => 'tags',
                14 => 'send-trackbacks',
            ],
            'active' => true,
            'description' => '',
        ],
    );
    acf_add_local_field(
        [
            'key' => 'field_about_today_boxes',
            'parent' => 'field_about_today_box',
            'label' => '',
            'name' => 'sub_titdddle',
            'type' => 'repeater',
            'layout' => 'block',
            'max' => 4,
            'button_label' => __('add'),
            'sub_fields' => [
                [
                    'key' => 'about_today_background',
                    'label' => 'image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'max_size' => '2MB',
                    'instructions' => 'background image.',
                ],
                [
                    'key'   => 'about_today_boxes_header',
                    'label' => 'header',
                    'name'  => 'header',
                    'type'  => 'text',
                    'default_value' => '',
                ],
                [
                    'key'   => 'about_today_boxes_text',
                    'label' => 'Text',
                    'name'  => 'Text',
                    'type'  => 'textarea',
                    'rows' => '3'
                ],

            ],
        ],
    );
}
