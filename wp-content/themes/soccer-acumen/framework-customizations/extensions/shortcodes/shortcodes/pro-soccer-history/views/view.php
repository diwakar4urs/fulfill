<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>
<div class="sc-soccer-history tg-prohistory">
    <div class="tg-border-top tg-haslayout">
      <div class="row">
      <?php
        global $paged, $post;
        
		if (empty($paged))
            $paged = 1;
        
		$show_posts = !empty($atts['show_posts']) ? $atts['show_posts'] : -1;
        $data = !empty($atts['get_mehtod']) ? $atts['get_mehtod'] : array();
        $order = !empty($atts['order']) ? $atts['order'] : 'DESC';
        $orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';
        
		if (isset($data['gadget']) && $data['gadget'] === 'by_posts' && !empty($data['by_posts']['posts'])) {
            $posts_in['post__in'] = $data['by_posts']['posts'];
        } else if (isset($data['gadget']) && $data['gadget'] === 'by_cats' && !empty($data['by_cats']['categories'])) {
            $categories_in = $data['by_cats']['categories'];
            $tax_query['cat'] = implode(',', $categories_in);
        }

        $args = array('posts_per_page' => "-1",
            'post_type' => 'post',
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1
        );

        //By Categories
        if (!empty($tax_query)) {
            $args = array_merge($args, $tax_query);
        }

        //By Posts 
        if (!empty($posts_in)) {
            $args = array_merge($args, $posts_in);
        }

        $query = new WP_Query($args);
        $count_post = $query->post_count;

        //Main Query	
        $args = array('posts_per_page' => $show_posts,
            'post_type' => 'post',
            'paged' => $paged,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1
        );

        //By Categories
        if (!empty($tax_query)) {
            $args = array_merge($args, $tax_query);
        }

        //By Posts 
        if (!empty($posts_in)) {
            $args = array_merge($args, $posts_in);
        }
		
        $query = new WP_Query($args);
        
		while ($query->have_posts()) : $query->the_post();
            global $post;
			$width = '260';
            $height = '260';
            $thumbnail = soccer_acumen_prepare_thumbnail($post->ID, $width, $height);
			
            if (!function_exists('fw_get_db_post_option')) {
                $blog_settings = '';
                $video_post = '';
            } else {
                $blog_settings = fw_get_db_post_option($post->ID, 'post_settings', true);
                $video_post = $blog_settings['video']['blog_video_link'];
            }
            
			//
			if (isset($thumbnail) && $thumbnail) {
                $thumbnail = $thumbnail;
            } else {
                $thumbnail = get_template_directory_uri() . '/images/soccer-history.png';
            }
			
			$video_blog = '';
			if (isset($blog_settings['gadget']) && $blog_settings['gadget'] === 'video') {
				$video_blog	= '<a class="tg-playbtn" href="'.esc_url(get_the_permalink()).'"></a>';
			}
            
			?>
			<div class="col-sm-3">
				<article class="tg-post">
					<figure class="tg-postimg">
						<?php echo force_balance_tags($video_blog);?>
						<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
						<figcaption>
							<ul class="tg-postmetadata">
								<li><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('posted on ', 'soccer-acumen'); ?><?php echo get_the_date(get_option('date_format'), $post->ID); ?></a></li>
							</ul>
						</figcaption>
					</figure>
					<div class="tg-posttitle">
						<h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
					</div>
					<?php if (isset($atts['show_description']) && $atts['show_description'] === 'show') { ?>
						<div class="tg-description">
							<p><?php soccer_acumen_prepare_excerpt($atts['excerpt_length'], 'false', ''); ?></p>
						</div>
					<?php } ?>
				</article>
			</div>
		<?php
        endwhile;
        wp_reset_postdata();
        
		if (isset($atts['show_pagination']) && $atts['show_pagination'] == 'yes') :
            soccer_acumen_prepare_pagination($count_post, $show_posts);
        endif;
        ?>
        </div>
    </div>
</div>