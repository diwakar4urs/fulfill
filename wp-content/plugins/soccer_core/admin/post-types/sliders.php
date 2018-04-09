<?php
/**
 * File Type: Slider
 */
if( ! class_exists('TG_Slider') ) {
	
	class TG_Slider {
	
		public function __construct() {
			global $pagenow;
			add_action('init', array(&$this, 'init_slider'));
			add_filter('manage_tg_slider_posts_columns', array(&$this, 'sliders_columns_add'));
			add_action('manage_tg_slider_posts_custom_column', array(&$this, 'sliders_columns'),10, 2);						
		}
		
		/**
		 * @Init Post Type
		 * @return {post}
		 */
		public function init_slider(){
			$this->prepare_post_type();
		}
		
		/**
		 * @Prepare Post Type
		 * @return {}
		 */
		public function prepare_post_type(){
			$labels = array(
				'name' 				 => esc_html__( 'Sliders', 'soccer_core' ),
				'all_items'			 => esc_html__( 'Sliders', 'soccer_core' ),
				'singular_name'      => esc_html__( 'Sliders', 'soccer_core' ),
				'add_new'            => esc_html__( 'Add Slider', 'soccer_core' ),
				'add_new_item'       => esc_html__( 'Add New Slider', 'soccer_core' ),
				'edit'               => esc_html__( 'Edit', 'soccer_core' ),
				'edit_item'          => esc_html__( 'Edit Slider', 'soccer_core' ),
				'new_item'           => esc_html__( 'New Slider', 'soccer_core' ),
				'view'               => esc_html__( 'View Slider', 'soccer_core' ),
				'view_item'          => esc_html__( 'View Slider', 'soccer_core' ),
				'search_items'       => esc_html__( 'Search Slider', 'soccer_core' ),
				'not_found'          => esc_html__( 'No Slider found', 'soccer_core' ),
				'not_found_in_trash' => esc_html__( 'No Slider found in trash', 'soccer_core' ),
				'parent'             => esc_html__( 'Parent Slider', 'soccer_core' ),
			);
			$args = array(
				'labels'			  => $labels,
				'description'         => esc_html__( 'This is where you can add new Slider', 'soccer_core' ),
				'public'              => true,
				'supports'            => array( 'title'),
				'show_ui'             => true,
				'capability_type'     => 'post',
				'map_meta_cap'        => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'hierarchical'        => false,
				'menu_position' 	  => 10,
				'rewrite'			  => array('slug' => 'sliders', 'with_front' => true),
				'query_var'           => false,
				'has_archive'         => false,
			); 
			register_post_type( 'tg_slider' , $args );
			
		}
		
		/**
		 * @Prepare Columns
		 * @return {post}
		 */
		public function sliders_columns_add($columns) {
			unset($columns['date']);
			$columns['shortcode'] 		= esc_html__('Shortcode','soccer_core');
		 
  			return $columns;
		}
		
		/**
		 * @Get Columns
		 * @return {}
		 */
		public function sliders_columns($name) {
			global $post;
			$tg_shortcode		= get_post_meta($post->ID,'soccer_shortcode',true);
			
			switch ($name) {
				case 'shortcode':
					echo ( $tg_shortcode );
				break;		
				
			}
		}
	}
	
  	new TG_Slider();	
}