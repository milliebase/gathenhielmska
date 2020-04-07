<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_visit_hero',
        'title' => 'Hero content',
        'fields' => [
            fieldshero('visit')['img'],
            fieldshero('visit')['heading'],
            fieldshero('visit')['text']
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/visit.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);

    acf_add_local_field_group([
        'key' => 'group_visit_opening_hours',
        'title' => 'Opening hours information',
        'fields' => [
            [
                'key' => 'opening_hours_heading',
                'label' => 'Heading for opening hours',
                'name' => 'openinghoursheading',
                'type' => 'text',
                'instructions' => '',
                'default_value' => 'Öppettider'
            ],
            [
                'key' => 'opening_hours_text',
                'label' => 'Text',
                'name' => 'openinghourstext',
                'type' => 'textarea',
                'instructions' => 'Write your information about opening hours here',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/visit.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
        'menu_order' => 0,
    ]);

    acf_add_local_field_group([
        'key' => 'group_visit_location',
        'title' => 'Location information',
        'fields' => [
            [
                'key' => 'location_heading',
                'label' => 'Heading for location',
                'name' => 'locationheading',
                'type' => 'text',
                'instructions' => '',
                'default_value' => 'Hitta hit'
            ],
            [
                'key' => 'location_adress',
                'label' => 'Adress',
                'name' => 'adress',
                'type' => 'text',
                'instructions' => '',
                'placeholder' => 'Write your adress here'
            ],
            [
                'key' => 'location_public_transport',
                'label' => 'Public transport description',
                'name' => 'publictransport',
                'type' => 'textarea',
                'instructions' => 'Write your information about public transportation here',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/visit.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
        'menu_order' => 1,
    ]);

    acf_add_local_field_group([
        'key' => 'group_visit_parking',
        'title' => 'Parking information',
        'fields' => [
            [
                'key' => 'parking_heading',
                'label' => 'Heading for parking',
                'name' => 'parkingheading',
                'type' => 'text',
                'instructions' => '',
                'default_value' => 'Parkering'
            ],
            [
                'key' => 'parking_text',
                'label' => 'Text',
                'name' => 'parkingtext',
                'type' => 'textarea',
                'instructions' => 'Write your information about parking stations here',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/visit.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
        'menu_order' => 2,
    ]);
}
