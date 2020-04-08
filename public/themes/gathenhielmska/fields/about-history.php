<?php

declare(strict_types=1);


if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        [
            'key' => 'group_about/about_history_hero',
            'title' => 'Hero content',
            'fields' => [
                fieldshero('about-history')['img'],
                fieldshero('about-history')['heading'],
                fieldshero('about-history')['text'],
                [
                    'key' => 'field_about_history_year',
                    'label' => 'The house years of history',
                    'name' => 'The years of history',
                    'type' => 'group',
                    'layout'=>'table',
                    'instructions' => '',
                    'collapsed' => 'field_about_history_years',
                    'required' => 0,
                ],
                        [
                    'key' => 'field_about_history_textbox',
                    'label' => 'Add a textbox',
                    'name' => '',
                    'type' => 'group',
                    'layout'=>'table',
                    'instructions' => '',
                    'collapsed' => 'field_about-history-textboxes',        
                    'required' => 0,
                        ],
            ],


            'location' => [
                [
                    [
                        'param' => 'page',
                        'operator' => '==',
                        'value' => '31',
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



    acf_add_local_field([
        'key' => 'field_about_history_years',
        'parent' => 'field_about_history_year',

        'label' => '',
        'name' => 'sub_titdddle',
        'type' => 'repeater',

        'sub_fields' => [
            [
                'key'   => 'about_history_year_date',
                'label' => 'Date',
                'name'  => 'year',
                'type'  => 'number',
                'default_value' => '1717',
                'style' => 'seamless',
            ],
            [
                'key'   => 'about_history_year_text',
                'label' => 'Text',
                'name'  => 'Text',
                'type'  => 'textarea',
                'rows' => 5,
            ],
        ],
  
    
    'layout' => 'block',
    'button_label' => __('add'),
   
    ]);

    acf_add_local_field([
        'key' => 'field_about_history_textboxes',
        'parent' => 'field_about_history_textbox',

        'label' => 'Add att box about the house history',
        'name' => 'Textbox about history',
        'type' => 'repeater',
        'max' => 4,
        'sub_fields' => [
            [
                'key' => "field_about-history-image",
                'label' => 'images',
                'name'  => 'background',
                'type' => 'image',
                'conditional_logic' => [
                    [
                        'field' => 'field_about-history_condition',
                        'operator' => '!=',
                        'value' => '1',
                    ],
                ],
                'default_value' => '',
                'instructions' => 'add background fot the textbox',

            ],
            [
                'key' => "field_about_history_gallary",
                'label' => 'gallery',
                'name'  => 'gallery',
                'type' => 'gallery',
                'conditional_logic' => [
                    [
                        'field' => 'field_about-history_condition',
                        'operator' => '==',
                        'value' => '1',
                    ],
                ],
                'default_value' => '',
                'instructions' => 'add multiple images to make a slider',
            ],
             [
			'key' => 'field_about-history_condition',
			'label' => 'Background or slider',
			'name' => 'image_or_gallery',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'image',
			'ui_off_text' => 'slider',
        
	    ],
        
        
        [
            'key'=>'field_about_history_heading',
            'label' => 'Heading',
            'name' => 'heading foundead',
            'type' => 'text',
            'required' => 0,
            'placeholder' => ''
        ],[
             'key' => 'field_about_history_text',
        	'label' => 'Text',
	        'name'  => 'Text',
            'type'  => 'textarea',
            'instructions' => 'add some text about when the house.',
        ],[

            'key' => 'field_about_history_aditonaltext',
        	'label' => 'optional addtional textfield',
	        'name'  => 'Text',
            'type'  => 'textarea',
            'rows' => 2,
            'instructions' => 'add some text about when the house.',
        ],
        [
            'key' => 'filed_about_history_url',
			'label' => 'optional page url',
			'name' => 'url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
        ]
    ],
          
    'layout' => 'block',
    'button_label' => __('add'),

]);
    
}



