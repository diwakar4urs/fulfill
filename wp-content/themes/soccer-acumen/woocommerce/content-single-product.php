<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (function_exists('soccer_acumen_init_owl_script')) {

    soccer_acumen_init_owl_script();
}
if (function_exists('fw_get_db_settings_option')) {

    $enable_sidebar = fw_get_db_settings_option('enable_sidebar_detail');
    $enable_related_product = fw_get_db_settings_option('enable_related_product');
    $sidebar_position = fw_get_db_settings_option('detail_sidebar_position');
    $is_sidebar = isset($enable_sidebar) && $enable_sidebar === 'on' ? 'on' : 'off';
    $content_div = isset($enable_sidebar) && $enable_sidebar === 'on' ? 'col-md-9 col-sm-8 col-xs-12' : 'col-md-12 col-sm-12 col-xs-12';
    $sidebar_position = $sidebar_position;
} else {
    $content_div = 'col-md-12 col-sm-12 col-xs-12';
    $is_sidebar = 'off';
    $sidebar_position = 'left';
}

if (isset($sidebar_position) && $sidebar_position == 'right') {
    $content_div = $content_div . ' pull-left';
    $sidebar_position = ' pull-right';
} else {
    $content_div = $content_div . ' pull-right';
    $sidebar_position = ' pull-left';
}
?>
<div class="container">
    <div class="row">
        <div id="tg-twocolumns" class="tg-twocolumns tg-main-section tg-haslayout">
            <div class="<?php echo esc_attr($content_div); ?> mec-product-detail">
                <div class="tg-product tg-productdetail">
                    <div class="row">
                        <?php
                        /**
                         * woocommerce_before_single_product hook
                         *
                         * @hooked wc_print_notices - 10
                         */
                        do_action('woocommerce_before_single_product');

                        if (post_password_required()) {
                            echo get_the_password_form();
                            return;
                        }
                        ?>
                        <div class="col-sm-4 ">
                            <?php
                            /**
                             * woocommerce_before_single_product_summary hook.
                             *
                             * @hooked woocommerce_show_product_sale_flash - 10
                             * @hooked woocommerce_show_product_images - 20
                             */
                            do_action('woocommerce_before_single_product_summary');
                            ?>         
                        </div>
                        <div class="col-sm-8">
                            <div class="tg-productinfo">
                                <?php
                                /**
                                 * woocommerce_single_product_summary hook
                                 *
                                 * @hooked woocommerce_template_single_title - 5
                                 * @hooked woocommerce_template_single_rating - 10
                                 * @hooked woocommerce_template_single_price - 10
                                 * @hooked woocommerce_template_single_excerpt - 20
                                 * @hooked woocommerce_template_single_add_to_cart - 30
                                 * @hooked woocommerce_template_single_meta - 40
                                 * @hooked woocommerce_template_single_sharing - 50
                                 */
                                do_action('woocommerce_single_product_summary');
                                ?>
                            </div>
                        </div>
                        <!-- .summary --> 
                    </div>
                </div>   
                <div class="tg-themetabs">
                    <div class="tg-product-tabs-holder">
                        <?php
                        /**
                         * woocommerce_after_single_product_summary hook
                         *
                         * @hooked woocommerce_output_product_data_tabs - 10
                         * @hooked woocommerce_upsell_display - 15
                         * @hooked woocommerce_output_related_products - 20
                         */
                        do_action('woocommerce_after_single_product_summary');
                        ?>
                        <?php do_action('woocommerce_after_single_product'); ?>
                    </div>
                </div>
                 <?php 
                 if(isset($enable_related_product) && $enable_related_product === 'on'){
                 do_action('soccer_related_products'); 
                 
                 }
                 ?>
            </div>
            <?php if (isset($is_sidebar) && $is_sidebar === 'on') { ?>
                <div id="sidebar" class="col-md-3 col-sm-4 col-xs-12 aside tg-woocommerce <?php echo esc_attr($sidebar_position); ?>">
                    <aside id="tg-sidebar" class="tg-sidebar tg-sidebar-woocommerce tg-haslayout">
                        <?php
                        if (is_woocommerce()) {
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("shop_sidebar")) : endif;
                        }
                        ?>
                    </aside>
                </div>
            <?php } ?>

        </div>
    </div>
</div>