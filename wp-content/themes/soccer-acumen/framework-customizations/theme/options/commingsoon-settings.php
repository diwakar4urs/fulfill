<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'commingsoon_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Coming Soon', 'soccer-acumen'),
        'options' => array(
            'commingsoon-box' => array(
                'title' => esc_html__('Coming Soon Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    'maintenance' => array(
                        'type' => 'switch',
                        'value' => 'disable',
                        'label' => esc_html__('Maintenance Mode', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_html__('Enable', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_html__('Disable', 'soccer-acumen'),
                        ),
                    ),
                    'comming_title' => array(
                        'type' => 'text',
                        'label' => esc_html__('Title', 'soccer-acumen'),
                        'value' => 'Coming Soon!',
                    ),
                    'comming_description' => array(
                        'type' => 'textarea',
                        'label' => esc_html__('Description', 'soccer-acumen'),
                        'value' => 'Stay tuned, we are launching very soon...',
                    ),
                    'background' => array(
                        'type' => 'upload',
                        'label' => esc_html__('Background Image', 'soccer-acumen'),
                        'desc' => esc_html__('Upload Your background image on coming soon page.', 'soccer-acumen'),
                        'images_only' => true,
                    ),
                    'date' => array(
                        'type' => 'date-picker',
                        'label' => esc_html__('Choose Date', 'soccer-acumen'),
                        'monday-first' => true, // The week will begin with Monday; for Sunday, set to false
                        'min-date' => date('m,d,Y'), // By default minimum date will be current day. Set a date in format d-m-Y as a start date
                        'max-date' => null, // By default there is not maximum date. Set a date in format d-m-Y as a start date
                    ),
                    'enable_newsletter' => array(
                        'type' => 'switch',
                        'value' => 'enable',
                        'label' => esc_html__('Enable Newsletter', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_html__('Enable', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_html__('Disable', 'soccer-acumen'),
                        ),
                    ),
                )
            ),
        )
    )
);
