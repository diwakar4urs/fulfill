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
<div class="product-reviews">

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form" class="review-form">
				<?php
					$commenter = wp_get_current_commenter();
					$comment_form = array(
						'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'soccer-acumen' ) : esc_html__( 'Be the first to review', 'soccer-acumen' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'soccer-acumen' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="form-group">' .
							            '<input id="author" name="author" placeholder="Name" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></div>',
							'email'  => '<div class="form-group">' .
							            '<input id="email" name="email" placeholder="Email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div>',
						),
						'label_submit'  => esc_html__( 'Send', 'soccer-acumen' ),
						'logged_in_as'  => '',
						'comment_field' => '',
						'class_form' => 'review-form',
						'id_form' => 'review-form',
						'class_submit' => 'tg-btn review-btn',
						'id_submit' => 'tg-btn'
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'soccer-acumen' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'soccer-acumen' ) .'</label><select name="rating" id="rating">
							<option value="">' . esc_html__( 'Rate&hellip;', 'soccer-acumen' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'soccer-acumen' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'soccer-acumen' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'soccer-acumen' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'soccer-acumen' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'soccer-acumen' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<div class="form-group"><textarea id="comment" placeholder="Message" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'soccer-acumen' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
