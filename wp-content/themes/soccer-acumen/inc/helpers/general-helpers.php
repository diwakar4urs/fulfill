<?php
/**
 * Theme Helper Functions
 *
 * @package Soccer Acumen
 */
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!isset($content_width)) {
    $content_width = 640; /* pixels */
}
/**
 * @Theme Editor Style
 * 
 */
if (!function_exists('soccer_acumen_add_editor_styles')) {

    function soccer_acumen_add_editor_styles() {
        $theme_version = wp_get_theme();
        add_editor_style(get_template_directory_uri() . '/core/css/soccer-acumen-editor-style.css', array(), $theme_version->get('Version'));
    }

    add_action('admin_init', 'soccer_acumen_add_editor_styles');
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if (!function_exists('soccer_acumen_widgets_init')) {

    function soccer_acumen_widgets_init() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'soccer-acumen'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Default sidebar for home and archive pages', 'soccer-acumen'),
            'before_widget' => '<div id="%1$s" class="tg-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Shop Sidebar', 'soccer-acumen'),
            'id' => 'shop_sidebar',
            'description' => esc_html__('Shop sidebar for shop page and shop archives', 'soccer-acumen'),
            'before_widget' => '<div id="%1$s" class="tg-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Column 1', 'soccer-acumen'),
            'id' => 'footer-column-1',
            'description' => esc_html__('It will be used for footer column 1', 'soccer-acumen'),
            'before_widget' => '<div id="%1$s" class="tg-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Column 2', 'soccer-acumen'),
            'id' => 'footer-column-2',
            'description' => esc_html__('It will be used for footer column 2', 'soccer-acumen'),
            'before_widget' => '<div id="%1$s" class="tg-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Column 3', 'soccer-acumen'),
            'id' => 'footer-column-3',
            'description' => esc_html__('It will be used for footer column 3', 'soccer-acumen'),
            'before_widget' => '<div id="%1$s" class="tg-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }

    add_action('widgets_init', 'soccer_acumen_widgets_init');
}

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('soccer_acumen_scripts')) {

    function soccer_acumen_scripts() {
        $theme_version = wp_get_theme();

        //Theme general styles
        wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('soccer_acumen_normalize', get_template_directory_uri() . '/css/normalize.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('soccer_acumen_transitions', get_template_directory_uri() . '/css/transitions.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('icomoon', get_template_directory_uri() . '/css/icomoon.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('soccer_acumen_customScrollbar_style', get_template_directory_uri() . '/css/customScrollbar.css', array(), $theme_version->get('Version'));
        if (class_exists('woocommerce')) {
            wp_enqueue_style('soccer-acumen_woocommerce_styling', get_template_directory_uri() . '/css/woocommerce.css');
        }
        wp_enqueue_style('soccer_acumen_theme_style', get_template_directory_uri() . '/style.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('soccer_acumen_color', get_template_directory_uri() . '/css/color.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('soccer_acumen_typo_style', get_template_directory_uri() . '/css/typo.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('soccer_acumen_responsive_style', get_template_directory_uri() . '/css/responsive.css', array(), $theme_version->get('Version'));

        //Theme general scripts
        wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), $theme_version->get('Version'), true);
        wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/prettyPhoto.js', array(), $theme_version->get('Version'), true);
        wp_enqueue_script('soccer_acumen_functions', get_template_directory_uri() . '/js/soccer_acumen_functions.js', array('jquery', 'jquery-ui-core', 'jquery-ui-widget'), $theme_version->get('Version'), true);
        wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), $theme_version->get('Version'), true);
        wp_enqueue_script('countTo', get_template_directory_uri() . '/js/countTo.js', array(), $theme_version->get('Version'), true);
        //  wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax.js', array(), $theme_version->get('Version'), false);
        wp_enqueue_script('appear', get_template_directory_uri() . '/js/appear.js', array(), $theme_version->get('Version'), false);
        wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.js', array(), $theme_version->get('Version'), true);
        wp_enqueue_script('customScrollbar.min', get_template_directory_uri() . '/js/customScrollbar.min.js', array(), $theme_version->get('Version'), true);

        wp_enqueue_script('soccer_acumen_modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), $theme_version->get('Version'), true);


        if (function_exists('fw_get_db_post_option')) {
            $sticky_header = fw_get_db_settings_option('sticky_header');
        } else {
            $sticky_header = '';
        }

        wp_localize_script('soccer_acumen_functions', 'scripts_vars', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'section_loader' => get_template_directory_uri() . '/images/section_loader.gif',
        ));

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        if (function_exists('fw_get_framework_directory_uri')) :
            if (!is_admin()) {
                wp_enqueue_script(
                        'fw-form-helpers', fw_get_framework_directory_uri('/static/js/fw-form-helpers.js')
                );
            }
        endif;
    }

    add_action('wp_enqueue_scripts', 'soccer_acumen_scripts');
}

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('soccer_acumen_admin_scripts')) {

    function soccer_acumen_admin_scripts() {
        $theme_version = wp_get_theme();
        wp_enqueue_media();

        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), $theme_version->get('Version'));
        wp_enqueue_script('soccer_acumen_admin_functions', get_template_directory_uri() . '/core/js/soccer_acumen_admin_functions.js', array('jquery', 'wp-color-picker'), $theme_version->get('Version'), true);

        //Styles
        wp_enqueue_style('soccer_acumen_admin_styles', get_template_directory_uri() . '/core/css/admin_styles.css', array(), $theme_version->get('Version'));

        wp_enqueue_style('wp-color-picker');
    }

    add_action('admin_enqueue_scripts', 'soccer_acumen_admin_scripts');
}


