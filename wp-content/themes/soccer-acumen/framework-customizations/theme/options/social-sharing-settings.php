<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'social_sharing' => array(
        'title' => esc_html__('Social Sharing', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
            'social_facebook' => array(
                'label' => esc_html__('Faceobook', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'enable',
                'desc' => esc_html__('Sharing on/off', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'social_twitter' => array(
                'label' => esc_html__('Twitter', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'enable',
                'desc' => esc_html__('Sharing on/off', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'social_tumbler' => array(
                'label' => esc_html__('Tumbler', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'enable',
                'desc' => esc_html__('Sharing on/off', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'social_email' => array(
                'label' => esc_html__('E-mail', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'enable',
                'desc' => esc_html__('Sharing on/off', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'social_dribble' => array(
                'label' => esc_html__('Dribble', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'disable',
                'desc' => esc_html__('Sharing on/off', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'social_instagram' => array(
                'label' => esc_html__('Instagram', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'disable',
                'desc' => esc_html__('Sharing on/off', 'soccer-acumen'),
                'left-choice' => array(
                    'value' => 'enable',
                    'label' => esc_html__('Enable', 'soccer-acumen'),
                ),
                'right-choice' => array(
                    'value' => 'disable',
                    'label' => esc_html__('Disable', 'soccer-acumen'),
                ),
            ),
            'social_youtube' => array(
                'label' => esc_html__('Youtube', 'soccer-acumen'),
                'type' => 'switch',
                'value' => 'disable',
                'desc' => esc_html__('Sharing on/off', 'soccer-acumen'),
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
);
