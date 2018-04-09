<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'social_icons' => array(
        'title' => esc_html__('Social Media', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
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
            'social_icon_target' => array(
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
        ),
    ),
);
