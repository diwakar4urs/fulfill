<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'contactform_settings' => array(
        'type' => 'tab',
        'title' => esc_html__('Contact Form', 'soccer-acumen'),
        'options' => array(
            'contactform-box' => array(
                'title' => esc_html__('Contact Form Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    'success_msg' => array(
                        'type' => 'text',
                        'label' => esc_html__('Success Message', 'soccer-acumen'),
                        'value' => 'Your message has sent, You will be inform soon.',
                        'desc' => esc_html__('Add success message for contact form', 'soccer-acumen'),
                    ),
                    'error_message' => array(
                        'type' => 'text',
                        'label' => esc_html__('Error Message', 'soccer-acumen'),
                        'value' => 'Some error occur, please try again later.',
                        'desc' => esc_html__('Add error message for contact form', 'soccer-acumen'),
                    ),
                    'email_to' => array(
                        'type' => 'text',
                        'label' => esc_html__('Email Address', 'soccer-acumen'),
                        'value' => '',
                        'desc' => esc_html__('Please add email address for contact form. Leave it empty to send email to WordPress site admin.', 'soccer-acumen'),
                    ),
                )
            ),
        )
    )
);