/**
 * @Init Slipry
 * @return 
 */
if (!function_exists('soccer_acumen_init_metro_script')) {

    function soccer_acumen_init_metro_script() {
        $theme_version = wp_get_theme();
        wp_enqueue_style('MetroJs', get_template_directory_uri() . '/css/MetroJs.css', array(), $theme_version->get('Version'));
        wp_enqueue_script('MetroJs', get_template_directory_uri() . '/js/MetroJs.js', array(), $theme_version->get('Version'), true);
    }

}


/**
 * @Init Sharing Script
 * @return 
 */
if (!function_exists('soccer_acumen_init_share_script')) {

    function soccer_acumen_init_share_script() {
        wp_enqueue_script('soccer_acumen_addthis', 'http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e4412d954dccc64', '', '', true);
    }

}


/**
 * @Init OWL Script
 * @return 
 */
if (!function_exists('soccer_acumen_init_owl_script')) {

    function soccer_acumen_init_owl_script() {
        $theme_version = wp_get_theme();
        wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), $theme_version->get('Version'));
        wp_enqueue_style('owl.theme', get_template_directory_uri() . '/css/owl.theme.css', array(), $theme_version->get('Version'));
        wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), $theme_version->get('Version'), true);
    }
}

/**
 * @Init Map Library
 * @return 
 */
if (!function_exists('soccer_acumen_enque_map_library')) {

    function soccer_acumen_enque_map_library() {
        $protolcol = is_ssl() ? "https" : "http";
        if (function_exists('fw_get_db_settings_option')) {
            $google_key = fw_get_db_settings_option('google_key');
        } else {
            $google_key = 'AIzaSyDzIBTj0lh1y6Z-nnb2YaBQoj6th5J5iOI'; //Juts for demo crreate your own API : https://developers.google.com/maps/documentation/javascript/get-api-key
        }

        if (empty($google_key)) {
            $google_key = 'AIzaSyDzIBTj0lh1y6Z-nnb2YaBQoj6th5J5iOI'; //Juts for demo crreate your own API : https://developers.google.com/maps/documentation/javascript/get-api-key
        }

        wp_enqueue_script('soccer_acumen_jquery_goolge_places', $protolcol . '://maps.googleapis.com/maps/api/js?key=' . esc_attr($google_key), '', '', true);
        wp_enqueue_script('gmap3.min', get_template_directory_uri() . '/js/gmap3.min.js', '', '', true);
    }

}




/**
 * Load Dynamic Styles for Theme
 */
if (!function_exists('soccer_acumen_print_css')) {

    function soccer_acumen_print_css() {
        require_once (get_template_directory() . '/inc/theme-styling/dynamic-styles.php');
    }

    add_action('wp_head', 'soccer_acumen_print_css');
}

/* Pagination Code Start */
if (!function_exists('soccer_acumen_prepare_pagination')) {

    function soccer_acumen_prepare_pagination($pages = '', $range = 4) {
        global $paged;

        $showitems = ($range * 2) + 1;

        if (empty($paged)) {
            $current_page = 1;
        }

        $current_page = $paged;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        } else {
            $pages = ceil($pages / $range);
        }

        if (1 != $pages) {
            echo '<nav class="tg-pagination"><ul>';
            if ($current_page > 2 && $current_page > $range + 1 && $showitems < $pages) {
                //echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
            }

            if ($current_page > 1) {
                echo "<li class=\"tg-prevpage\"><a class='' href='" . get_pagenum_link($current_page - 1) . "'><span class=\"fa fa-angle-left\"></span></a></li>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $current_page + $range + 1 || $i <= $current_page - $range - 1) || $pages <= $showitems )) {
                    echo ($paged == $i) ? "<li class='active'><a href='javascript:;'>" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a></li>";
                }
            }

            if ($current_page < $pages) {
                echo "<li class=\"tg-nextpage\"><a class='' href=\"" . get_pagenum_link($current_page + 1) . "\"><span class=\"fa fa-angle-right\"></span></a></li>";
            }

            if ($current_page < $pages - 1 && $current_page + $range - 1 < $pages && $showitems < $pages) {
                //echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
            }
            echo "</ul></nav>";
        }
    }

}


