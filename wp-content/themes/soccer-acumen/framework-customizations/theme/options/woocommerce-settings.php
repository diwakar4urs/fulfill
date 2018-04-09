<?php
if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'woocommerce_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Woocommerce Settings', 'soccer-acumen'),
        'options' => array(
            'detail_sidebar' => array(
                'title' => esc_html__('General Settings', 'soccer-acumen'),
                'type' => 'tab',
                'options' => array(
                    'shop_per_page' => array(
                        'type' => 'slider',
                        'value' => 12,
                        'properties' => array(
                            'min' => 1,
                            'max' => 100,
                            'sep' => 1,
                        ),
                        'label' => esc_html__('Shop per page products.', 'soccer-acumen'),
                    ),
                    'enable_sidebar_detail' => array(
                        'type' => 'switch',
                        'value' => 'on',
                        'attr' => array(),
                        'label' => esc_html__('Detail Page Sidebar ON/OFF', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('OFF', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('ON', 'soccer-acumen'),
                        ),
                    ),
                    'detail_sidebar_position' => array(
                        'type' => 'select',
                        'value' => 'left',
                        'attr' => array(),
                        'label' => esc_html__('Sidebar Position', 'soccer-acumen'),
                        'desc' => esc_html__('Set sidebar position at detail page.', 'soccer-acumen'),
                        'choices' => array(
                            'left' => esc_html__('Left', 'soccer-acumen'),
                            'right' => esc_html__('Right', 'soccer-acumen'),
                        ),
                    ),
                )
            ),
            'shop_settings' => array(
                'title' => esc_html__('Shop Page Settings', 'soccer-acumen'),
                'type' => 'tab',
                'options' => array(
                    'enable_sidebar' => array(
                        'type' => 'switch',
                        'value' => 'on',
                        'attr' => array(),
                        'label' => esc_html__('Shop Page Sidebar ON/OFF', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('OFF', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('ON', 'soccer-acumen'),
                        ),
                    ),
                    'sidebar_position' => array(
                        'type' => 'select',
                        'value' => 'left',
                        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
                        'label' => esc_html__('Sidebar Position', 'soccer-acumen'),
                        'choices' => array(
                            'left' => esc_html__('Left', 'soccer-acumen'),
                            'right' => esc_html__('Right', 'soccer-acumen'),
                        ),
                    ),
					'enable_slider' => array(
                        'type' => 'switch',
                        'value' => 'on',
                        'attr' => array(),
                        'label' => esc_html__('Product Slider ON/OFF', 'soccer-acumen'),
                        'desc' => esc_html__('Add featured products in slider.', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('OFF', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('ON', 'soccer-acumen'),
                        ),
                    ),
                    'slider_popup' => array(
                        'type' => 'addable-popup',
                        'label' => esc_html__('Add Slides', 'soccer-acumen'),
                        'template' => '{{- fep_title }}',
                        'popup-title' => null,
                        'size' => 'small', // small, medium, large
                        'limit' => 0, // limit the number of popup`s that can be added
                        'add-button-text' => esc_html__('Slider', 'soccer-acumen'),
                        'sortable' => true,
                        'popup-options' => array(
                            'fep_title' => array(
                                'type' => 'text',
                                'label' => esc_html__('Title', 'soccer-acumen'),
                                'desc' => esc_html__('Enter The title', 'soccer-acumen'),
                            ),
                            'fep_image' => array(
                                'type' => 'upload',
                                'label' => esc_html__('Image', 'soccer-acumen'),
                                'desc' => esc_html__('Upload The image', 'soccer-acumen'),
                            ),
                            'feature_product' => array(
                                'type' => 'select',
                                'label' => esc_html__('Feature Products', 'soccer-acumen'),
                                'choices' => soccer_acumen_featured_product(),
                                'desc' => esc_html__('Select The Feature Product Here', 'soccer-acumen'),
                            ),
                        ),
                    ),
                )
            ),
            'archive_settings' => array(
                'title' => esc_html__('Archive Page Settings', 'soccer-acumen'),
                'type' => 'tab',
                'options' => array(
                    'archive_enable_sidebar' => array(
                        'type' => 'switch',
                        'value' => 'on',
                        'attr' => array(),
                        'label' => esc_html__('Archive Page Sidebar ON/OFF', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('OFF', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('ON', 'soccer-acumen'),
                        ),
                    ),
                    'archive_sidebar_position' => array(
                        'type' => 'select',
                        'value' => 'left',
                        'attr' => array(),
                        'label' => esc_html__('Sidebar Position', 'soccer-acumen'),
                        'choices' => array(
                            'left' => esc_html__('Left', 'soccer-acumen'),
                            'right' => esc_html__('Right', 'soccer-acumen'),
                        ),
                    ),
                )
            ),
        )
    )
);
