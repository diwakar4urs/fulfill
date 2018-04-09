<?php
/**
 * Email Helper For Theme
 * Long Description.
 * @since    1.0.0
 */
if (!class_exists('SoccerAcumenProcessEmail')) {

    class SoccerAcumenProcessEmail {

        public function __construct() {
            add_filter('wp_mail_content_type', array(&$this, 'soccer_acumen_set_content_type'));
            //add_filter( 'wp_mail_from', array(&$this,'soccer_acumen_wp_mail_from') );
            add_filter('wp_mail_from_name', array(&$this, 'soccer_acumen_wp_mail_from_name'));
        }

        /**
         * Email Headers From
         *
         *
         * @since    1.0.0
         */
        public function soccer_acumen_wp_mail_from($email) {
            return 'info@no-reply.com';
        }

        /**
         * Email Headers From name
         *
         *
         * @since    1.0.0
         */
        public function soccer_acumen_wp_mail_from_name($name) {
            $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
            return $blogname;
        }

        /**
         * Email Content type
         *
         *
         * @since    1.0.0
         */
        public function soccer_acumen_set_content_type() {
            return "text/html";
        }

        /**
         * Get Email Header
         *
         * Return email header html
         *
         * @since    1.0.0
         */
        public function prepare_email_headers($name = '') {
            global $current_user;
            ob_start();
            ?>
            <table class="body-wrap" bgcolor="#f6f6f6" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 20px;">
                <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
                    <td style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
                    <td class="container" bgcolor="#FFFFFF" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; clear: both !important; display: block !important; max-width: 800px !important; Margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;"><!-- content -->

                        <div class="content" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; display: block; max-width: 800px; margin: 0 auto; padding: 0;">
                            <table style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 0;">
                                <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
                                    <td style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
                                        <?php
                                        return ob_get_clean();
                                    }

                                    /**
                                     * Get Email Footer
                                     *
                                     * Return email footer html
                                     *
                                     * @since    1.0.0
                                     */
                                    public function prepare_email_footers($params = '') {
                                        global $current_user;
                                        ob_start();
                                        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
                                        ?>

                                        <p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;"><?php esc_html_e('Thanks, have a lovely day.', 'soccer-acumen'); ?></p>
                                        <p style="border-top:1px dotted rgba(158, 158, 158, 0.73);font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 10px 0 0 0;">&copy;<?php echo date('Y'); ?><?php esc_html_e(' | All Rights Reserved', 'soccer-acumen'); ?> <a href="<?php echo esc_url(home_url('/')); ?>" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; color: #348eda; margin: 0; padding: 0;"><?php echo esc_attr($blogname); ?></a></p></td>
                                </tr>
                            </table>
                        </div>

                        <!-- /content --></td>
                    <td style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
                </tr>
            </table>
            <!-- /body --><!-- footer -->
            <table class="footer-wrap" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; clear: both !important; width: 100%; margin: 0; padding: 0;">
                <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
                    <td style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
                    <td style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
                </tr>
            </table>

            <?php
            return ob_get_clean();
        }

        /**
         * @Registration
         *
         * @since 1.0.0
         */
        public function process_get_logo($params = '') {
            //Get Logo
            if (function_exists('fw_get_db_settings_option')) {
                $main_logo = fw_get_db_settings_option('main_logo');
            }

            if (isset($main_logo['url']) && !empty($main_logo['url'])) {
                $logo = $main_logo['url'];
            } else {
                $logo = get_template_directory_uri() . '/images/logo.png';
            }

            return '<img width="100" src="' . esc_url($logo) . '" alt="' . esc_html__('email-header', 'soccer-acumen') . '" />';
        }

        /**
         * @Site Contact Form 
         *
         * @since 1.0.0
         */
        public function process_contact_form($params = '') {
            global $current_user;
            extract($params);

            $email_subject = !empty($email_subject) ? $email_subject : "(" . $bloginfo . ")" . esc_html__('Contact Form Received', 'soccer-acumen');
            $contact_default = 'Hello,<br/>

						A person has contact you, description of message is given below.<br/><br/>
						Subject : %subject%<br/>
						Name : %name%<br/>
						Email : %email%<br/>
						Message : %message%<br/><br/><br/>
						
						Sincerely,<br/>';


            $contact_default = str_replace("%subject%", nl2br($subject), $contact_default); //Replace Subject
            $contact_default = str_replace("%name%", nl2br($name), $contact_default); //Replace Name
            $contact_default = str_replace("%email%", nl2br($email), $contact_default); //Replace email
            $contact_default = str_replace("%message%", nl2br($message), $contact_default); //Replace message
            $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

            $attachments = '';
            $body = '';
            $body .= $this->prepare_email_headers($name);


            $body .= ' <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">' . $contact_default . '</p>';
            $body .= '<table class="btn-primary" cellpadding="0" cellspacing="0" border="0" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: auto !important; Margin: 0 0 10px; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<td style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 14px; line-height: 1.6em; border-radius: 25px; text-align: center; vertical-align: top; background: #348eda; margin: 0; padding: 0;" align="center" bgcolor="#348eda" valign="top">
                
                </td>
              </tr></table>';

            $body .= $this->prepare_email_footers();
            wp_mail($email_to, $email_subject, $body);

            return true;
        }

    }

    new SoccerAcumenProcessEmail();
}