<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_image',
        'title' => 'Image information',
        'fields' => [
            [
                'key' => 'archive_image_decription',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'instructions' => 'Add an image description',
            ],
            [
                'key' => 'archive_image_date',
                'label' => 'Date',
                'name' => 'image_date',
                'type' => 'date_picker',
                'instructions' => 'Add date of the event',
            ],
            [
                'key' => 'archive_image_gallery',
                'label' => 'Images',
                'name' => 'image_gallery',
                'type' => 'gallery',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'max_size' => '10MB',
                'instructions' => 'Add images from a previous event',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'archive-image',
                ],
            ],
        ],
        'hide_on_screen' => [
            // 0 => 'permalink',
            3 => 'custom_fields',
        ],
    ]);
}
