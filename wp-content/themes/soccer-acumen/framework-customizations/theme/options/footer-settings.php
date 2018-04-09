<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'footer' => array(
        'title' => esc_html__('Footer', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
            'footer_settings' => array(
                'title' => esc_html__('Footer Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    'enable_widget_area' => array(
                        'type' => 'switch',
                        'value' => 'off',
                        'attr' => array(),
                        'label' => esc_html__('ON / OFF Widget Area', 'soccer-acumen'),
                        'desc' => esc_html__('Enable or Disable footer widget area', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('Off', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('ON', 'soccer-acumen'),
                        ),
                    ),
                    'footer_bg' => array(
                        'type' => 'upload',
                        'value' => '',
                        'label' => esc_html__('Background Image', 'soccer-acumen'),
                        'desc' => esc_html__('Image for footer right side background', 'soccer-acumen'),
                    ),
                    'texture_background' => array(
                        'type' => 'upload',
                        'value' => '',
                        'label' => esc_html__('Texture Background Image', 'soccer-acumen'),
                        'desc' => esc_html__('Image for footer left side background', 'soccer-acumen'),
                    ),
                    'footer_copyright' => array(
                        'type' => 'text',
                        'value' => '2015 | All Rights Reserved',
                        'label' => esc_html__('Footer Copyright', 'soccer-acumen'),
                    ),
                    'enable_menu' => array(
                        'type' => 'switch',
                        'value' => 'off',
                        'attr' => array(),
                        'label' => esc_html__('On / Off Menu', 'soccer-acumen'),
                        'desc' => esc_html__('On / Off footer menu', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('OFf', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('ON', 'soccer-acumen'),
                        ),
                    ),
                )
            ),
        )
    )
);
