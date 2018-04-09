<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'view' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'value' => array('gadget' => 'view_1'),
        'picker' => array(
            'gadget' => array(
                'label' => esc_html__('View Type', 'soccer-acumen'),
                'type' => 'select',
                'choices' => array(
                    'view_1' => esc_html__('View 1', 'soccer-acumen'),
                    'view_2' => esc_html__('View 2', 'soccer-acumen')
                ),
                'desc' => esc_html__('Select result listing type.', 'soccer-acumen')
            )
        ),
        'choices' => array(
            'view_1' => array(
                'read_more' => array(
                    'type' => 'text',
                    'value' => 'view all',
                    'label' => esc_html__('Button', 'soccer-acumen'),
                ),
                'link' => array(
                    'type' => 'text',
                    'value' => '#',
                    'label' => esc_html__('Link', 'soccer-acumen'),
                ),
            ),
            'view_2' => array(
            ),
        ),
        'show_borders' => true,
    ),
    'order' => array(
        'type' => 'select',
        'value' => 'DESC',
        'desc' => esc_html__('Please seelct result order', 'soccer-acumen'),
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
        'label' => esc_html__('Please select result order by', 'soccer-acumen'),
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
    'show_match' => array(
        'type' => 'slider',
        'value' => 9,
        'properties' => array(
            'min' => 0,
            'max' => 100,
            'sep' => 1,
        ),
        'label' => esc_html__('Show no of results', 'soccer-acumen'),
    ),
);
