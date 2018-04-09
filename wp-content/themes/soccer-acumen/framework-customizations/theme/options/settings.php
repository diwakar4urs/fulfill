<?php

if (!defined('FW')) {
    die('Forbidden');
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */
$options = array(
    fw()->theme->get_options('general-settings'),
    fw()->theme->get_options('colors-settings'),
    fw()->theme->get_options('headers-settings'),
    fw()->theme->get_options('subheaders-settings'),
    fw()->theme->get_options('footer-settings'),
    fw()->theme->get_options('typo-settings'),
    fw()->theme->get_options('social-settings'),
    fw()->theme->get_options('social-sharing-settings'),
    fw()->theme->get_options('commingsoon-settings'),
    fw()->theme->get_options('contact-settings'),
    fw()->theme->get_options('woocommerce-settings'),
    fw()->theme->get_options('api-settings'),
);
