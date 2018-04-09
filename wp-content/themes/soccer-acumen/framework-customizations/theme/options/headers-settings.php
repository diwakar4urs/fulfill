<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'headers' => array(
        'title' => esc_html__('Headers', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
            'general-box' => array(
                'title' => esc_html__('Header Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    'main_logo' => array(
                        'type' => 'upload',
                        'label' => esc_html__('Main Logo', 'soccer-acumen'),
                        'hint' => esc_html__('It will display only  at home pages.', 'soccer-acumen'),
                        'desc' => esc_html__('Upload Your Logo Here the preferred size is 251 by 57. It will be shown at Whole site excepty at home page.', 'soccer-acumen'),
                        'images_only' => true,
                    ),
                    // Start Header Type
                    'header_type' => array(
                        'type' => 'multi-picker',
                        'label' => false,
                        'desc' => false,
                        'value' => array('gadget' => 'header_v1'),
                        'picker' => array(
                            'gadget' => array(
                                'label' => esc_html__('Header Type', 'soccer-acumen'),
                                'type' => 'image-picker',
                                'choices' => array(
                                    'default' => array(
                                        'label' => __('Header V1', 'soccer-acumen'),
                                        'small' => array(
                                            'height' => 70,
                                            'src' => get_template_directory_uri() . '/images/headers/default.jpg'
                                        ),
                                        'large' => array(
                                            'height' => 370,
                                            'src' => get_template_directory_uri() . '/images/headers/default.jpg'
                                        ),
                                    ),
                                    'header_v1' => array(
                                        'label' => __('Header V1', 'soccer-acumen'),
                                        'small' => array(
                                            'height' => 70,
                                            'src' => get_template_directory_uri() . '/images/headers/h_1.jpg'
                                        ),
                                        'large' => array(
                                            'height' => 370,
                                            'src' => get_template_directory_uri() . '/images/headers/h_1.jpg'
                                        ),
                                    ),
                                    'header_v2' => array(
                                        'label' => __('Header V2', 'soccer-acumen'),
                                        'small' => array(
                                            'height' => 70,
                                            'src' => get_template_directory_uri() . '/images/headers/h_2.jpg'
                                        ),
                                        'large' => array(
                                            'height' => 370,
                                            'src' => get_template_directory_uri() . '/images/headers/h_2.jpg'
                                        ),
                                    ),
                                ),
                                'desc' => esc_html__('Select header type.', 'soccer-acumen'),
                            )
                        ),
                        'choices' => array(
                            'header_v1' => array(
                                'top_bar' => array(
                                    'type' => 'multi-picker',
                                    'label' => false,
                                    'desc' => false,
                                    'picker' => array(
                                        'gadget' => array(
                                            'type' => 'switch',
                                            'value' => 'disable',
                                            'label' => esc_html__('Top Strip', 'soccer-acumen'),
                                            'desc' => esc_html__('Enable top strip.', 'soccer-acumen'),
                                            'right-choice' => array(
                                                'value' => 'disable',
                                                'label' => esc_html__('Disable', 'soccer-acumen'),
                                            ),
                                            'left-choice' => array(
                                                'value' => 'enable',
                                                'label' => esc_html__('Enable', 'soccer-acumen'),
                                            ),
                                        ),
                                    ),
                                    'choices' => array(
                                        'enable' => array(
                                            'registration' => array(
                                                'type' => 'switch',
                                                'value' => 'disable',
                                                'label' => esc_html__('Enable Registration', 'soccer-acumen'),
                                                'desc' => esc_html__('Enable frontend Registration', 'soccer-acumen'),
                                                'left-choice' => array(
                                                    'value' => 'enable',
                                                    'label' => esc_html__('Enable', 'soccer-acumen'),
                                                ),
                                                'right-choice' => array(
                                                    'value' => 'disable',
                                                    'label' => esc_html__('Disable', 'soccer-acumen'),
                                                ),
                                            ),
                                            'enable_login' => array(
                                                'type' => 'switch',
                                                'value' => 'disable',
                                                'label' => esc_html__('Enable Login', 'soccer-acumen'),
                                                'desc' => esc_html__('Enable frontend Login', 'soccer-acumen'),
                                                'left-choice' => array(
                                                    'value' => 'enable',
                                                    'label' => esc_html__('Enable', 'soccer-acumen'),
                                                ),
                                                'right-choice' => array(
                                                    'value' => 'disable',
                                                    'label' => esc_html__('Disable', 'soccer-acumen'),
                                                ),
                                            ),
                                            'shoping_cart' => array(
                                                'type' => 'switch',
                                                'value' => 'disable',
                                                'label' => esc_html__('Shoping Cart', 'soccer-acumen'),
                                                'desc' => esc_html__('Enable Shoping Cart', 'soccer-acumen'),
                                                'left-choice' => array(
                                                    'value' => 'enable',
                                                    'label' => esc_html__('Enable', 'soccer-acumen'),
                                                ),
                                                'right-choice' => array(
                                                    'value' => 'disable',
                                                    'label' => esc_html__('Disable', 'soccer-acumen'),
                                                ),
                                            ),
                                            'search_bar' => array(
                                                'type' => 'switch',
                                                'value' => 'disable',
                                                'label' => esc_html__('Search Bar', 'soccer-acumen'),
                                                'desc' => esc_html__('Enable Search Bar', 'soccer-acumen'),
                                                'left-choice' => array(
                                                    'value' => 'enable',
                                                    'label' => esc_html__('Enable', 'soccer-acumen'),
                                                ),
                                                'right-choice' => array(
                                                    'value' => 'disable',
                                                    'label' => esc_html__('Disable', 'soccer-acumen'),
                                                ),
                                            ),
                                            'social_icons' => array(
                                                'type' => 'switch',
                                                'value' => 'disable',
                                                'label' => esc_html__('Social Media', 'soccer-acumen'),
                                                'desc' => esc_html__('Enable Social Media', 'soccer-acumen'),
                                                'left-choice' => array(
                                                    'value' => 'enable',
                                                    'label' => esc_html__('Enable', 'soccer-acumen'),
                                                ),
                                                'right-choice' => array(
                                                    'value' => 'disable',
                                                    'label' => esc_html__('Disable', 'soccer-acumen'),
                                                ),
                                            ),
                                            'social_icon_list' => array(
                                                'label' => esc_html__('Social Icons', 'soccer-acumen'),
                                                'type' => 'addable-popup',
                                                'value' => array(),
                                                'desc' => esc_html__('Add Social Icons as much as you want. Choose the icon, url and the title', 'soccer-acumen'),
                                                'popup-options' => array(
                                                    'social_name' => array(
                                                        'label' => esc_html__('Title', 'soccer-acumen'),
                                                        'type' => 'text',
                                                        'value' => 'Name',
                                                        'desc' => esc_html__('The Title of the Link', 'soccer-acumen')
                                                    ),
                                                    'social_icons_list' => array(
                                                        'type' => 'new-icon',
                                                        'value' => 'fa-smile-o',
                                                        'attr' => array(),
                                                        'label' => esc_html__('Choos Icon', 'soccer-acumen'),
                                                    ),
                                                    'social_url' => array(
                                                        'label' => esc_html__('Url', 'soccer-acumen'),
                                                        'type' => 'text',
                                                        'value' => '#',
                                                        'desc' => esc_html__('The link to the social profile.', 'soccer-acumen')
                                                    ),
                                                ),
                                                'template' => '{{- social_name }}',
                                            ),
                                        ),
                                    ),
                                    'show_borders' => true,
                                )
                            ),
                            'header_v2' => array(
                                'social_icons' => array(
                                    'type' => 'switch',
                                    'value' => 'disable',
                                    'label' => esc_html__('Social Media', 'soccer-acumen'),
                                    'desc' => esc_html__('Enable Social Media', 'soccer-acumen'),
                                    'left-choice' => array(
                                        'value' => 'enable',
                                        'label' => esc_html__('Enable', 'soccer-acumen'),
                                    ),
                                    'right-choice' => array(
                                        'value' => 'disable',
                                        'label' => esc_html__('Disable', 'soccer-acumen'),
                                    ),
                                ),
                                'mini_cart' => array(
                                    'type' => 'switch',
                                    'value' => 'disable',
                                    'label' => esc_html__('Shoping Cart', 'soccer-acumen'),
                                    'desc' => esc_html__('Enable Shoping Cart', 'soccer-acumen'),
                                    'left-choice' => array(
                                        'value' => 'enable',
                                        'label' => esc_html__('Enable', 'soccer-acumen'),
                                    ),
                                    'right-choice' => array(
                                        'value' => 'disable',
                                        'label' => esc_html__('Disable', 'soccer-acumen'),
                                    ),
                                ),
                                'social_icon_list' => array(
                                    'label' => esc_html__('Social Icons', 'soccer-acumen'),
                                    'type' => 'addable-popup',
                                    'value' => array(),
                                    'desc' => esc_html__('Add Social Icons as much as you want. Choose the icon, url and the title', 'soccer-acumen'),
                                    'popup-options' => array(
                                        'social_name' => array(
                                            'label' => esc_html__('Title', 'soccer-acumen'),
                                            'type' => 'text',
                                            'value' => 'Name',
                                            'desc' => esc_html__('The Title of the Link', 'soccer-acumen')
                                        ),
                                        'social_icons_list' => array(
                                            'type' => 'new-icon',
                                            'value' => 'fa-smile-o',
                                            'attr' => array(),
                                            'label' => esc_html__('Choos Icon', 'soccer-acumen'),
                                        ),
                                        'social_color' => array(
                                            'label' => esc_html__('Background Color', 'soccer-acumen'),
                                            'type' => 'color-picker',
                                            'value' => '#ffcc33',
                                            'desc' => esc_html__('Select background color for social icon.', 'soccer-acumen')
                                        ),
                                        'social_url' => array(
                                            'label' => esc_html__('Url', 'soccer-acumen'),
                                            'type' => 'text',
                                            'value' => '#',
                                            'desc' => esc_html__('The link to the social profile.', 'soccer-acumen')
                                        ),
                                    ),
                                    'template' => '{{- social_name }}',
                                ),
                            ),
                        ),
                        'show_borders' => true,
                    ),
                ),
            )
        )
    )
);