/**
 * @get post thumbnail
 * @return thumbnail url
 */
if (!function_exists('soccer_acumen_prepare_thumbnail')) {

    function soccer_acumen_prepare_thumbnail($post_id, $width = '300', $height = '300') {
        global $post;

        if (has_post_thumbnail()) {
            get_the_post_thumbnail();
            $thumb_id = get_post_thumbnail_id($post_id);
            $thumb_url = wp_get_attachment_image_src($thumb_id, array($width, $height), true);

            if ($thumb_url[1] == $width and $thumb_url[2] == $height) {
                return $thumb_url[0];
            } else {
                $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
                return $thumb_url[0];
            }
        }
    }

}

/**
 * @get post thumbnail
 * @return thumbnail url
 */
if (!function_exists('soccer_acumen_get_attached_image')) {

    function soccer_acumen_get_attached_image($thumb_id, $width = '300', $height = '300') {
        global $post;

        $thumb_url = wp_get_attachment_image_src($thumb_id, array($width, $height), true);

        if ($thumb_url[1] == $width and $thumb_url[2] == $height) {
            return $thumb_url[0];
        } else {
            $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
            return $thumb_url[0];
        }
    }

}

/**
 * @Hook Favicon
 * @return favicon
 */
if (!function_exists('soccer_acumen_get_favicon')) {

    function soccer_acumen_get_favicon() {

        if (!function_exists('has_site_icon') || !has_site_icon()) {
            if (!function_exists('fw_get_db_settings_option')) {
                return;
            } else {
                $soccer_acumen_favicaon = fw_get_db_settings_option('favicon');
                if (isset($soccer_acumen_favicaon['url'])) {
                    echo '<link rel="shortcut icon" href="' . esc_url($soccer_acumen_favicaon['url']) . '">';
                }
            }
        } else {
            soccer_acumen_wp_favicon();
        }
    }

}

/**
 * @get Categories
 * @return categories
 */
if (!function_exists('soccer_acumen_prepare_categories')) {

    function soccer_acumen_prepare_categories($soccer_acumen_post_cat) {
        global $post, $wpdb;

        if (isset($soccer_acumen_post_cat) && $soccer_acumen_post_cat != '' && $soccer_acumen_post_cat != '0') {
            $soccer_acumen_current_category = $wpdb->get_row($wpdb->prepare("SELECT * from $wpdb->terms WHERE slug = %s", $soccer_acumen_post_cat));
            echo '<span class="tg-cats"><i class="fa fa-folder-open"></i><a href="' . esc_url(site_url('/')) . '?cat=' . $soccer_acumen_current_category->term_id . '">' . $soccer_acumen_current_category->name . '</a></span>';
        } else {
            $before_cat = '<span class="tg-cats"><i class="fa fa-folder-open"></i>';
            $after_cat = '</span>';
            echo get_the_term_list(get_the_id(), 'category', $before_cat, ', ', $after_cat);
        }
    }

}

/**
 * @prepare Custom taxonomies array
 * @return array
 */
if (!function_exists('soccer_acumen_prepare_taxonomies')) {

    function soccer_acumen_prepare_taxonomies($post_type = 'post', $taxonomy = 'category', $hide_empty = 1, $dataType = '') {
        $args = array(
            'type' => $post_type,
            'child_of' => 0,
            'parent' => '',
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => $hide_empty,
            'hierarchical' => 1,
            'exclude' => '',
            'include' => '',
            'number' => '',
            'taxonomy' => $taxonomy,
            'pad_counts' => false
        );

        $categories = get_categories($args);

        if ($dataType == 'array') {
            return $categories;
        }

        $custom_cats = array();

        if (isset($categories) && !empty($categories)) {
            foreach ($categories as $key => $value) {
                $custom_cats[$value->term_id] = $value->name;
            }
        }
        return $custom_cats;
    }

}

/**
 * @Favicon Fallback
 * @return favicon
 */
