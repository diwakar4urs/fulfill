<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'colors' => array(
        'title' => esc_html__('Theme Colors', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
            'general-box' => array(
                'title' => esc_html__('Theme Colors Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    'theme_type' => array(
                        'type' => 'select',
                        'value' => 'light',
                        'attr' => array(),
                        'label' => esc_html__('Theme Color', 'soccer-acumen'),
                        'choices' => array(
                            'default' => esc_html__('Default', 'soccer-acumen'),
                            'custom' => esc_html__('Custom Styling', 'soccer-acumen'),
                        ),
                    ),
                    'theme_color' => array(
                        'type' => 'color-picker',
                        'value' => '#1290d9',
                        'attr' => array(),
                        'label' => esc_html__('Select Theme Color', 'soccer-acumen'),
                    ),
                    'background_color' => array(
                        'type' => 'color-picker',
                        'value' => '#FFF',
                        'attr' => array(),
                        'label' => esc_html__('Body Background Color', 'soccer-acumen'),
                    ),
                )
            ),
        )
    )
);
