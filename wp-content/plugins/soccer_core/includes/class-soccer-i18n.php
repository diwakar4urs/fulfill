<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://themographics.com
 * @since      1.0
 *
 * @package    Soccer
 * @subpackage Soccer/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0
 * @package    Soccer
 * @subpackage Soccer/includes
 * @author     Themographics <themographics@gmail.com>
 */
class Soccer_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'soccer',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
