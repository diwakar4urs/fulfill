<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://themographics.com
 * @since             1.0
 * @package           Soccer
 *
 * @wordpress-plugin
 * Plugin Name:       Soccer Core
 * Plugin URI:        http://themographics.com
 * Description:       This plugin is used for creating custom post types and other functionality for Soccer Theme
 * Version:           1.0
 * Author:            Themographics
 * Author URI:        http://themographics.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       soccer_core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elevator-activator.php
 */
if( !function_exists( 'activate_soccer' ) ) {
	function activate_soccer() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-soccer-activator.php';
		Soccer_Activator::activate();
	}
}
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elevator-deactivator.php
 */
if( !function_exists( 'deactivate_soccer' ) ) {
	function deactivate_soccer() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-soccer-deactivator.php';
		Soccer_Deactivator::deactivate();
	}
}

register_activation_hook( __FILE__, 'activate_soccer' );
register_deactivation_hook( __FILE__, 'deactivate_soccer' );

/**
 * Plugin configuration file,
 * It include getter & setter for global settings
 */
require plugin_dir_path( __FILE__ ) . 'config.php';
require plugin_dir_path( __FILE__ ) . 'hooks/hooks.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-soccer.php';

/**
 * MailChimp Configuration Files
 */
require plugin_dir_path( __FILE__ ) . '/libraries/mailchimp/class-mailchimp.php';
/**
 * Mailchimp OAth Authentication
 */
require plugin_dir_path( __FILE__ ) . '/libraries/mailchimp/class-mailchimp-oath.php';

/*
 * Include Widgets
 */

require  plugin_dir_path( __FILE__ ) . 'admin/widgets/init.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0
 */
if( !function_exists( 'run_Soccer' ) ) {
	function run_Soccer() {
	
		$plugin = new Soccer();
		$plugin->run();
	
	}
	run_Soccer();
}
