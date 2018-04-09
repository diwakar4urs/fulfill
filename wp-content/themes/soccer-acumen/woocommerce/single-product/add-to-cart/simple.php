<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

if (!$product->is_purchasable()) {
    return;
}

// Availability
$availability = $product->get_availability();
$availability_html = empty($availability['availability']) ? '' : '<div class="tg-color-stock tg-haslayout"><span class="availability"><strong>'.esc_html__('Availability','soccer-acumen').':</strong><span class="stock ' . esc_attr($availability['class']) . '"> ' . esc_html($availability['availability']) . '</span></span></div>';

echo apply_filters('woocommerce_stock_html', $availability_html, $availability['availability'], $product);

if ($product->is_in_stock()) :
	   do_action('woocommerce_before_add_to_cart_form'); ?>
		<form class="cart" method="post" enctype='multipart/form-data'>
			<?php do_action('woocommerce_before_add_to_cart_button'); ?>
			<div class="quantity-addtocart">
				<span class="tg-productquentity">
					<div class="product-quantity">
						<em class="minus">-</em>
						<?php
						if (!$product->is_sold_individually()) {
							woocommerce_quantity_input(array(
								'min_value' => apply_filters('woocommerce_quantity_input_min', 1, $product),
								'max_value' => apply_filters('woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product),
								'input_value' => ( isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : 1 )
							));
						}
						?>
						<em class="plus">+</em>
					</div>
				 </span>
         
			</div>
			<input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>" />
			<button type="submit" class="tg-btn tg-btnaddtocart"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
			<?php do_action('woocommerce_after_add_to_cart_button'); ?>
		</form>
	
	<?php do_action('woocommerce_after_add_to_cart_form');
endif;

