<?php

if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
/**
 * @init all widgets
 * @return widget
 */

require plugin_dir_path( __FILE__ ) .('flickr-widget.php'); //Flickr Widget
require plugin_dir_path( __FILE__ ) .('get-in-touch.php'); //Get-in-touch
require plugin_dir_path( __FILE__ ).('newsletter-widget.php'); //MailChimp Newsletter Widget