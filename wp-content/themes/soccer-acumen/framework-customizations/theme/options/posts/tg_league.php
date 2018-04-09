<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'subheader' => array(
        'title' => esc_html__('Sub Header Settings', 'soccer-acumen'),
        'type' => 'box',
        'options' => array(
            'enable_subheader' => array(
                'type' => 'switch',
                'value' => 'enable',
                'label' => esc_html__('Subheader', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Subheader', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'subheader_type' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'picker' => array(
                    'gadget' => array(
                        'label' => esc_html__('Subheader Type', 'soccer-acumen'),
                        'desc' => esc_html__('Select Subheader Type', 'soccer-acumen'),
                        'type' => 'select',
                        'choices' => array(
                            'default' => esc_html__('Default Sub Headers', 'soccer-acumen'),
                            'custom' => esc_html__('Custom Sub Headers', 'soccer-acumen'),
                            'tg_slider' => esc_html__('TG Slider', 'soccer-acumen'),
                            'rev_slider' => esc_html__('Revolution Slider', 'soccer-acumen'),
                            'custom_shortcode' => esc_html__('Custom Shortcode', 'soccer-acumen'),
                        )
                    )
                ),
                'choices' => array(
                    'default' => array(
                        'blog_post_image' => array(
                            'type' => 'html',
                            'html' => 'Default Subheaders',
                            'desc' => esc_html__('Please set default settings from theme options.', 'soccer-acumen'),
                            'help' => esc_html__('Please Go To Appearance >> Theme Settings >> Subheaders', 'soccer-acumen'),
                            'images_only' => true,
                        ),
                    ),
                    'custom' => array(
                        'enable_breadcrumbs' => array(
                            'type' => 'switch',
                            'value' => 'enable',
                            'label' => esc_html__('Breadcrumbs', 'soccer-acumen'),
                            'desc' => esc_html__('Enable or Disable Breadcrumbs.', 'soccer-acumen'),
                            'left-choice' => array(
                                'value' => 'enable',
                                'label' => esc_html__('Enable', 'soccer-acumen'),
                            ),
                            'right-choice' => array(
                                'value' => 'disable',
                                'label' => esc_html__('Disable', 'soccer-acumen'),
                            ),
                        ),
                        'sub_header_bg' => array(
                            'type' => 'rgba-color-picker',
                            'value' => 'rgba(255,255,255,0)',
                            'label' => esc_html__('Sub Header bg color', 'soccer-acumen'),
                        ),
                        'subheader_bg_image' => array(
                            'type' => 'upload',
                            'label' => esc_html__('Upload background image', 'soccer-acumen'),
                            'desc' => esc_html__('It will override background color', 'soccer-acumen'),
                            'images_only' => true,
                        ),
                        'sub_heading_text' => array(
                            'type' => 'color-picker',
                            'value' => '#FFF',
                            'label' => esc_html__('Sub Heading Text color', 'soccer-acumen'),
                        ),
                    ),
                    'tg_slider' => array(
                        'sub_shortcode' => array(
                            'type' => 'select',
                            'value' => '',
                            'label' => esc_html__('TG Slider', 'soccer-acumen'),
                            'desc' => esc_html__('Select Themographic Slider.', 'soccer-acumen'),
                            'choices' => soccer_acumen_prepare_sliders(),
                        ),
                    ),
                    'rev_slider' => array(
                        'rev_slider' => array(
                            'type' => 'select',
                            'value' => '',
                            'label' => esc_html__('Revolution Slider', 'soccer-acumen'),
                            'desc' => esc_html__('Please Select Revolution slider.', 'soccer-acumen'),
                            'help' => esc_html__('Please install revolution slider first.', 'soccer-acumen'),
                            'choices' => soccer_acumen_prepare_rev_slider(),
                        ),
                    ),
                    'custom_shortcode' => array(
                        'custom_shortcode' => array(
                            'type' => 'textarea',
                            'value' => '',
                            'label' => esc_html__('Custom Slider', 'soccer-acumen'),
                        ),
                    ),
                )
            ),
        )
    ),
    'settings' => array(
        'title' => 'League Settings',
        'type' => 'box',
        'options' => array(
            'flag' => array(
                'label' => esc_html__('Flage Image', 'soccer-acumen'),
                'type' => 'upload',
                'value' => '',
                'desc' => esc_html__('Upload The Flag Image', 'soccer-acumen')
            ),
        ),
    ),
    'home' => array(
        'title' => esc_html__('Home', 'soccer-acumen'),
        'type' => 'box',
        'options' => array(
            'wins' => array(
                'label' => esc_html__('Wins', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of matches wins, eg: 5', 'soccer-acumen')
            ),
            'draw' => array(
                'label' => esc_html__('Draws', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of matches draws, eg: 5', 'soccer-acumen')
            ),
            'loses' => array(
                'label' => esc_html__('Loses', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of matches loses, eg: 5', 'soccer-acumen')
            ),
            'goal_scored' => array(
                'label' => esc_html__('Goal Scored', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of goal scored, eg: 5', 'soccer-acumen')
            ),
            'goal_conceded' => array(
                'label' => esc_html__('Goal Conceded', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of goal conceded, eg: 5', 'soccer-acumen')
            ),
        )
    ),
    'away' => array(
        'title' => esc_html__('Away', 'soccer-acumen'),
        'type' => 'box',
        'options' => array(
            'awy_wins' => array(
                'label' => esc_html__('Wins', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of matches wins, eg: 5', 'soccer-acumen')
            ),
            'awy_draw' => array(
                'label' => esc_html__('Draws', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of matches draws, eg: 5', 'soccer-acumen')
            ),
            'awy_loses' => array(
                'label' => esc_html__('Loses', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of matches loses, eg: 5', 'soccer-acumen')
            ),
            'awy_goal_scored' => array(
                'label' => esc_html__('Goal Scored', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of goal scored, eg: 5', 'soccer-acumen')
            ),
            'awy_goal_conceded' => array(
                'label' => esc_html__('Goal Conceded', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add number of goal conceded, eg: 5', 'soccer-acumen')
            ),
        ),
    ),
);

