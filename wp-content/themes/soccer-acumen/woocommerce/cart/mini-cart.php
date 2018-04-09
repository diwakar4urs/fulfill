<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>
	<ul class=" product_list_widget <?php echo sanitize_html_class( $args['list_class'] ); ?>">
		<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					?>
					<li class="<?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<figure class="tg-product-img">
							<?php if ( ! $_product->is_visible() ) : ?>
								<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
							<?php else : ?>
								<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
								</a>
							<?php endif; ?>
						</figure>
						<div class="tg-product-data">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="tg-trash fa fa-trash-o" title="%s" data-product_id="%s" data-product_sku="%s"></a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									'',
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
							<div class="tg-product-info">
								<?php echo WC()->cart->get_item_data( $cart_item ); ?>
								<h4><?php echo esc_attr( $cart_item['quantity'] ); ?> &times; <?php echo esc_attr( $product_name ); ?></h4>
								<span class="tg-product-price"><?php echo force_balance_tags( $product_price ); ?></span>
								<?php /*?><?php if ( $_product->get_stock_quantity() > 0 )?>
									<a href="javascript:;" class="stock-batch"><?php esc_html_e('In Stock','soccer-acumen');?></a>
								<?php }?><?php */?>
							</div>
						</div>
						
					</li>
					<?php
				}
			}
		?>
	</ul>
	<div class="tg-cart-total">
		<strong class="tg-total pull-right"><?php esc_html_e( 'Subtotal: ', 'soccer-acumen' ); ?> <?php echo WC()->cart->get_cart_subtotal(); ?></strong>
	</div>
	
<?php else : ?>
	<div class="empty"><?php esc_html_e( 'No products in the cart.', 'soccer-acumen' ); ?></div>
<?php endif; ?>
<?php if ( ! WC()->cart->is_empty() ) : ?>
	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
	<div class="cart-btns">
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="tg-btn tg-btn-sm pull-left"><?php esc_html_e( 'View Cart', 'soccer-acumen' ); ?></a>
		<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="tg-btn tg-btn-sm pull-right"><?php esc_html_e( 'Checkout', 'soccer-acumen' ); ?></a>
	</div>
<?php endif; ?>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>
