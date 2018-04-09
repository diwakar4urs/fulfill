<?php
/**
 * @ Hooks
 * @ return {}
 */


/**
 * @Wp Login
 * @return 
 */
if (!function_exists('soccer_acumen_ajax_login')) {

    function soccer_acumen_ajax_login() {

        $user_array = array();
        $user_array['user_login'] = esc_sql($_POST['username']);
        $user_array['user_password'] = esc_sql($_POST['password']);

        if (isset($_POST['rememberme'])) {
            $remember = esc_sql($_POST['rememberme']);
        } else {
            $remember = '';
        }

        if ($remember) {
            $user_array['remember'] = true;
        } else {
            $user_array['remember'] = false;
        }

        if ($user_array['user_login'] == '') {
            echo json_encode(array('type' => 'error', 'loggedin' => false, 'message' => esc_html__('User name should not be empty.', 'soccer-acumen')));
            exit();
        } elseif ($user_array['user_password'] == '') {
            echo json_encode(array('type' => 'error', 'loggedin' => false, 'message' => esc_html__('Password should not be empty.', 'soccer-acumen')));
            exit();
        } else {
            $status = wp_signon($user_array, false);
            if (is_wp_error($status)) {
                echo json_encode(array('type' => 'error', 'loggedin' => false, 'message' => esc_html__('Wrong username or password.', 'soccer-acumen')));
            } else {
                echo json_encode(array('type' => 'success', 'url' => esc_url(home_url('/')), 'loggedin' => true, 'message' => esc_html__('Successfully Login', 'soccer-acumen')));
            }
        }

        die();
    }

    add_action('wp_ajax_soccer_acumen_ajax_login', 'soccer_acumen_ajax_login');
    add_action('wp_ajax_nopriv_soccer_acumen_ajax_login', 'soccer_acumen_ajax_login');
}

/**
 * @Wp Registration
 * @return 
 */
if (!function_exists('soccer_acumen_user_registration')) {

    function soccer_acumen_user_registration($atts = '') {
        global $wpdb;

        $username = esc_sql($_POST['username']);
        $terms = $_POST['terms'];
        $password = esc_sql($_POST['password']);
        $confirm_password = esc_sql($_POST['retypepassword']);

        $json = array();

        if (empty($username)) {
            $json['type'] = "error";
            $json['message'] = "User name should not be empty.";
            echo json_encode($json);
            exit();
        }

        if (empty($password)) {
            $json['type'] = "error";
            $json['message'] = "Password is required.";
            echo json_encode($json);
            exit();
        }

        if ($password != $confirm_password) {
            $json['type'] = "error";
            $json['message'] = esc_html__("Password is not matched.", 'soccer-acumen');
            echo json_encode($json);
            exit();
        }

        $email = esc_sql($_POST['email']);
        if (empty($email)) {
            $json['type'] = "error";
            $json['message'] = esc_html__("Email should not be empty.", 'soccer-acumen');
            echo json_encode($json);
            exit();
        }

        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {

            $json['type'] = "error";
            $json['message'] = esc_html__("Please enter a valid email.", 'soccer-acumen');
            echo json_encode($json);
            die;
        }

        $random_password = $password;

        $role = 'subscriber';

        $status = wp_create_user($username, $random_password, $email);
        if (is_wp_error($status)) {
            $json['type'] = "error";
            $json['message'] = esc_html__("User already exists. Please try another one.", 'soccer-acumen');
            echo json_encode($json);
            die;
        } else {
            global $wpdb;
            wp_update_user(array('ID' => esc_sql($status), 'role' => esc_sql($role), 'user_status' => 1));
            $wpdb->update(
                    $wpdb->prefix . 'users', array('user_status' => 1), array('ID' => esc_sql($status))
            );
            update_user_meta($status, 'show_admin_bar_front', false);
            wp_new_user_notification(esc_sql($status), $random_password);
            $json['type'] = "success";
            $json['message'] = esc_html__("You are registered now.Please check your email for login details.", "soccer-acumen");
            echo json_encode($json);
            die;
        }
        die();
    }

    add_action('wp_ajax_soccer_acumen_user_registration', 'soccer_acumen_user_registration');
    add_action('wp_ajax_nopriv_soccer_acumen_user_registration', 'soccer_acumen_user_registration');
}


/**
 * @User Profile Social Icons
 * @return 
 */
if (!function_exists('soccer_acumen_user_social_mehthods')) {

    function soccer_acumen_user_social_mehthods($userid) {
        $userfields['facebook'] = 'Facebook';
        $userfields['twitter'] = 'Twitter';
        $userfields['linkedin'] = 'Linkedin';
        $userfields['pinterest'] = 'Pinterest';
        $userfields['google_plus'] = 'Google Plus';
        $userfields['instagram'] = 'Instagram';
        $userfields['tumblr'] = 'Tumblr';
        $userfields['skype'] = 'Skype';
        return $userfields;
    }

    add_filter('user_contactmethods', 'soccer_acumen_user_social_mehthods', 10, 1);
}

