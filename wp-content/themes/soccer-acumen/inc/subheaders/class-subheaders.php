<?php
/**
 * @Class subheaders
 *
 */
if (!class_exists('soccer_acumen_subheaders')) {

    class soccer_acumen_subheaders {

        function __construct() {
            add_action('soccer_acumen_prepare_subheaders', array(&$this, 'soccer_acumen_prepare_subheaders'));
        }

        /**
         * @prepare subheaders
         * @return {}
         */
        public function soccer_acumen_prepare_subheaders($post_id = '') {
            global $post;

            $object_id = get_queried_object_id();
			$page_id   = $object_id;
			if ( get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) && is_home() ) {
				$page_id = get_option( 'page_for_posts' );
			} else {
				if ( isset( $object_id ) ) {
					$page_id = $object_id;
				}
				// Front page is the posts page
				if ( isset( $object_id ) && get_option( 'show_on_front' ) == 'posts' && is_home() ) {
					$page_id = $object_id;
				}
				
				if ( class_exists( 'WooCommerce' ) && ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {
					$page_id = get_option( 'woocommerce_shop_page_id' );
				}
	
			}
			
			
            if ( is_404() 
				|| is_archive() 
				|| is_search() 
				|| is_category() 
				|| is_tag() 
			) {
                $this->soccer_acumen_prepare_custom_subheader($page_id);
            } else {
                if (function_exists('fw_get_db_settings_option')) {
					$enable_subheader = fw_get_db_post_option($page_id, 'enable_subheader', true);
					$subheader_type = fw_get_db_post_option($page_id, 'subheader_type', true);
					if (isset($subheader_type['gadget']) 
						&& $subheader_type['gadget'] === 'tg_slider' 
						&& !empty($subheader_type['tg_slider']['sub_shortcode'])) {
							echo '<div class="soccer-custom-slider">';
							echo do_shortcode('[soccer_slider id="' . $subheader_type['tg_slider']['sub_shortcode'] . '"]');
							echo '</div>';
					} else if (isset($subheader_type['gadget']) 
						&& $subheader_type['gadget'] === 'rev_slider' 
						&& !empty($subheader_type['rev_slider']['rev_slider'])) {
							
						echo '<div class="soccer-acumensystem-banner">';
						echo do_shortcode('[rev_slider ' . $subheader_type['rev_slider']['rev_slider'] . ']');
						echo '</div>';
					
					} else if (isset($subheader_type['gadget']) 
						&& $subheader_type['gadget'] === 'custom_shortcode' 
						&& !empty($subheader_type['custom_shortcode']['custom_shortcode'])) {
						
						echo '<div class="soccer-acumensystem-banner">';
						echo do_shortcode($subheader_type['custom_shortcode']['custom_shortcode']);
						echo '</div>';
					
					} else if (isset($subheader_type['gadget']) && $subheader_type['gadget'] === 'default') {
						$this->soccer_acumen_prepare_custom_subheader($page_id);
					} else {
						$this->soccer_acumen_prepare_custom_subheader($page_id);
					}
				} else {
					$this->soccer_acumen_prepare_custom_subheader($page_id);
				}
			}
        }

        /**
         * @prepare Custom Subheader
         * @return {}
         */
        public function soccer_acumen_prepare_custom_subheader($page_id = '') {
            global $post;
            $parallax_data_attr = '';
            if ( is_404() 
				|| is_archive() 
				|| is_search() 
				|| is_category() 
				|| is_tag() 
			) {
                if (function_exists('fw_get_db_settings_option')) {
                    $sub_header_bg = fw_get_db_settings_option('sub_header_bg', '#373542');
                    $subheader_bg_image = fw_get_db_settings_option('subheader_bg_image', get_template_directory_uri() . '/images/subheader.png');
                    $enable_breadcrumbs = fw_get_db_settings_option('enable_breadcrumbs', '');
                } else {
                    $sub_header_bg = '#373542';
                    $subheader_bg_image['url'] = get_template_directory_uri() . '/images/subheader.png';
                    $enable_breadcrumbs = '';
                }

                $background_image = '';
                $bg_color = '';

                if ( isset($sub_header_bg) && !empty($sub_header_bg)) {
                    $bg_color = 'style="background:' . $sub_header_bg . '"';
                } else {
					$bg_color = 'style="background:#373542';
				}
                
				if (is_404()) {

                    if (function_exists('fw_get_db_settings_option')) {
                        $title = fw_get_db_settings_option('404_heading', '404');
                    } else {
                        $title = esc_html__('404', 'soccer-acumen');
                    }
                } elseif (class_exists('woocommerce')) {
                    if (is_shop()) {
                        $page_id = woocommerce_get_page_id('shop');
                        $title = get_the_title($page_id);
                    } elseif (is_product_category()) {
                        $obj = get_queried_object();
                        $title = $obj->name;
                    } else {
                        $title = get_the_title($page_id);
                    }
                } else if (is_archive()) {
                    if (function_exists('fw_get_db_settings_option')) {
                        $title = fw_get_db_settings_option('archives_heading', 'Archives');
                    } else {
                        $title = esc_html__('Archive', 'soccer-acumen');
                    }
                } else if (is_search()) {

                    if (function_exists('fw_get_db_settings_option')) {
                        $title = fw_get_db_settings_option('search_heading', 'Search');
                    } else {

                        $title = esc_html__('Search', 'soccer-acumen');
                    }
                }
            } else {
                $object_id = get_queried_object_id();
				$page_id   = $object_id;
				if ( get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) && is_home() ) {
					$page_id = get_option( 'page_for_posts' );
				} else {
					if ( isset( $object_id ) ) {
						$page_id = $object_id;
					}
					// Front page is the posts page
					if ( isset( $object_id ) && get_option( 'show_on_front' ) == 'posts' && is_home() ) {
						$page_id = $object_id;
					}
					
					if ( class_exists( 'WooCommerce' ) && ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {
						$page_id = get_option( 'woocommerce_shop_page_id' );
					}
		
				}
				
                $subheader_type = '';

                if (function_exists('fw_get_db_settings_option')) {
                    $subheader_type = fw_get_db_post_option($page_id, 'subheader_type', true);

                    if (isset($subheader_type['gadget']) && ( $subheader_type['gadget'] === 'custom' )) {
                        $sub_header_bg = $subheader_type['custom']['sub_header_bg'];
                        $subheader_bg_image = $subheader_type['custom']['subheader_bg_image'];
                        $enable_breadcrumbs = $subheader_type['custom']['enable_breadcrumbs'];
                    } else {
                        $sub_header_bg = fw_get_db_settings_option('sub_header_bg', '#373542');
                        $subheader_bg_image = fw_get_db_settings_option('subheader_bg_image', get_template_directory_uri() . '/images/subheader.png');
                        $enable_breadcrumbs = fw_get_db_settings_option('enable_breadcrumbs', '');
						$subheader_bg_image['url']	= !empty( $subheader_bg_image['url'] ) ? $subheader_bg_image['url'] :  get_template_directory_uri() . '/images/subheader.png';
                    }
                } else {
                    $sub_header_bg = '#373542';
                    $subheader_bg_image['url'] = get_template_directory_uri() . '/images/subheader.png';
                    $enable_breadcrumbs = '';
                }

                if (isset($sub_header_bg) && !empty($sub_header_bg)) {
                    $bg_color = 'style="background:' . $sub_header_bg . '"';
                } else {
					$bg_color = 'style="background:#373542';
				}


                if (is_home()) {
                    $title = esc_html__('Home', 'soccer-acumen');
                } else {
                    $title = get_the_title($page_id);
                }
            }
            ?>
            <div class="tg-banner tg-haslayout" <?php echo ( $bg_color ); ?>>
                <?php if (!empty($subheader_bg_image['url'])) { ?>
                    <div class="tg-imglayer">
                        <img src="<?php echo esc_url($subheader_bg_image['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                    </div>
                <?php } ?>
                <div class="tg-breadcrumbs tg-haslayout">
                    <div class="container">
                        <div class="row">
                            <div class="tg-banner-content tg-haslayout">
                                <div class="tg-pagetitle"><h1><?php echo force_balance_tags($title) ?></h1></div>
								<?php
                                    if (isset($enable_breadcrumbs) && $enable_breadcrumbs == 'enable') {
                                        if (function_exists('fw_ext_breadcrumbs')) {
                                            fw_ext_breadcrumbs('');
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }

    }

    new soccer_acumen_subheaders();
}