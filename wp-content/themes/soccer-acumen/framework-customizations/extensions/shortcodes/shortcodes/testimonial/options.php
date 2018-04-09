<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'testimonial_popup' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Add Testimonial', 'soccer-acumen'),
        'template' => '{{- testimonial_title }}',
        'popup-title' => null,
        'size' => 'small', // small, medium, large
        'limit' => 0, // limit the number of popup`s that can be added
        'add-button-text' => esc_html__('Testimonial', 'soccer-acumen'),
        'sortable' => true,
        'popup-options' => array(
            'testimonial_title' => array(
                'label' => esc_html__('Testimonial Title', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add testimonial title', 'soccer-acumen'),
            ),
            'testimonial_detail' => array(
                'type' => 'wp-editor',
                'attr' => array(),
                'label' => esc_html__('Description', 'soccer-acumen'),
                'desc' => esc_html__('Add testimonial description', 'soccer-acumen'),
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
            'testimonial_image' => array(
                'label' => esc_html__('Image', 'soccer-acumen'),
                'type' => 'upload',
                'desc' => esc_html__('Add testimonial image', 'soccer-acumen'),
            ),
            'social_icons' => array(
                'label' => esc_html__('Social Icons', 'soccer-acumen'),
                'type' => 'addable-popup',
                'value' => array(),
                'desc' => esc_html__('Add Social Icons as much as you want. Choose the icon, url and the title', 'soccer-acumen'),
                'popup-options' => array(
                    'social_name' => array(
                        'label' => esc_html__('Title', 'soccer-acumen'),
                        'type' => 'text',
                        'value' => 'Name',
                        'desc' => esc_html__('The Title of the Link', 'soccer-acumen')
                    ),
                    'social_icons_list' => array(
                        'type' => 'new-icon',
                        'value' => 'fa-smile-o',
                        'attr' => array(),
                        'label' => esc_html__('Choos Icon', 'soccer-acumen'),
                    ),
                    'social_url' => array(
                        'label' => esc_html__('Url', 'soccer-acumen'),
                        'type' => 'text',
                        'value' => '#',
                        'desc' => esc_html__('The link to the social profile.', 'soccer-acumen')
                    ),
                ),
                'template' => '{{- social_name }}',
            ),
        ),
    ),
);
