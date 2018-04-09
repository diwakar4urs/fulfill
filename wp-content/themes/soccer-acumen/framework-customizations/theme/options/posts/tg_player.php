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
    'settings' => array(
        'title' => 'Player Settings',
        'type' => 'box',
        'options' => array(
            'nick_name' => array(
                'label' => esc_html__('Nick Name', 'soccer-acumen'),
                'type' => 'text',
                'value' => 'nick name',
                'desc' => esc_html__('Add the player nick name', 'soccer-acumen')
            ),
            'team' => array(
                'label' => esc_html__('Team', 'soccer-acumen'),
                'type' => 'select',
                'choices' => soccer_acumen_prepare_league(),
                'desc' => esc_html__('Select team here.', 'soccer-acumen')
            ),
            'player_birth' => array(
                'label' => esc_html__('Date of birth', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Select date of birth', 'soccer-acumen')
            ),
            'age' => array(
                'label' => esc_html__('Age', 'soccer-acumen'),
                'type' => 'text',
                'value' => 'Age',
                'desc' => esc_html__('Add the age eg:18', 'soccer-acumen')
            ),
            'birth_place' => array(
                'label' => esc_html__('Birth Place', 'soccer-acumen'),
                'type' => 'textarea',
                'value' => 'Birth Place',
                'desc' => esc_html__('Add the birth place', 'soccer-acumen')
            ),
            'height' => array(
                'label' => esc_html__('Height', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add the height eg: 186 cm (1m 86cm)', 'soccer-acumen')
            ),
            'weight' => array(
                'label' => esc_html__('Weight', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add the weight, eg: 84 kg - 168 lbs', 'soccer-acumen')
            ),
            'position' => array(
                'label' => esc_html__('Player Position', 'soccer-acumen'),
                'type' => 'text',
                'value' => 'Position ',
                'desc' => esc_html__('Add the player position name eg: Left/right winger, striker/forward', 'soccer-acumen')
            ),
            'rating' => array(
                'label' => esc_html__('Rating', 'soccer-acumen'),
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__('1 Star', 'soccer-acumen'),
                    '2' => esc_html__('2 Star', 'soccer-acumen'),
                    '3' => esc_html__('3 Star', 'soccer-acumen'),
                    '4' => esc_html__('4 Star', 'soccer-acumen'),
                    '5' => esc_html__('5 Star', 'soccer-acumen'),
                ),
            ),
            'first_club' => array(
                'label' => esc_html__('First Club', 'soccer-acumen'),
                'type' => 'text',
                'value' => 'First Club',
                'desc' => esc_html__('Add the firest professional club', 'soccer-acumen')
            ),
            'enable_social_network' => array(
                'type' => 'switch',
                'value' => 'disable',
                'label' => esc_html__('Enable Social Network', 'soccer-acumen'),
                'desc' => esc_html__('Enable Or Disable The Social Network', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
            ),
            'player_social_icons' => array(
                'label' => esc_html__('Social Icons', 'soccer-acumen'),
                'type' => 'addable-popup',
                'value' => array(),
                'desc' => esc_html__('Add Social Icons as much as you want. Choose the icon, url and the title', 'soccer-acumen'),
                'popup-options' => array(
                    'player_social_name' => array(
                        'label' => esc_html__('Title', 'soccer-acumen'),
                        'type' => 'text',
                        'value' => 'Name',
                        'desc' => esc_html__('The Title of the Link', 'soccer-acumen')
                    ),
                    'active_class' => array(
                        'label' => esc_html__('Active', 'soccer-acumen'),
                        'type' => 'text',
                        'value' => 'active',
                        'desc' => esc_html__('add class for highlight the specific social icon', 'soccer-acumen')
                    ),
                    'player_icons_list' => array(
                        'type' => 'new-icon',
                        'value' => 'fa-smile-o',
                        'attr' => array(),
                        'label' => esc_html__('Choos Icon', 'soccer-acumen'),
                    ),
                    'player_social_url' => array(
                        'label' => esc_html__('Url', 'soccer-acumen'),
                        'type' => 'text',
                        'value' => '#',
                        'desc' => esc_html__('The link to the social profile.', 'soccer-acumen')
                    ),
                ),
                'template' => '{{- player_social_name }}',
            ),
            'extra_field' => array(
                'type' => 'addable-box',
                'value' => array(
                    array(
                        'title' => 'Field Title',
                        'details' => 'Field Details',
                    ),
                ),
                'attr' => array(),
                'label' => esc_html__('Extra Fields', 'soccer-acumen'),
                'desc' => esc_html__('Add player extra fields', 'soccer-acumen'),
                'box-options' => array(
                    'title' => array('type' => 'text'),
                    'details' => array('type' => 'textarea'),
                ),
                'template' => '{{- title }}', // box title
                'limit' => 0, // limit the number of boxes that can be added
                'add-button-text' => esc_html__('Add Extra Fields', 'soccer-acumen'),
                'sortable' => true,
            ),
        ),
    ),
    'Map_settings' => array(
        'title' => 'Player Map Settings',
        'type' => 'box',
        'options' => array(
            'map_height' => array(
                'type' => 'text',
                'value' => '400',
                'label' => esc_html__('Map height', 'soccer-acumen'),
                'desc' => esc_html__('Add height in PX as : 200, Default is 300', 'soccer-acumen'),
            ),
            'latitude' => array(
                'type' => 'text',
                'value' => '-0.127758',
                'label' => esc_html__('Latitude', 'soccer-acumen'),
                'desc' => esc_html__('Add Latitude', 'soccer-acumen'),
            ),
            'longitude' => array(
                'type' => 'text',
                'value' => '51.507351',
                'label' => esc_html__('Longitude', 'soccer-acumen'),
                'desc' => esc_html__('Add Longitude', 'soccer-acumen'),
            ),
            'map_zoom' => array(
                'type' => 'slider',
                'value' => 16,
                'properties' => array(
                    'min' => 0,
                    'max' => 20,
                    'sep' => 1,
                ),
                'attr' => array(),
                'label' => esc_html__('Zoom Level', 'soccer-acumen'),
            ),
            'map_type' => array(
                'type' => 'select',
                'choices' => array(
                    'ROADMAP' => esc_html__('ROADMAP', 'soccer-acumen'),
                    'HYBRID' => esc_html__('HYBRID', 'soccer-acumen'),
                    'SATELLITE' => esc_html__('SATELLITE', 'soccer-acumen'),
                    'TERRAIN' => esc_html__('TERRAIN', 'soccer-acumen'),
                ),
                'label' => esc_html__('Map Type', 'soccer-acumen'),
                'desc' => esc_html__('Select map type.', 'soccer-acumen'),
            ),
            'map_styles' => array(
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__('NONE', 'soccer-acumen'),
                    'view_1' => esc_html__('Default', 'soccer-acumen'),
                    'view_2' => esc_html__('View 2', 'soccer-acumen'),
                    'view_3' => esc_html__('View 3', 'soccer-acumen'),
                    'view_4' => esc_html__('View 4', 'soccer-acumen'),
                    'view_5' => esc_html__('View 5', 'soccer-acumen'),
                    'view_6' => esc_html__('View 6', 'soccer-acumen'),
                ),
                'label' => esc_html__('Map Style', 'soccer-acumen'),
                'desc' => esc_html__('Select map style. It will override map type.', 'soccer-acumen'),
            ),
            'map_info' => array(
                'type' => 'textarea',
                'value' => '',
                'label' => esc_html__('Map Infobox content', 'soccer-acumen'),
                'desc' => esc_html__('Enter the marker content', 'soccer-acumen'),
            ),
            'info_box_width' => array(
                'type' => 'text',
                'value' => '250',
                'label' => esc_html__('Map Infobox width', 'soccer-acumen'),
                'desc' => esc_html__('Set max width for the google map info box', 'soccer-acumen'),
            ),
            'info_box_height' => array(
                'type' => 'text',
                'value' => '150',
                'label' => esc_html__('Map Infobox height', 'soccer-acumen'),
                'desc' => esc_html__('Set max height for the google map info box', 'soccer-acumen'),
            ),
            'marker' => array(
                'type' => 'upload',
                'attr' => array(),
                'label' => esc_html__('Marker', 'soccer-acumen'),
                'desc' => esc_html__('Add Map Marker', 'soccer-acumen'),
            ),
            'map_controls' => array(
                'type' => 'select',
                'choices' => array(
                    'true' => esc_html__('OFF', 'soccer-acumen'),
                    'false' => esc_html__('ON', 'soccer-acumen'),
                ),
                'label' => esc_html__('Map Controls', 'soccer-acumen'),
                'desc' => esc_html__('Select map controls.', 'soccer-acumen'),
            ),
            'map_dragable' => array(
                'type' => 'select',
                'choices' => array(
                    'true' => esc_html__('Yes', 'soccer-acumen'),
                    'false' => esc_html__('NO', 'soccer-acumen'),
                ),
                'label' => esc_html__('Map Dragable', 'soccer-acumen'),
                'desc' => esc_html__('Select map dragable?', 'soccer-acumen'),
            ),
            'scroll' => array(
                'type' => 'select',
                'choices' => array(
                    'false' => 'No',
                    'true' => 'Yes',
                ),
                'label' => esc_html__('Scroll', 'soccer-acumen'),
                'desc' => esc_html__('Enable/Disbale Mouse over scroll.', 'soccer-acumen'),
            ),
        ),
    ),
);