if (!function_exists('soccer_acumen_wp_favicon')) {

    function soccer_acumen_wp_favicon() {

        if (!has_site_icon() && !is_customize_preview()) {
            return;
        }

        $meta_tags = array(
            sprintf('<link rel="icon" href="%s" sizes="32x32" />', esc_url(get_site_icon_url(32))),
            sprintf('<link rel="icon" href="%s" sizes="192x192" />', esc_url(get_site_icon_url(192))),
            sprintf('<link rel="apple-touch-icon-precomposed" href="%s">', esc_url(get_site_icon_url(180))),
            sprintf('<meta name="msapplication-TileImage" content="%s">', esc_url(get_site_icon_url(270))),
        );

        /**
         * Filter the site icon meta tags, so Plugins can add their own.
         *
         * @since 4.3.0
         *
         * @param array $meta_tags Site Icon meta elements.
         */
        $meta_tags = apply_filters('site_icon_meta_tags', $meta_tags);
        $meta_tags = array_filter($meta_tags);

        foreach ($meta_tags as $meta_tag) {
            echo "$meta_tag\n";
        }
    }

}

/**
 * @get next post
 * @return link
 */
if (!function_exists('soccer_acumen_next_post')) {

    function soccer_acumen_next_post($format) {
        $format = str_replace('href=', 'class="next-post" href=', $format);
        return $format;
    }

    add_filter('next_post_link', 'soccer_acumen_next_post');
}

/**
 * @get next post
 * @return link
 */
if (!function_exists('soccer_acumen_previous_post')) {

    function soccer_acumen_previous_post($format) {
        $format = str_replace('href=', 'class="prev-postt" href=', $format);
        return $format;
    }

    add_filter('previous_post_link', 'soccer_acumen_previous_post');
}


/**
 * @get previous post
 * @return link
 */
if (!function_exists('soccer_acumen_prepare_rev_slider')) {

    function soccer_acumen_prepare_rev_slider() {
        $revsliders[] = esc_html__('Select Slider', 'soccer-acumen');
        if (class_exists('RevSlider')) {
            $slider = new RevSlider();
            $arrSliders = $slider->getArrSliders();
            $revsliders = array();
            if ($arrSliders) {
                foreach ($arrSliders as $key => $slider) {
                    $revsliders[$slider->getId()] = $slider->getAlias();
                }
            }
        }

        return $revsliders;
    }

}

/**
 * @get sliders
 * @return {}
 */
if (!function_exists('soccer_acumen_prepare_sliders')) {

    function soccer_acumen_prepare_sliders() {
        global $post, $product;
        $args = array('posts_per_page' => '-1', 'post_type' => 'tg_slider', 'orderby' => 'ID', 'post_status' => 'publish');
        $cust_query = get_posts($args);

        $sliders[0] = esc_html__('Select Slider', 'soccer-acumen');

        if (isset($cust_query) && is_array($cust_query) && !empty($cust_query)) {
            foreach ($cust_query as $key => $slider) {
                $sliders[$slider->ID] = get_the_title($slider->ID);
            }
        }
        return $sliders;
    }

}

/**
 * @get teams/league
 * @return {}
 */
if (!function_exists('soccer_acumen_prepare_league')) {

    function soccer_acumen_prepare_league() {
        global $post, $product;
        $args = array('posts_per_page' => '-1', 'post_type' => 'tg_league', 'orderby' => 'ID', 'post_status' => 'publish');
        $cust_query = get_posts($args);

        $teams[0] = esc_html__('Select Team', 'soccer-acumen');
        if (isset($cust_query) && is_array($cust_query) && !empty($cust_query)) {
            foreach ($cust_query as $key => $team) {
                $teams[$team->ID] = get_the_title($team->ID);
            }
        }
        return $teams;
    }

}

/**
 * @get Players
 * @return {}
 */
if (!function_exists('soccer_acumen_top_player')) {

    function soccer_acumen_top_player() {
        global $post, $product;
        $args = array('posts_per_page' => '-1', 'post_type' => 'tg_player', 'orderby' => 'ID', 'post_status' => 'publish');
        $cust_query = get_posts($args);

        $players[0] = esc_html__('Select Top Player', 'soccer-acumen');
        if (isset($cust_query) && is_array($cust_query) && !empty($cust_query)) {
            foreach ($cust_query as $key => $player) {
                $players[$player->ID] = get_the_title($player->ID);
            }
        }
        return $players;
    }

}

if (!function_exists('soccer_acumen_featured_product')) {

    function soccer_acumen_featured_product() {
        global $post, $product;
        $args = array(
            'posts_per_page' => '-1',
            'post_type' => 'product',
            'orderby' => 'ID',
            'meta_query' => array(
                array(
                    'key' => '_featured',
                    'value' => 'yes',
                ),
        ));
        $cust_query = get_posts($args);
        $feature_products[0] = esc_html__('Select Product', 'soccer-acumen');
        if (isset($cust_query) && is_array($cust_query) && !empty($cust_query)) {
            foreach ($cust_query as $key => $feature_product) {
                $feature_products[$feature_product->ID] = get_the_title($feature_product->ID);
            }
        }
        return $feature_products;
    }

}
if (!function_exists('soccer_acumen_prepare_upcoming_fixture')) {

    function soccer_acumen_prepare_upcoming_fixture() {
        global $post, $product;
        $current_date = strtotime(date("Y-m-d H:i:s"));
        $args = array(
            'posts_per_page' => '-1',
            'post_type' => 'tg_fixture',
            'orderby' => 'ID',
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'date_match_string',
                    'value' => $current_date,
                    'compare' => '>',
                ),
            ),
        );

        $cust_query = get_posts($args);

        $fixtures[] = esc_html__('Select Fixture', 'soccer-acumen');
        if (isset($cust_query) && is_array($cust_query) && !empty($cust_query)) {
            foreach ($cust_query as $key => $fixture) {
                $fixtures[$fixture->ID] = get_the_title($fixture->ID);
            }
        }
        return $fixtures;
    }

}



