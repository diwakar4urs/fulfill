<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Heading Title', 'soccer-acumen' ),
		'desc'  => esc_html__( 'Write the heading title content', 'soccer-acumen' ),
	),
	'description'    => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Description', 'soccer-acumen' ),
		'desc'  => esc_html__( 'Write the Description content', 'soccer-acumen' ),
	),
);
