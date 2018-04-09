<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'subheaders' => array(
        'title' => esc_html__('Sub Headers', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
            'general-box' => array(
                'title' => esc_html__('Sub Header Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    '404_heading' => array(
                        'type' => 'text',
                        'value' => '404 ERROR',
                        'label' => esc_html__('404 Page Title', 'soccer-acumen'),
                    ),
                    'archives_heading' => array(
                        'type' => 'text',
                        'value' => 'Archives',
                        'label' => esc_html__('Archives Sub Heading', 'soccer-acumen'),
                    ),
                    'search_heading' => array(
                        'type' => 'text',
                        'value' => 'Search',
                        'label' => esc_html__('Search Sub Heading', 'soccer-acumen'),
                    ),
                    'enable_breadcrumbs' => array(
                        'type' => 'switch',
                        'value' => 'enable',
                        'label' => esc_html__('Breadcrumbs', 'soccer-acumen'),
                        'desc' => esc_html__('Enable or Disable Breadcrumbs.', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_html__('Enable', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_html__('Disable', 'soccer-acumen'),
                        ),
                    ),
                    'sub_header_bg' => array(
                        'type' => 'rgba-color-picker',
                        'value' => '#373542',
                        'label' => esc_html__('Sub Header bg color', 'soccer-acumen'),
                    ),
                    'subheader_bg_image' => array(
                        'type' => 'upload',
                        'value' => '',
                        'label' => esc_html__('Upload background image', 'soccer-acumen'),
                        'desc' => esc_html__('It will override background color', 'soccer-acumen'),
                        'images_only' => true,
                    ),
                )
            ),
        )
    )
);
