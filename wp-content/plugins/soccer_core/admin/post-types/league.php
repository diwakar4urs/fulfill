<?php

/**
 * File Type: League
 */
if (!class_exists('TG_League')) {

    class TG_League {

        public function __construct() {
            global $pagenow;
            add_action('init', array(&$this, 'init_league'));
            add_action('init', array(&$this, 'init_league_taxonomies'));
        }

        /**
         * @Init Post Type
         * @return {post}
         */
        public function init_league() {
            $this->prepare_post_type();
        }

        /**
         * @Prepare Post Type
         * @return {}
         */
        public function prepare_post_type() {
            $labels = array(
                'name' => esc_html__('League Table', 'soccer_core'),
                'all_items' => esc_html__('League', 'soccer_core'),
                'singular_name' => esc_html__('League', 'soccer_core'),
                'add_new' => esc_html__('Add League', 'soccer_core'),
                'add_new_item' => esc_html__('Add New League', 'soccer_core'),
                'edit' => esc_html__('Edit', 'soccer_core'),
                'edit_item' => esc_html__('Edit League', 'soccer_core'),
                'new_item' => esc_html__('New League', 'soccer_core'),
                'view' => esc_html__('View League', 'soccer_core'),
                'view_item' => esc_html__('View League', 'soccer_core'),
                'search_items' => esc_html__('Search League', 'soccer_core'),
                'not_found' => esc_html__('No League found', 'soccer_core'),
                'not_found_in_trash' => esc_html__('No League found in trash', 'soccer_core'),
                'parent' => esc_html__('Parent League', 'soccer_core'),
            );
            $args = array(
                'labels' => $labels,
                'description' => esc_html__('This is where you can add new League', 'soccer_core'),
                'public' => true,
                'supports' => array('title'),
                'show_ui' => true,
                'capability_type' => 'post',
                'map_meta_cap' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'hierarchical' => false,
                'menu_position' => 10,
                'rewrite' => array('slug' => 'league', 'with_front' => true),
                'query_var' => false,
                'has_archive' => false,
            );
            register_post_type('tg_league', $args);
        }

        /**
         * @Prepare Project Project
         * @return {}
         */
        public function init_league_taxonomies() {
            $labels = array(
                'name' => esc_html__('League Category', 'taxonomy general name', 'soccer_core'),
                'singular_name' => esc_html__('League Category', 'taxonomy singular name', 'soccer_core'),
                'search_items' => esc_html__('Search Category', 'soccer_core'),
                'all_items' => esc_html__('All Category', 'soccer_core'),
                'parent_item' => esc_html__('Parent Category', 'soccer_core'),
                'parent_item_colon' => esc_html__('Parent Category:', 'soccer_core'),
                'edit_item' => esc_html__('Edit Category', 'soccer_core'),
                'update_item' => esc_html__('Update Category', 'soccer_core'),
                'add_new_item' => esc_html__('Add New Category', 'soccer_core'),
                'new_item_name' => esc_html__('New Category Name', 'soccer_core'),
                'menu_name' => esc_html__('League Category', 'soccer_core'),
            );

            $args = array(
                'hierarchical' => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'categories'),
            );

            register_taxonomy('league-category', array('tg_league'), $args);
        }

    }

    new TG_League();
}