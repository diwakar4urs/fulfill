<?php

/**
 * File Type: Player
 */
if (!class_exists('TG_Player')) {

    class TG_Player {

        public function __construct() {
            global $pagenow;
            add_action('init', array(&$this, 'init_player'));
            add_action('init', array(&$this, 'init_player_taxonomies'));
        }

        /**
         * @Init Post Type
         * @return {post}
         */
        public function init_player() {
            $this->prepare_post_type();
        }

        /**
         * @Prepare Post Type
         * @return {}
         */
        public function prepare_post_type() {
            $labels = array(
                'name' => esc_html__('Player', 'soccer_core'),
                'all_items' => esc_html__('Player', 'soccer_core'),
                'singular_name' => esc_html__('Player', 'soccer_core'),
                'add_new' => esc_html__('Add Player', 'soccer_core'),
                'add_new_item' => esc_html__('Add New Player', 'soccer_core'),
                'edit' => esc_html__('Edit', 'soccer_core'),
                'edit_item' => esc_html__('Edit Player', 'soccer_core'),
                'new_item' => esc_html__('New Player', 'soccer_core'),
                'view' => esc_html__('View Player', 'soccer_core'),
                'view_item' => esc_html__('View Player', 'soccer_core'),
                'search_items' => esc_html__('Search Player', 'soccer_core'),
                'not_found' => esc_html__('No Player found', 'soccer_core'),
                'not_found_in_trash' => esc_html__('No Player found in trash', 'soccer_core'),
                'parent' => esc_html__('Parent Player', 'soccer_core'),
            );
            $args = array(
                'labels' => $labels,
                'description' => esc_html__('This is where you can add new Player', 'soccer_core'),
                'public' => true,
                'supports' => array('title','author','editor', 'thumbnail'),
                'show_ui' => true,
                'capability_type' => 'post',
                'map_meta_cap' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'hierarchical' => false,
                'menu_position' => 10,
                'rewrite' => array('slug' => 'player', 'with_front' => true),
                'query_var' => false,
                'has_archive' => true,
            );
            register_post_type('tg_player', $args);
        }

        /**
         * @Prepare player
         * @return {}
         */
        public function init_player_taxonomies() {
            $labels = array(
                'name' => esc_html__('Player Category', 'taxonomy general name', 'soccer_core'),
                'singular_name' => esc_html__('Player Category', 'taxonomy singular name', 'soccer_core'),
                'search_items' => esc_html__('Search Category', 'soccer_core'),
                'all_items' => esc_html__('All Category', 'soccer_core'),
                'parent_item' => esc_html__('Parent Category', 'soccer_core'),
                'parent_item_colon' => esc_html__('Parent Category:', 'soccer_core'),
                'edit_item' => esc_html__('Edit Category', 'soccer_core'),
                'update_item' => esc_html__('Update Category', 'soccer_core'),
                'add_new_item' => esc_html__('Add New Category', 'soccer_core'),
                'new_item_name' => esc_html__('New Category Name', 'soccer_core'),
                'menu_name' => esc_html__('Player Category', 'soccer_core'),
            );

            $args = array(
                'hierarchical' => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'categories'),
            );

            register_taxonomy('player-category', array('tg_player'), $args);
        }

    }

    new TG_Player();
}