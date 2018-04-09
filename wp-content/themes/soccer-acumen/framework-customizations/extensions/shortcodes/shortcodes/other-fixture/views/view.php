<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$uni_flag = fw_unique_increment();
$pagination = $atts['other_pagination'];
$auto = $atts['other_auto'];
?>
<div class="sc-other-fixtures">
    <div id="tg-otherfixtures-slider-<?php echo esc_attr($uni_flag) ?>" class="tg-otherfixtures-slider tg-tickets">
        <div class="swiper-wrapper">
            <?php
            global $paged;
            if (empty($paged))
                $paged = 1;
            $show_match = !empty($atts['show_match']) ? $atts['show_match'] : -1;
            $order = !empty($atts['order']) ? $atts['order'] : 'DESC';
            $orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';
            $current_date = strtotime(date("Y-m-d H:i:s"));
            //Main Query	
            $args = array(
                'posts_per_page' => $show_match,
                'post_type' => 'tg_fixture',
                'paged' => $paged,
                'order' => 'DESC',
                'orderby' => 'ID',
                'post_status' => 'publish',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'date_match_string',
                        'value' => $current_date,
                        'compare' => '>',
                    ),
            ));
            $query = new WP_Query($args);
            while ($query->have_posts()) : $query->the_post();
                global $post;
                if (!function_exists('fw_get_db_post_option')) {
                    $home_team = '';
                    $away_team = '';
                    $location = '';
                    $date_match = '';
                    $league_name = '';
                } else {
                    $home_team = fw_get_db_post_option($post->ID, 'home_team', true);
                    $away_team = fw_get_db_post_option($post->ID, 'away_team', true);
                    $location = fw_get_db_post_option($post->ID, 'location', true);
                    $league_name = fw_get_db_post_option($post->ID, 'league_name', true);
                    $date_match = fw_get_db_post_option($post->ID, 'date_match', true);
                }
                ?>
                <div class="swiper-slide">
                    <div class="tg-ticket">
                        <time class="tg-matchdate" datetime=""><?php echo date('d', strtotime($date_match)); ?><span><?php echo date('M', strtotime($date_match)); ?></span></time>
                        
                        <div class="tg-matchdetail">
                            <?php if (!empty($league_name)) { ?>
                                <span class="tg-theme-tag"><?php echo esc_attr($league_name); ?></span>
                            <?php } ?>
                            <h4><?php echo get_the_title($home_team); ?> <span><?php esc_html_e('vs', 'soccer-acumen'); ?></span> <?php echo get_the_title($away_team); ?></h4>
                            <ul class="tg-matchmetadata">
                                <li><time datetime=""><?php echo get_the_time('g:i A', $post->ID); ?></time></li>
                                <?php if (!empty($location)) { ?>
                                    <li>
                                        <address> <?php echo esc_attr($location); ?></address>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
						<div class="tg-btnsbox">
                            <a class="tg-btn" href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('read more', 'soccer-acumen'); ?></a>
                            <a class="tg-btn" href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('book my ticket', 'soccer-acumen'); ?></a>
                        </div>
                    </div>
                </div>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php if (isset($pagination) && $pagination === 'enable') { ?>
            <div class="tg-themebtnnext"><span class="fa fa-angle-down"></span></div>
            <div class="tg-themebtnprev"><span class="fa fa-angle-up"></span></div>
        <?php } ?>
    </div>
    <script>

        /*------------------------------------------
         OTHER FIXTURES SLIDER
         ------------------------------------------*/
        jQuery(document).ready(function (e) {
            var mainswiper = new Swiper('#tg-otherfixtures-slider-<?php echo esc_js($uni_flag); ?>', {
                direction: 'vertical',
                slidesPerView: 5,
                spaceBetween: 10,
				speed:2000,
                mousewheelControl: true,
                nextButton: '.tg-themebtnnext',
                prevButton: '.tg-themebtnprev',
				breakpoints: {
					479: {
						slidesPerView: 1,
						spaceBetween: 0,
					},
					640: {
						slidesPerView: 2,
					},
					767: {
						slidesPerView: 4,
					},
					991: {
						slidesPerView: 3,
					}
				},
                autoplay: <?php echo esc_js($auto); ?>,
            });
        });


    </script>
</div>












