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

global $product, $woocommerce_loop, $post;

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

$listing_view = '';
if (function_exists('fw_get_db_settings_option')) {
	$enable_sidebar = fw_get_db_settings_option('enable_sidebar');
	$is_sidebar = isset($enable_sidebar) && $enable_sidebar === 'on' ? 'on' : 'off';
	$classes = isset($enable_sidebar) && $enable_sidebar === 'on' ? 'col-md-4 col-sm-6 col-xs-6' : 'col-md-3 col-sm-6 col-xs-6';
} else {
	$classes = 'col-md-3 col-sm-6 col-xs-6';
}


if( is_active_sidebar('shop_sidebar') && isset( $is_sidebar ) && $is_sidebar === 'on' ){
	$classes = 'col-md-4 col-sm-6 col-xs-6';
} else{
	$classes = 'col-md-3 col-sm-6 col-xs-6';
}
?>
<div class="<?php echo esc_attr($classes); ?>">
    <div class="tg-product">
        <?php woocommerce_get_template('loop/sale-flash.php'); ?>
        <figure class="tg-productimg">
            <?php
            	echo apply_filters('_prepare_post_thumbnail', 
						get_the_post_thumbnail($post->ID, 'soccer_acumen_shop_image_size'), 
						array('width' => 272, 'height' => 415)
            		);
            ?>
            <figcaption>
                <?php do_action('soccer_woocommerce_add_to_cart_slider_button'); ?>
            </figcaption>
        </figure>
        <div class="tg-productinfo">
            <?php
            $product_cat = get_the_terms($post->ID, 'product_cat');
            if(!empty($product_cat)){
				foreach ($product_cat as $term) {
            ?>
            	<a class="tg-theme-tag" href="<?php echo get_term_link($term->slug, 'product_cat') ?>"><?php echo esc_attr($term->name); ?></a>
            <?php  }} ?>
            <div class="tg-producttitle"><h2><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title(); ?></a></h2></div>
            <?php if ($price_html = $product->get_price_html()) : ?>
            	<div class="tg-productprice"><h3><?php echo force_balance_tags($price_html); ?></h3></div>
			<?php endif; ?>
			<?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                woocommerce_get_template('loop/rating.php');
            ?>
        </div>
    </div>
</div>
