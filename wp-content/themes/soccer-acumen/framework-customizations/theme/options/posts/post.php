<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'sub_headers' => array(
        'title' => esc_html__('Page Settings', 'soccer-acumen'),
        'type' => 'box',
        'options' => array(
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
                            'desc' => esc_html__('Please default settings from theme options.', 'soccer-acumen'),
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
    'post_settings' => array(
        'title' => esc_html__('Post Settings', 'soccer-acumen'),
        'type' => 'box',
        'options' => array(
            'enable_auhtor_info' => array(
                'type' => 'switch',
                'value' => 'disable',
                'label' => esc_html__('Author Information', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Author Information at post detail page.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'enable_comments' => array(
                'type' => 'switch',
                'value' => 'disable',
                'label' => esc_html__('Comments', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Comments at post detail page.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'enable_category' => array(
                'type' => 'switch',
                'value' => 'disable',
                'label' => esc_html__('Category', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Category at post detail page.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'enable_tags' => array(
                'type' => 'switch',
                'value' => 'disable',
                'label' => esc_html__('Tags', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Tags at post detail page.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'enable_share' => array(
                'type' => 'switch',
                'value' => 'disable',
                'label' => esc_html__('Social Share', 'soccer-acumen'),
                'desc' => esc_html__('Enable or Disable Social Share at post detail page.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'post_settings' => array(
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
                            'gallery' => esc_html__('Image Slider', 'soccer-acumen'),
                            'video' => esc_html__('Audio/Video', 'soccer-acumen'),
                        ),
                        'inline' => true,
                    )
                ),
                'choices' => array(
                    'image' => array(
                        'blog_post_image' => array(
                            'type' => 'html',
                            'html' => 'Featured Image',
                            'desc' => esc_html__('Please add featured image.', 'soccer-acumen'),
                            'help' => esc_html__('Add Featured image for this post.', 'soccer-acumen'),
                            'images_only' => true,
                        ),
                    ),
                    'gallery' => array(
                        'blog_post_gallery' => array(
                            'type' => 'multi-upload',
                            'label' => esc_html__('Add Image Slider', 'soccer-acumen'),
                            'desc' => esc_html__('Add Image Slider for your post. (Preferred Size is 1314 by 737.)', 'soccer-acumen'),
                            'help' => esc_html__('Only worked if the post format setting is equal to image slider.', 'soccer-acumen'),
                            'images_only' => true,
                        ),
                    ),
                    'video' => array(
                        'blog_video_link' => array(
                            'type' => 'text',
                            'value' => 'Add link here',
                            'label' => esc_html__('Audio/Video Link', 'soccer-acumen'),
                            'desc' => esc_html__('Only worked if the post format setting is equal to Audio/Video.', 'soccer-acumen'),
                        ),
                    ),
                )
            ),
        )
    ),
);