/**
 * @get custom Excerpt
 * @return link
 */
if (!function_exists('soccer_acumen_prepare_custom_excerpt')) {

    function soccer_acumen_prepare_custom_excerpt($more = '...') {
        return '....';
    }

    add_filter('excerpt_more', 'soccer_acumen_prepare_custom_excerpt');
}

/**
 * @get Excerpt
 * @return link
 */
if (!function_exists('soccer_acumen_prepare_excerpt')) {

    function soccer_acumen_prepare_excerpt($charlength = '255', $more = 'true', $text = 'Read More', $strip_tags = 'yes') {
        global $post;
        $excerpt_data = '';
        $excerpt = trim(preg_replace('/<a[^>]*>(.*)<\/a>/iU', '', get_the_content()));
        if (strlen($excerpt) > $charlength) {
            if ($charlength > 0) {
                $excerpt = substr($excerpt, 0, $charlength);
            } else {
                $excerpt = $excerpt;
            }
            if ($more == 'true') {
                $link = '<a href="' . esc_url(get_permalink()) . '" class="tg-more">' . esc_attr($text) . '</a>';
            } else {
                $link = '...';
            }

            $excerpt_data = force_balance_tags($excerpt . $link);
        } else {
            $excerpt_data = force_balance_tags($excerpt);
        }

        echo strip_tags($excerpt_data);
    }

}

/**
 * @get Excerpt by id
 * @return link
 */
if (!function_exists('soccer_acumen_prepare_excerpt_by_id')) {

    function soccer_acumen_prepare_excerpt_by_id($post_id, $charlength = '255') {
        global $post;
        $excerpt_data = '';
        $post = get_post($post_id);
        setup_postdata($post);

        $excerpt = trim(preg_replace('/<a[^>]*>(.*)<\/a>/iU', '', get_the_content()));
        if (strlen($excerpt) > $charlength) {
            if ($charlength > 0) {
                $excerpt = substr($excerpt, 0, $charlength);
            } else {
                $excerpt = $excerpt;
            }

            $excerpt_data = force_balance_tags($excerpt);
        } else {
            $excerpt_data = force_balance_tags($excerpt);
        }

        wp_reset_postdata($post);
        echo strip_tags($excerpt_data);
    }

}

/**
 * @Featured Product Categories
 * @return {}
 */
if (!function_exists('soccer_acumen_prepare_product_categories')) {

    function soccer_acumen_prepare_product_categories() {
        global $post, $product;
        $categories = array();
        if (class_exists('woocommerce')) {
            $taxonomy = 'product_cat';
            $orderby = 'name';
            $show_count = 0;      // 1 for yes, 0 for no
            $pad_counts = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no  
            $title = '';
            $empty = 0;

            $args = array(
                'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'hide_empty' => $empty
            );

            $terms = get_categories($args);
            if (isset($terms) && !empty($terms)) {
                foreach ($terms as $term) {
                    $categories[$term->term_id] = $term->name;
                }
            }
        }
        return $categories;
    }

}

/**
 * @Esc Data
 * @return categories
 */
if (!function_exists('soccer_acumen_esc_specialchars')) {

    function soccer_acumen_esc_specialchars($data = '') {
        return $data;
    }

}
/**
 * @Prepare social sharing links
 * @return sizes
 */
