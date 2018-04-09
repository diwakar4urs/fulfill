<?php
if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
if (!class_exists('NewsLetter')) {

    class TG_NewsLetter extends WP_Widget {

        /**
         *  @init NewsLetter
         *
         *
         */
        public function __construct() {
            $widget_ops_news = array('classname' => 'news_letter', 'description' => 'Used For News Letter.');
            $control_ops_news = array('width' => 300, 'height' => 250, 'id_base' => 'news_letter');
            parent::__construct('news_letter', esc_html__('Soccer Acumen NewsLetter Widget', 'soccer-acumen'), $widget_ops_news, $control_ops_news);
        }

        /**
         * @ NewsLetter form
         *
         *
         */
        public function form($instance) {
            $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Signup Newletter', 'soccer-acumen');
            $descrption = isset($instance['descrption']) ? esc_attr($instance['descrption']) : '';
            ?>
            <p>
                <label for="title"><?php esc_html_e('Title:', 'soccer-acumen'); ?></label>
                <input type="text" id="title" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('descrption')); ?>"><?php _e('Descrption:', 'soccer-acumen'); ?></label>
                <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('descrption')); ?>" name="<?php echo esc_attr($this->get_field_name('descrption')); ?>"><?php echo esc_html($descrption); ?></textarea>
            </p>




            <?php
        }

        /**
         * @Update NewsLetter
         *
         */
        public function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : 'NewsLetter';
            $instance['descrption'] = (!empty($new_instance['descrption']) ) ? strip_tags($new_instance['descrption']) : '';


            return $instance;
        }

        /**
         * @Display NewsLetter
         *
         *
         */
        public function widget($args, $instance) {
            extract($args);
            $counter = 0;
            $title = $instance['title'];
            $descrption = $instance['descrption'];
            $counter++;
            echo ($args['before_widget']);
            if (!empty($title)) {
                echo ($args['before_title'] . apply_filters('widget_title', esc_attr($title)) . $args['after_title']);
            }
            ?>
            <div class="tg-newsletter">
                <div id="newsletter_message_<?php echo intval($counter); ?>" class="mailchimp-error elm-display-none"><div class="mailchimp-message"></div></div>
                <?php if (!empty($descrption)) { ?>
                <div class="tg-description">
                    <?php echo esc_attr($descrption); ?>
                </div>
                <?php } ?>
                <form class="tg-form-newsletter" id="mailchimpwidget_<?php echo intval($counter); ?>">
                    <fieldset>
                        <div class="form-group">
                            <input type="email" id="email" placeholder="<?php esc_html_e('Email', 'soccer-acumen'); ?>" class="form-control" name="email">
                        </div>
                        <button class="subscribe_newsletter tg-btn" data-counter="<?php echo intval($counter); ?>"><?php esc_attr_e('subscribe', 'soccer-acumen'); ?></button>
                    </fieldset>
                </form>
                <script>
                    jQuery(document).ready(function (e) {
                        jQuery(document).on('click', '.subscribe_newsletter', function (event) {
                            'use strict';
                            event.preventDefault();
                            $ = jQuery;
                            var $this = jQuery(this);
                            var counter = jQuery(this).data('counter');
                            $this.append("<i class='fa fa-refresh fa-spin'></i>");
                            jQuery('#newsletter_message_' + counter).hide();
                            jQuery('#newsletter_message_' + counter + " .mailchimp-message").removeClass('alert alert-success');
                            jQuery('#newsletter_message_' + counter + " .mailchimp-message").removeClass('alert alert-danger');

                            jQuery.ajax({
                                type: 'POST',
                                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                                data: jQuery(this).parents('form').serialize() + '&action=subscribe_mailchimp',
                                dataType: "json",
                                success: function (response) {
                                    $this.find('i').remove();
                                    if (response.type == 'success') {
                                        jQuery('#newsletter_message_' + counter + " .mailchimp-message").addClass('alert alert-success');
                                        jQuery('#mailchimpwidget_' + counter).get(0).reset();
                                        jQuery('#newsletter_message_' + counter).show();
                                        jQuery('#newsletter_message_' + counter + " .mailchimp-message").html(response.message);
                                        jQuery('#newsletter_' + counter).html('');

                                    } else {
                                        jQuery('#newsletter_message_' + counter + " .mailchimp-message").addClass('alert alert-danger');
                                        jQuery('#newsletter_message_' + counter).show();
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
            echo ($args['after_widget']);
        }

    }

}
add_action('widgets_init', create_function('', 'return register_widget("TG_NewsLetter");'));
