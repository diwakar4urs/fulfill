<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'order' => array(
        'type' => 'select',
        'value' => 'DESC',
        'desc' => esc_html__('Order', 'soccer-acumen'),
        'label' => esc_html__('Order', 'soccer-acumen'),
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
    'other_auto' => array(
        'type' => 'switch',
        'value' => 'disable',
        'label' => esc_html__('Auto Start', 'soccer-acumen'),
        'desc' => esc_html__('Enable or Disable Auto Start.', 'soccer-acumen'),
        'left-choice' => array(
            'value' => 1,
            'label' => esc_html__('Enable', 'soccer-acumen'),
        ),
        'right-choice' => array(
            'value' => 0,
            'label' => esc_html__('Disable', 'soccer-acumen'),
        ),
    ),
    'other_pagination' => array(
        'type' => 'switch',
        'value' => 'enable',
        'label' => esc_html__('Enable Pagination', 'soccer-acumen'),
        'desc' => esc_html__('Enable or Disable Pagination.', 'soccer-acumen'),
        'left-choice' => array(
            'value' => 'enable',
            'label' => esc_html__('Enable', 'soccer-acumen'),
        ),
        'right-choice' => array(
            'value' => 'disable',
            'label' => esc_html__('Disable', 'soccer-acumen'),
        ),
    ),
    'show_match' => array(
        'type' => 'slider',
        'value' => 9,
        'properties' => array(
            'min' => 0,
            'max' => 100,
            'sep' => 1,
        ),
        'label' => esc_html__('Show No of Posts', 'soccer-acumen'),
    ),
);
