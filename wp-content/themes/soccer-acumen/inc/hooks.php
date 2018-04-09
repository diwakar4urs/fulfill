<?php


/**
 * @User Profile Social Icons
 * @return 
 */
if (!function_exists('soccer_acumen_replace_reply_link_class')) {

    function soccer_acumen_replace_reply_link_class($class) {
        $class = str_replace("class='comment-reply-link", "class='tg-btnreply", $class);
        return $class;
    }

    add_filter('comment_reply_link', 'soccer_acumen_replace_reply_link_class');
}

/**
 * @Section wraper before
 * @return 
 */
if (!function_exists('soccer_acumen_prepare_section_wrapper_before')) {

    function soccer_acumen_prepare_section_wrapper_before() {
        echo '<div class="main-page-wrapper tg-haslayout exclude-sidebar">';
    }

    add_action('soccer_acumen_prepare_section_wrapper_before', 'soccer_acumen_prepare_section_wrapper_before');
}
/**
 * @Section wraper after
 * @return 
 */
if (!function_exists('soccer_acumen_prepare_section_wrapper_after')) {

    function soccer_acumen_prepare_section_wrapper_after() {
        echo '</div>';
    }

    add_action('soccer_acumen_prepare_section_wrapper_after', 'soccer_acumen_prepare_section_wrapper_after');
}

/**
 * @Move Comment Field To Bottom
 * @return 
 */
if (!function_exists('soccer_acumen_move_comment_field_to_bottom')) {

    function soccer_acumen_move_comment_field_to_bottom($fields) {
        $comment_field = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment_field;
        return $fields;
    }

}
add_filter('comment_form_fields', 'soccer_acumen_move_comment_field_to_bottom');

/**
 * @Move Tag class
 * @return 
 */
if (!function_exists('soccer_acumen_the_tags')) {

    function soccer_acumen_the_tags($html) {
        $postid = get_the_ID();
        $html = str_replace('<a', '<a class="tg-btn"', $html);
        return $html;
    }

}
add_filter('the_tags', 'soccer_acumen_the_tags');
/**
 * @Add Body Class
 * @return 
 */
if (!function_exists('soccer_acumen_content_classes')) {

    function soccer_acumen_content_classes($classes) {
        $post_name = soccer_acumen_get_post_name();
        if (( isset($maintenance) && $maintenance == 'enable' && !is_user_logged_in() ) || $post_name == "coming-soon") {
            $classes[] = 'tg-comming-soon';
        } else {
            if (is_home() || is_front_page()) {
                $classes[] = 'home ';
            }
        }

        $classes[] = soccer_acumen_get_post_name('true'); //Demo Purpose
        //Header class
        if (function_exists('fw_get_db_settings_option')) {
            $header_type = fw_get_db_settings_option('header_type');
        } else {
            $header_type = '';
        }
        if (isset($header_type['gadget']) && $header_type['gadget'] === 'header_v1') {
            $classes[] = 'soccer-header-v1';
        } else if (isset($header_type['gadget']) && $header_type['gadget'] === 'header_v2') {
            $classes[] = 'soccer-header-v2';
        } else {
            $classes[] = 'soccer-header-default';
        }

        $classes[] = '';
        return $classes;
    }

    add_filter('body_class', 'soccer_acumen_content_classes', 1);
}

/**
 * @Footer Hook
 * @return 
 */
if (!function_exists('soccer_acumen_add_footer_scripts')) {

    function soccer_acumen_add_footer_scripts() {
        
    }

    add_action('wp_footer', 'soccer_acumen_add_footer_scripts');
}

/**
 * @Footer Menu
 * @return 
 */
if (!function_exists('soccer_acumen_theme_admin_footer_links')) {

    function soccer_acumen_theme_admin_footer_links() {
        $theme_version = wp_get_theme();
        echo '<a href="' . $theme_version->get('ThemeURI') . '" title="' . $theme_version->get('Name') . '" target="_blank">' . esc_html__('Soccer Acumen ', 'soccer-acumen') . $theme_version->get('Version') . '</a>';
    }

    add_filter('admin_footer_text', 'soccer_acumen_theme_admin_footer_links');
}

