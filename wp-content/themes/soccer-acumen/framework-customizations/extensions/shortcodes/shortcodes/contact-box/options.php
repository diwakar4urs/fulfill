<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'info_box' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Infobox', 'soccer-acumen'),
        'template' => '{{- title }}',
        'popup-title' => null,
        'size' => 'small', // small, medium, large
        'limit' => 0, // limit the number of popup`s that can be added
        'popup-options' => array(
            'title' => array(
                'label' => esc_html__('Title', 'soccer-acumen'),
                'type' => 'text',
                'value' => ''
            ),
            'sub_title' => array(
                'label' => esc_html__('Subtitle', 'soccer-acumen'),
                'type' => 'text',
                'value' => ''
            ),
            'contact_info_box' => array(
                'type' => 'addable-box',
                'value' => array(
                    array(
                        'icons' => 'Icons',
                        'details' => 'Details',
                    ),
                ),
                'attr' => array(),
                'label' => esc_html__('Information', 'soccer-acumen'),
                'desc' => esc_html__('Add icons and details here', 'soccer-acumen'),
                'box-options' => array(
                    'icons' => array('type' => 'new-icon'),
                    'details' => array('type' => 'textarea'),
                ),
                'template' => '{{- icons }}', // box title
                'box-controls' => array(// buttons next to (x) remove box button
                    'control-id' => '<small class="dashicons dashicons-smiley"></small>',
                ),
                'limit' => 0, // limit the number of boxes that can be added
                'add-button-text' => esc_html__('Add', 'soccer-acumen'),
                'sortable' => true,
            )
        ),
    ),
);
