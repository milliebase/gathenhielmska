<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_events_hero',
        'title' => 'Hero content',
        'fields' => [
            fieldshero('events')['img'],
            fieldshero('events')['heading'],
            fieldshero('events')['text']
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/events.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);
}
