<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>
<div class="sc-latest-result tg-latestresult">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="tab-content tg-tabscontent">
                <?php
                $uni_flag = fw_unique_increment();
                $show_match = !empty($atts['show_match']) ? $atts['show_match'] : -1;
                $order = !empty($atts['order']) ? $atts['order'] : 'DESC';
                $orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';
                $current_date = strtotime(date("Y-m-d H:i:s"));
				$view_data = !empty($atts['view']) ? $atts['view'] : '';

                //Main Query	
                $args = array(
                    'posts_per_page' => $show_match,
                    'post_type' => 'tg_fixture',
                    'order' => $order,
                    'orderby' => $orderby,
                    'post_status' => 'publish',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'date_match_string',
                            'value' => $current_date,
                            'compare' => '<',
                        ),
                ));
                
				$query = new WP_Query($args);
                $count = 1;
                $output = '';
                
				while ($query->have_posts()) : $query->the_post();
                    global $post;
                   
                    $active = $count === 1 ? 'in active' : '';
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

                        if ( !empty($home_goal) 
                             || !empty($away_goal) 
                             || $home_result > 0 
                             || $away_result > 0
                        ) {  
						
						$count++; ?>
                        <div role="tabpanel" class="tab-pane <?php echo esc_attr($active); ?>" id="tab-<?php echo intval($count) ?>">
                        <div class="tg-matchresult">
                            <div class="tg-box">
                                <div class="tg-score"><h3><?php echo intval($home_goal); ?> - <?php echo intval($away_goal); ?></h3></div>
                                <div class="tg-teamscore">
                                    <?php if ( !empty( $home_flag['url'] ) ) { ?>
                                        <strong class="tg-team-logo">
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                <img src="<?php echo esc_url($home_flag['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                            </a>
                                        </strong>
                                    <?php } ?>
                                    <div class="tg-team-nameplusstatus">
                                        <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title($home_team); ?>  ( <?php echo esc_attr($home_result); ?> )</a></h4>
                                    </div>
                                    <?php if (!empty($home_player) && is_array($home_player)) { ?>
                                        <ul class="tg-playernameplusgoadtime">
                                            <?php
                                            foreach ($home_player as $key => $player) {
                                                if( !empty( $player['player_name'] ) )
                                                ?>
                                                <li><?php echo esc_attr($player['player_name']); ?> (<?php echo intval($player['time_of_score']); ?>)</li>
                                            <?php } ?>
                                        </ul>
                                   <?php } ?>
                                </div>
                                <div class="tg-teamscore">
                                    <?php if (!empty($away_flag['url'])) { ?>
                                        <strong class="tg-team-logo">
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                <img src="<?php echo esc_url($away_flag['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                            </a>
                                        </strong>
                                    <?php } ?>

                                    <div class="tg-team-nameplusstatus">
                                        <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title($away_team); ?> ( <?php echo esc_attr($away_result); ?> )</a></h4>
                                    </div>

                                    <?php if ( !empty($away_player) && is_array($away_player) ) { ?>
                                        <ul class="tg-playernameplusgoadtime">
                                            <?php
                                            foreach ($away_player as $key => $player) {
                                                if( !empty( $player['player_name'] ) )
                                                ?>
                                                <li><?php echo esc_attr($player['player_name']); ?> (<?php echo intval($player['time_of_score']); ?>)</li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php } ?>
                    
                    <?php ob_start(); ?>
                    <?php 
						if ( !empty($home_goal) 
							|| !empty($away_goal) 
							|| $home_result > 0 
							|| $away_result > 0
						) { ?>
                        <li role="presentation" class="<?php echo esc_attr($active); ?>">
                            <a href="#tab-<?php echo intval($count) ?>" aria-controls="tab-<?php echo intval($count) ?>" role="tab" data-toggle="tab">
                                <div class="tg-match">
                                    <div class="tg-box">
                                        <?php if (!empty($home_flag['url'])) { ?>
                                            <strong class="tg-teamlogo">
                                                <img width="34" height="34" src="<?php echo esc_url($home_flag['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                            </strong>
                                        <?php } ?>
                                        <?php if (!empty($home_result)) { ?>
                                            <h4><?php echo esc_attr($home_result); ?></h4>
                                        <?php } ?>
                                    </div>
                                    <div class="tg-box">
                                        <h3><?php echo intval($home_goal); ?> - <?php echo intval($away_goal); ?></h3>
                                    </div>
                                    <div class="tg-box">
                                        <?php if (!empty($away_flag['url'])) { ?>
                                            <strong class="tg-teamlogo">
                                                <img width="34" height="34" src="<?php echo esc_url($away_flag['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                            </strong>
                                        <?php } ?>
                                        <?php if (!empty($away_result)) { ?>
                                            <h4><?php echo esc_attr($away_result); ?></h4>
                                        <?php } ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    $output .= ob_get_clean();
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div id="tg-matchscrollbar" class="tg-matchscrollbar tg-allmatchstatus">
                <?php if (!empty($output)) { ?>
                    <ul class="tg-matchtabnav" role="tablist">  
                        <?php echo force_balance_tags($output); ?>
                    </ul>
                <?php } ?>
            </div>
            <?php if (!empty($view_data['view_1']['read_more'])) { ?>
            <div class="tg-btnbox">
                <?php $link	= !empty($view_data['view_1']['link']) ? $view_data['view_1']['link'] : '#';?>
                <a class="tg-btn" href="<?php echo esc_url($link); ?>">
                   <span><?php echo esc_attr($view_data['view_1']['read_more']); ?></span>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


