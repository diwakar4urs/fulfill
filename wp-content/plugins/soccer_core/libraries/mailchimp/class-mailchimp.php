<?php
if (!class_exists('Soccer_MailChimp')) {

    class Soccer_MailChimp {

        function __construct() {
            add_action('wp_ajax_nopriv_soccer_acumen_mailchimp_form', array(&$this, 'soccer_acumen_mailchimp_form'));
            add_action('wp_ajax_soccer_acumen_mailchimp_form', array(&$this, 'soccer_acumen_mailchimp_form'));
            add_action('wp_ajax_nopriv_subscribe_mailchimp', array(&$this, 'soccer_acumen_subscribe_mailchimp'));
            add_action('wp_ajax_subscribe_mailchimp', array(&$this, 'soccer_acumen_subscribe_mailchimp'));
        }

        public function soccer_acumen_mailchimp_form() {
            $counter = 0;
            $footer_text = '';
            $mailchimp = '';
            if (function_exists('fw_get_db_settings_option')) :
                $footer_text = fw_get_db_settings_option('mailchimp_title');
                $mailchimp = fw_get_db_settings_option('mailchimp_list');

            endif;
            $counter++;
            ?>
            <div class="form-group">
                <div id="newsletter_<?php echo intval($counter); ?>" class="mailchimp-message"></div> 
                <form class="signup-newletter tg-form-newsletter tg-haslayout comingsoon-newsletter tg-newsletter tg-searcharea tg-haslayout" id="mailchimpwidget_<?php echo intval($counter); ?>">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="<?php esc_attr_e('Email', 'soccer-acumen'); ?>">
                        </div>
                      
                        <button type="button" class="tg-btn tg-btn-sm subscribe_me" data-counter="<?php echo intval($counter); ?>"><?php esc_attr_e('Submit', 'soccer-acumen'); ?></button>
                    </fieldset>
                </form>
                <div id="newsletter_message_<?php echo intval($counter); ?>" class="mailchimp-error tg-haslayout elm-display-none"><div class="mailchimp-message"></div></div>
                <script>
                    jQuery(document).ready(function (e) {
                        jQuery(document).on('click', '.subscribe_me', function (event) {
                            'use strict';
                            event.preventDefault();
                            $ = jQuery;
                            
							var _this = jQuery(this);
                            var counter = jQuery(this).data('counter');
                            
							jQuery(_this).append("<i class='fa fa-refresh fa-spin'></i>");
                            jQuery('#newsletter_message_' + counter).hide();
                            jQuery('#newsletter_message_' + counter + " .mailchimp-message").removeClass('alert alert-success');
                            jQuery('#newsletter_message_' + counter + " .mailchimp-message").removeClass('alert alert-danger');

                            jQuery.ajax({
                                type: 'POST',
                                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                                data: jQuery('.comingsoon-newsletter').serialize() + '&action=subscribe_mailchimp',
                                dataType: "json",
                                success: function (response) {
                                    _this.find('.fa-refresh').remove();
									
									if (response.type == 'success') {
                                        jQuery('#newsletter_message_' + counter + " .mailchimp-message").addClass('alert alert-success');
                                        jQuery('#mailchimpwidget_' + counter).get(0).reset();
                                        jQuery('#newsletter_message_' + counter).fadeIn(600);
                                        jQuery('#newsletter_message_' + counter + " .mailchimp-message").html(response.message);
                                        jQuery('#newsletter_' + counter).html('');

                                    } else {
                                        jQuery('#newsletter_message_' + counter + " .mailchimp-message").addClass('alert alert-danger');
                                        jQuery('#newsletter_message_' + counter).fadeIn(600);
                                        jQuery('#newsletter_message_' + counter + " .mailchimp-message").html(response.message);
                                        jQuery('#newsletter_' + counter).html('');

                                    }

                                }
                            });
                        });
                    });

                </script>
            </div>
            <?php
        }

        /**
         * @get Mail chimp list
         *
         */
        public function soccer_acumen_mailchimp_list($apikey) {
            $MailChimp = new Soccer_OATH_MailChimp($apikey);
            $mailchimp_list = $MailChimp->soccer_acumen_call('lists/list');
            return $mailchimp_list;
        }

        /**
         * @get Mail chimp list
         *
         */
        public function soccer_acumen_subscribe_mailchimp() {
            global $counter;
            $mailchimp_key = '';
            $mailchimp_list = '';
            $json = array();

            if (function_exists('fw_get_db_settings_option')) :
                $mailchimp_key = fw_get_db_settings_option('mailchimp_key');
                $mailchimp_list = fw_get_db_settings_option('mailchimp_list');
            endif;

            if (isset($_POST['email']) && !empty($_POST['email']) and $mailchimp_key != '') {
                if ($mailchimp_key <> '') {
                    $MailChimp = new Soccer_OATH_MailChimp($mailchimp_key);
                }

                $email = $_POST['email'];

                if (isset($_POST['fname']) && !empty($_POST['fname'])) {
                    $fname = $_POST['fname'];
                } else {
                    $fname = '';
                }

                if (isset($_POST['lname']) && !empty($_POST['lname'])) {
                    $lname = $_POST['lname'];
                } else {
                    $lname = '';
                }

                if (empty($mailchimp_list)) {
                    $json['type'] = 'error';
                    $json['message'] = esc_html__('No list selected yet! please contact administrator', 'soccer-acumen');
                    die;
                }
                //https://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php
                $result = $MailChimp->soccer_acumen_call('lists/subscribe', array(
                    'id' => $mailchimp_list,
                    'email' => array('email' => $email),
                    'merge_vars' => array('FNAME' => $fname, 'LNAME' => $lname),
                    'double_optin' => false,
                    'update_existing' => false,
                    'replace_interests' => false,
                    'send_welcome' => true,
                ));
                if ($result <> '') {
                    if (isset($result['status']) and $result['status'] == 'error') {
                        $json['type'] = 'error';
                        $json['message'] = $result['error'];
                    } else {
                        $json['type'] = 'success';
                        $json['message'] = esc_html__('Subscribe Successfully', 'soccer-acumen');
                    }
                }
            } else {
                $json['type'] = 'error';
                $json['message'] = esc_html__('Some error occur, Please try again later.', 'soccer-acumen');
            }
            echo json_encode($json);
            die();
        }

    }

    new Soccer_MailChimp();
}