<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'texture_image' => array(
        'label' => esc_html__('Texture Background', 'soccer-acumen'),
        'type' => 'upload',
        'value' => '',
        'desc' => esc_html__('Upload background texture image.', 'soccer-acumen')
    ),
    'player_image' => array(
        'label' => esc_html__('Image', 'soccer-acumen'),
        'type' => 'upload',
        'value' => '',
        'desc' => esc_html__('Upload left image.', 'soccer-acumen')
    ),
    'current_match' => array(
        'label' => esc_html__('Select match', 'soccer-acumen'),
        'type' => 'select',
        'value' => '',
        'choices' => soccer_acumen_prepare_upcoming_fixture(),
        'desc' => esc_html__('Please select match.', 'soccer-acumen')
    ),
    'show_description' => array(
        'type' => 'switch',
        'value' => 'show',
        'label' => esc_html__('Description', 'soccer-acumen'),
        'left-choice' => array(
            'value' => 'show',
            'label' => esc_html__('Show Description', 'soccer-acumen'),
        ),
        'right-choice' => array(
            'value' => 'hide',
            'label' => esc_html__('Hide Description', 'soccer-acumen'),
        ),
    ),
    'excerpt_length' => array(
        'type' => 'slider',
        'value' => 123,
        'properties' => array(
            'min' => 0,
            'max' => 1000,
            'sep' => 1,
        ),
        'label' => esc_html__('Excerpt length', 'soccer-acumen'),
    ),
    
);
