<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'counter_popup' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Add Counter', 'soccer-acumen'),
        'template' => '{{- counter_title }}',
        'popup-title' => null,
        'size' => 'small', // small, medium, large
        'limit' => 0, // limit the number of popup`s that can be added
        'add-button-text' => esc_html__('Counter', 'soccer-acumen'),
        'sortable' => true,
        'popup-options' => array(
            'counter_title' => array(
                'label' => esc_html__('Counter Title', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add counter title', 'soccer-acumen'),
            ),
            'icons_list' => array(
                'type' => 'new-icon',
                'value' => 'fa-smile-o',
                'attr' => array(),
                'label' => esc_html__('Choos Icon', 'soccer-acumen'),
            ),
            'counter_start' => array(
                'label' => esc_html__('Start Number', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add counter start', 'soccer-acumen'),
            ),
            'counter_end' => array(
                'label' => esc_html__('End Number', 'soccer-acumen'),
                'type' => 'text',
                'value' => '',
                'desc' => esc_html__('Add counter end', 'soccer-acumen'),
            ),
            'counter_interval' => array(
                'type' => 'slider',
                'value' => 0,
                'properties' => array(
                    'min' => 0,
                    'max' => 50,
                    'sep' => 1,
                ),
                'attr' => array(),
                'label' => esc_html__('Interval', 'soccer-acumen'),
                'desc' => esc_html__('add interval', 'soccer-acumen'),
            ),
            'counter_speed' => array(
                'type' => 'slider',
                'value' => 0,
                'properties' => array(
                    'min' => 1000,
                    'max' => 10000,
                    'sep' => 1,
                ),
                'attr' => array(),
                'label' => esc_html__('Speed', 'soccer-acumen'),
                'desc' => esc_html__('add speed', 'soccer-acumen'),
            ),
        ),
    ),
);
