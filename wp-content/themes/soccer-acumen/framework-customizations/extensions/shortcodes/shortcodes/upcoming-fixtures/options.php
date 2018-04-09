<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'view' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'value' => array('gadget' => 'list'),
        'picker' => array(
            'gadget' => array(
                'label' => esc_html__('Select View', 'soccer-acumen'),
                'type' => 'select',
                'choices' => array(
                    'carousel' => esc_html__('Carousel View 1', 'soccer-acumen'),
                    'carousel-two' => esc_html__('Carousel View 2', 'soccer-acumen'),
                    'list' => esc_html__('List View', 'soccer-acumen'),
                ),
            )
        ),
        'choices' => array(
            'carousel' => array(
            ),
            'list' => array(
                'pagination' => array(
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
            ),
        ),
        'show_borders' => true,
    ),
    'show_posts' => array(
        'type' => 'slider',
        'value' => 10,
        'properties' => array(
            'min' => 0,
            'max' => 500,
            'sep' => 1,
        ),
        'label' => esc_html__('Number of posts', 'soccer-acumen'),
        'desc' => esc_html__('Number of posts to show.', 'soccer-acumen'),
    ),
    'get_mehtod' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'value' => array('gadget' => 'by_cats'),
        'picker' => array(
            'gadget' => array(
                'type' => 'select',
                'value' => 'by_cats',
                'desc' => esc_html__('Fixtures selection type.', 'soccer-acumen'),
                'label' => esc_html__('Fixtures By', 'soccer-acumen'),
                'choices' => array(
                    'by_cats' => esc_html__('By Categories', 'soccer-acumen'),
                    'by_fixtures' => esc_html__('By Fixtures', 'soccer-acumen'),
                ),
            )
        ),
        'choices' => array(
            'by_cats' => array(
                'categories' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select Categories', 'soccer-acumen'),
                    'population' => 'taxonomy',
                    'source' => 'fixture-category',
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show fixtures by category selection.', 'soccer-acumen'),
                ),
            ),
            'by_fixtures' => array(
                'posts' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select fixtures', 'soccer-acumen'),
                    'choices' => soccer_acumen_prepare_upcoming_fixture(),
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show fixtures by selection.', 'soccer-acumen'),
                ),
            )
        ),
        'show_borders' => true,
    ),
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
);
