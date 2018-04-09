<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg = array(
	'page_builder' => array(
		'title' => esc_html__('Image Frame', 'soccer-acumen'),
		'description' => esc_html__('Add an Image.', 'soccer-acumen'),
		'tab' => esc_html__('Soccer Acumen', 'soccer-acumen'),
		'popup_size' => 'small' // can be large, medium or small
	)
);