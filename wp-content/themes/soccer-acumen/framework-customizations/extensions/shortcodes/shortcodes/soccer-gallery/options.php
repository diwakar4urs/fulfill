<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'order' => array(
        'type' => 'select',
        'value' => 'DESC',
        'desc' => esc_html__('By Order', 'soccer-acumen'),
        'label' => esc_html__('By Order', 'soccer-acumen'),
        'choices' => array(
            'ASC' => esc_html__('ASC', 'soccer-acumen'),
            'DESC' => esc_html__('DESC', 'soccer-acumen'),
        ),
    ),
    'orderby' => array(
        'type' => 'select',
        'value' => 'ID',
        'desc' => esc_html__('Order By', 'soccer-acumen'),
        'label' => esc_html__('Order By', 'soccer-acumen'),
        'choices' => array(
            'ID' => esc_html__('Order by post id', 'soccer-acumen'),
            'author' => esc_html__('Order by author', 'soccer-acumen'),
            'title' => esc_html__('Order by title', 'soccer-acumen'),
            'name' => esc_html__('Order by post name', 'soccer-acumen'),
            'date' => esc_html__('Order by date', 'soccer-acumen'),
            'rand' => esc_html__('Random order', 'soccer-acumen'),
            'comment_count' => esc_html__('Order by number of comments', 'soccer-acumen'),
        ),
    ),
   
    'soccer_match_view' => array(
        'type' => 'select',
        'value' => 'gallery',
        'label' => esc_html__('Select View', 'soccer-acumen'),
        'choices' => array(
            'gallery' => esc_html__('Gallery', 'soccer-acumen'),
            'soccermediascrollbar' => esc_html__('Scroll Gallery', 'soccer-acumen'),
        ),
    ),
    'soccoer_categories' => array(
        'type' => 'multi-select',
        'label' => esc_html__('Select Categories', 'soccer-acumen'),
        'population' => 'taxonomy',
        'source' => 'gallery-category',
        'desc' => esc_html__('Show gallery by category selection.', 'soccer-acumen'),
    ),
    'show_gallery' => array(
        'type' => 'slider',
        'value' => 12,
        'properties' => array(
            'min' => 0,
            'max' => 100,
            'sep' => 1,
        ),
        'label' => esc_html__('No of Topics', 'soccer-acumen'),
    ),
    'show_filterable' => array(
        'type' => 'select',
        'value' => 'yes',
        'choices' => array(
            'yes' => esc_html__('YES', 'soccer-acumen'),
            'no' => esc_html__('NO', 'soccer-acumen'),
        ),
        'label' => esc_html__('Filterable', 'soccer-acumen'),
    ),
);
