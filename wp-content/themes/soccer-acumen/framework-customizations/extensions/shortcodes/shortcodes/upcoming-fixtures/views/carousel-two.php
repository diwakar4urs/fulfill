<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$uni_flag = fw_unique_increment();
$order = !empty($atts['order']) ? $atts['order'] : 'DESC';
$orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';
$pagination	= $atts['view']['list']['pagination'];
$show_posts	=  !empty($atts['show_posts']) ? $atts['show_posts'] : 10;
$data = !empty($atts['get_mehtod']) ? $atts['get_mehtod'] : array();
?>
<div class="sc-upcoming-fixtures">
   <?php        
    //Main Query	
    $current_date = strtotime(date("Y-m-d H:i:s"));
    
    if ( isset($data['gadget']) 
        && $data['gadget'] === 'by_fixtures' 
        && !empty($data['by_fixtures']['posts'])
    ) {
        $posts_in['post__in'] = $data['by_fixtures']['posts'];
    } else if (isset($data['gadget']) 
        && $data['gadget'] === 'by_cats' 
        && !empty($data['by_cats']['categories'])
    ) {
        $categories_in = $data['by_cats']['categories'];
        $slugs = array();
        $loop = array();
        if( !empty( $categories_in ) ) {
            foreach ($categories_in as $key => $value) {
                $term = get_term($value, 'fixture-category');
                $slugs[] = $term->slug;
                $loop[$term->slug] = $term->name;
            }
            $filterable = $slugs;
            $filterable_loop = $loop;
            
            $tax_query['tax_query'] = array('relation' => 'AND', array(
                    'taxonomy' => 'fixture-category',
                    'terms' => $filterable,
                    'field' => 'slug',
            ));
        }
    }
            
    $query_args = array(
        'posts_per_page' => -1,
        'post_type' => 'tg_fixture',
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'date_match_string',
                'value' => $current_date,
                'compare' => '>',
            ),
        )
    );
    
    //By Categories 
    if ( !empty($tax_query) ) {
        $query_args = array_merge($query_args, $tax_query);
    }
    
    //By Posts 
    if (!empty($posts_in)) {
        $query_args = array_merge($query_args, $posts_in);
        unset($query_args['meta_query']);
    }
            
    $query = new WP_Query($query_args);
    $count_post = $query->post_count;
    
        
    $query_args = array( 'posts_per_page' => $show_posts,
        'post_type' => 'tg_fixture',
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'date_match_string',
                'value' => $current_date,
                'compare' => '>',
            ),
        )
    );
    
    //By Categories 
    if ( !empty($tax_query) ) {
        $query_args = array_merge($query_args, $tax_query);
    }
    
    //By Posts 
    if (!empty($posts_in)) {
        $query_args = array_merge($query_args, $posts_in);
        unset($query_args['meta_query']);
    }
    
    $flag	= rand(1,9999);
    ?>
    <div id="fixture-<?php echo esc_attr( $flag );?>" class="tg-upcomingmatch-slider tg-upcomingmatch">
        <div class="swiper-wrapper">
            <?php 
            $query = new WP_Query($query_args);
            $counter	= 0;
            while ($query->have_posts()) : $query->the_post();
                global $post;
                $counter++;
                if (!function_exists('fw_get_db_post_option')) {
                    $home_team = '';
                    $home_goal = '';
                    $home_result = '';
                    $home_player = '';
                    $home_flag = '';
                    $away_team = '';
                    $away_flag = '';
                    $away_goal = '';
                    $away_result = '';
                    $away_player = '';
                    $location = '';
                    $date_match = '';
                    $league_name = '';
                } else {
                    $league_name = fw_get_db_post_option($post->ID, 'league_name', true);
                    $date_match = fw_get_db_post_option($post->ID, 'date_match', true);
                    $location = fw_get_db_post_option($post->ID, 'location', true);
                     
                    $home_team = fw_get_db_post_option($post->ID, 'home_team', true);
                    $home_flag = fw_get_db_post_option($home_team, 'flag', true);
                    $home_player = fw_get_db_post_option($post->ID, 'home_team_players', true);
                    $home_goal = fw_get_db_post_option($post->ID, 'home_goal', true);
                    $home_result = fw_get_db_post_option($post->ID, 'home_result', true);
                    
                    $away_team = fw_get_db_post_option($post->ID, 'away_team', true);
                    $away_flag = fw_get_db_post_option($away_team, 'flag', true);
                    $away_player = fw_get_db_post_option($post->ID, 'away_team_players', true);
                    $away_goal = fw_get_db_post_option($post->ID, 'away_goal', true);
                    $away_result = fw_get_db_post_option($post->ID, 'away_result', true);
                }
                ?>
                <div class="swiper-slide">
                    <div class="tg-match">
                        <div class="tg-matchdetail">
                            <div class="tg-box">
                               <?php if ( !empty( $home_flag['url'] ) ) { ?>
                                    <strong class="tg-team-logo">
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                            <img width="73" height="73" src="<?php echo esc_url($home_flag['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                        </a>
                                    </strong>
                                <?php } ?>
                                <h3><?php echo get_the_title($home_team); ?></h3>
                            </div>
                            <div class="tg-box">
                                <h3><?php esc_html_e('vs','soccer-acumen');?></h3>
                            </div>
                            <div class="tg-box">
                                 <?php if (!empty($away_flag['url'])) { ?>
                                    <strong class="tg-team-logo">
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                            <img width="73" height="73" src="<?php echo esc_url($away_flag['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                        </a>
                                    </strong>
                                <?php } ?>
                                <h3><?php echo get_the_title($away_team); ?></h3>
                            </div>
                        </div>
                        <div class="tg-matchhover">
                            <address><?php echo date_i18n('Md, Y H:i A', strtotime($date_match)); ?>&nbsp;<?php echo esc_attr($location) ?></address>
                            <div class="tg-btnbox">
                               <a class="tg-btn" href="<?php echo esc_url(get_the_permalink()); ?>"><span><?php esc_html_e('book my ticket','soccer-acumen');?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
				endwhile;
				wp_reset_postdata();
            ?>
        </div>
        <?php if( $counter > 3 ){?>
          <div class="tg-themebtnnext"><span class="fa fa-angle-down"></span></div>
		  <div class="tg-themebtnprev"><span class="fa fa-angle-up"></span></div>
        <?php }?>
    </div>
   <?php 
        $slider_scripts	= "jQuery(document).ready(function(e) {
                                var mainswiper = new Swiper('#fixture-".esc_attr( $flag )."', {
									direction: 'vertical',
									speed:2000,
									slidesPerView: 3,
									spaceBetween: 10,
									mousewheelControl: true,
									nextButton: '.tg-themebtnnext',
									prevButton: '.tg-themebtnprev',
									autoplay: 0,
								});
                            });";
        wp_add_inline_script('soccer_acumen_functions',$slider_scripts);
   ?>
</div>