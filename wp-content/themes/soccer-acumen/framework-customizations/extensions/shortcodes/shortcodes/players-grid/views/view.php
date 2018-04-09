<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$uni_flag = fw_unique_increment();

$data = !empty($atts['get_mehtod']) ? $atts['get_mehtod'] : array();
?>
<div class="sc-player">
    <div class="tg-player-grid2 tg-haslayout">
        <div id="tg-player-slider-<?php echo esc_attr($uni_flag); ?>" class="tg-player-slider tg-haslayout">
            <div class="swiper-wrapper">
                <?php
                global $paged;
                if (empty($paged))
                    $paged = 1;

                if (isset($data['gadget']) && $data['gadget'] === 'by_player' && !empty($data['by_player']['posts'])) {
                    $posts_in['post__in'] = $data['by_player']['posts'];
                } else if (isset($data['gadget']) && $data['gadget'] === 'by_cats' && !empty($data['by_cats']['categories'])) {
                    $categories_in = $data['by_cats']['categories'];
                    $slugs = array();
                    $loop = array();
                    if (!empty($categories_in)) {
                        foreach ($categories_in as $key => $value) {
                            $term = get_term($value, 'player-category');
                            $slugs[] = $term->slug;
                            $loop[$term->slug] = $term->name;
                        }
                        $filterable = $slugs;
                        $filterable_loop = $loop;

                        $tax_query['tax_query'] = array('relation' => 'AND', array(
                                'taxonomy' => 'player-category',
                                'terms' => $filterable,
                                'field' => 'slug',
                        ));
                    }
                }

                $order = !empty($atts['order']) ? $atts['order'] : 'DESC';
                $orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';

                //Main Query	
                $query_args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'tg_player',
                    'order' => $order,
                    'orderby' => $orderby,
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1);

                //By Categories 
                if (!empty($tax_query)) {
                    $query_args = array_merge($query_args, $tax_query);
                }

                //By Posts 
                if (!empty($posts_in)) {
                    $query_args = array_merge($query_args, $posts_in);
                    unset($query_args['meta_query']);
                }

                $query = new WP_Query($query_args);
                $counter = 0;
                while ($query->have_posts()) : $query->the_post();
                    global $post;
                    $width = '245';
                    $height = '416';
                    $counter++;
                    $thumbnail = soccer_acumen_prepare_thumbnail($post->ID, $width, $height);
                    if (!function_exists('fw_get_db_post_option')) {
                        $rating = '';
                        $enable_social_network = '';
                        $player_social_icons = '';
                        $position = '';
                        $description = '';
                    } else {
                        $rating = fw_get_db_post_option($post->ID, 'rating', true);
                        $position = fw_get_db_post_option($post->ID, 'position', true);
                        $description = fw_get_db_post_option($post->ID, 'description', true);
                        $enable_social_network = fw_get_db_post_option($post->ID, 'enable_social_network', true);
                        $player_social_icons = fw_get_db_post_option($post->ID, 'player_social_icons', true);
                    }

                    if (empty($thumbnail)) {
                        $play_avatar = get_template_directory_uri() . '/images/player.png';
                    } else {
                        $play_avatar = $thumbnail;
                    }
                    ?>
                    <div class="swiper-slide">
                        <figure class="tg-postimg">
                            <?php if (!empty($play_avatar)) { ?>
                                <img src="<?php echo esc_url($play_avatar); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                            <?php } ?>
                            <figcaption class="tg-img-hover">
                                <?php if (!empty($position)) { ?>
                                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="tg-theme-tag"><?php echo esc_attr($position); ?></a>
                                <?php } ?>
                                <div class="tg-section-heading">
                                    <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                    <?php
                                    $star_value = $rating / 5 * 100;
                                    if (!empty($star_value)) {
                                        ?>
                                        <span class="tg-stars"><span style="width:<?php echo esc_attr($star_value); ?><?php esc_html_e('%', 'soccer-acumen'); ?>"></span></span>
                                    <?php } ?>
                                </div>
                               
                                <?php if (isset($enable_social_network) && $enable_social_network === 'enable') { ?>
                                    <ul class="tg-socialicons">
                                        <?php
                                        foreach ($player_social_icons as $social_icons) {
                                            if (!empty($social_icons['player_social_url'])) {
                                                $url = $social_icons['player_social_url'];
                                            }
                                            ?>           
                                            <li>
                                                <a href="<?php echo esc_url($url); ?>">
                                                    <?php if (!empty($social_icons['player_icons_list'])) { ?>
                                                        <i class="<?php echo esc_attr($social_icons['player_icons_list']); ?>"></i>
                                                    <?php } ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </figcaption>
                        </figure>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php if ($counter > 4) { ?>
                <div class="tg-themebtnnext"><span class="fa fa-angle-down"></span></div>
                <div class="tg-themebtnprev"><span class="fa fa-angle-up"></span></div>
                <?php } ?>
        </div>
    </div>
    <?php
    $slider_scripts = "jQuery(document).ready(function(e) {
                                var swiper = new Swiper('#tg-player-slider-" . esc_attr($uni_flag) . "', {
									slidesPerView: 4,
									spaceBetween: 30,
									speed:2000,
									mousewheelControl: true,
									nextButton: '.tg-themebtnnext',
									prevButton: '.tg-themebtnprev',
									autoplay: " . esc_js($atts['player_auto']) . ",
									breakpoints: {
										479: {
											slidesPerView: 1,
											spaceBetween: 0,
										},
										640: {
											slidesPerView: 2,
										},
										767: {
											slidesPerView: 3,
											spaceBetween: 15,
										},
										991: {
											slidesPerView: 3,
										}
									}
								});
                            });";
    wp_add_inline_script('soccer_acumen_functions', $slider_scripts);
    ?>
</div>
