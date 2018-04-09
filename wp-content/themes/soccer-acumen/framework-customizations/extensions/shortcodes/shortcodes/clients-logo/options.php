<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'client_auto' => array(
        'type' => 'switch',
        'value' => 'disable',
        'label' => esc_html__('Auto Start', 'soccer-acumen'),
        'desc' => esc_html__('Enable or Disable Auto Start.', 'soccer-acumen'),
        'left-choice' => array(
            'value' => 1,
            'label' => esc_html__('Enable', 'soccer-acumen'),
        ),
        'right-choice' => array(
            'value' => 0,
            'label' => esc_html__('Disable', 'soccer-acumen'),
        ),
    ),
    'logo_slides' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Logo Image', 'soccer-acumen'),
        'template' => '{{- client_title }}',
        'popup-title' => null,
        'size' => 'small', // small, medium, large
        'limit' => 0, // limit the number of popup`s that can be added
        'popup-options' => array(
            'client_title' => array(
                'label' => esc_html__('Client Name', 'soccer-acumen'),
                'type' => 'text',
                'desc' => esc_html__('Add Client Name.', 'soccer-acumen'),
            ),
            'client_sponsers' => array(
                'label' => esc_html__('Sponsers In', 'soccer-acumen'),
                'type' => 'text',
                'desc' => esc_html__('Add Sponsers in eg: sponsored in 2016', 'soccer-acumen'),
            ),
            'client_url' => array(
                'label' => esc_html__('URL', 'soccer-acumen'),
                'value' => '#',
                'type' => 'text',
                'desc' => esc_html__('Add client url.', 'soccer-acumen'),
            ),
            'client_image' => array(
                'type' => 'upload',
                'label' => esc_html__('Upload Image', 'soccer-acumen'),
                'desc' => esc_html__('Upload your image.', 'soccer-acumen'),
                'images_only' => true,
            ),
            'client_logo_target' => array(
                'type' => 'switch',
                'value' => '_self',
                'label' => esc_html__('Open in New Window', 'soccer-acumen'),
                'desc' => esc_html__('The links will be opened into new tab or window when your visitors clicked on the link.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => '_blank',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => '_self',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
        ),
    ),
);
