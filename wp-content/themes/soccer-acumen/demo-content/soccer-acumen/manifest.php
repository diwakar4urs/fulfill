<?php if (!defined('FW')) die('Forbidden');
/**
 * @var string $uri Demo directory url
 */

$manifest = array();
$manifest['title'] = esc_html__('Soccer Acumen', 'soccer-acumen');
$manifest['screenshot'] = get_template_directory_uri(). '/demo-content/images/demo.jpg';
$manifest['preview_link'] = 'http://soccer-acumen.themographics.com/';