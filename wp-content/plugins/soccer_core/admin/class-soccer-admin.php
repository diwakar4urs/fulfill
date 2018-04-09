<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://themographics.com
 * @since      1.0
 *
 * @package    Soccer
 * @subpackage Soccer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Soccer
 * @subpackage Soccer/admin
 * @author     Themographics <themographics@gmail.com>
 */
class Soccer_Admin {
	
    public function __construct() {
        $this->plugin_name 	= SoccerGlobalSettings::get_plugin_name();
        $this->version 		= SoccerGlobalSettings::get_plugin_verion();
        $this->plugin_path 	= SoccerGlobalSettings::get_plugin_path();
        $this->plugin_url 	 = SoccerGlobalSettings::get_plugin_url();
		$this->prepare_post_types();
    }
	
	/**
     * Register the spost types for the admin area.
     *
     * @since    1.0
     */
    public function prepare_post_types() {
		$dir	= $this->plugin_path;
		$scan_PostTypes = glob("$dir/admin/post-types/*");
		foreach ($scan_PostTypes as $filename) {
			@include $filename;
		}
	}

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Soccer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Soccer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style('soccer-styles', $this->plugin_url . 'admin/css/styles.css', array(), $this->version, 'all');
		wp_enqueue_style('soccer-icomoon', $this->plugin_url . 'admin/css/icomoon.css', array(), $this->version, '');
    
        
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Soccer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Soccer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script('soccer-scripts', $this->plugin_url . 'admin/js/functions.js', array('jquery'), $this->version, false);
    }
}
