<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_video',
        'title' => 'Video information',
        'fields' => [
            [
                'key' => 'video',
                'label' => 'Video url',
                'name' => 'video',
                'type' => 'oembed',
                'width' => '560',
                'height' => '340',
                'instructions' => 'Add youtube url for the video ',
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
    ]);
}