if (!function_exists('soccer_acumen_prepare_social_sharing')) {

    function soccer_acumen_prepare_social_sharing($default_icon = 'false', $title = false, $heading = 'Share') {
        soccer_acumen_init_share_script();
        $facebook = esc_html__('Facebook', 'soccer-acumen');
        $twitter = esc_html__('Twitter', 'soccer-acumen');
        $email = esc_html__('E-mail', 'soccer-acumen');
        $tumblr2 = esc_html__('Tumblr', 'soccer-acumen');
        $dribbble2 = esc_html__('Dribbble', 'soccer-acumen');
        $instagram = esc_html__('Instagram', 'soccer-acumen');
        $youtube = esc_html__('Youtube', 'soccer-acumen');


        if (function_exists('fw_get_db_post_option')) {
            $social_facebook = fw_get_db_settings_option('social_facebook');
            $social_twitter = fw_get_db_settings_option('social_twitter');
            $social_email = fw_get_db_settings_option('social_email');
            $social_tumbler = fw_get_db_settings_option('social_tumbler');
            $social_dribble = fw_get_db_settings_option('social_dribble');
            $social_instagram = fw_get_db_settings_option('social_instagram');
            $social_youtube = fw_get_db_settings_option('social_youtube');
        } else {
            $social_facebook = 'enable';
            $social_twitter = 'enable';
            $social_email = 'enable';
            $social_tumbler = '';
            $social_dribble = '';
            $social_instagram = '';
            $social_youtube = '';
        }

        $output = '<i class="fa fa-share-square-o"></i>';
        if ($title == true) {
            $output .='<span>' . $heading . '</span>';
        }

        $output .='<ul>';
        if (isset($social_facebook) && $social_facebook == 'enable') {
            $output .='<li class="facebook"><a class="addthis_button_facebook" data-original-title="' . $facebook . '"><i class="fa fa-facebook-f" data-iconname="on facebook"></i></a></li>';
        }
        if (isset($social_twitter) && $social_twitter == 'enable') {
            $output .='<li class="twitter"><a class="addthis_button_twitter" data-original-title="' . $twitter . '"><i class="fa fa-twitter tg-tw" data-iconname="on twitter"></i></a></li>';
        }
        if (isset($social_email) && $social_email == 'enable') {
            $output .='<li class="google"><a class="addthis_button_google" data-original-title="' . $email . '"><i class="fa fa-google-plus" data-iconname="on google"></i></a></li>';
        }
        if (isset($social_tumbler) && $social_tumbler == 'enable') {
            $output .='<li class="tumblr"><a class="addthis_button_tumblr" data-original-title="' . $tumblr2 . '"><i class="fa fa-tumblr" data-iconname="on tumblr"></i></a></li>';
        }
        if (isset($social_dribble) && $social_dribble == 'enable') {
            $output .='<li class="dribbble" ><a class="addthis_button_dribbble" data-original-title="' . $dribbble2 . '"><i class="fa fa-dribbble" data-iconname="on dribbble"></i></a></li>';
        }
        if (isset($social_instagram) && $social_instagram == 'enable') {
            $output .='<li class="instagram"><a class="addthis_button_instagram" data-original-title="' . $instagram . '"><i class="fa fa-instagram" data-iconname="on instagram" ></i></a></li>';
        }
        if (isset($social_youtube) && $social_youtube == 'enable') {
            $output .='<li class="youtube"><a class="addthis_button_youtube" data-original-title="' . $youtube . '"><i class="fa fa-youtube" data-iconname="on youtub"></i></a></li>';
        }
        $output .='</ul>';
        echo balanceTags($output, true);
    }

}

/**
 * @Custom post types
 * @return {}
 */
if (!function_exists('soccer_acumen_prepare_custom_posts')) {

    function soccer_acumen_prepare_custom_posts($post_type = 'post') {
        $posts_array = array();
        $args = array('posts_per_page' => "-1", 'post_type' => $post_type, 'order' => 'DESC', 'orderby' => 'ID', 'post_status' => 'publish', 'ignore_sticky_posts' => 1);

        $posts_query = get_posts($args);
        foreach ($posts_query as $post_data) :
            $posts_array[$post_data->ID] = $post_data->post_title;
        endforeach;
        return $posts_array;
    }

}

if (!function_exists('soccer_acumen_no_ssl_http_request_args')) {
    add_action('http_request_args', 'soccer_acumen_no_ssl_http_request_args', 10, 2);

    function soccer_acumen_no_ssl_http_request_args($args, $url) {
        $args['sslverify'] = false;
        return $args;
    }

}


/**
 * @User Public Profile
 * @return {}
 */
