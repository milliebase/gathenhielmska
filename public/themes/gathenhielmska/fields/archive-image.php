<?php

declare(strict_types=1);

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_image',
        'title' => 'Image information',
        'fields' => [
            [
                'key' => 'decription',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'instructions' => 'Add an image description',
            ],
            [
                'key' => 'image_date',
                'label' => 'Date',
                'name' => 'image_date',
                'type' => 'date_picker',
                'instructions' => 'Add date when the image was taken',
            ],
            [
                'key' => 'image_gallery',
                'label' => 'Images',
                'name' => 'image_gallery',
                'type' => 'image',
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
    ]);
}