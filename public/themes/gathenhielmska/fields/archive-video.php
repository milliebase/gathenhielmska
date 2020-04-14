<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_video',
        'title' => 'Video information',
        'fields' => [
            [
                'key' => 'archive_video_url',
                'label' => 'Video url',
                'name' => 'video',
                'type' => 'oembed',
                'width' => '560',
                'height' => '340',
                'instructions' => 'Add youtube url for the video ',
            ],
            [
                'key' => 'archive_video_image',
                'label' => 'Video cover',
                'name' => 'videoimage',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'default_value' => '',
                'max_size' => '2MB',
                'instructions' => 'Add a cover for your video',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'archive-video',
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
