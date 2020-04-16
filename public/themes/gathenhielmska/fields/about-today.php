<?php

declare(strict_types=1);


if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        [
            'key' => 'group_about_today_hero',
            'title' => 'Hero content',
            'fields' => [
                fieldshero('about-today')['img'],
                fieldshero('about-today')['heading'],
                fieldshero('about-today')['text'],
                [
                    'key' => 'field_about_today',
                    'label' => 'about us',
                    'name' => 'about_today_box',
                    'type' => 'group',
                    'layout' => 'block',
                    'instructions' => '',
                    'required' => 0,

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
            'key' => 'field_about_today_boxes-manifest',
            'parent' => 'field_about_today',

            'label' => '',
            'name' => 'manifest',
            'type' => 'repeater',
            'layout' => 'block',
            'max' => 4,
            'button_label' => __('add'),
            'sub_fields' => [
                [
                    'key' => 'about_today_background-desktop',
                    'label' => 'Background image Desktop',
                    'name' => 'image-desktop',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'max_size' => '3MB',
                    'instructions' => 'background image.',
                    'return' => 'url'
                ],
                [
                    'key' => 'about_today_background-mobile',
                    'label' => 'Background image Mobile',
                    'name' => 'image-mobile',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'max_size' => '3MB',
                    'instructions' => 'background image.',
                    'return' => 'url'
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
                    'rows' => '2'
                ],

            ],

        ],
    );
    acf_add_local_field(
        [
            'key' => 'field_about_today_box-culture',
            'label' => 'a cultur ecenter',
            'parent' => 'field_about_today',
            'name' => 'culture',
            'type' => 'group',
            'layout' => 'block',

            'required' => 0,

            'sub_fields' => [
                [
                    'key' => 'field_about_today_textheader',
                    'label' => 'textbox header',
                    'name' => 'today_text-header',
                    'type' => 'text',
                    'layout' => 'block',
                ],
                [
                    'key' => 'field_about_today_textbox',
                    'label' => 'write somthing about Gathenhielmska',
                    'name' => 'today_textarea',
                    'type' => 'textarea',
                    'layout' => 'block',
                    'rows' => '7',
                ],
                [
                    'key' => 'field_about_today_texturl',
                    'label' => 'url text',
                    'name' => 'today_text-url',
                    'type' => 'text',
                    'layout' => 'block',
                ],
                [
                    'key' => 'filed_about_today_url',
                    'label' => 'optional page url',
                    'name' => 'url',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                ],

            ],
        ],
    );
}
