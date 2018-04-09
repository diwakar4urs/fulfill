<?php

if (!defined('FW')) {
    die('Forbidden');
}


if (function_exists('soccer_acumen_mailchimp_list')) {
	$list	= soccer_acumen_mailchimp_list();
} else{
	$list	= array();
}

$options = array(
    'api_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Api Settings', 'soccer-acumen'),
        'options' => array(
            'mailchimp' => array(
                'title' => esc_html__('Mail Chimp', 'soccer-acumen'),
                'type' => 'tab',
                'options' => array(
                    'mailchimp_key' => array(
                        'type' => 'text',
                        'value' => 'b1c640ffabcea48f48530987ffdae147-us11',
                        'label' => esc_html__('MailChimp Key', 'soccer-acumen'),
                        'desc' => esc_html__('Enter your MailChimp Key Here. Default: b1c640ffabcea48f48530987ffdae147-us11', 'soccer-acumen'),
                    ),
                    'mailchimp_list' => array(
                        'type' => 'select',
                        'label' => esc_html__('MailChimp List', 'soccer-acumen'),
                        'choices' => $list,
                    )
                )
            ),
            'google' => array(
                'title' => esc_html__('Google Key', 'soccer-acumen'),
                'type' => 'tab',
                'options' => array(
                    'google_key' => array(
                        'type' => 'text',
                        'value' => 'b1c640ffabcea48f48530987ffdae147-us11',
                        'label' => esc_html__('Google Map Key', 'soccer-acumen'),
                        'desc' => esc_html__('Enter your Google Key Here.', 'soccer-acumen'),
                    ),
                ),
            )
        )
    )
);


