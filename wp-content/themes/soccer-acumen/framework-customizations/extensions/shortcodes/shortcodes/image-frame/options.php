<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'image_frame' => array(
        'type' => 'switch',
        'value' => 'on',
        'attr' => array(),
        'label' => esc_html__('Image Frame', 'soccer-acumen'),
        'left-choice' => array(
            'value' => 'off',
            'label' => esc_html__('Off', 'soccer-acumen'),
        ),
        'right-choice' => array(
            'value' => 'on',
            'label' => esc_html__('ON', 'soccer-acumen'),
        ),
    ),
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Choose Image', 'soccer-acumen'),
        'desc' => esc_html__('Either upload a new, or choose an existing image from your media library', 'soccer-acumen')
    ),
    'size' => array(
        'type' => 'group',
        'options' => array(
            'width' => array(
                'type' => 'text',
                'label' => esc_html__('Width', 'soccer-acumen'),
                'desc' => esc_html__('Set image width', 'soccer-acumen'),
                'value' => 300
            ),
            'height' => array(
                'type' => 'text',
                'label' => esc_html__('Height', 'soccer-acumen'),
                'desc' => esc_html__('Set image height', 'soccer-acumen'),
                'value' => 200
            )
        )
    ),
    'image-link-group' => array(
        'type' => 'group',
        'options' => array(
            'link' => array(
                'type' => 'text',
                'label' => esc_html__('Image Link', 'soccer-acumen'),
                'desc' => esc_html__('Where should your image link to?', 'soccer-acumen')
            ),
            'target' => array(
                'type' => 'switch',
                'label' => esc_html__('Open Link in New Window', 'soccer-acumen'),
                'desc' => esc_html__('Select here if you want to open the linked page in a new window', 'soccer-acumen'),
                'right-choice' => array(
                    'value' => '_blank',
                    'label' => esc_html__('Yes', 'soccer-acumen'),
                ),
                'left-choice' => array(
                    'value' => '_self',
                    'label' => esc_html__('No', 'soccer-acumen'),
                ),
            ),
        )
    )
);
