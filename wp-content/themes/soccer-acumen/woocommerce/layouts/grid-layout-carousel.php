<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

global $product, $woocommerce_loop ,$post;

// Store loop count we're currently on
if (empty($woocommerce_loop['loop']))
    $woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if (empty($woocommerce_loop['columns']))
    $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);

// Ensure visibility
if (!$product || !$product->is_visible())
    return;

// Increase loop count
$woocommerce_loop['loop'] ++;

// Extra post classes
$classes = array();
if (0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'])
    $classes[] = 'first';
if (0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'])
    $classes[] = 'last';

$price = $product->price;
$bootstrapColumn = round(12 / $woocommerce_loop['columns']);
$classes = 'col-md-3 col-sm-6 col-xs-6';

$categories_array = array();
$categories = get_the_terms($post->ID, 'product_cat');
if (is_array($categories)) {
	foreach ($categories as $category) {
		$categories_array[$category->slug] = $category->slug;
	}
}

?>
<div class="<?php echo esc_attr($classes); ?> tg-productwidth portfolio-item <?php echo implode(' ', $categories_array); ?>">
    <div class="tg-product">
        <?php woocommerce_get_template('loop/sale-flash.php'); ?>
        <figure>
            <?php
           	 echo apply_filters('_prepare_post_thumbnail', 
					 get_the_post_thumbnail($post->ID, 'soccer-acumen_shop_grid'), 
					 array('width' => 270, 'height' => 308)
             );
            ?>
            <figcaption class="tg-img-hover">
                <a class="tg-btn" href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('buy now', 'soccer-acumen'); ?></a>
                <?php
					/**
					 * woocommerce_after_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					woocommerce_get_template('loop/rating.php');
                ?>

            </figcaption>
        </figure>
        <div class="tg-product-info">
            <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
            <div class="tg-cart-price">
                <?php do_action('soccer-acumen_woocommerce_add_to_cart_slider_button'); ?>
                <?php if ($price_html = $product->get_price_html()) : ?><a class="tg-price"><?php echo force_balance_tags($price_html); ?></a><?php endif; ?>
            </div>
        </div>
    </div>
</div>
