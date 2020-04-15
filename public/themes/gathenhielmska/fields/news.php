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

    acf_add_local_field_group([
        'key' => 'group_article',
        'title' => 'Article content',
        'fields' => [
            [
                'key' => 'article_image',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'max_size' => '2MB',
                'instructions' => 'Add an image for the article',
            ],
            [
                'key' => 'article_text',
                'label' => 'Article text',
                'name' => 'articletext',
                'type' => 'textarea',
                'instructions' => 'Maximum 280 characters',
                'maxlength' => 280,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'article',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
        'hide_on_screen' => [
            // 0 => 'permalink',
            3 => 'custom_fields',
        ],
    ]);
}
