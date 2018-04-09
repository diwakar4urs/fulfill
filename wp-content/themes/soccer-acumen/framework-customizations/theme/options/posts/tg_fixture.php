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
    'fixture_settings' => array(
        'title' => 'Fixture Settings',
        'type' => 'box',
        'options' => array(
            'league_name' => array(
                'label' => esc_html__('League Name', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Enter the league name', 'soccer-acumen')
            ),
            'date_match' => array(
                'label' => esc_html__('Date/Time of match', 'soccer-acumen'),
                'type' => 'datetime-picker',
                'label' => esc_html__('Match Date', 'soccer-acumen'),
                'desc' => esc_html__('Please select the match date and time', 'soccer-acumen'),
                'datetime-picker' => array(
                    'format' => 'Y-m-d H:i', // Format datetime.
                    'maxDate' => false, // By default there is not maximum date , set a date in the datetime format.
                    'minDate' => false, // By default minimum date will be current day, set a date in the datetime format.
                    'timepicker' => true, // Show timepicker.
                    'datepicker' => true, // Show datepicker.
                    'defaultTime' => '12:00' // If the input value is empty, timepicker will set time use defaultTime.
                ),
            ),
            'location' => array(
                'label' => esc_html__('Match location', 'soccer-acumen'),
                'type' => 'textarea',
                'value' => '',
                'desc' => esc_html__('Enter the match location', 'soccer-acumen')
            ),
            'match_short_desc' => array(
                'label' => esc_html__('Short description', 'soccer-acumen'),
                'type' => 'textarea',
                'value' => '',
                'desc' => esc_html__('Add match short description. It will be shown in match detail page.', 'soccer-acumen')
            ),
            'enable_comments' => array(
                'type' => 'switch',
                'value' => 'disable',
                'label' => esc_html__('Comments', 'soccer-acumen'),
                'desc' => esc_html__('Enable or disable comments at fixture detail page.', 'soccer-acumen'),
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
                'label' => esc_html__('Categories', 'soccer-acumen'),
                'desc' => esc_html__('Enable or disable categories at fixture detail & listing pages.', 'soccer-acumen'),
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
                'desc' => esc_html__('Enable or disable social share at fixture detail page.', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
        ),
    ),
    'home_settings' => array(
        'title' => 'Home Team Settings',
        'type' => 'box',
        'options' => array(
            'home_team' => array(
                'label' => esc_html__('Team', 'soccer-acumen'),
                'type' => 'select',
                'value' => '',
                'choices' => soccer_acumen_prepare_league(),
                'desc' => esc_html__('Select the home team name', 'soccer-acumen')
            ),
            'home_goal' => array(
                'label' => esc_html__('Team goal', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Leave this field blank if the match has not start yet', 'soccer-acumen')
            ),
            'home_result' => array(
                'label' => esc_html__('Team Result', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Leave this field blank if the match has not start yet. eg: Loss', 'soccer-acumen')
            ),
            'home_team_players' => array(
                'type' => 'addable-box',
                'value' => array(
                    array(
                        'player_name' => 'Player Name',
                        'time_of_score' => 10
                    ),
                ),
                'attr' => array(),
                'label' => esc_html__('Players', 'soccer-acumen'),
                'desc' => esc_html__('Add player name and time of score', 'soccer-acumen'),
                'box-options' => array(
                    'player_name' => array(
                        'type' => 'text',
                        'desc' => esc_html__('Add player name', 'soccer-acumen'),
                    ),
                    'time_of_score' => array(
                        'type' => 'text',
                        'desc' => esc_html__('Add time of score eg: 10', 'soccer-acumen'),
                    ),
                ),
                'template' => '{{- player_name }}', // box title
                'limit' => 0, // limit the number of boxes that can be added
                'add-button-text' => esc_html__('Add Teams', 'soccer-acumen'),
                'sortable' => true,
            ),
        ),
    ),
    'away_settings' => array(
        'title' => 'Away Team Settings',
        'type' => 'box',
        'options' => array(
            'away_team' => array(
                'label' => esc_html__('Team', 'soccer-acumen'),
                'type' => 'select',
                'value' => '',
                'choices' => soccer_acumen_prepare_league(),
                'desc' => esc_html__('Select the away team name', 'soccer-acumen')
            ),
            'away_goal' => array(
                'label' => esc_html__('Team goal', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Leave this field blank if the match has not start yet', 'soccer-acumen')
            ),
            'away_result' => array(
                'label' => esc_html__('Team Result', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Leave this field blank if the match has not start yet. eg: Win', 'soccer-acumen')
            ),
            'away_team_players' => array(
                'type' => 'addable-box',
                'value' => array(
                    array(
                        'player_name' => 'Players',
                        'time_of_score' => 10
                    ),
                ),
                'attr' => array(),
                'label' => esc_html__('Player name', 'soccer-acumen'),
                'desc' => esc_html__('Add player name and time of score', 'soccer-acumen'),
                'box-options' => array(
                    'player_name' => array(
                        'type' => 'text',
                        'desc' => esc_html__('Add player name', 'soccer-acumen'),
                    ),
                    'time_of_score' => array(
                        'type' => 'text',
                        'desc' => esc_html__('Add time of score eg: 10', 'soccer-acumen'),
                    ),
                ),
                'template' => '{{- player_name }}', // box title
                'limit' => 0, // limit the number of boxes that can be added
                'add-button-text' => esc_html__('Add Teams', 'soccer-acumen'),
                'sortable' => true,
            ),
        ),
    ),
);

