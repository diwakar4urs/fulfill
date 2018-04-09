<?php
/**
 * @Class footers
 *
 */
if (!class_exists('soccer_acumen_footers')) {

    class soccer_acumen_footers {

        function __construct() {
            add_action('soccer_acumen_init_footers', array(&$this, 'soccer_acumen_init_footers'));
        }

        /**
         * @Init footers
         * @return {}
         */
        public function soccer_acumen_init_footers() {
            $footer_copyright = '&copy;' . date('Y') . esc_html__(' | All Rights Reserved ', 'soccer-acumen') . get_bloginfo();
            $enable_widget_area = '';
            $enable_menu = '';
            $texture_background = '';
            $footer_bg = '';
			$header_type = '';

            if (function_exists('fw_get_db_settings_option')) {
                $enable_widget_area = fw_get_db_settings_option('enable_widget_area', $default_value = null);
                $footer_bg = fw_get_db_settings_option('footer_bg', $default_value = null);
                $texture_background = fw_get_db_settings_option('texture_background', $default_value = null);
                $copyright = fw_get_db_settings_option('footer_copyright', $default_value = null);
                $enable_menu = fw_get_db_settings_option('enable_menu', $default_value = null);
                $footer_copyright = !empty($copyright) ? $copyright : $footer_copyright;
				$header_type = fw_get_db_settings_option('header_type');       
            }

			$enable_registration	= !empty( $header_type['header_v1']['top_bar']['enable']['registration'] ) ? $header_type['header_v1']['top_bar']['enable']['registration'] : '';
			$enable_login	= !empty( $header_type['header_v1']['top_bar']['enable']['registration'] ) ? $header_type['header_v1']['top_bar']['enable']['enable_login'] : '';
            ?>
            </main>
            <?php if ($enable_login == 'enable' && !is_user_logged_in()) { ?>
            <div class="tg-modalbox modal fade login-modalbox" id="tg-login" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="tg-modal-content">
                        <div class="tg-formarea">
                            <div class="tg-border-heading">
                                <h3><?php esc_html_e('Login','soccer-acumen');?></h3>
                            </div>
                            <form class="tg-loginform do-login-form" method="post">
                                <fieldset>
                                       <div class="login-message alert alert-info construction-ajax-message elm-display-none"></div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="username/email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="rememberme" class="checkbox">
                                            <em><?php esc_html_e('Remember Me','soccer-acumen');?></em>
                                        </label>
                                        <a href="#">
                                            <em><?php esc_html_e('Forgot Password','soccer-acumen');?></em>
                                            <i class="fa fa-question-circle"></i>
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <button class="tg-btn tg-btn-lg do-login-button" type="submit"><?php esc_html_e('Login Now','soccer-acumen');?></button>
                                    </div>
                                    <div class="tg-description">
                                        <p><?php esc_html_e('Not a Member?','soccer-acumen');?> <a href="javascript:;" class="register-me"><?php esc_html_e('Signup','soccer-acumen');?></a></p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <?php }?>
            <?php if ($enable_registration == 'enable' && !is_user_logged_in()) { ?>
            <div class="tg-modalbox modal fade signup-modalbox" id="tg-register" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="tg-modal-content">
                        <div class="tg-formarea">
                            <div class="tg-border-heading">
                                <h3><?php esc_html_e('Signup','soccer-acumen');?></h3>
                            </div>
                            <form class="tg-loginform do-registration-form" method="post">
                                <fieldset>
                                     <div class="registration-message alert alert-info construction-ajax-message elm-display-none"></div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="retypepassword" class="form-control" placeholder="match-password">
                                    </div>
                                    <div class="form-group">
                                        <div class="tg-note">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <span><?php esc_html_e('We will email you your password.','soccer-acumen');?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="tg-btn tg-btn-lg do-register-button" type="submit"><?php esc_html_e('Signup','soccer-acumen');?></button>
                                    </div>
                                    <div class="tg-description">
                                        <p><?php esc_html_e('Already have an account?','soccer-acumen');?> <a href="javascript:;" class="login-me"><?php esc_html_e('Login','soccer-acumen');?></a></p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <footer id="tg-footer" class="tg-footer tg-haslayout">
                <?php if (isset($enable_widget_area) && $enable_widget_area === 'on') { ?>
                    <div class="tg-haslayout tg-footerinfobox">
                        <?php if (!empty($texture_background['url'])) { ?>
                            <div class="tg-bgboxone" style="background-image:url(<?php echo esc_url($texture_background['url']); ?>)"></div>
                        <?php } ?>
                        <?php if (!empty($footer_bg['url'])) { ?>
                            <div class="tg-bgboxtwo" style="background-image:url(<?php echo esc_url($footer_bg['url']); ?>)"></div>
                        <?php } ?>
                        <div class="tg-footerinfo">
                            <div class="container">
                                <div class="row">
                                    <?php if (is_active_sidebar('footer-column-1')) { ?>
                                        <div class="col-sm-4 tg-margin-bottom767">
                                            <div class="tg-footercol">
                                                <?php dynamic_sidebar('footer-column-1'); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if (is_active_sidebar('footer-column-2')) { ?>
                                        <div class="col-sm-4 tg-margin-bottom767">
                                            <div class="tg-footercol">
                                                <?php dynamic_sidebar('footer-column-2'); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if (is_active_sidebar('footer-column-3')) { ?>
                                        <div class="col-sm-4">
                                            <div class="tg-footercol">
                                                <?php dynamic_sidebar('footer-column-3'); ?>

                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="tg-footerbar">
                    <div class="container">
                        <?php if (isset($footer_copyright) && $footer_copyright != '') { ?>
                            <span class="tg-copyright"><?php echo esc_attr($footer_copyright); ?></span>
                        <?php } ?>
                        <?php if (isset($enable_menu) && $enable_menu === 'on') { ?>
                            <nav class="tg-footernav">
                                <?php
                                	soccer_acumen_headers::soccer_acumen_prepare_navigation('footer-menu', '', 'tg-footer-nav pull-right', '0');
                                ?>
                            </nav>
                        <?php } ?>
                    </div>
                </div>

            </footer>
            </div>
            <?php
        }

    }

    new soccer_acumen_footers();
}