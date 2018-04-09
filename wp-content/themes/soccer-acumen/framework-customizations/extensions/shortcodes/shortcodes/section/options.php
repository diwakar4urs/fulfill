<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'general_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Genral Settings', 'soccer-acumen'),
        'options' => array(
            'section_heading' => array(
                'label' => esc_html__('Section Heading', 'soccer-acumen'),
                'desc' => esc_html__('Enter Your Section Heading Here', 'soccer-acumen'),
                'type' => 'text',
            ),
            'is_fullwidth' => array(
                'type' => 'select',
                'value' => 'default',
                'attr' => array(),
                'label' => esc_html__('Section Settings', 'soccer-acumen'),
                'desc' => esc_html__('Select Section Settings', 'soccer-acumen'),
                'choices' => array(
                    'default' => esc_html__('Default', 'soccer-acumen'),
                    'stretch_section' => esc_html__('Stretch Section', 'soccer-acumen'),
                    'stretch_section_contents' => esc_html__('Stretch Section With Contents', 'soccer-acumen'),
                    'stretch_section_contents_corner' => esc_html__('Stretch Section With Contents(No Padding)', 'soccer-acumen'),
                ),
            ),
            'background_color' => array(
                'label' => esc_html__('Background Color', 'soccer-acumen'),
                'desc' => esc_html__('Please select the background color', 'soccer-acumen'),
                'type' => 'color-picker',
            ),
            'background_image' => array(
                'label' => esc_html__('Background Image', 'soccer-acumen'),
                'desc' => esc_html__('Please select the background image', 'soccer-acumen'),
                'type' => 'background-image',
                'choices' => array(//	in future may will set predefined images
                )
            ),
            'background_repeat' => array(
                'type' => 'select',
                'value' => 'no-repeat',
                'attr' => array(),
                'label' => esc_html__('Background Repeat', 'soccer-acumen'),
                'desc' => esc_html__('Repeat Background', 'soccer-acumen'),
                'choices' => array(
                    'no-repeat' => esc_html__('No Repeat', 'soccer-acumen'),
                    'repeat' => esc_html__('Repeat', 'soccer-acumen'),
                    'repeat-x' => esc_html__('Repeat X', 'soccer-acumen'),
                    'repeat-y' => esc_html__('Repeat Y', 'soccer-acumen'),
                ),
            ),
            'positioning_x' => array(
                'type' => 'slider',
                'value' => 0,
                'properties' => array(
                    'min' => -100,
                    'max' => 100,
                    'sep' => 1,
                ),
                'desc' => esc_html__('Background position Horizontally', 'soccer-acumen'),
                'label' => esc_html__('Position X, IN ( % )', 'soccer-acumen'),
            ),
            'positioning_y' => array(
                'type' => 'slider',
                'value' => 100,
                'properties' => array(
                    'min' => -100,
                    'max' => 100,
                    'sep' => 1,
                ),
                'desc' => esc_html__('Background position Vertically', 'soccer-acumen'),
                'label' => esc_html__('Position Y, IN ( % )', 'soccer-acumen'),
            ),
            'video' => array(
                'label' => esc_html__('Background Video', 'soccer-acumen'),
                'desc' => esc_html__('Insert Video URL to embed this video', 'soccer-acumen'),
                'type' => 'text',
            ),
            'custom_id' => array(
                'label' => esc_html__('Custom ID', 'soccer-acumen'),
                'desc' => esc_html__('Add Custom ID', 'soccer-acumen'),
                'type' => 'text',
            ),
            'custom_classes' => array(
                'label' => esc_html__('Custom Classes', 'soccer-acumen'),
                'desc' => esc_html__('Add Custom Classes', 'soccer-acumen'),
                'type' => 'text',
            )
        )
    ),
    'margin_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Margin', 'soccer-acumen'),
        'options' => array(
            'margin_top' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Margin Top', 'soccer-acumen'),
                'desc' => esc_html__('add margin, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
            'margin_bottom' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Margin Bottom', 'soccer-acumen'),
                'desc' => esc_html__('add margin, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
            'margin_left' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Margin Left', 'soccer-acumen'),
                'desc' => esc_html__('add margin, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
            'margin_right' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Margin Right', 'soccer-acumen'),
                'desc' => esc_html__('add margin, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
        )
    ),
    'padding_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Padding', 'soccer-acumen'),
        'options' => array(
            'padding_top' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Padding Top', 'soccer-acumen'),
                'desc' => esc_html__('add padding, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
            'padding_bottom' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Padding Bottom', 'soccer-acumen'),
                'desc' => esc_html__('add padding, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
            'padding_left' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Padding Left', 'soccer-acumen'),
                'desc' => esc_html__('add padding, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
            'padding_right' => array(
                'type' => 'text',
                'value' => '',
                'label' => esc_html__('Padding Right', 'soccer-acumen'),
                'desc' => esc_html__('add padding, Leave it empty to hide, Note: add only integer value as : 10', 'soccer-acumen'),
            ),
        )
    ),
    'parallax_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Parallax', 'soccer-acumen'),
        'options' => array(
            'parallax' => array(
                'label' => esc_html__('Parallax', 'soccer-acumen'),
                'desc' => esc_html__('Use background image as parallax.', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'off',
                'left-choice' => array(
                    'value' => 'on',
                    'label' => esc_html__('ON', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'off',
                    'label' => esc_html__('OFF', 'soccer-acumen'),
                ),
            ),
            'parallax_bleed' => array(
                'type' => 'slider',
                'value' => 0,
                'properties' => array(
                    'min' => 0,
                    'max' => 100,
                    'sep' => 1,
                ),
                'label' => esc_html__('Parallax Data Bleed', 'soccer-acumen'),
            ),
            'parallax_speed' => array(
                'type' => 'select',
                'value' => 'no-repeat',
                'attr' => array(),
                'label' => esc_html__('Parallax Speed', 'soccer-acumen'),
                'desc' => esc_html__('Choose Your Parallax Speed', 'soccer-acumen'),
                'choices' => array(
                    '0' => esc_html__('0', 'soccer-acumen'),
                    '0.1' => esc_html__('0.1', 'soccer-acumen'),
                    '0.2' => esc_html__('0.2', 'soccer-acumen'),
                    '0.3' => esc_html__('0.3', 'soccer-acumen'),
                    '0.4' => esc_html__('0.4', 'soccer-acumen'),
                    '0.5' => esc_html__('0.5', 'soccer-acumen'),
                    '0.6' => esc_html__('0.6', 'soccer-acumen'),
                    '0.7' => esc_html__('0.7', 'soccer-acumen'),
                    '0.8' => esc_html__('0.8', 'soccer-acumen'),
                    '0.9' => esc_html__('0.9', 'soccer-acumen'),
                    '1.0' => esc_html__('1.0', 'soccer-acumen'),
                ),
            ),
        )
    ),
    'sidebars' => array(
        'type' => 'tab',
        'title' => esc_html__('Sidebar', 'soccer-acumen'),
        'options' => array(
            'sidebar' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'value' => array('gadget' => 'full'),
                'picker' => array(
                    'gadget' => array(
                        'label' => esc_html__('Section Sidebar', 'soccer-acumen'),
                        'type' => 'image-picker',
                        'choices' => array(
                            'full' => get_template_directory_uri() . '/images/sidebars/full.png',
                            'left' => get_template_directory_uri() . '/images/sidebars/left.png',
                            'right' => get_template_directory_uri() . '/images/sidebars/right.png',
                        )
                    )
                ),
                'choices' => array(
                    'full' => array(),
                    'left' => array(
                        'left_sidebar' => array(
                            'type' => 'select',
                            'value' => '',
                            'attr' => array(),
                            'label' => esc_html__('Select Sidebar', 'soccer-acumen'),
                            'desc' => esc_html__('Select Left Sidebar', 'soccer-acumen'),
                            'choices' => soccer_acumen_get_registered_sidebars(),
                        ),
                    ),
                    'right' => array(
                        'right_sidebar' => array(
                            'type' => 'select',
                            'value' => '',
                            'attr' => array(),
                            'label' => esc_html__('Select Sidebar', 'soccer-acumen'),
                            'desc' => esc_html__('Select Right Sidebar', 'soccer-acumen'),
                            'choices' => soccer_acumen_get_registered_sidebars(),
                        ),
                    ),
                )
            )
        )
    ),
);
