<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $posts_per_page;

if (empty($product) || !$product->exists()) {
    return;
}


$related = $product->get_related($posts_per_page);

if (sizeof($related) == 0)
    return;
$args = apply_filters('woocommerce_related_products_args', array(
    'post_type' => 'product',
    'ignore_sticky_posts' => 1,
    'no_found_rows' => 1,
    'posts_per_page' => $posts_per_page,
    'orderby' => $orderby,
    'post__in' => $related,
    'post__not_in' => array($product->id)
        ));

$products = new WP_Query($args);

$woocommerce_loop['columns'] = $columns;
$flag = fw_unique_increment();
if ($products->have_posts()) :
    ?>
    <div class="tg-section-head">
        <div class="tg-section-heading">
            <h2><?php esc_html_e('Related products', 'soccer-acumen'); ?></h2>
        </div>
    </div>
    <div class="tg-youmayalsolike">
        <div id="tg-relatedproductslider-<?php echo esc_attr($flag); ?>" class="tg-relatedproductslider">
            <div class="swiper-wrapper">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <?php woocommerce_get_template('layouts/related-slider.php'); ?>
                <?php endwhile; // end of the loop.  ?>
            </div>
            <div class="tg-fullcontrol">
                <div class="tg-themebtnprev"><span class="fa fa-angle-left"></span></div>
                <div class="swiper-pagination tg-pagination-slider"></div>
                <div class="tg-themebtnnext"><span class="fa fa-angle-right"></span></div>
            </div>

        </div>
        <script>
            jQuery(document).ready(function (e) {
                /*------------------------------------------
                 RELATED PRODUCT SLIDER
                 ------------------------------------------*/
                var swiper = new Swiper('#tg-relatedproductslider-<?php echo esc_js($flag); ?>', {
                    slidesPerView: 3,
                    spaceBetween: 30,
					speed:2000,
                    mousewheelControl: true,
                    paginationType: 'fraction',
                    nextButton: '.tg-themebtnnext',
                    prevButton: '.tg-themebtnprev',
                    pagination: '.swiper-pagination',
                });
            });
        </script>
    </div>

    <?php
endif;
wp_reset_postdata();
