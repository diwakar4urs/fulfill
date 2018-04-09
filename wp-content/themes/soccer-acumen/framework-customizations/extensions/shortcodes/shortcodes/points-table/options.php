<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'table_title' => array(
        'label' => esc_html__('Title', 'soccer-acumen'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Add table title', 'soccer-acumen'),
    ),
    'texture_image' => array(
        'label' => esc_html__('Texture Background', 'soccer-acumen'),
        'type' => 'upload',
        'value' => '',
        'desc' => esc_html__('Upload the texture image', 'soccer-acumen')
    ),
    'player_image' => array(
        'label' => esc_html__('Image', 'soccer-acumen'),
        'type' => 'upload',
        'value' => '',
        'desc' => esc_html__('Upload the Image', 'soccer-acumen')
    ),
    'show_posts' => array(
        'type' => 'slider',
        'value' => 9,
        'properties' => array(
            'min' => 0,
            'max' => 100,
            'sep' => 1,
        ),
        'label' => esc_html__('Show No of Posts', 'soccer-acumen'),
    ),
    'order' => array(
        'type' => 'select',
        'value' => 'DESC',
        'desc' => esc_html__('Post Order', 'soccer-acumen'),
        'label' => esc_html__('Posts By', 'soccer-acumen'),
        'choices' => array(
            'ASC' => esc_html__('ASC', 'soccer-acumen'),
            'DESC' => esc_html__('DESC', 'soccer-acumen'),
        ),
    ),
    'league_get_mehtod' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'value' => array('gadget' => 'by_cats'),
        'picker' => array(
            'gadget' => array(
                'type' => 'select',
                'value' => 'by_cats',
                'desc' => esc_html__('League selection type.', 'soccer-acumen'),
                'label' => esc_html__('League By', 'soccer-acumen'),
                'choices' => array(
                    'by_cats' => esc_html__('By Categories', 'soccer-acumen'),
                    'by_posts' => esc_html__('By Post', 'soccer-acumen'),
                ),
            )
        ),
        'choices' => array(
            'by_cats' => array(
                'categories' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select Categories', 'soccer-acumen'),
                    'population' => 'taxonomy',
                    'source' => 'league-category',
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show Leagues by category selection.', 'soccer-acumen'),
                ),
            ),
            'by_posts' => array(
                'posts' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select Leagues', 'soccer-acumen'),
                    'population' => 'posts',
                    'source' => 'tg_league',
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show Leagues by selection.', 'soccer-acumen'),
                ),
            )
        ),
        'show_borders' => true,
    ),
    'orderby' => array(
        'type' => 'select',
        'value' => 'ID',
        'desc' => esc_html__('Post Order', 'soccer-acumen'),
        'label' => esc_html__('Posts By', 'soccer-acumen'),
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
    'read_more' => array(
        'type' => 'text',
        'value' => 'read more',
        'desc' => esc_html__('Leave it empty to hide.', 'soccer-acumen'),
        'label' => esc_html__('Button title', 'soccer-acumen'),
    ),
    'link' => array(
        'type' => 'text',
        'value' => '#',
        'label' => esc_html__('Link', 'soccer-acumen'),
    ),
);
