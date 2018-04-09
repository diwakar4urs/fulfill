<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>
<div class="sc-grid-blog">
    <div class="tg-blogpost tg-blogpostgrid">
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
			$width = '370';
            $height = '200';
            $thumbnail = soccer_acumen_prepare_thumbnail($post->ID, $width, $height);
            
			if (!function_exists('fw_get_db_post_option')) {
                $enable_auhtor_info = '';
                $enable_comments = '';
                $enable_category = '';
            } else {
                $enable_auhtor_info = fw_get_db_post_option($post->ID, 'enable_auhtor_info', true);
                $enable_comments = fw_get_db_post_option($post->ID, 'enable_comments', true);
                $enable_category = fw_get_db_post_option($post->ID, 'enable_category', true);
            }
            
             if ( !empty( $thumbnail ) ) {
                $thumbnail = $thumbnail;
            } else {
                $thumbnail = get_template_directory_uri() . '/images/blog-grid.png';
            }
			
        ?>
        <div class="col-sm-6">
            <article class="tg-post">
                <figure class="tg-postimg">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <img width="245" src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                    </a>
                    <figcaption>
                        <ul class="tg-postmetadata">
                            <?php if (isset($enable_auhtor_info) && $enable_auhtor_info === 'enable') { ?>
                                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_html_e('by', 'soccer-acumen'); ?> <?php echo ucfirst(get_the_author_meta('nickname')); ?></a></li>
                            <?php } ?>
                            <?php if (isset($enable_comments) && $enable_comments === 'enable') { ?>
                                   <li><?php comments_popup_link('<span>0 '.esc_html__('Comments','soccer-acumen').'</span>', ''.esc_html__('Comments','soccer-acumen').'&nbsp;<span>1</span>', ''.esc_html__('Comments','soccer-acumen').'&nbsp;<span> %</span>', 'comments-link', '0'); ?></li>
                            <?php } ?>
                            <?php if (isset($enable_category) && $enable_category === 'enable') { ?>
                                <li><?php echo get_the_category_list(',', $post->ID); ?></li>
                            <?php } ?>
                        </ul>
                    </figcaption>
                </figure>
                <div class="tg-posttitle"><h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3></div>
                <?php 
                    if ( isset($atts['show_description']) 
                           && 
                           $atts['show_description'] === 'show'
                           && 
                           $atts['excerpt_length'] > 0 ) 
                    { ?>
                    <div class="tg-description">
                        <p><?php soccer_acumen_prepare_excerpt($atts['excerpt_length'], 'false', ''); ?></p>
                    </div>
                <?php } ?>
                    <a class="tg-btn" href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('Read more', 'soccer-acumen'); ?></a>
            </article>
        </div>
        <?php
			endwhile;
			wp_reset_postdata();
        ?>
    </div>
    <?php 
        if (isset($atts['show_pagination']) && $atts['show_pagination'] == 'yes') :
            soccer_acumen_prepare_pagination($count_post, $show_posts);
        endif;
	?>
</div>
