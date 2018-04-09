<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'general_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('General Settings', 'soccer-acumen'),
        'options' => array(
            'custom_classes' => array(
                'label' => esc_html__('Custom Classes', 'soccer-acumen'),
                'desc' => esc_html__('Add Custom Classes', 'soccer-acumen'),
                'type' => 'text',
            ),
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
        ),
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
    'responsive_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Responsive Settings', 'soccer-acumen'),
        'options' => array(
            'responsive_switch' => array(
                'label' => esc_html__('Responsive Settings', 'soccer-acumen'),
                'desc' => esc_html__('Show/hide Small Screen Settings', 'soccer-acumen'),
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
            'responsive_classes' => array(
                'type' => 'select',
                'value' => 'no-repeat',
                'attr' => array(),
                'label' => esc_html__('Small Screen Class', 'soccer-acumen'),
                'desc' => esc_html__('Choose Your Small Screen Class', 'soccer-acumen'),
                'choices' => array(
                    'col-sm-1' => esc_html__('col-sm-1', 'soccer-acumen'),
                    'col-sm-2' => esc_html__('col-sm-2', 'soccer-acumen'),
                    'col-sm-3' => esc_html__('col-sm-3', 'soccer-acumen'),
                    'col-sm-4' => esc_html__('col-sm-4', 'soccer-acumen'),
                    'col-sm-5' => esc_html__('col-sm-5', 'soccer-acumen'),
                    'col-sm-6' => esc_html__('col-sm-6', 'soccer-acumen'),
                    'col-sm-7' => esc_html__('col-sm-7', 'soccer-acumen'),
                    'col-sm-8' => esc_html__('col-sm-8', 'soccer-acumen'),
                    'col-sm-9' => esc_html__('col-sm-9', 'soccer-acumen'),
                    'col-sm-10' => esc_html__('col-sm-10', 'soccer-acumen'),
                    'col-sm-11' => esc_html__('col-sm-11', 'soccer-acumen'),
                    'col-sm-12' => esc_html__('col-sm-12', 'soccer-acumen'),
                ),
            ),
            'extra_small_switch' => array(
                'label' => esc_html__('Extrasmall Settings', 'soccer-acumen'),
                'desc' => esc_html__('Show/hide Small Screen Settings', 'soccer-acumen'),
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
            'extra_small' => array(
                'type' => 'select',
                'value' => 'no-repeat',
                'attr' => array(),
                'label' => esc_html__('Small Screen Class', 'soccer-acumen'),
                'desc' => esc_html__('Choose Your Small Screen Class', 'soccer-acumen'),
                'choices' => array(
                    'col-xs-1' => esc_html__('col-xs-1', 'soccer-acumen'),
                    'col-sm-2' => esc_html__('col-xs-2', 'soccer-acumen'),
                    'col-xs-3' => esc_html__('col-xs-3', 'soccer-acumen'),
                    'col-xs-4' => esc_html__('col-xs-4', 'soccer-acumen'),
                    'col-xs-5' => esc_html__('col-xs-5', 'soccer-acumen'),
                    'col-xs-6' => esc_html__('col-xs-6', 'soccer-acumen'),
                    'col-xs-7' => esc_html__('col-xs-7', 'soccer-acumen'),
                    'col-xs-8' => esc_html__('col-xs-8', 'soccer-acumen'),
                    'col-xs-9' => esc_html__('col-xs-9', 'soccer-acumen'),
                    'col-xs-10' => esc_html__('col-xs-10', 'soccer-acumen'),
                    'col-xs-11' => esc_html__('col-xs-11', 'soccer-acumen'),
                    'col-xs-12' => esc_html__('col-xs-12', 'soccer-acumen'),
                ),
            ),
        )
    ),
);
