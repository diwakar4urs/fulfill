<?php
/**
 * Wishlist page template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.7
 */
?>
<div class="section-padding -wishlist">
	<div class="col-lg-12 col-md-12 col-sm-12">
	<?php do_action( 'yith_wcwl_before_wishlist_form', $wishlist_meta ); ?>
	<div class="container content">
	  <div class="row">
	<form
		id="yith-wcwl-form"
		action="<?php echo esc_url( YITH_WCWL()->get_wishlist_url( 'view' . ( $wishlist_meta['is_default'] != 1 ? '/' . $wishlist_meta['wishlist_token'] : '' ) ) ) ?>"
		method="post"
	>
	<fieldset>
		<!-- TITLE -->
		<?php
		do_action( 'yith_wcwl_before_wishlist_title' );
	
		 do_action( 'yith_wcwl_before_wishlist' ); ?>
	
		<!-- WISHLIST TABLE -->
		<table
			class="shop_table1 table cart-table"
			cellspacing="0"
			data-pagination="<?php echo esc_attr( $pagination )?>"
			data-per-page="<?php echo esc_attr( $per_page )?>"
			data-page="<?php echo esc_attr( $current_page )?>"
			data-id="<?php echo ( is_user_logged_in() ) ? esc_attr( $wishlist_meta['ID'] ) : '' ?>"
			data-token="<?php echo ( ! empty( $wishlist_meta['wishlist_token'] ) && is_user_logged_in() ) ? esc_attr( $wishlist_meta['wishlist_token'] ) : '' ?>"
		>
	
			<?php $column_count = 2; ?>
	
			<thead>
			<tr>
				<?php if( $show_cb ) : ?>
	
				   <?php /*?> <th class="product-checkbox">
						<input type="checkbox" value="" name="" id="bulk_add_to_cart"/>
					</th><?php */?>
	
				<?php
					$column_count ++;
				endif;
				?>
				
				<th class="product-name">
				 <span class="nobr"><?php echo apply_filters( 'yith_wcwl_wishlist_view_name_heading', esc_html__( 'Product Name', 'soccer-acumen' ) ) ?></span>
				</th>
				<?php if( $show_price ) : ?>
	
					<th class="product-price">
						<span class="nobr">
							<?php echo apply_filters( 'yith_wcwl_wishlist_view_price_heading', esc_html__( 'Unit Price', 'soccer-acumen' ) ) ?>
						</span>
					</th>
	
				<?php
					$column_count ++;
				endif;
				?>
				
				<?php if( $show_stock_status ) : ?>
	
					<th class="product-stock-stauts">
						<span class="nobr">
							<?php echo apply_filters( 'yith_wcwl_wishlist_view_stock_heading', esc_html__( 'Stock Status', 'soccer-acumen' ) ) ?>
						</span>
					</th>
	
				<?php
					$column_count ++;
				endif;
				?>
				
				<?php if( $is_user_owner ): ?>
					<th class="product-remove"></th>
				<?php
					$column_count ++;
				endif;
				?>
			</tr>
			</thead>
			<tbody>
			<?php
			if( count( $wishlist_items ) > 0 ) :
				foreach( $wishlist_items as $item ) :
					global $product;
					if( function_exists( 'wc_get_product' ) ) {
						$product = wc_get_product( $item['prod_id'] );
					}
					else{
						$product = get_product( $item['prod_id'] );
					}
	
					if( $product !== false && $product->exists() ) :
						$availability = $product->get_availability();
						$stock_status = $availability['class'];
						?>
						<tr id="yith-wcwl-row-<?php echo esc_attr($item['prod_id']); ?>" class="cart_item" data-row-id="<?php echo esc_attr($item['prod_id']); ?>">
							<td class="product-name">
								<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>">
									<?php echo esc_attr( $product->get_image() ) ?>
								</a>
								<em><a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></a></em>
							</td>
	
							<?php if( $show_price ) : ?>
								<td class="product-price">
									<?php
									if( is_a( $product, 'WC_Product_Bundle' ) ){
										if( $product->min_price != $product->max_price ){
											echo sprintf( '%s - %s', wc_price( $product->min_price ), wc_price( $product->max_price ) );
										}
										else{
											echo wc_price( $product->min_price );
										}
									}
									elseif( $product->price != '0' ) {
										echo force_balance_tags( $product->get_price_html() );
									}
									else {
										echo apply_filters( 'yith_free_text', esc_html__( 'Free!', 'soccer-acumen' ) );
									}
									?>
								</td>
							<?php endif ?>
	
							<?php if( $show_stock_status ) : ?>
								 <?php
									if( $stock_status == 'out-of-stock' ) {
										$stock_status = "Out";
										$stock_title	=  esc_html__( 'Out of Stock', 'soccer-acumen' );
									} else {
										$stock_status = "In";
										$stock_title  =  esc_html__( 'In Stock', 'soccer-acumen' );
									}
									?>
								<td class="product-stock-status" data-title="<?php echo esc_attr( $stock_title );?>">
								   <?php echo esc_attr( $stock_title );?>
								</td>
							<?php endif ?>
							<?php if( $is_user_owner ): ?>
							<td class="product-remove">
								<i class="btn-delete-item">
									<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>" class="remove remove_from_wishlist" title="<?php esc_html_e( 'Remove this product', 'soccer-acumen' ) ?>">&times;</a>
								</i>
							</td>
							<?php endif; ?>
						</tr>
					<?php
					endif;
				endforeach;
			else: ?>
				<tr>
					<td colspan="<?php echo esc_attr( $column_count ) ?>" class="wishlist-empty"><?php esc_html_e( 'No products were added to the wishlist', 'soccer-acumen' ) ?></td>
				</tr>
			<?php
			endif;
	
			if( ! empty( $page_links ) ) : ?>
				<tr class="pagination-row">
					<td colspan="<?php echo esc_attr( $column_count ) ?>"><?php echo soccer-acumen_esc_specialchars( $page_links ) ?></td>
				</tr>
			<?php endif ?>
			</tbody>
		</table>
	
		<?php wp_nonce_field( 'yith_wcwl_edit_wishlist_action', 'yith_wcwl_edit_wishlist' ); ?>
	
		<?php if( $wishlist_meta['is_default'] != 1 ): ?>
			<input type="hidden" value="<?php echo esc_attr($wishlist_meta['wishlist_token']); ?>" name="wishlist_id" id="wishlist_id">
		<?php endif; ?>
			
			
		<?php
		do_action( 'yith_wcwl_before_wishlist_share' );
	
		if ( $is_user_owner && $wishlist_meta['wishlist_privacy'] != 2 && $share_enabled ){
			yith_wcwl_get_template( 'share.php', $share_atts );
		}
	
		do_action( 'yith_wcwl_after_wishlist_share' );
		?>
			
		<?php do_action( 'yith_wcwl_after_wishlist' ); ?>
	</fieldset>
	</form>
	
	<?php do_action( 'yith_wcwl_after_wishlist_form', $wishlist_meta ); ?>
	
	<?php if( $additional_info ): ?>
		<div id="ask_an_estimate_popup">
			<form action="<?php echo esc_url($ask_estimate_url); ?>" method="post" class="wishlist-ask-an-estimate-popup">
				<?php if( ! empty( $additional_info_label ) ):?>
					<label for="additional_notes"><?php echo esc_html( $additional_info_label ) ?></label>
				<?php endif; ?>
				<textarea id="additional_notes" name="additional_notes"></textarea>
	
				<button class="btn button ask-an-estimate-button ask-an-estimate-button-popup" >
					<?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', '<i class="fa fa-shopping-cart"></i>' )?>
					<?php esc_html_e( 'Ask for an estimate', 'soccer-acumen' ) ?>
				</button>
			</form>
		</div>
	<?php endif; ?>
	</div>
	</div>
  </div>
</div>