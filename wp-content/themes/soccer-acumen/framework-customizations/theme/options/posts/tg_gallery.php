<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'date-event' => array(
        'type' => 'text',
        'label' => esc_html__('Date', 'soccer-acumen'),
    ),
    'gallery_settings' => array(
        'title' => esc_html__('Post Settings', 'soccer-acumen'),
        'type' => 'box',
        'options' => array(
            'gallery_settings' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'picker' => array(
                    'gadget' => array(
                        'label' => esc_html__('Post Format', 'soccer-acumen'),
                        'desc' => esc_html__('Select Post Format', 'soccer-acumen'),
                        'type' => 'radio',
                        'value' => 'image',
                        'choices' => array(
                            'image' => esc_html__('Image', 'soccer-acumen'),
                            'video' => esc_html__('Audio/Video', 'soccer-acumen'),
                        ),
                        'inline' => true,
                    )
                ),
                'choices' => array(
                    'image' => array(
                        'gallery_gallery_image' => array(
                            'type' => 'html',
                            'html' => 'Featured Image',
                            'desc' => esc_html__('Please add featured image.', 'soccer-acumen'),
                            'help' => esc_html__('Add Featured image for this gallery.', 'soccer-acumen'),
                            'images_only' => true,
                        ),
                    ),
                    'video' => array(
                        'gallery_video_link' => array(
                            'type' => 'text',
                            'value' => '#',
                            'label' => esc_html__('Audio/Video Link', 'soccer-acumen'),
                            'desc' => esc_html__('Only worked if the gallery format setting is equal to Audio/Video.', 'soccer-acumen'),
                        ),
                    ),
                )
            ),
        )
    ),
);