/**
 * @submit contact
 * @return 
 */
if (!function_exists('soccer_acumen_submit_contact')) {

    function soccer_acumen_submit_contact() {
        global $current_user;

        $json = array();
        if (function_exists('fw_get_db_settings_option')) {
            $success_msg = fw_get_db_settings_option('success_msg');
            $error_message = fw_get_db_settings_option('error_message');
            $email_to = fw_get_db_settings_option('email_to');
        } else {
            $success_msg = '';
            $error_message = '';
            $email_to = get_option('admin_email', 'info@themographics.com');
        }

        $do_check = check_ajax_referer('soccer_acumen_submit_contact', 'contact_security', false);
        if ($do_check == false) {
            $json['type'] = 'error';
            $json['message'] = esc_html__('No kiddies please!', 'soccer-acumen');
            echo json_encode($json);
            die;
        }

        $bloginfo = get_bloginfo();
        $email_subject = "(" . $bloginfo . ") Contact Form Received";

        $success_message = !empty($success_msg) ? $success_msg : esc_html__('Email sent.', 'soccer-acumen');
        ;
        $error_message = !empty($error_message) ? $error_message : esc_html__('Email faild.', 'soccer-acumen');
        ;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form fields and remove whitespace.
            if ($_POST['username'] == '' ||
                    $_POST['useremail'] == '' ||
                    $_POST['subject'] == '' ||
                    $_POST['description'] == ''
            ) {
                $json['type'] = 'error';
                $json['message'] = esc_html__('Please fill all the fields', 'soccer-acumen');
                echo json_encode($json);
                die;
            }

            if (!soccer_acumen_isValidEmail($_POST['useremail'])) {
                $json['type'] = 'error';
                $json['message'] = esc_html__('Email address is not valid.', 'soccer-acumen');
                echo json_encode($json);
                die;
            }

            $username = $_POST['username'];
            $email = $_POST['useremail'];
            $subject = $_POST['subject'];
            $message = $_POST['description'];

            if (class_exists('SoccerAcumenProcessEmail')) {
                $email_helper = new SoccerAcumenProcessEmail();
                $emailData = array();
                $emailData['name'] = $username;
                $emailData['email'] = $email;
                $emailData['email_subject'] = $email_subject;
                $emailData['subject'] = $subject;
                $emailData['message'] = $message;
                $emailData['email_to'] = $email_to;
                $email_helper->process_contact_form($emailData);
            }

            $json['type'] = "success";
            $json['message'] = esc_attr($success_msg);
            echo json_encode($json);
            die();
        } else {
            // Not a POST request, set a 403 (forbidden) response code.
            // http_response_code(403);
            echo
            $json['type'] = "error";
            $json['message'] = esc_attr($error_message);
            echo json_encode($json);
            die();
        }
    }

    add_action('wp_ajax_soccer_acumen_submit_contact', 'soccer_acumen_submit_contact');
    add_action('wp_ajax_nopriv_soccer_acumen_submit_contact', 'soccer_acumen_submit_contact');
}

/**
 * @Validaet Email
 * @return {}
 */
if (!function_exists('soccer_acumen_isValidEmail')) {

    function soccer_acumen_isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}

/**
 * @Mailchimp List
 * @return 
 */
if (!function_exists('soccer_acumen_mailchimp_list')) {
    function soccer_acumen_mailchimp_list() {
        $mailchimp_list[] = '';
        $mailchimp_list[0] = 'Select List';
        $mailchimp_option = '';
        if (!function_exists('fw_get_db_settings_option')) {
            $mailchimp_option = '';
        } else {
            $default_value = 'b1c640ffabcea48f48530987ffdae147-us11';

            $mailchimp_option = fw_get_db_settings_option('mailchimp_key', $default_value);
            if (isset($mailchimp_option) && !empty($mailchimp_option)) {
                $mailchimp_option = $mailchimp_option;
            } else {
                $mailchimp_option = '';
            }
        }

        if ($mailchimp_option <> '') {
            $mailchim_obj = new Soccer_MailChimp();
            $lists = $mailchim_obj->soccer_acumen_mailchimp_list($mailchimp_option);
            if (is_array($lists) && isset($lists['data'])) {
                foreach ($lists['data'] as $list) {
                    if (!empty($list['name'])) :
                        $mailchimp_list[$list['id']] = $list['name'];
                    endif;
                }
            }
        }

        return $mailchimp_list;
    }
}