<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'map_height' => array(
        'type' => 'text',
        'value' => '400',
        'label' => esc_html__('Map height', 'soccer-acumen'),
        'desc' => esc_html__('Add height in PX as : 200, Default is 400', 'soccer-acumen'),
    ),
    'latitude' => array(
        'type' => 'text',
        'value' => '54.932728',
        'label' => esc_html__('Latitude', 'soccer-acumen'),
        'desc' => esc_html__('Add Latitude', 'soccer-acumen'),
    ),
    'longitude' => array(
        'type' => 'text',
        'value' => '-2.933358',
        'label' => esc_html__('Longitude', 'soccer-acumen'),
        'desc' => esc_html__('Add Longitude', 'soccer-acumen'),
    ),
    'map_zoom' => array(
        'type' => 'slider',
        'value' => 11,
        'properties' => array(
            'min' => 0,
            'max' => 20,
            'sep' => 1,
        ),
        'attr' => array(),
        'label' => esc_html__('Zoom Level', 'soccer-acumen')
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
);
