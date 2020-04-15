<?php

declare(strict_types=1);


if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        [
            'key' => 'group_about_history_hero',
            'title' => 'Hero content',
            'fields' => [
                fieldshero('about-history')['img'],
                fieldshero('about-history')['heading'],
                fieldshero('about-history')['text'],
                [
                    'key' => 'field_about_history_year',
                    'label' => 'The house years of history',
                    'name' => 'history_timeline',
                    'type' => 'group',
                    'layout'=>'block',
                    'instructions' => '',
                    'collapsed' => 'field_about_history_years',
                    'required' => 0,
                ],
                        [
                    'key' => 'field_about_history_textbox',
                    'label' => 'Add a textbox',
                    'name' => 'history_facts',
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
     acf_add_local_field(
        [
        'key' => 'field_about_history_years-desktopimg',
        'parent' => 'field_about_history_year',

        'label' => 'Desktop image',
        'name' => 'history_Desktop-image',
        'type' => 'image',
         'return_format' => 'url',

        ]);

    acf_add_local_field(
        [
        'key' => 'field_about_history_years',
        'parent' => 'field_about_history_year',

        'label' => 'Timeline',
        'name' => 'history_year',
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
                'rows' => 3,
               
            ],
        ],
  
    
    'layout' => 'block',
    'button_label' => __('add'),
   
    ]);

    acf_add_local_field([
        'key' => 'field_about_history_textboxes',
        'parent' => 'field_about_history_textbox',

        'label' => 'the history about the house',
        'name' => 'textboxes_history',
        'type' => 'repeater',
        'max' => 4,
        'sub_fields' => [
            [
                'key' => "field_about-history-image",
                'label' => 'images',
                'name'  => 'background',
                'type' => 'image',
                'return_format' => 'url',
                 'conditional_logic' => [[
                'field' => 'field_about-history_condition',
				'operator' => '==',
				'value' => 'image',
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
                        'value' => 'gallery',
                     ],
                ],
                'default_value' => '',
                'instructions' => 'add multiple images to make a slider',
            ],
            
        [
            'key'=>'field_about_history_heading',
            'label' => 'Heading',
            'name' => 'history_heading',
            'type' => 'text',
            'required' => 0,
             'conditional_logic' => [
                 [
                'field' => 'field_about-history_condition',
				'operator' => '==',
				'value' => 'header',
             ],
        ],
            'placeholder' => '',
        ],[
             'key' => 'field_about_history_text',
        	'label' => 'Text',
	        'name'  => 'Text',
            'type'  => 'textarea',
             'conditional_logic' => [
                 [
                'field' => 'field_about-history_condition',
				'operator' => '==',
				'value' => 'text',
             ],
        ],
            'instructions' => 'add some text about when the house.',
        ],
        [
             'key' => 'field_about_history_additonalText',
        	'label' => 'Bottom Text',
	        'name'  => 'addinotal_text',
            'type'  => 'textarea',
             'rows'=>3,
             'conditional_logic' => [
                 [
                'field' => 'field_about-history_condition',
				'operator' => '==',
				'value' => 'bottom text',
             ],
        ],
            'instructions' => 'add some text about when the house.',
        ],
        [
            'key' => 'filed_about_history_url',
			'label' => 'optional page url',
			'name' => 'url',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
            'conditional_logic' => [[
                'field' => 'field_about-history_condition',
				'operator' => '==',
				'value' => 'url',
            ],
        ],
            'layout'=>'table',
            'sub_fields' => [
					
						[
							'key' => 'filed_about_history_urltext',
							'label' => 'url text',
							'name' => 'url_text',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							
                        ],
                        	[
							'key' => 'filed_about_history_theurl',
							'label' => 'url',
							'name' => 'url',
							'type' => 'url',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'default_value' => '',
							'placeholder' => '',
                            ],
                        
            ],
        ],
         [
			'key' => 'field_about-history_condition',
			'label' => 'Chose what field you need',
			'name' => 'fields_condition',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			
			'choices' => [
						'image' => 'image',
						'gallery' => 'gallery',
						'header' => 'header',
                        'text' => 'text',
                        'bottom text'=>'bottom text',
                        'url' => 'url',
                        
            ],
            'layout' => 'horizontal'
	    ]
    ],
          
    'layout' => 'block',
    'button_label' => __('add'),

]);
    
}



