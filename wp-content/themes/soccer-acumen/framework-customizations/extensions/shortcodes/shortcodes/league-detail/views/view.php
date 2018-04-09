<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */

$uni_flag = fw_unique_increment();
$order = !empty($atts['league_order']) ? $atts['league_order'] : 'DESC';
$orderby = !empty($atts['league_orderby']) ? $atts['league_orderby'] : 'ID';
$show_posts = !empty($atts['league_no_posts']) ? $atts['league_no_posts'] : 10;
$data = !empty($atts['league_get_mehtod']) ? $atts['league_get_mehtod'] : array();
$pagination = $atts['league_pagination'];
?>
<div class="sc-league-detail tg-leaguedetail">
  <?php
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

    $query_args = array(
        'posts_per_page' => -1,
        'post_type' => 'tg_league',
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish'
    );

    if (!empty($tax_query)) {
        $query_args = array_merge($query_args, $tax_query);
    }


    if (!empty($posts_in)) {
        $query_args = array_merge($query_args, $posts_in);
    }
    $query = new WP_Query($query_args);
    $count_post = $query->post_count;


    $query_args = array('posts_per_page' => $show_posts,
        'post_type' => 'tg_league',
        'paged' => $paged,
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish'
    );
    
    //By Categories 
    if (!empty($tax_query)) {
        $query_args = array_merge($query_args, $tax_query);
    }

    //By Posts 
    if (!empty($posts_in)) {
        $query_args = array_merge($query_args, $posts_in);
    }

    $query = new WP_Query($query_args);
    $counter	= 0;
    
    if( $query->have_posts() ) {
    ?>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="points-table">
    <thead>
        <tr class="top-head">
            <th class="position"></th>
            <th class="teamname"></th>
            <th class="table-p"></th>
            <th class="home" colspan="5"><?php esc_html_e('home','soccer-acumen');?></th>
            <th class="home" colspan="5"><?php esc_html_e('away','soccer-acumen');?></th>
            <th class="home" colspan="5"><?php esc_html_e('overall','soccer-acumen');?></th>
        </tr>
        <tr class="second-head">
            <th class="position"><?php esc_html_e('pos','soccer-acumen');?></th>
            <th class="teamname"><?php esc_html_e('team','soccer-acumen');?></th>
            <th class="table-p"><?php esc_html_e('p','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('w','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('d','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('l','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('f','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('a','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('w','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('d','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('l','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('f','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('a','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('w','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('d','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('l','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('gd','soccer-acumen');?></th>
            <th class="grid-score"><?php esc_html_e('pts','soccer-acumen');?></th>
        </tr>
    </thead>
    <tbody class="table-body">
    <?php 
        while ($query->have_posts()) : $query->the_post();
            global $post;
            $counter++;
            
            if (!function_exists('fw_get_db_post_option')) {
                
                $league_flag = '';
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
                $league_flag = fw_get_db_post_option($post->ID, 'flag', true);
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

            $total_scored = $goal_scored + $awy_goal_scored - ($goal_conceded + $awy_goal_conceded);
            $total_conceded = $goal_conceded + $awy_goal_conceded;
            $overall_win = $wins + $awy_wins;
            $overall_draw = $draw + $awy_draw;
            $overall_loses = $loses + $awy_loses;

            $pts = ( $overall_win * 3 ) + $overall_draw;
            $pt =  $overall_win + $overall_draw + $overall_loses;
            
            ?>
            <tr>
                <td class="position"><?php echo intval($counter);?></td>
                <td class="teamname">
                    <?php if (!empty($league_flag)) { ?>
                        <figure>
                            <img width="19" src="<?php echo esc_url($league_flag['url']); ?>" alt="<?php echo esc_attr(the_title()); ?>">
                        </figure>
                    <?php } ?>
                    <?php the_title(); ?>
                </td>
                <td class="table-p grid-score"><?php echo intval($pt);?></td>
                
                <!--Home Scores-->
                <td class="grid-score"><?php echo intval($wins); ?></td>
                <td class="grid-score"><?php echo intval($draw); ?></td>
                <td class="grid-score"><?php echo intval($loses); ?></td>
                <td class="grid-score"><?php echo intval($goal_scored); ?></td>
                <td class="grid-score"><?php echo intval($goal_conceded); ?></td>
                
                <!--Away Scores-->
                <td class="grid-score"><?php echo intval($awy_wins); ?></td>
                <td class="grid-score"><?php echo intval($awy_draw); ?></td>
                <td class="grid-score"><?php echo intval($awy_loses); ?></td>
                <td class="grid-score"><?php echo intval($awy_goal_scored); ?></td>
                <td class="grid-score"><?php echo intval($awy_goal_conceded); ?></td>
                
                <!--Overall Scores-->
                <td class="grid-score"><?php echo intval($overall_win); ?></td>
                <td class="grid-score"><?php echo intval($overall_draw); ?></td>
                <td class="grid-score"><?php echo intval($overall_loses); ?></td>
                <td class="grid-score"><?php echo intval($total_scored); ?></td>
                <td class="grid-score"><?php echo intval($pts); ?></td>

            </tr>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </tbody>
    </table>
<?php }?>
    
<?php
	if (isset($pagination) &&
		$pagination == 'enable' &&
		$count_post > $show_posts
	) :
		soccer_acumen_prepare_pagination($count_post, $show_posts);
	endif; 
?>
</div>









