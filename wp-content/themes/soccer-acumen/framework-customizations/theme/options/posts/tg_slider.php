<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'settings' => array(
        'title' => 'Slider Settings',
        'type' => 'box',
        'options' => array(
            'margin_top' => array(
                'type' => 'slider',
                'value' => 0,
                'properties' => array(
                    'min' => -500,
                    'max' => 500,
                    'sep' => 1,
                ),
                'label' => esc_html__('Margin Top', 'soccer-acumen'),
            ),
            'margin_bottom' => array(
                'type' => 'slider',
                'value' => 0,
                'properties' => array(
                    'min' => -500,
                    'max' => 500,
                    'sep' => 1,
                ),
                'label' => esc_html__('Margin Bottom', 'soccer-acumen'),
            ),
            'pagination' => array(
                'type' => 'switch',
                'value' => 'enable',
                'label' => esc_html__('Enable Pagination', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Pagination.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'auto' => array(
                'type' => 'switch',
                'value' => 'enable',
                'label' => esc_html__('Auto Start', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Auto Start.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'custom_classes' => array(
                'label' => esc_html__('Classes', 'soccer-acumen'),
                'type' => 'text',
                'desc' => esc_html__('Add you custom classes.', 'soccer-acumen'),
            ),
            'slider_type' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'value' => array('gadget' => 'slider_v1'),
                'picker' => array(
                    'gadget' => array(
                        'label' => esc_html__('Slider Type', 'soccer-acumen'),
                        'type' => 'image-picker',
                        'choices' => array(
                            'slider_v1' => array(
                                'label' => __('Slider V1', 'soccer-acumen'),
                                'small' => array(
                                    'height' => 70,
                                    'src' => get_template_directory_uri() . '/images/sliders/s_1.png'
                                ),
                                'large' => array(
                                    'height' => 214,
                                    'src' => get_template_directory_uri() . '/images/sliders/s_1.png'
                                ),
                            ),
                            'slider_v2' => array(
                                'label' => __('Slider V2', 'soccer-acumen'),
                                'small' => array(
                                    'height' => 70,
                                    'src' => get_template_directory_uri() . '/images/sliders/s_2.png'
                                ),
                                'large' => array(
                                    'height' => 214,
                                    'src' => get_template_directory_uri() . '/images/sliders/s_2.png'
                                ),
                            ),
                        ),
                        'desc' => esc_html__('Select slider type.', 'soccer-acumen'),
                    )
                ),
                'choices' => array(
                    'slider_v1' => array(
                        'texture_image' => array(
                            'label' => esc_html__('Texture Image', 'soccer-acumen'),
                            'type' => 'upload',
                            'value' => '',
                            'desc' => esc_html__('Upload the background image', 'soccer-acumen')
                        ),
                        'slider_popup' => array(
                            'type' => 'addable-popup',
                            'label' => esc_html__('Add Slide', 'soccer-acumen'),
                            'template' => '{{- slider_title }}',
                            'popup-title' => null,
                            'size' => 'small', // small, medium, large
                            'limit' => 0, // limit the number of popup`s that can be added
                            'add-button-text' => esc_html__('Add', 'soccer-acumen'),
                            'sortable' => true,
                            'popup-options' => array(
                                'slider_title' => array(
                                    'label' => esc_html__('Heading', 'soccer-acumen'),
                                    'type' => 'text',
                                    'value' => '',
                                    'desc' => esc_html__('Enter the slider heading', 'soccer-acumen')
                                ),
                                'slider_subtitle' => array(
                                    'label' => esc_html__('Sub heading', 'soccer-acumen'),
                                    'type' => 'text',
                                    'value' => '',
                                    'desc' => esc_html__('Add slider sub heading', 'soccer-acumen')
                                ),
                                'float_image' => array(
                                    'label' => esc_html__('Image', 'soccer-acumen'),
                                    'type' => 'upload',
                                    'value' => '',
                                    'desc' => esc_html__('Upload the floating image', 'soccer-acumen')
                                ),
                                'buttons' => array(
                                    'type' => 'addable-box',
                                    'value' => array(
                                        array(
                                            'button_title' => 'Read More',
                                            'button_link' => '#',
                                        ),
                                    ),
                                    'attr' => array(),
                                    'label' => esc_html__('Buttons', 'soccer-acumen'),
                                    'desc' => esc_html__('Add Butons here.', 'soccer-acumen'),
                                    'box-options' => array(
                                        'button_title' => array('type' => 'text'),
                                        'button_link' => array('type' => 'text'),
                                    ),
                                    'template' => '{{- button_title }}', // box title
                                    'limit' => 0, // limit the number of boxes that can be added
                                    'add-button-text' => esc_html__('Add Button', 'soccer-acumen'),
                                    'sortable' => true,
                                ),
                            ),
                        ),
                    ),
                    'slider_v2' => array(
                        'background_image' => array(
                            'label' => esc_html__('Background Image', 'soccer-acumen'),
                            'type' => 'multi-upload',
                            'value' => '',
                            'desc' => esc_html__('Upload the background images', 'soccer-acumen')
                        ),
                        'pattern_image' => array(
                            'label' => esc_html__('Pattern Image', 'soccer-acumen'),
                            'type' => 'upload',
                            'value' => '',
                            'desc' => esc_html__('Upload the pattern images', 'soccer-acumen')
                        ),
                        'slider_fixture' => array(
                            'type' => 'addable-popup',
                            'label' => esc_html__('Add Fixture', 'soccer-acumen'),
                            'template' => 'Fixture ID : {{- fixture }}',
                            'popup-title' => null,
                            'size' => 'small', // small, medium, large
                            'limit' => 0, // limit the number of popup`s that can be added
                            'add-button-text' => esc_html__('Add Fixture', 'soccer-acumen'),
                            'sortable' => true,
                            'popup-options' => array(
                                'fixture' => array(
                                    'label' => esc_html__('Fixture', 'soccer-acumen'),
                                    'type' => 'select',
                                    'value' => '',
                                    'choices' => soccer_acumen_prepare_upcoming_fixture(),
                                    'desc' => esc_html__('Select the fixture', 'soccer-acumen')
                                ),
                                'float_image' => array(
                                    'label' => esc_html__('Image', 'soccer-acumen'),
                                    'type' => 'upload',
                                    'value' => '',
                                    'desc' => esc_html__('Upload the floating image', 'soccer-acumen')
                                ),
                                'buttons' => array(
                                    'type' => 'addable-box',
                                    'value' => array(
                                        array(
                                            'button_title' => 'Read More',
                                            'button_link' => '#',
                                        ),
                                    ),
                                    'attr' => array(),
                                    'label' => esc_html__('Buttons', 'soccer-acumen'),
                                    'desc' => esc_html__('Add Butons here.', 'soccer-acumen'),
                                    'box-options' => array(
                                        'button_title' => array('type' => 'text'),
                                        'button_link' => array('type' => 'text'),
                                    ),
                                    'template' => '{{- button_title }}', // box title
                                    'limit' => 0, // limit the number of boxes that can be added
                                    'add-button-text' => esc_html__('Add Button', 'soccer-acumen'),
                                    'sortable' => true,
                                ),
                            ),
                        ),
                    ),
                ),
                'show_borders' => true,
            ),
        )
    ),
);
