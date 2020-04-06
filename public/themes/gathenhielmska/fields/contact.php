<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        [
            'key' => 'group_contact_hero',
            'title' => 'Hero content',
            'fields' => [
                fieldshero('contact')['img'],
                fieldshero('contact')['heading'],
                fieldshero('contact')['text']
            ],
            'location' => [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-template/contact.php',
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