if (!function_exists('soccer_acumen_edit_user_profile_edit')) {

    function soccer_acumen_edit_user_profile_edit($contactoptions) {
        $display_img_url = '';
        $display = $display_image = 'block';

        $display_img_url = soccer_acumen_get_user_avatar(0, $contactoptions->ID, 'author_photo');

        if (empty($display_img_url)) {
            $display_image = 'elm-display-none';
        }
        ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th> <?php esc_html_e('Display Photo', 'soccer-acumen'); ?></th>
                    <td>
                        <input type="hidden" name="author_photo" class="media-image" id="author_photo"  value="<?php echo soccer_acumen_get_user_avatar(0, $contactoptions->ID, 'author_photo'); ?>" />
                        <input type="button" id="upload-user-avatar" class="button button-secondary" value="Uplaod Public Avatar" />
                    </td>
                </tr>
                <tr id="avatar-wrap" class="<?php echo esc_attr($display_image); ?>">
                    <td class="backgroud-image">
                        <a href="javascript:;" class="delete-auhtor-media"><i class="fa fa-times"></i></a>
                        <img class="avatar-src-style" height="100px" src="<?php echo esc_url($display_img_url); ?>" id="avatar-src" />

                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

}

/**
 * @Get User Avatar
 * @return {}
 */
if (!function_exists('soccer_acumen_get_user_avatar')) {

    function soccer_acumen_get_user_avatar($size = 0, $soccer_acumen_user_id = '', $image_type = 'author_photo') {
        if ($soccer_acumen_user_id != '') {
            $soccer_acumen_user_avatars = get_the_author_meta($image_type, $soccer_acumen_user_id);

            if (is_array($soccer_acumen_user_avatars) && isset($soccer_acumen_user_avatars[$size])) {
                return $soccer_acumen_user_avatars[$size];
            } else if (!is_array($soccer_acumen_user_avatars) && $soccer_acumen_user_avatars <> '') {
                return $soccer_acumen_user_avatars;
            }
        }
    }

}

/**
 * @Set Post Views
 * @return {}
 */
if (!function_exists('soccer_acumen_post_views')) {

    function soccer_acumen_post_views($post_id = '') {
        if (!isset($_COOKIE["set_blog_view" . $post_id])) {
            setcookie("set_blog_view" . $post_id, 'post_view_count', time() + 3600);
            $view_key = 'set_blog_view';

            $count = get_post_meta($post_id, $view_key, true);

            if ($count == '') {
                $count = 0;
                delete_post_meta($post_id, $view_key);
                add_post_meta($post_id, $view_key, '0');
            } else {
                $count++;
                update_post_meta($post_id, $view_key, $count);
            }
        }
    }

}

/**
 * @Get Post Views
 * @return {}
 */
if (!function_exists('soccer_acumen_get_post_views')) {

    function soccer_acumen_get_post_views($post_id) {
        $view_key = 'set_blog_view';
        $count = get_post_meta($post_id, $view_key, true);
        if ($count == '') {
            delete_post_meta($post_id, $view_key);
            add_post_meta($post_id, $view_key, '0');
            return "0 ";
        }
        return number_format($count);
    }

}

/**
 * @Get Post Views
 * @return {}
 */
if (!function_exists('soccer_acumen_get_users')) {

    function soccer_acumen_get_users() {
        $users[''] = 'Select Organizer';
        $site_users = get_users('orderby=nicename');
        foreach ($site_users as $user) {
            $users[$user->ID] = $user->display_name;
        }
        return $users;
    }

}

/**
 * @User Public Profile Save
 * @return {}
 */
if (!function_exists('soccer_acumen_personal_options_save')) {

    function soccer_acumen_personal_options_save($user_id) {
        $author_photo = (isset($_POST['author_photo']) && $_POST['author_photo'] <> '') ? $_POST['author_photo'] : '';
        update_user_meta($user_id, 'author_photo', $author_photo);
    }

}

/**
 * @User Public Profile Save
 * @return {}
 */
if (!function_exists('soccer_acumen_get_post_name')) {

    function soccer_acumen_get_post_name($returnClass = 'false') {
        global $post;
        $post_name = '';
        if (isset($post)) {
            $post_name = $post->post_name;
        } else {
            $post_name = '';
        }

        return $post_name;
    }

}

/**
 * @User Public Profile Save
 * @return {}
 */
if (!function_exists('soccer_acumen_comingsoon_background')) {

    function soccer_acumen_comingsoon_background() {
        $background_comingsoon = '';
        if (function_exists('fw_get_db_post_option')) {
            $background = fw_get_db_settings_option('background');
            if (isset($background['url']) && !empty($background['url'])) {
                //Do Nothing
            } else {
                $background['url'] = get_template_directory_uri() . '/images/bg-commingsoon.jpg';
            }
        } else {
            $background['url'] = get_template_directory_uri() . '/images/bg-commingsoon.jpg';
        }

        if (isset($background['url']) && !empty($background['url'])) {
            $background_comingsoon = $background['url'];
        }

        return $background_comingsoon;
    }

}

/**
 * @Language Handler
 * @return {sub menu class}
 */
add_action('fw_ext_translation_change_render_language_switcher', function ( $html, $frontend_urls ) {
    $html = '';
    //fw_print($frontend_urls);
    foreach ($frontend_urls as $lang_code => $url) {
        $html .= '<li><a href="' . esc_attr($url) . '"><img src="' . fw_ext_translation_get_flag($lang_code) . '" alt="' . $lang_code . '"><span>' . $lang_code . '</span></a></li>';
    }
    return $html;
}, 10, 2);

/**
 * @Naigation Filter
 * @return {sub menu class}
 */
if (!function_exists('soccer_acumen_submenu_class')) {

    function soccer_acumen_submenu_class($menu) {
        $menu = preg_replace('/ class="sub-menu"/', ' class=""', $menu);
        return $menu;
    }

    add_filter('wp_nav_menu', 'soccer_acumen_submenu_class');
}

/**
 * Get Featured Products
 */
if (!function_exists('soccer_acumen_prepare_featured_products')) {

    function soccer_acumen_prepare_featured_products() {
        $featured_posts = array();
        if (class_exists('woocommerce')) {
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'posts_per_page' => -1,
                'meta_query' => array(
                    // get only products marked as featured
                    array(
                        'key' => '_featured',
                        'value' => 'yes'
                    )
                )
            );
            $fetaured_query = get_posts($args);
            if (isset($fetaured_query) && !empty($fetaured_query)) {
                foreach ($fetaured_query as $featured_products) {
                    $featured_posts[$featured_products->ID] = $featured_products->post_title;
                }
            }
        }
        return $featured_posts;
    }

}

