<?php
if (!function_exists('fieldshero')) {

    function fieldshero($page)
    {

        $hero = [
            'img' => [
                'key' => $page . '_hero_image',
                'label' => 'Hero image',
                'name' => 'heroimage',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'default_value' => '',
                'max_size' => '2MB',
                'instructions' => 'Add a hero for your page.',
            ],
            'heading' => [
                'key' => $page . '_hero_heading',
                'label' => 'Hero heading',
                'name' => 'heroheading',
                'type' => 'text',
                'required' => 0,
                'placeholder' => '',
            ],
            'text' =>  [
                'key' => $page . '_hero_text',
                'label' => 'Text',
                'name' => 'herotext',
                'type' => 'textarea',
                'required' => 0,
                'placeholder' => 'Add text for your page.',
            ],

        ];


        return $hero;
    }
}
