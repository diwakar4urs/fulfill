<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'aboutus_title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'soccer-acumen'),
    ),
    'aboutus_description' => array(
        'type' => 'wp-editor',
        'value' => 'default value',
        'attr' => array(),
        'label' => esc_html__('Label', 'soccer-acumen'),
        'desc' => esc_html__('Description', 'soccer-acumen'),
        'help' => esc_html__('Help tip', 'soccer-acumen'),
        'tinymce' => true,
        'media_buttons' => true,
        'teeny' => true,
        'wpautop' => false,
        'editor_css' => '',
        'reinit' => true,
        'size' => 'small', // small | large
        'editor_type' => 'tinymce',
        'editor_height' => 400
    ),
    'read_more' => array(
        'type' => 'text',
        'value' => 'read more',
        'label' => esc_html__('Button', 'soccer-acumen'),
    ),
    'link' => array(
        'type' => 'text',
        'value' => '#',
        'label' => esc_html__('Link', 'soccer-acumen'),
    ),
    'link_target' => array(
        'type' => 'switch',
        'value' => 'enable',
        'label' => esc_html__('Open in New Window', 'soccer-acumen'),
        'desc' => esc_html__('The links will be opened into new tab or window when your visitors clicked on the link.', 'soccer-acumen'),
        'left-choice' => array(
            'value' => '_self',
            'label' => esc_html__('Disable', 'soccer-acumen'),
        ),
        'right-choice' => array(
            'value' => '_blank',
            'label' => esc_html__('Enable', 'soccer-acumen'),
        ),
    ),
);
