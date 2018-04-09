<?php
/**
 * @Woocommerce Product Listing
 * @return {}
 */
global $product, $woocommerce_loop;

if (function_exists('fw_get_db_settings_option')) {
    $enable_sidebar = fw_get_db_settings_option('enable_sidebar');
    $sidebar_position = fw_get_db_settings_option('sidebar_position');
    $is_sidebar = isset($enable_sidebar) && $enable_sidebar === 'on' ? 'on' : 'off';
	
	$slider_popup = fw_get_db_settings_option('slider_popup');
	$enable_slider = fw_get_db_settings_option('enable_slider');
	
} else {
    $content_div = 'col-md-12 col-sm-12 col-xs-12';
    $is_sidebar = 'off';
    $sidebar_position = 'left';
}

if( is_active_sidebar('shop_sidebar') && isset( $is_sidebar ) && $is_sidebar === 'on' ){
	$content_div = 'col-md-9 col-sm-8 col-xs-12';
} else{
	$content_div = 'col-md-12 col-sm-12 col-xs-12';
}

if (isset($sidebar_position) && $sidebar_position === 'right') {
    $content_div = $content_div . ' pull-left';
    $sidebar_position = ' pull-right';
} else {
    $content_div = $content_div . ' pull-right';
    $sidebar_position = ' pull-left';
}

$uni_flag = fw_unique_increment();
?>
<div class="container">
    <div class="row">
        <div id="tg-twocolumns" class="tg-twocolumns tg-main-section tg-haslayout">
            <div class="<?php echo esc_attr($content_div); ?>">
                <?php  
				if ( isset($enable_slider) 
					&& $enable_slider === 'on'
					&& !empty($slider_popup)
				) {?>
                <div class="tg-shopbanner">
                  <div class="tg-bgpattran">
                    <div id="tg-shopslider" class="tg-shopslider">
                      <div class="swiper-wrapper">
                        <?php 
						foreach ($slider_popup as $popup_value) {
							$currency	= get_woocommerce_currency_symbol();
							$product_data = wc_get_product( $popup_value['feature_product'] );

						?>   
                        <div class="swiper-slide">
                          <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                              <div class="tg-shopcontent"> 
							    <?php if (!empty($popup_value['fep_title'])) { ?>
                                    <span class="tg-limitedoffer"><?php echo esc_attr($popup_value['fep_title']); ?></span>
                                <?php } ?>
                                <div class="tg-contentbox">
                                <?php
									$category = get_the_terms($popup_value['feature_product'], 'product_cat' ); 
									if( !empty( $category ) ) {    
										foreach ( $category as $cat ){
										   echo '<a class="tg-theme-tag" href="'.get_term_link($cat->slug, 'product_cat').'" class="tg-btn">'.$cat->name.'</a>';
										}
									}
								 ?> 
                                  <h2><a href="<?php echo get_the_permalink($popup_value['feature_product']);?>"><?php echo get_the_title($popup_value['feature_product']);?></a></h2>
                                  <span class="tg-price">
                                  	<?php echo force_balance_tags( $product_data->get_price_html() );?>
                                 </span>
                                 <?php echo force_balance_tags( $product_data->get_rating_html());?>
                                </div>
                              </div>
                            </div>
                            <?php if( !empty( $popup_value['fep_image']['url'] ) ){?>
                            <div class="col-sm-5 hidden-sm hidden-xs">
                              <figure>
                              	<img src="<?php echo esc_url( $popup_value['fep_image']['url'] );?>" alt="<?php esc_html_e('Shop banner','soccer-acumen');?>" />
                              </figure>
                            </div>
                            <?php }?>
                          </div>
                        </div>
                        <?php }?>
                      </div>
                      <div class="tg-sliderpagination swiper-pagination"></div>
                    </div>
                  </div>
                </div>
				<?php }?>
                <div class="th-products">
                    <div class="row">
                        <?php
							if (have_posts()) {
								while (have_posts()) : the_post();
									get_template_part('woocommerce/layouts/grid', 'layout');
								endwhile;
							} else {
								esc_html_e('No Product Found.', 'soccer-acumen');
							}
                        ?>
                        <?php woocommerce_get_template('loop/pagination.php'); ?>
                    </div>
                </div>
            </div>
            <?php if ( isset( $is_sidebar ) && $is_sidebar === 'on' && is_active_sidebar('shop_sidebar') ) { ?>
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
