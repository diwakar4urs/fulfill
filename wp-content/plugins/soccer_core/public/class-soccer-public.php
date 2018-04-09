<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://themographics.com
 * @since      1.0
 *
 * @package    Soccer
 * @subpackage Soccer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Soccer
 * @subpackage Soccer/public
 * @author     Themographics <themographics@gmail.com>
 */
class Soccer_Public {

	
	public function __construct() {

		$this->plugin_name = SoccerGlobalSettings::get_plugin_name();
        $this->version     = SoccerGlobalSettings::get_plugin_verion();
        $this->plugin_path = SoccerGlobalSettings::get_plugin_path();
        $this->plugin_url  = SoccerGlobalSettings::get_plugin_url();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

//		/wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/soccer-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/soccer-public.js', array( 'jquery' ), $this->version, false );

	}

}
