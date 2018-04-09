<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'get_mehtod' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'value' => array('gadget' => 'normal'),
        'picker' => array(
            'gadget' => array(
                'type' => 'select',
                'value' => 'by_cats',
                'desc' => esc_html__('Enable/Disbale Site Boxed View', 'soccer-acumen'),
                'label' => esc_html__('Posts By', 'soccer-acumen'),
                'choices' => array(
                    'by_cats' => esc_html__('By Categories', 'soccer-acumen'),
                    'by_posts' => esc_html__('By Posts', 'soccer-acumen'),
                ),
            )
        ),
        'choices' => array(
            'by_cats' => array(
                'categories' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select Categories', 'soccer-acumen'),
                    'population' => 'taxonomy',
                    'source' => 'category',
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show posts by category selection.', 'soccer-acumen'),
                ),
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
            ),
            'by_posts' => array(
                'posts' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select Posts', 'soccer-acumen'),
                    'population' => 'posts',
                    'source' => 'post',
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show posts by post selection.', 'soccer-acumen'),
                ),
            )
        ),
        'show_borders' => true,
    ),
    'show_posts' => array(
        'type' => 'slider',
        'value' => 9,
        'properties' => array(
            'min' => 0,
            'max' => 100,
            'sep' => 1,
        ),
        'label' => esc_html__('Show no of posts to show.', 'soccer-acumen'),
    ),
    'show_pagination' => array(
        'type' => 'select',
        'value' => 'yes',
        'label' => esc_html__('Show Pagination', 'soccer-acumen'),
        'choices' => array(
            'yes' => esc_html__('Yes', 'soccer-acumen'),
            'no' => esc_html__('No', 'soccer-acumen'),
        ),
        'no-validate' => false,
    ),
    'show_description' => array(
        'type' => 'switch',
        'value' => 'show',
        'label' => esc_html__('Description', 'soccer-acumen'),
        'left-choice' => array(
            'value' => 'show',
            'label' => esc_html__('Show Description', 'soccer-acumen'),
        ),
        'right-choice' => array(
            'value' => 'hide',
            'label' => esc_html__('Hide Description', 'soccer-acumen'),
        ),
    ),
    'excerpt_length' => array(
        'type' => 'slider',
        'value' => 123,
        'properties' => array(
            'min' => 0,
            'max' => 1000,
            'sep' => 1,
        ),
        'label' => esc_html__('Excerpt length', 'soccer-acumen'),
    ),
);
