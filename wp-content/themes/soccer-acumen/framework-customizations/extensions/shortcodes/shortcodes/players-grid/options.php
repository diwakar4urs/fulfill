<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'get_mehtod' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'value' => array('gadget' => 'by_cats'),
        'picker' => array(
            'gadget' => array(
                'type' => 'select',
                'value' => 'by_cats',
                'label' => esc_html__('Player get type', 'soccer-acumen'),
                'desc' => esc_html__('Please select type, how you want to get players.', 'soccer-acumen'),
                'choices' => array(
                    'by_cats' => esc_html__('By Categories', 'soccer-acumen'),
                    'by_player' => esc_html__('By Player', 'soccer-acumen'),
                ),
            )
        ),
        'choices' => array(
            'by_cats' => array(
                'categories' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select Categories', 'soccer-acumen'),
                    'population' => 'taxonomy',
                    'source' => 'player-category',
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show players by category selection.', 'soccer-acumen'),
                ),
            ),
            'by_player' => array(
                'posts' => array(
                    'type' => 'multi-select',
                    'label' => esc_html__('Select player', 'soccer-acumen'),
                    'population' => 'posts',
                    'source' => 'tg_player',
                    'prepopulate' => 500,
                    'desc' => esc_html__('Show player by selection.', 'soccer-acumen'),
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
    'player_auto' => array(
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
);

