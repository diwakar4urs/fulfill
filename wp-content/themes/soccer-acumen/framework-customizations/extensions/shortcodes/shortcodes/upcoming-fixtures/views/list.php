<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$uni_flag = fw_unique_increment();
$order = !empty($atts['order']) ? $atts['order'] : 'DESC';
$orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';
$pagination = $atts['view']['list']['pagination'];
$show_posts = !empty($atts['show_posts']) ? $atts['show_posts'] : 10;
$data = !empty($atts['get_mehtod']) ? $atts['get_mehtod'] : array();
?>
<div class="sc-upcoming-fixtures">
    <div class="tg-tickets swiper-container-vertical">
        <?php
        global $paged;

        if (empty($paged))
            $paged = 1;

        //Main Query	
        $current_date = strtotime(date("Y-m-d H:i:s"));

        if (isset($data['gadget']) && $data['gadget'] === 'by_fixtures' && !empty($data['by_fixtures']['posts'])
        ) {
            $posts_in['post__in'] = $data['by_fixtures']['posts'];
        } else if (isset($data['gadget']) && $data['gadget'] === 'by_cats' && !empty($data['by_cats']['categories'])
        ) {
            $categories_in = $data['by_cats']['categories'];
            $slugs = array();
            $loop = array();
            if (!empty($categories_in)) {
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
        if (!empty($tax_query)) {
            $query_args = array_merge($query_args, $tax_query);
        }

        //By Posts 
        if (!empty($posts_in)) {
            $query_args = array_merge($query_args, $posts_in);
            unset($query_args['meta_query']);
        }

        $query = new WP_Query($query_args);
        $count_post = $query->post_count;


        $query_args = array('posts_per_page' => $show_posts,
            'post_type' => 'tg_fixture',
            'paged' => $paged,
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
        if (!empty($tax_query)) {
            $query_args = array_merge($query_args, $tax_query);
        }

        //By Posts 
        if (!empty($posts_in)) {
            $query_args = array_merge($query_args, $posts_in);
            unset($query_args['meta_query']);
        }

        $query = new WP_Query($query_args);

        while ($query->have_posts()) : $query->the_post();
            global $post;
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
            <div class="tg-ticket">
                <time class="tg-matchdate" datetime="<?php echo date_i18n('Y-m-d', strtotime($date_match)); ?>"><?php echo date_i18n('d', strtotime($date_match)); ?><span><?php echo date_i18n('M', strtotime($date_match)); ?></span></time>
                <div class="tg-matchdetail">
                    <?php if (!empty($location)) { ?>
                        <span class="tg-theme-tag"><?php echo esc_attr($league_name); ?></span>
                    <?php } ?>
                    <h4><?php the_title(); ?></h4>
                    <ul class="tg-matchmetadata">
                        <li><time datetime="<?php echo date_i18n('Y-m-d', strtotime($date_match)); ?>"><?php echo date_i18n('H:i A', strtotime($date_match)); ?></time></li>
                        <?php if (!empty($location)) { ?>
                            <li><address><?php echo esc_attr($location); ?></address></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="tg-btnsbox">
                    <a class="tg-btn" href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('read more', 'soccer-acumen'); ?></a>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php
    if (isset($pagination) &&
            $pagination == 'enable' &&
            $count_post > $show_posts
    ) :
        ?>
        <div class="row">
            <?php soccer_acumen_prepare_pagination($count_post, $show_posts); ?>
        </div>
    <?php endif; ?>
</div>