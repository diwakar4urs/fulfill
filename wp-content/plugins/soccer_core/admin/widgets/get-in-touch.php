<?php
if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}

if (!class_exists('TG_Address_Widget')) {

    class TG_Address_Widget extends WP_Widget {
        /*
         * @init About Ecomatics
         * 
         */

        public function __construct() {
            $widget_ops = array('classname' => 'address-column', 'description' => 'Display Address Widget');
            $control_ops = array('width' => 300, 'height' => 250, 'id_base' => 'address_widget');
            parent::__construct('address_widget', esc_html__('Soccer Acumen Address Widget', 'soccer-acumen'), $widget_ops, $control_ops);
        }

        /**
         * About Ecomatics form
         *
         */
        public function form($instance) {
            $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
            $image = empty($instance['image']) ? '' : $instance['image'];
            $description = isset($instance['description']) ? esc_attr($instance['description']) : '';
            $address = isset($instance['address']) ? esc_attr($instance['address']) : '';
            $email = isset($instance['email']) ? esc_attr($instance['email']) : '';
            $phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
            $button = isset($instance['button']) ? esc_attr($instance['button']) : '';
            $link = isset($instance['link']) ? esc_attr($instance['link']) : '';
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'soccer-acumen'); ?></label>
                <input type="text" id="title" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e('Image:', 'soccer-acumen'); ?></label>
                <input type="text" id="image" name="<?php echo esc_attr($this->get_field_name('image')); ?>" value="<?php echo esc_attr($image); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:', 'soccer-acumen'); ?></label>
                <textarea id="description" name="<?php echo esc_attr($this->get_field_name('description')); ?>"  class="widefat" ><?php echo esc_attr($description); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'soccer-acumen'); ?></label>
                <textarea id="address" name="<?php echo esc_attr($this->get_field_name('address')); ?>"  class="widefat" ><?php echo esc_attr($address); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'soccer-acumen'); ?></label>
                <textarea id="email" name="<?php echo esc_attr($this->get_field_name('email')); ?>" class="widefat" ><?php echo esc_attr($email); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'soccer-acumen'); ?></label>
                <textarea id="phone" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" class="widefat"><?php echo esc_attr($phone); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('button')); ?>"><?php esc_html_e('Button Name:', 'soccer-acumen'); ?></label>
                <input type="text" id="button" name="<?php echo esc_attr($this->get_field_name('button')); ?>" value="<?php echo esc_attr($button); ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Url:', 'soccer-acumen'); ?></label>
                <input type="text" id="link" name="<?php echo esc_attr($this->get_field_name('link')); ?>" value="<?php echo esc_attr($link); ?>" class="widefat" />
            </p>

            <?php
        }

        /**
         * @Update About Ecomatics 
         *
         */
        public function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
            $instance['image'] = (!empty($new_instance['image']) ) ? $new_instance['image'] : '';
            $instance['description'] = (!empty($new_instance['description']) ) ? $new_instance['description'] : '';
            $instance['address'] = (!empty($new_instance['address']) ) ? $new_instance['address'] : '';
            $instance['email'] = (!empty($new_instance['email']) ) ? strip_tags($new_instance['email']) : '';
            $instance['phone'] = (!empty($new_instance['phone']) ) ? $new_instance['phone'] : '';
            $instance['button'] = (!empty($new_instance['button']) ) ? $new_instance['button'] : '';
            $instance['link'] = (!empty($new_instance['link']) ) ? $new_instance['link'] : '';

            return $instance;
        }

        /**
         * @Display About Ecomatics 
         *
         *
         */
        public function widget($args, $instance) {
            extract($args);
            $title = empty($instance['title']) ? '' : $instance['title'];
            $image = empty($instance['image']) ? '' : $instance['image'];
            $description = empty($instance['description']) ? '' : $instance['description'];
            $address = empty($instance['address']) ? '' : $instance['address'];
            $email = empty($instance['email']) ? '' : $instance['email'];
            $phone = empty($instance['phone']) ? '' : $instance['phone'];
            $button = empty($instance['button']) ? '' : $instance['button'];
            $link = empty($instance['link']) ? '' : $instance['link'];

            echo ($args['before_widget']);

            if (!empty($title) && $title != '') {
                echo ($args['before_title'] . apply_filters('widget_title', esc_attr($title)) . $args['after_title']);
            }
            ?>
            <div class="tg-address-widget">
                <?php if (!empty($image)) { ?>
                    <div class="tg-haslayout">
                        <strong class="tg-logo">
                            <a href="javascript:;">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'soccer-acumen'); ?>">
                            </a>
                        </strong>
                    </div>
                <?php } ?>
                <?php if (!empty($description)) { ?>
                    <div class="tg-description">
                        <p><?php echo force_balance_tags($description); ?>
                    </div>
                <?php } ?>
                <?php if (!empty($address) || !empty($email) || !empty($phone)) { ?>
                    <ul class="tg-contactinfo">
                        <?php if (!empty($address)) { ?>
                            <li>
                                <i class="fa fa-home"></i>
                                <address><?php echo force_balance_tags($address); ?></address>
                            </li>
                        <?php } ?>
                        <?php if (!empty($email)) { ?>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <a href="mailto:<?php echo esc_attr($email); ?>?Subject=<?php esc_html_e('Hello','soccer_core');?>"><?php echo esc_attr($email); ?></a>
                            </li>
                        <?php } ?>
                        <?php if (!empty($phone)) { ?>
                            <li>
                                <i class="fa fa-phone"></i>
                                <span><a href="tel:<?php echo force_balance_tags($phone); ?>"><?php echo force_balance_tags($phone); ?></a></span>
                            </li>
                        <?php } ?>

                    </ul>
                <?php } ?>
                <?php if (!empty($button) || !empty($link)) { ?>
                    <div class="tg-haslayout">
                        <a class="tg-btn" href="<?php echo esc_url($link); ?>"><?php echo esc_attr($button); ?></a>
                    </div>
                <?php } ?>
            </div>
            <?php
            echo ($args['after_widget']);
        }

    }

}
add_action('widgets_init', create_function('', 'return register_widget("TG_Address_Widget");'));
