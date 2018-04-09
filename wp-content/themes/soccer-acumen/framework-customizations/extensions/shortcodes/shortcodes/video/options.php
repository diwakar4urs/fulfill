<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'video_title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'soccer-acumen'),
    ),
    
     'video_link' => array(
        'type' => 'text',
         'value' => '#',
        'label' => esc_html__('video url', 'soccer-acumen'),
    ),
     'video_image' => array(
        'type' => 'upload',
         'value' => '',
        'label' => esc_html__('Upload the image', 'soccer-acumen'),
    ),
    
);
