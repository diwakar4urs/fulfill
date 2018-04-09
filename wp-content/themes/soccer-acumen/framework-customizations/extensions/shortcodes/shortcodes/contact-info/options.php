<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'title' => array(
        'label' => esc_html__('Title', 'soccer-acumen'),
        'type' => 'text',
        'value' => ''
    ),
    'short_descripion' => array(
        'label' => esc_html__('Short Description', 'soccer-acumen'),
        'type' => 'textarea',
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
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => esc_html__('Information', 'soccer-acumen'),
        'desc' => esc_html__('Add icons and details here', 'soccer-acumen'),
        'help' => esc_html__('Help tip', 'soccer-acumen'),
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
);
