<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Ecomatic
 */

$section_width	 = 'col-sm-8';
?>
<div class="<?php echo esc_attr( $section_width );?> page-section">
	<div class="blog-grid blog-detail tg-latest-technology">
		<?php 
			global $paged;
			$tg_get_excerpt	= get_option('rss_use_excerpt');
			get_option('posts_per_page');
			
			if ( have_posts() ) : 
				if (empty($paged)) {
					$paged = 1;
				}
				
				while ( have_posts() ) : the_post(); 
					global $post;
					$width = '1170';
					$height = '450';
					$title_limit = 1000;
					$thumbnail 	 = soccer_acumen_prepare_thumbnail( $post->ID, $width, $height );
					$image_src = soccer_acumen_prepare_thumbnail($post->ID, 'full');
					
					$stickyClass	= '';
					if( is_sticky() ) {
						$stickyClass	= 'sticky';
					}
					
					if (!function_exists('fw_get_db_post_option')) {
						$enable_time = '';
						$enable_auhtor_info = '';
						$enable_comments = '';
						$enable_views = '';
					} else {
						$enable_time = fw_get_db_post_option($post->ID, 'enable_time', true);
						$enable_auhtor_info = fw_get_db_post_option($post->ID, 'enable_auhtor_info', true);
						$enable_comments = fw_get_db_post_option($post->ID, 'enable_comments', true);
						$enable_views = fw_get_db_post_option($post->ID, 'enable_views', true);
					}
				?>                         
				<article class="tg-theme-post tg-category-full">
					<?php if( !empty( $thumbnail ) ) {?>
						<figure>
							<a href="<?php echo esc_url(get_the_permalink()); ?>">
								<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
							</a>
							<figcaption>
							<?php if (is_sticky()) { ?>
									<a class="tg-tag tg-tag-hotstory" href="javascript:;"><i class="fa fa-star"></i></a>
							<?php } ?>
							<?php if (isset($blog_settings['gadget']) && $blog_settings['gadget'] === 'video') {?>
								<a class="tg-tag tg-videotag"><i class="fa fa-play"></i></a>
							<?php }?>
							</figcaption>
						</figure>
					<?php } ?>
					<div class="tg-box">
						<div class="tg-postcontent">
							<div class="tg-border-heading">
								<h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
							</div>
							<?php if (  isset($enable_time) && $enable_time === 'enable' 
									|| (isset($enable_auhtor_info) && $enable_auhtor_info === 'enable')
									|| (isset($enable_comments) && $enable_comments === 'enable') )
								{?>
								
							<ul class="tg-postmetadata">
								<?php if (isset($enable_time) && $enable_time === 'enable') { ?>
									<li>
										<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
											<i class="fa fa-clock-o"></i>
											<span><?php echo date_i18n(get_option('date_format'), strtotime(get_the_date())); ?></span>
										</a>
									</li>
								<?php } ?>
								<?php if (isset($enable_auhtor_info) && $enable_auhtor_info === 'enable') { ?>
									<li>
										<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
											<i class="fa fa-user"></i>
											<span>&nbsp;<?php esc_html_e('by', 'soccer-acumen'); ?> <?php echo ucfirst(get_the_author_meta('nickname')); ?>&nbsp;</span>
										</a>
									</li>
								<?php } ?>
								<?php if (isset($enable_comments) && $enable_comments === 'enable') { ?>
									<li>
										<span><?php comments_popup_link('<i class="fa fa-comments-o"></i>&nbsp;<span>0</span>', '<i class="fa fa-comments-o"></i>&nbsp;<span>1</span>', '<i class="fa fa-comments-o"></i>&nbsp;<span> %</span>', 'comments-link', '0'); ?></span>
									</li>
								<?php } ?>
								<?php if (isset($enable_views) && $enable_views === 'enable') { ?>
									<li>
										<a href="<?php echo esc_url(get_the_permalink()); ?>">
											<i class="fa fa-eye"></i>
											<span><?php echo intval($post_view); ?></span>
										</a>
									</li>
								<?php } ?>
							</ul>
							<?php } ?>
							<div class="tg-description">
								<p><?php soccer_acumen_prepare_excerpt(400, 'false', ''); ?></p>
							</div>
							<div class="tg-read-more">
								<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('Read More','soccer-acumen');?></a>
							</div>
						</div>
					</div>
				</article>
			<?php 
			endwhile; 
			wp_reset_postdata();
		else:
			 esc_html_e('Nothing Found','soccer-acumen');
		endif; 
			$qrystr = '';
			if ($wp_query->found_posts > get_option('posts_per_page')) {
				 if ( function_exists( 'soccer_acumen_prepare_pagination' ) ) { 
						echo soccer_acumen_prepare_pagination(wp_count_posts()->publish,get_option('posts_per_page'));
				 } 
			}
		?>
	</div>
</div>
<div class="col-sm-4 aside sidebar-section" id="sidebar">
	<aside id="tg-sidebar-upper" class="tg-sidebar tg-haslayout">
		<?php get_sidebar();?>
	</aside>
</div>