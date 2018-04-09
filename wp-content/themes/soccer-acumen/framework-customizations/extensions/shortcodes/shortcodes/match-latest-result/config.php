<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg = array(
	'page_builder' => array(
		'title' => esc_html__('Match latest results', 'soccer-acumen'),
		'description' => esc_html__('Display match latest results', 'soccer-acumen'),
		'tab' => esc_html__('Soccer Acumen', 'soccer-acumen'),
		'popup_size' => 'small' // can be large, medium or small
	)
);