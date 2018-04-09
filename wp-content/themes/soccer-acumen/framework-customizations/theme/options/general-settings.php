<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'general' => array(
        'title' => esc_html__('General', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
            'general-box' => array(
                'title' => esc_html__('General Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    '404_image' => array(
                        'label' => esc_html__('Image', 'soccer-acumen'),
                        'desc' => esc_html__('Upload a 404 image', 'soccer-acumen'),
                        'type' => 'upload'
                    ),
                    '404_title' => array(
                        'type' => 'text',
                        'value' => 'oops! something went wrong. page not found.',
                        'label' => esc_html__('404 Title', 'soccer-acumen'),
                    ),
                    '404_message' => array(
                        'type' => 'textarea',
                        'value' => 'We are really sorry but the page you requested is missing.',
                        'label' => esc_html__('404 Error Message', 'soccer-acumen'),
                    ),
                    'custom_css' => array(
                        'type' => 'textarea',
                        'label' => esc_html__('Custom CSS', 'soccer-acumen'),
                        'desc' => esc_html__('Add your custom css code here if you want to target specifically on different elements.', 'soccer-acumen'),
                    ),
                )
            ),
        )
    )
);
