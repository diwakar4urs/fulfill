<?php
/**
 * @Woocommerce Customization
 * return {}
 */
if (!class_exists('soccer_woocommerace')) {

    class soccer_woocommerace {

        function __construct() {

            add_filter('woocommerce_enqueue_styles', '__return_false');
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
            add_filter('woocommerce_show_page_title', array(&$this, 'soccer_prepare_shop_title'));
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
            add_action('woocommerce_after_shop_loop_item', array(&$this, 'soccer_woocommerce_add_to_cart'), 10);
            add_action('woocommerce_template_single_add_to_cart', array(&$this, 'soccer_woocommerce_single_add_to_cart'), 10);
            add_filter('add_to_cart_fragments', array(&$this, 'soccer_woocommerce_header_add_to_cart')); // Ajax Add To cart
            add_action('wp_ajax_add_to_cart_variable_rc', array(&$this, 'soccer_add_to_cart_variable_rc'));
            add_action('soccer_category', array(&$this,'soccer_product_category_name'));//print product category name
            add_action('soccer_woocommerce_add_to_cart_slider_button', array(&$this, 'soccer_woocommerce_add_to_cart_slider_button'), 10);
            //Change sorting names
            add_filter('woocommerce_catalog_orderby', array(&$this, 'soccer_woocommerce_change_sorting_names'));
            add_filter('woocommerce_default_catalog_orderby_options', array(&$this, 'soccer_woocommerce_change_sorting_names'));

            //per page
            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering');
            add_filter('loop_shop_per_page', array(&$this, 'soccer_woocommerce_sort_by_page'));
            add_action('woocommerce_before_shop_loop', array(&$this, 'soccer_woocommerce_catalog_page_ordering', 20));
            add_action('soccer_render_quick_view', array(&$this, 'soccer_render_quick_view'));

            add_action('woocommerce_single_product_summary', array(&$this, 'soccer_woocommerce_product_description'), 7);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating');
            //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20 );
            // Remove Rating From Listing
            //remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
            add_filter('loop_shop_per_page', array(&$this, 'soccer_shop_per_page'), 20);
            // Product Container
            add_action('soccer_product_loop_before', array(&$this, 'soccer_product_loop_before'));
            add_action('soccer_product_loop_after', array(&$this, 'soccer_product_loop_after'));
            remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);

            add_action('soccer_prepare_share', array(&$this,'soccer_prepare_share'), 10);
            //add_filter( 'wc_product_sku_enabled',array(&$this,'soccer_remove_sku') ); //Remove Sku
            remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
            add_action('soccer_related_products', 'woocommerce_output_related_products');
            
        }

        /**
         * @Woocommerce prepare title
         * @return {}
         */
        public function soccer_prepare_shop_title() {
            $title = '';
            return $title;
        }

        /**
         * @Woocommerce prepare Share
         * @return {}
         */
        public function soccer_prepare_share() {
            global $post, $product;
            $title = esc_html__('Share this:', 'soccer-acumen');
            ?>
            <div class="share-icon">
                <h3><?php echo esc_attr($title); ?></h3>
                <ul>
                    <?php
                    $pinImg = '';
                    if (has_post_thumbnail($post->ID)) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), apply_filters('single_product_large_thumbnail_size', 'soccer_shop_single_image_size'));
                        $pinImg = $image[0];
                    }

                    $permalink = urlencode(get_permalink());
                    $title = urlencode(get_the_title());
                    ?>
                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_attr($permalink); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="http://twitter.com/home?status=<?php echo esc_attr($title); ?> - <?php echo esc_attr($permalink); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <?php /*?><li><a href="https://plus.google.com/share?url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php */?>
                    <li><a href="http://linkedin.com/shareArticle?mini=true&url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_attr($permalink); ?>&media=<?php echo urlencode($pinImg); ?>&description=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    <?php /*?><li><a href="mailto:?subject=<?php echo esc_attr($title); ?>&body=<?php echo esc_attr($permalink); ?>"><i class="fa fa-envelope"></i></a></li><?php */?>
                </ul>
            </div>
            <?php
        }

        /**
         * @Woocommerce before loop
         * @return {container}
         */
        public function soccer_product_loop_before() {
            echo '<div class="container"><div class="row">';
        }

        /**
         * @Woocommerce category title
         * @return {container}
         */
        public function soccer_product_category_name() {
            global $post;
            $args = array('taxonomy' => 'product_cat',);
            $terms = wp_get_post_terms($post->ID, 'product_cat', $args);
            foreach ($terms as $term) {
                echo ( $term->slug );
            }
        }

        /**
         * @Woocommerce before loop
         * @return {container}
         */
        public function soccer_product_loop_after() {
            echo '</div></div>';
        }

        /**
         * Woocommerce Quick View
         *
         */
        public function soccer_shop_per_page($cols) {
            // $cols contains the current number of products per page based on the value stored on Options -> Reading
            // Return the number of products you wanna show per page.
            $per_page = '9';
            if (function_exists('fw_get_db_settings_option')) {
                $show_shop_posts = fw_get_db_settings_option('shop_per_page');
                if (isset($show_shop_posts) && !empty($show_shop_posts)) {
                    $per_page = intval($show_shop_posts);
                } else {
                    $per_page = '12';
                }
            }
            return $per_page;
        }

        /**
         * Woocommerce Loop After Title
         *
         */
        public function soccer_loop_after_title() {
            //add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        }

        /**
         * Product Description
         *
         */
        public function soccer_woocommerce_product_description() {
            global $post, $product;
            do_action('woocommerce_product_meta_start');
            ?>
            <div class="review-reference">
                <span data-target="#review" data-toggle="modal" class="review">
                    <i class="fa fa-pencil"></i>
                    <em><?php esc_html_e('Write your review ', 'soccer-acumen'); ?></em>
                </span>
                <?php if (wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type('variable') )) : ?>
                    <span class="product-reference"><?php esc_html_e('Reference: ', 'soccer-acumen'); ?><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__('N/A', 'soccer-acumen'); ?></span>
                <?php endif; ?>
            </div>
            <div class="modal fade theme-modalbox" id="review" tabindex="-1" role="dialog">
                <div class="modal-dialog newsletter" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?php esc_html_e('Write the first review', 'soccer-acumen'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php wc_get_template('single-review-popup.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            do_action('woocommerce_product_meta_end');
        }

        /**
         * Woocommerce Quick View
         *
         */
        public function soccer_get_quick_view() {

            // Image
            add_action('soccer_quick_product_image', 'woocommerce_show_product_sale_flash', 10);
            add_action('soccer_quick_product_image', 'woocommerce_show_product_images', 20);

            // Summary
            add_action('soccer_quick_product_summary', 'woocommerce_template_single_title', 5);
            add_action('soccer_quick_product_summary', 'woocommerce_template_single_rating', 10);
            add_action('soccer_quick_product_summary', 'woocommerce_template_single_price', 15);
            add_action('soccer_quick_product_summary', 'woocommerce_template_single_excerpt', 20);
            add_action('soccer_quick_product_summary', 'woocommerce_template_single_add_to_cart', 25);
            add_action('soccer_quick_product_summary', 'woocommerce_template_single_meta', 30);
        }

        /** 	
         * @Shop Title
         * @return {}
         */
        public function prepare_shop_title() {
            $shop_title = '';
            return $shop_title;
        }

        /**
         * @Before Title
         * @return {}
         */
        public static function soccer_woocommerce_add_to_cart() {
            global $product;

            echo apply_filters('woocommerce_loop_add_to_cart_link', sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="sm-btn %s product_type_%s ajax_add_to_cart  mec-add-to-cart">ADD TO <i class="fa fa-refresh fa-spin"></i><i class="fa fa-check"></i></a>', esc_url($product->add_to_cart_url()), esc_attr($product->id), esc_attr($product->get_sku()), esc_attr(isset($quantity) ? $quantity : 1 ), $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '', esc_attr($product->product_type), esc_html($product->add_to_cart_text())
                    ), $product);
        }

        /**
         * @Single Add to cart
         * @return {}
         */
        public static function soccer_woocommerce_single_add_to_cart() {
            global $product;
			
			echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="sm-btn %s product_type_%s ajax_add_to_cart tg-btn">'.esc_html__('CART12','soccer-acumen').'<i class="fa fa-refresh fa-spin"></i><i class="fa fa-check"></i></a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					esc_attr( $product->product_type ),
					esc_html( $product->add_to_cart_text() )
				),
			$product );
        }

        /**
         * @Before Title
         * @return {}
         */
        public static function soccer_woocommerce_add_to_cart_slider_button() {
            global $product;
			
			echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="tg-btncart %s product_type_%s ajax_add_to_cart mec-add-to-cart"><i class="fa fa-shopping-cart""></i><i class="fa fa-refresh fa-spin"></i></a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					esc_attr( $product->product_type ),
					esc_html( $product->add_to_cart_text() )
				),
			$product );
        }

        /**
         * @Add to cart via ajax
         * @return {}
         */
        public function soccer_woocommerce_header_add_to_cart($fragments) {
            global $woocommerce;

            ob_start();
            ?>
              <?php echo intval($woocommerce->cart->cart_contents_count); ?>
            <?php
            $fragments['span.cart-contents'] = ob_get_clean();

            return $fragments;
        }

        /**
         * @add to cart
         * @return {}
         */
        public function soccer_add_to_cart_variable_rc() {
            global $woocommerce;
            $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
            $quantity = empty($_POST['quantity']) ? 1 : apply_filters('woocommerce_stock_amount', $_POST['quantity']);
            $variation_id = 0;
            $variation = array();
            $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);

            if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation)) {
                do_action('woocommerce_ajax_added_to_cart', $product_id);
                if (get_option('woocommerce_cart_redirect_after_add') == 'yes') {
                    wc_add_to_cart_message($product_id);
                }
                // Return fragments
                // WC_AJAX::get_refreshed_fragments();
                $this->soccer_get_fragments();
            } else {
                //$this->json_headers();
                // If there was an error adding to the cart, redirect to the product page to show any errors
                $data = array(
                    'error' => 'true',
                    'message' => esc_html__('Some error occur,please try again later.', 'soccer-acumen'),
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
                );
                echo json_encode($data);
            }
            die();
        }

        /**
         * @refresh fregments for multiple products rendering
         * @return {}
         */
        public function soccer_get_fragments() {
            global $woocommerce;
            ob_start();
            woocommerce_mini_cart();
            $mini_cart = ob_get_clean();

            // Fragments and mini cart are returned
            $data = array(
                'fragments' => apply_filters('woocommerce_add_to_cart_fragments', array(
                    'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
                        )
                ),
                'cart_hash' => apply_filters('woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5(json_encode(WC()->cart->get_cart_for_session())) : '', WC()->cart->get_cart_for_session())
            );

            $data['message'] .= esc_html__('Cart updated', 'soccer-acumen');
            if (sizeof($woocommerce->cart->cart_contents) > 0) :
                $data['cart'] .= '<a class="added_to_cart wc-forward" href="' . esc_url($woocommerce->cart->get_checkout_url()) . '" title="' . esc_attr__('Checkout', 'soccer-acumen') . '">' . esc_html__('Checkout', 'soccer-acumen') . '</a>';
            endif;

            wp_send_json($data);
        }

        /**
         * @Rename Sortable 
         * @return {}
         */
        public function soccer_woocommerce_change_sorting_names($catalog_orderby) {
            $catalog_orderby = str_replace("Default sorting", "Default", $catalog_orderby);
            $catalog_orderby = str_replace("Sort by popularity", "Popular", $catalog_orderby);
            $catalog_orderby = str_replace("Sort by average rating", "Average Rating", $catalog_orderby);
            $catalog_orderby = str_replace("Sort by newness", "Newness", $catalog_orderby);
            $catalog_orderby = str_replace("Sort by price: low to high", "Lowest Price", $catalog_orderby);
            $catalog_orderby = str_replace("Sort by price: high to low", "Highest Price", $catalog_orderby);
            return $catalog_orderby;
        }

        /**
         * @Per page Ordering 
         * @return {}
         */
        public function soccer_woocommerce_catalog_page_ordering() {
            ?>
            <form action="" method="POST" name="results" class="woocommerce-ordering">
                <select name="woocommerce-sort-by-columns selectpicker" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
                    <?php
                    //Get products on page reload
                    if (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
                        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
                    } else {
                        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
                    }
                    $shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
                        '-1' => esc_html__('All', 'soccer-acumen'),
                        '10' => esc_html__('10', 'soccer-acumen'),
                        '20' => esc_html__('20', 'soccer-acumen'),
                        '50' => esc_html__('50', 'soccer-acumen'),
                        '100' => esc_html__('100', 'soccer-acumen'),
                    ));

                    foreach ($shopCatalog_orderby as $sort_id => $sort_name) {
                        echo '<option value="' . $sort_id . '" ' . selected($numberOfProductsPerPage, $sort_id, true) . ' >' . $sort_name . '</option>';
                    }
                    ?>
                </select>
            </form>
            <?php
        }

        /**
         * @Sort by Page
         * @return {}
         */
        public function soccer_woocommerce_sort_by_page($count) {
            if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
                $count = $_COOKIE['shop_pageResults'];
            }
            if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
                setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time() + 1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any
                $count = $_POST['woocommerce-sort-by-columns'];
            }
            return $count;
        }

        /**
         * @Sort by Page
         * @return {}
         */
        public function soccer_render_quick_view() {
            global $product, $woocommerce_loop, $post;
            ?>
            <div class="modal fade bs-example-modal-sm-<?php echo intval($post->ID); ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog newsletter product">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-close" aria-hidden="true"></span></button>
                        <div class="content-box">
                            <div class="tg-product">
                                <div class="product-img">
                                    <div class="box">
                                        <?php echo get_the_post_thumbnail($post->ID, 'soccer_shop_catalog_image_size') ?>
                                    </div>

                                </div>
                                <span class="product-name"><?php echo the_title(); ?></span>
                                <?php if (isset($product->sku) && !empty($product->sku)) { ?>
                                    <span class="product-code"><?php esc_html_e('Code: ', 'soccer-acumen'); ?><?php echo esc_attr($product->get_sku()); ?></span>
                                <?php } ?>
                                <?php if ($price_html = $product->get_price_html()) : ?> <span class="product-price"><?php esc_html_e('Our Price: ', 'soccer-acumen'); ?><?php echo force_balance_tags($price_html); ?></span><?php endif; ?>
                                <?php
                                $_product = wc_get_product($post->ID);
                                if ($_product->is_type('simple')) {
                                    ?>
                                    <form class="product-form">
                                        <fieldset>
                                            <div class="form-group">
                                                <label><?php esc_html_e('Qty:', 'soccer-acumen'); ?></label>
                                                <span class="quantity-sapn">
                                                    <input type="text" class="result quantity_variation" data-product_id="<?php echo intval($post->ID); ?>" value="1" id="quantity1"  name="quantity">
                                                    <em class="plus fa fa-caret-down"></em>
                                                    <em class="minus fa fa-caret-up"></em>

                                                </span>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <a href="javascript:;" class="btn-theme black btn-addtocart">
                                        <span class="txt"><?php esc_html_e('add to cart', 'soccer-acumen'); ?></span>
                                        <span class="round">
                                            <i class="icon-arrow-right-latest-races"></i>
                                        </span>
                                    </a>
                                <?php } elseif ($_product->is_type('variable')) { ?>
                                    <a class="btn-theme" href="<?php esc_url(the_permalink()); ?>">
                                        <span class="txt"><?php esc_html_e('Select Options', 'soccer-acumen'); ?></span>
                                        <span class="round">
                                            <i class="icon-arrow-right-latest-races"></i>
                                        </span>
                                    </a>
                                <?php } ?>

                                <span class="add-to-cart-message elm-display-none"></span>
                                <a class="btn-moredetail " href="<?php esc_url(the_permalink()); ?>">
                                    <em><?php esc_html_e('See More Details', 'soccer-acumen'); ?></em>
                                    <i class="icon-arrow-right-latest-races"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

    }

    new soccer_woocommerace();
}