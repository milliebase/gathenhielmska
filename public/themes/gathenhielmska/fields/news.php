<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_news_hero',
        'title' => 'Hero content',
        'fields' => [
            fieldshero('news')['img'],
            fieldshero('news')['heading'],
            fieldshero('news')['text']
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/news.php',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);
}
