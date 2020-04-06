<?php

declare(strict_types=1);


if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        [
            'key' => 'group_about/about_history_hero',
            'title' => 'Hero content',
            'fields' => [
                fieldshero('about/about_history')['img'],
                fieldshero('about/about_history')['header'],
                fieldshero('about/about_history')['text'],
                [
                    'key' => 'field_about-history-year',
                    'label' => 'The house years of history',
                    'name' => 'The years of history',
                    'type' => 'group',
                    'layout'=>'table',
                    'instructions' => '',
                    'collapsed' => 'field_about-history-years',
                    'required' => 0,
                ],
                        [
                    'key' => 'field_about-history-textbox',
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
    'key' => 'field_about-history-years',
	'parent' => 'field_about-history-year',
    
	'label' => '',
	'name' => 'sub_titdddle',
    'type' => 'repeater',
    
    'sub_fields'=>[
        [
            'key'   => 'about-history-year-date',
            'label' => 'Date',
            'name'  => 'year',
            'type'  => 'number',
            'default_value' => '1717',
            'style' => 'seamless',
        ],
        [
            'key'   => 'about-history-year-text',
            'label' => 'Text',
            'name'  => 'Text',
            'type'  => 'textarea',
            'rows'=>5,
        ],
    ],
    
    'layout' => 'block',
    'button_label' => __('add'),
   
    ]);

    acf_add_local_field([
    'key' => 'field_about-history-textboxes',
    'parent' => 'field_about-history-textbox',
    'label' => 'Add att box about the house history',
	'name' => 'Textbox about history',
    'type' => 'repeater',
        'sub_fields'=>[[
             'key'=>"field_about-history-image",
            'label' => 'images',
            'name'  => 'background',
            'type' => 'image',
            'conditional_logic' =>[
					[
						'field' => 'field_about-history-condition',
						'operator' => '!=',
						'value' => '1',
                    ],
                ],
            'default_value' => '',
            'instructions' => 'add background fot the textbox',
        
        ],
        [
            'key'=>"field_about-history-gallary",
            'label' => 'gallery',
            'name'  => 'background',
            'type' => 'gallery',
             'conditional_logic' =>[
					[
						'field' => 'field_about-history-condition',
						'operator' => '==',
						'value' => '1',
                    ],
                ],
            'default_value' => '',
            'instructions' => 'add multiple images to make a slider',
        
        ],
        [
			'key' => 'field_about-history-condition',
			'label' => 'Background or slider',
			'name' => 'image_or_gallery',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'image',
			'ui_off_text' => 'slider',
        
	    ],
        
        
        [
            'key'=>'field_about-history-heading',
            'label' => 'Heading when house foundead',
            'name' => 'heading foundead',
            'type' => 'text',
            'required' => 0,
            'placeholder' => ''
        ],[
             'key' => 'about_history-foundead-text',
	         'parent' => 'field_about-history-foundead',
        	'label' => 'Text',
	        'name'  => 'Text',
            'type'  => 'textarea',
            'instructions' => 'add some text about when the house was foundead.',
        ],
    ],
          
    'layout' => 'block',
    'button_label' => __('add'),
    ]);
 



    
}