/**
 * Get Popular posts
 */
if (!function_exists('soccer_acumen_get_popular_post')) {

    function soccer_acumen_get_popular_post() {
        $posts_array = array();
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => -1,
            'meta_key' => 'set_blog_view',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );

        $posts_query = get_posts($args);
        foreach ($posts_query as $post_data) :
            $posts_array[$post_data->ID] = $post_data->post_title;
        endforeach;
        return $posts_array;
    }

}

/**
 * @Get Page ID
 * @return {}
 */
if (!function_exists('soccer_acumen_get_registered_sidebars')) {

    function soccer_acumen_get_page_id() {
        $object_id = get_queried_object_id();

        if (get_option('show_on_front') && get_option('page_for_posts') && is_home()) {
            $c_pageID = get_option('page_for_posts');
        } else {
            if (isset($object_id)) {
                $c_pageID = $object_id;
            }
            if (!is_singular()) {
                $c_pageID = false;
            }

            // Front page is the posts page
            if (isset($object_id) && get_option('show_on_front') == 'posts' && is_home()) {
                $c_pageID = $object_id;
            }

            if (class_exists('WooCommerce') && ( is_shop() || is_tax('product_cat') || is_tax('product_tag') )) {
                $c_pageID = get_option('woocommerce_shop_page_id');
            }
        }

        return $c_pageID;
    }

}


// Declare WooCommerce support
add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
    add_theme_support('woocommerce');
}

/**
 * @Custom Title Linking
 * @return {}
 */
if (!function_exists('soccer_acumen_get_registered_sidebars')) {

    function soccer_acumen_get_registered_sidebars() {
        global $wp_registered_sidebars;
        $sidebars = array();
        foreach ($wp_registered_sidebars as $key => $sidebar) {
            $sidebars[$key] = $sidebar['name'];
        }
        return $sidebars;
    }

}
/**
 * @Custom Title Linking
 * @return {}
 */
if (!function_exists('soccer_acumen_insert_automatic_post_title')) {

    function soccer_acumen_insert_automatic_post_title($postID, $post) {
        if (get_post_type() == 'page' || get_post_type() == 'post' || get_post_type() == 'tg_slider'
        ) {
            if ($post->post_title === '') {
                $post->post_title = '[' . get_the_date('Y-m-d H:i:s') . ']';
                $result = wp_update_post($post);
            }
        }
    }

    add_action('publish_post', 'soccer_acumen_insert_automatic_post_title', 10, 2);
    add_action('publish_page', 'soccer_acumen_insert_automatic_post_title', 15, 2);
    add_action('publish_tg_slider', 'soccer_acumen_insert_automatic_post_title', 20, 2);
    add_action('publish_tg_teams', 'soccer_acumen_insert_automatic_post_title', 30, 2);
    add_action('publish_tg_projects', 'soccer_acumen_insert_automatic_post_title', 30, 2);
    add_action('publish_tg_gallery_type', 'soccer_acumen_insert_automatic_post_title', 30, 2);
}

/**
 * @Add Images Sizes
 * @return sizes
 */
add_image_size('soccer_acumen_slider_v1', 1920, 616, true);
add_image_size('soccer_acumen_single_blog', 1170, 400, true);
add_image_size('soccer_acumen_list_blog', 520, 201, true);
add_image_size('soccer_acumen_grid_blog', 370, 200, true);
add_image_size('soccer_acumen_shop_image_size', 272, 415, true);
add_image_size('soccer_acumen_soccer_history', 260, 260, true);
add_image_size('soccer_acumen_player', 245, 416, true);
add_image_size('soccer_acumen_shop_detail_thumbnail', 70, 106, true);