/**
 * @Product Image 
 * @return {}
 */
if (!function_exists('_prepare_post_thumbnail')) {

    function _prepare_post_thumbnail($object, $atts) {
        extract(shortcode_atts(array(
            "width" => '300',
            "height" => '300',
                        ), $atts));

        if (isset($object) && !empty($object)) {
            return $object;
        } else {
            $object_url = get_template_directory_uri() . '/images/placeholder-' . $width . 'x' . $height . '.png';
            return '<img width="' . esc_attr($width) . '" height="' . esc_attr($height) . '" src="' . esc_url($object_url) . '" alt="' . esc_html__('Placeholder', 'soccer-acumen') . '">';
        }
    }

    add_filter('_prepare_post_thumbnail', '_prepare_post_thumbnail', 10, 3);
}

if ( ! function_exists( 'soccer_acumen_get_post_content_excerpt' ) ) {
	/**
	 * Do the actual custom excerpting for of post/page content
	 * @param  string 	$limit 		Maximum number of words or chars to be displayed in excerpt
	 * @param  boolean 	$strip_html Set to TRUE to strip HTML tags from excerpt
	 *
	 * @return string 				The custom excerpt
	 **/
	function soccer_acumen_get_post_content_excerpt() {
		global $more;
		
		$strip_html = TRUE;
		$limit	= 50; 
		$content = '';
		$limit = (int) $limit;
		$custom_excerpt = TRUE;
		
		// If excerpt length is set to 0, return empty
		if ( $limit === 0 ) {
			return $content;
		}

		$post = get_post( get_the_ID() );

		//Check if the more tag is used in the post
		$pos = strpos( $post->post_content, '<!--more-->' );

		// Check if the read more [...] should link to single post
		$read_more = '';

		// HTML tags should be stripped
		if ( $strip_html ) {	
			$more = 0;
			$raw_content = strip_tags( get_the_content( $read_more ), '<p>' );
			
			// Strip out all attributes
			$raw_content = preg_replace('/<(\w+)[^>]*>/', '<$1>', $raw_content);
			
			if ( $post->post_excerpt || 
				$pos !== FALSE
			) {
				$more = 0;
				if ( ! $pos ) {
					$raw_content = strip_tags( rtrim( get_the_excerpt(), '[&hellip;]' ) . $read_more, '<p>' );
				}
				$custom_excerpt = TRUE;
			}
		// HTML tags remain in excerpt
		} else {	
			$more = 0;
			$raw_content = get_the_content( $read_more );
			if ( $post->post_excerpt ||
				$pos !== FALSE
			) {
				$more = 0;
				if ( ! $pos ) {
					$raw_content = rtrim( get_the_excerpt(), '[&hellip;]' ) . $read_more;
				}
				$custom_excerpt = TRUE;
			}
		}
		
		// If we have a custom excerpt, e.g. using the <!--more--> tag
		if ( $custom_excerpt == TRUE ) {
			
			$pattern = get_shortcode_regex();
			$content = $raw_content;
			if ( $strip_html == TRUE ) {
				$content = preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $content ); // strip shortcode and keep the content
				$content = apply_filters( 'the_content', $content );
				$content = str_replace( ']]>', ']]&gt;', $content );
			
			} else {
				$content = apply_filters( 'the_content', $content );
				$content = str_replace( ']]>', ']]&gt;', $content );
			}

			$content = explode( ' ', $content, $limit + 1 );
			if ( count( $content ) > $limit ) {
				array_pop( $content );
				$content = implode( ' ', $content);
				if ( $limit != 0 ) {
					$content .= $read_more;
				}
			} else {
				$content = implode( ' ', $content );
			}

		}

		// If the custom excerpt field is used, just use that contents
		if ( has_excerpt() ) {
			$content = do_shortcode( get_the_excerpt() );
		}

		return strip_tags( $content );
	}
}