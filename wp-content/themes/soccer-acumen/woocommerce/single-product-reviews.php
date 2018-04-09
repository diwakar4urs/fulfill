<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div class="tg-haslayout" id="comments">
	<div class="tg-heading-border">
		<h3>
			<?php
				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
					printf( _n( '%s review for %s', '%s reviews for %s', $count, 'soccer-acumen' ), $count, get_the_title() );
				else
					esc_html_e( 'Reviews', 'soccer-acumen' );
			?>
		</h3>
	</div>
		<?php if ( have_comments() ) : ?>
			<ul class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ul>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '<i class="fa fa-angle-left"></i><em>prev</em>',
					'next_text' => '<em>Next</em><i class="fa fa-angle-right"></i>',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'soccer-acumen' ); ?></p>
		<?php endif; ?>
</div>
