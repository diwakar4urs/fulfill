<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */

$pattern	= '';
if (!empty($atts['texture_image']['url'])) {
	$pattern	= ' style="background-image: url('.$atts['texture_image']['url'].');"';
}

?>
<div class="sc-latest-match tg-bgstyleone">
<?php
	if( !empty( $atts['current_match'] ) ) {
	?>
    <div class="tg-bgboxone"></div>
    <div class="tg-bgboxtwo"></div>
    <div class="tg-bgpattrant"<?php echo ( $pattern );?>>
		<?php 
            //Main Query	
            $args = array(
                'posts_per_page' => 1,
                'post_type' => 'tg_fixture',
                'post__in ' => array( $atts['current_match'] ),
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1
            );
            
            $query = new WP_Query($args);
            $current_date	= strtotime(date('Y-m-d'));
            $flag	= rand(1,9999);
			if( $query->have_posts() > 0 ) {
                while ($query->have_posts()) : $query->the_post();
                    global $post;
                    $background_image = '';
                    $match_date = fw_get_db_post_option($post->ID, 'date_match', true);
                    $formatted_date = date('Y,m,d', strtotime($match_date.'-1 month'));
                ?>
        	 <div class="container">
               <div class="row">
               <div class="tg-upcomingmatch-counter">
                    <?php if (!empty($atts['player_image']['url'])) { ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs">
                            <figure>
                                <img src="<?php echo esc_url($atts['player_image']['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                            </figure>
                        </div>
                    <?php } ?>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="tg-contentbox">
                            <div class="tg-section-heading"><h2><?php the_title(); ?></h2></div>
                            <?php 
							if ( isset($atts['show_description']) 
								&& $atts['show_description'] === 'show'
								&& isset($atts['excerpt_length']) 
								&& $atts['excerpt_length'] > 0
							) { ?>
                                <div class="tg-description">
                                    <p><?php soccer_acumen_prepare_excerpt($atts['excerpt_length'], 'false', ''); ?></p>
                                </div>
                            <?php } ?>
                            <?php if( strtotime( $match_date ) > $current_date ) {?>
                            <div class="tg-counters">
                                <div id="tg-days-<?php echo esc_attr( $flag );?>" class="tg-counter tg-days"></div>
                                <div id="tg-hours-<?php echo esc_attr( $flag );?>" class="tg-counter tg-hour"></div>
                                <div id="tg-minutes-<?php echo esc_attr( $flag );?>" class="tg-counter tg-minutes"></div>
                                <div id="tg-seconds-<?php echo esc_attr( $flag );?>" class="tg-counter tg-seconds"></div>
                            </div>
                            <?php } ?>
                            <div class="tg-btnbox">
                                <a class="tg-btn" href="<?php echo esc_url(get_the_permalink()); ?>">
                                   <span><?php esc_html_e('Read More','soccer-acumen');?></span>
                                </a>
                            </div>
                        </div>
                    </div>
               </div>
               <?php if( strtotime( $match_date ) > $current_date ) {?>
			   <script>
				jQuery(document).ready(function(e) {
                    var launch = new Date('<?php echo esc_js($formatted_date); ?>');
					var days = jQuery('#tg-days-<?php echo esc_js( $flag );?>');
					var hours = jQuery('#tg-hours-<?php echo esc_js( $flag );?>');
					var minutes = jQuery('#tg-minutes-<?php echo esc_js( $flag );?>');
					var seconds = jQuery('#tg-seconds-<?php echo esc_js( $flag );?>');
					setDate();
					function setDate() {
						var now = new Date();
						if (launch < now) {
							days.html('<h3>0</h3><h4><?php esc_html_e('Day','soccer-acumen');?></h4>');
							hours.html('<h3>0</h3><h4><?php esc_html_e('Hour','soccer-acumen');?></h4>');
							minutes.html('<h3>0</h3><h4><?php esc_html_e('Minute','soccer-acumen');?></h4>');
							seconds.html('<h3>0</h3><h4><?php esc_html_e('Second','soccer-acumen');?></h4>');
						}
						else {
							var s = -now.getTimezoneOffset() * 60 + (launch.getTime() - now.getTime()) / 1000;
							var d = Math.floor(s / 86400);
							days.html('<h3>' + d + '</h3><h4><?php esc_html_e('Day','soccer-acumen');?>' + (d > 1 ? 's' : ''), '</h4>');
							s -= d * 86400;
							var h = Math.floor(s / 3600);
							hours.html('<h3>' + h + '</h3><h4><?php esc_html_e('Hour','soccer-acumen');?>' + (h > 1 ? 's' : ''), '</h4>');
							s -= h * 3600;
							var m = Math.floor(s / 60);
							minutes.html('<h3>' + m + '</h3><h4><?php esc_html_e('Minute','soccer-acumen');?>' + (m > 1 ? 's' : ''), '</h4>');
							s = Math.floor(s - m * 60);
							seconds.html('<h3>' + s + '</h3><h4><?php esc_html_e('Second','soccer-acumen');?>' + (s > 1 ? 's' : ''), '</h4>');
							setTimeout(setDate, 1000);
						}
					}
                });	
				</script>
                </div>
               </div>
               <?php 
			   }
               //Loop End
			   endwhile;
               wp_reset_postdata();
            }
        ?>
    </div> 
<?php }?>
</div>


