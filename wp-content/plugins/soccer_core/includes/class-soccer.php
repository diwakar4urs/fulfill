<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://themographics.com
 * @since      1.0
 *
 * @package    Soccer
 * @subpackage Soccer/includes
 */
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0
 * @package    Soccer
 * @subpackage Soccer/includes
 * @author     Themographics <themographics@gmail.com>
 */
if (!class_exists('Soccer')) {

    class Soccer {

        /**
         * Define the core functionality of the plugin.
         *
         * Set the plugin name and the plugin version that can be used throughout the plugin.
         * Load the dependencies, define the locale, and set the hooks for the admin area and
         * the public-facing side of the site.
         *
         * @since    1.0
         */
        public function __construct() {
            $this->load_dependencies();
            $this->set_locale();
            $this->define_admin_hooks();
            $this->define_public_hooks();
        }

        /**
         * Load the required dependencies for this plugin.
         *
         * Include the following files that make up the plugin:
         *
         * - Soccer_Loader. Orchestrates the hooks of the plugin.
         * - Soccer_i18n. Defines internationalization functionality.
         * - Soccer_Admin. Defines all hooks for the admin area.
         * - Soccer_Public. Defines all hooks for the public side of the site.
         *
         * Create an instance of the loader which will be used to register the hooks
         * with WordPress.
         *
         * @since    1.0
         * @access   private
         */
        private function load_dependencies() {

            /**
             * The class responsible for orchestrating the actions and filters of the
             * core plugin.
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-soccer-loader.php';

            /**
             * The class responsible for defining internationalization functionality
             * of the plugin.
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-soccer-i18n.php';

            /**
             * The class responsible for defining all actions that occur in the admin area.
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-soccer-admin.php';

            /**
             * The class responsible for defining all functions that occur in the admin area.
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/functions.php';

            /**
             * The class responsible sliders in theme
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'shortcodes/class-slider.php';

            /**
             * The class responsible for defining all actions that occur in the public-facing
             * side of the site.
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-soccer-public.php';

            $this->loader = new Soccer_Loader();
        }

        /**
         * Define the locale for this plugin for internationalization.
         *
         * Uses the Soccer_i18n class in order to set the domain and to register the hook
         * with WordPress.
         *
         * @since    1.0
         * @access   private
         */
        private function set_locale() {

            $plugin_i18n = new Soccer_i18n();

            $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
        }

        /**
         * Register all of the hooks related to the admin area functionality
         * of the plugin.
         *
         * @since    1.0
         * @access   private
         */
        private function define_admin_hooks() {
            $plugin_admin = new Soccer_Admin();
            $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
            $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        }

        /**
         * Register all of the hooks related to the public-facing functionality
         * of the plugin.
         *
         * @since    1.0
         * @access   private
         */
        private function define_public_hooks() {

            $plugin_public = new Soccer_Public();

            $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
            $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        }

        /**
         * Run the loader to execute all of the hooks with WordPress.
         *
         * @since    1.0
         */
        public function run() {
            $this->loader->run();
        }

        /**
         * The reference to the class that orchestrates the hooks with the plugin.
         *
         * @since     1.0.0
         * @return    Soccer_Loader    Orchestrates the hooks of the plugin.
         */
        public function get_loader() {
            return $this->loader;
        }

    }

}
