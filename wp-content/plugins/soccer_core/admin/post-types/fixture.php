<?php

/**
 * File Type: Fixture
 */
if (!class_exists('TG_Fixture')) {

    class TG_Fixture {

        public function __construct() {
            global $pagenow;
            add_action('init', array(&$this, 'init_fixture'));
            add_action('init', array(&$this, 'init_fixture_taxonomies'));
        }

        /**
         * @Init Post Type
         * @return {post}
         */
        public function init_fixture() {
            $this->prepare_post_type();
        }

        /**
         * @Prepare Post Type
         * @return {}
         */
        public function prepare_post_type() {
            $labels = array(
                'name' => esc_html__('Fixture & Results', 'soccer_core'),
                'all_items' => esc_html__('Fixture & Results', 'soccer_core'),
                'singular_name' => esc_html__('Fixture & Results', 'soccer_core'),
                'add_new' => esc_html__('Add Fixture & Results', 'soccer_core'),
                'add_new_item' => esc_html__('Add New Fixture & Results', 'soccer_core'),
                'edit' => esc_html__('Edit', 'soccer_core'),
                'edit_item' => esc_html__('Edit Fixture & Results', 'soccer_core'),
                'new_item' => esc_html__('New Fixture & Results', 'soccer_core'),
                'view' => esc_html__('View Fixture & Results', 'soccer_core'),
                'view_item' => esc_html__('View Fixture & Results', 'soccer_core'),
                'search_items' => esc_html__('Search Fixture & Results', 'soccer_core'),
                'not_found' => esc_html__('No Fixture & Results found', 'soccer_core'),
                'not_found_in_trash' => esc_html__('No Fixture & Results found in trash', 'soccer_core'),
                'parent' => esc_html__('Parent Fixture & Results', 'soccer_core'),
            );
            $args = array(
                'labels' => $labels,
                'description' => esc_html__('This is where you can add new Fixture', 'soccer_core'),
                'public' => true,
                'supports' => array('title', 'thumbnail', 'comments','editor'),
                'show_ui' => true,
                'capability_type' => 'post',
                'map_meta_cap' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'hierarchical' => false,
                'menu_position' => 10,
                'rewrite' => array('slug' => 'fixture', 'with_front' => true),
                'query_var' => false,
                'has_archive' => true,
            );
            register_post_type('tg_fixture', $args);
        }

        /**
         * @Prepare Project Project
         * @return {}
         */
        public function init_fixture_taxonomies() {
            $labels = array(
                'name' => esc_html__('Result Category', 'taxonomy general name', 'soccer_core'),
                'singular_name' => esc_html__('Result Category', 'taxonomy singular name', 'soccer_core'),
                'search_items' => esc_html__('Search Category', 'soccer_core'),
                'all_items' => esc_html__('All Category', 'soccer_core'),
                'parent_item' => esc_html__('Parent Category', 'soccer_core'),
                'parent_item_colon' => esc_html__('Parent Category:', 'soccer_core'),
                'edit_item' => esc_html__('Edit Category', 'soccer_core'),
                'update_item' => esc_html__('Update Category', 'soccer_core'),
                'add_new_item' => esc_html__('Add New Category', 'soccer_core'),
                'new_item_name' => esc_html__('New Category Name', 'soccer_core'),
                'menu_name' => esc_html__('Result Category', 'soccer_core'),
            );

            $args = array(
                'hierarchical' => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'fixture-category'),
            );

            register_taxonomy('fixture-category', array('tg_fixture'), $args);
        }

    }

    new TG_Fixture();
}