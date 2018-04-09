<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$uni_flag = fw_unique_increment();
$background_image = '';
$show_posts	= !empty( $atts['show_posts'] ) ? $atts['show_posts']: 10;
if (!empty($atts['texture_image']['url'])) {
    $background_image = $atts['texture_image']['url'];
}

?>
<div class="sc-home-table">
    <div class="tg-bgboxone"></div>
    <div class="tg-bgboxtwo"></div>
    <div class="tg-bgpattrant" style="background-image:url(<?php echo esc_url($background_image); ?>)">
        <div class="container">
            <div class="row">
                <div class="tg-pointstablewrapper">
                    <div class="col-sm-8 col-xs-12">
                        <div class="tg-pointstable">
                            <?php if (!empty($atts['table_title'])) { ?>
                                <div class="tg-section-heading"><h2><?php echo esc_attr($atts['table_title']); ?></h2></div>
                            <?php } ?>
                            <div id="tg-pointstable-slider-<?php echo esc_attr($uni_flag); ?>" class="tg-pointstable-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    
									$table_title = $atts['table_title'];
                                    $order = !empty($atts['order']) ? $atts['order'] : 'DESC';
                                    $orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';
                                    global $paged;
                                    
									if (empty($paged))
                                        $paged = 1;
                                    
									
									if (isset($data['gadget']) && $data['gadget'] === 'by_posts' && !empty($data['by_posts']['posts'])) {
										$posts_in['post__in'] = $data['by_posts']['posts'];
									} else if (isset($data['gadget']) && $data['gadget'] === 'by_cats' && !empty($data['by_cats']['categories'])) {
										$categories_in = $data['by_cats']['categories'];
										$slugs = array();
										$loop = array();
										if (!empty($categories_in)) {
											foreach ($categories_in as $key => $value) {
												$term = get_term($value, 'league-category');
												$slugs[] = $term->slug;
												$loop[$term->slug] = $term->name;
											}
											$filterable = $slugs;
											$filterable_loop = $loop;
						
											$tax_query['tax_query'] = array('relation' => 'AND', array(
													'taxonomy' => 'league-category',
													'terms' => $filterable,
													'field' => 'slug',
											));
										}
									}
									
									
			
									//Main Query	
                                    $args = array(
                                        'posts_per_page' => $show_posts,
                                        'post_type' => 'tg_league',
                                        'order' => $order,
                                        'orderby' => $orderby,
                                        'post_status' => 'publish',
                                        'ignore_sticky_posts' => 1
                                    );
									
									//By Categories 
									if (!empty($tax_query)) {
										$query_args = array_merge($args, $tax_query);
									}
						
									//By Posts 
									if (!empty($posts_in)) {
										$query_args = array_merge($args, $posts_in);
									}
                                    
									$query = new WP_Query($args);
                                    $counter	= 0;
									while ($query->have_posts()) : $query->the_post();
                                        global $post;
										$counter++;
										
                                        if (!function_exists('fw_get_db_post_option')) {
                                            $wins = 0;
                                            $draw = 0;
                                            $loses = 0;
                                            $goal_scored = '';
                                            $goal_conceded = '';
											
											//aways
											$awy_wins = 0;
                                            $awy_draw = 0;
                                            $awy_loses = 0;
                                            $awy_goal_scored = '';
                                            $awy_goal_conceded = '';
                                        } else {
                                            //Home
                                            $wins = fw_get_db_post_option($post->ID, 'wins', true);
                                            $draw = fw_get_db_post_option($post->ID, 'draw', true);
                                            $loses = fw_get_db_post_option($post->ID, 'loses', true);
                                            $goal_scored = fw_get_db_post_option($post->ID, 'goal_scored', true);
                                            $goal_conceded = fw_get_db_post_option($post->ID, 'goal_conceded', true);
											
											//aways
                                            $awy_wins = fw_get_db_post_option($post->ID, 'awy_wins', true);
                                            $awy_draw = fw_get_db_post_option($post->ID, 'awy_draw', true);
                                            $awy_loses = fw_get_db_post_option($post->ID, 'awy_loses', true);
                                            $awy_goal_scored = fw_get_db_post_option($post->ID, 'awy_goal_scored', true);
                                            $awy_goal_conceded = fw_get_db_post_option($post->ID, 'awy_goal_conceded', true);
                                        }
										
										$total_scored	=  $goal_scored + $awy_goal_scored;
										$total_conceded	=  $goal_conceded + $awy_goal_conceded;
										$overall_win	=  $wins + $awy_wins;
										$overall_draw	=  $draw + $awy_draw;
										$overall_loses	=  $loses + $awy_loses;
										
										$pts	= ( $overall_win * 3 ) + $overall_draw;
										
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="tg-pointtable">
                                                <div class="tg-box"><?php the_title(); ?></div>
                                                <?php if (!empty($overall_win)) { ?>
                                                    <div class="tg-box"><?php esc_html_e('w', 'soccer-acumen'); ?> <?php echo intval($overall_win); ?></div>
                                                <?php } ?>
                                                <?php if (!empty($overall_draw)) { ?>
                                                    <div class="tg-box"><?php esc_html_e('d', 'soccer-acumen'); ?> <?php echo intval($overall_draw); ?></div>
                                                <?php } ?>
                                                <?php if (!empty($overall_loses)) { ?>
                                                    <div class="tg-box"><?php esc_html_e('l', 'soccer-acumen'); ?> <?php echo intval($overall_loses); ?></div>
                                                <?php } ?>
                                                <?php if (!empty($pts)) { ?>
                                                    <div class="tg-box"><?php esc_html_e('pt', 'soccer-acumen'); ?> <?php echo intval($pts); ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                                <?php if ( $counter > 6) { ?>
                                    <div class="tg-themebtnnext"><span class="fa fa-angle-down"></span></div>
                                    <div class="tg-themebtnprev"><span class="fa fa-angle-up"></span></div>
                                <?php } ?>
                            </div>
                            <?php if( !empty( $atts['read_more'] ) ) {?>
                                <div class="tg-btnbox">
                                    <?php $link = !empty( $atts['link'] ) ? $atts['link'] : '';?>
                                    <a class="tg-btn" href="<?php echo esc_url($link); ?>">
                                        <?php if (!empty($atts['read_more'])) { ?>
                                            <span><?php echo esc_attr($atts['read_more']); ?></span>
                                        <?php } ?>
                                    </a>  
                                </div>
							<?php } ?>
                        </div>
                        <script>
                            jQuery(document).ready(function (e) {
                                var swiper = new Swiper('#tg-pointstable-slider-<?php echo esc_js($uni_flag); ?>', {
                                    direction: 'vertical',
                                    slidesPerView: 6,
                                    spaceBetween: 10,
									speed:2000,
                                    mousewheelControl: true,
                                    nextButton: '.tg-themebtnnext',
                                    prevButton: '.tg-themebtnprev',
                                    autoplay: 2500,
                                });
                            });


                        </script>
                    </div>
                    <?php if (!empty($atts['player_image']['url'])) { ?>
                        <div class="col-sm-4 col-xs-12 hidden-xs"> 
                            <figure>
                                <img src="<?php echo esc_url($atts['player_image']['url']); ?>" alt="<?php echo sanitize_title($atts['table_title']); ?>">
                            </figure>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>





