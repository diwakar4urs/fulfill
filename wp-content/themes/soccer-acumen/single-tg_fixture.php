<?php
/**
 * The template for displaying all single posts.
 *
 * @package Soccer Acumen
 */
//soccer_acumen_post_views(get_the_ID()); // Update Post Views
get_header();
$soccer_acumen_sidebar = 'full';
$section_width = 'col-sm-12';
$two_column = '';
if (function_exists('fw_ext_sidebars_get_current_position')) {
    $current_position = fw_ext_sidebars_get_current_position();
    if ($current_position != 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
        $soccer_acumen_sidebar = $current_position;
        $section_width = 'col-sm-9';
        $two_column = 'tg-twocolumns';
    }
}
if (isset($soccer_acumen_sidebar) && $soccer_acumen_sidebar == 'right') {
    $aside_class = 'pull-right';
    $content_class = 'pull-left';
    $section_type = 'content-left';
} else {
    $aside_class = 'pull-left';
    $content_class = 'pull-right';
    $section_type = 'content-right';
}
?>
<div class="tg-main-section tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns tg-haslayout">
                <?php
                while (have_posts()) : the_post();
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

                        $enable_comments = '';
                        $enable_category = '';
                        $enable_share = '';
                    } else {
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

                        $league_name = fw_get_db_post_option($post->ID, 'league_name', true);
                        $date_match = fw_get_db_post_option($post->ID, 'date_match', true);
                        $location = fw_get_db_post_option($post->ID, 'location', true);

                        $enable_comments = fw_get_db_post_option($post->ID, 'enable_comments', true);
                        $enable_category = fw_get_db_post_option($post->ID, 'enable_category', true);
                        $enable_share = fw_get_db_post_option($post->ID, 'enable_share', true);
                        $match_short_desc = fw_get_db_post_option($post->ID, 'match_short_desc', true);
                    }

                    $ck_current_date = strtotime(date('Y-m-d H:i:s'));
                    $ck_date_match = strtotime($date_match);
                    $counter_clock = date('Y,m,d', strtotime($date_match . '-1 month'));
                    ?>
                    <div class="<?php echo esc_attr($section_width); ?> <?php echo sanitize_html_class($content_class); ?>">

                        <div class="tg-fixturedetail">
                            <?php if ($ck_date_match > $ck_current_date) { ?>
                                <div class="tg-fixturecounter">
                                    <?php if (!empty($home_team) || !empty($away_team)) { ?>
                                        <div class="tg-section-heading">
                                            <h2><?php echo get_the_title($home_team); ?> <span><?php esc_html_e('VS', 'soccer-acumen'); ?></span> <?php echo get_the_title($away_team); ?></h2>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($match_short_desc)) { ?>
                                        <div class="tg-description">
                                            <p><?php echo esc_attr($match_short_desc); ?></p>
                                        </div>
                                    <?php } ?>
                                    <div class="tg-counters">
                                        <div id="tg-days" class="tg-counter tg-days"></div>
                                        <div id="tg-hours" class="tg-counter tg-hours"></div>
                                        <div id="tg-minutes" class="tg-counter tg-minutes"></div>
                                        <div id="tg-seconds" class="tg-counter tg-seconds"></div>
                                    </div>
                                    <?php
                                    $slider_scripts = "function matchCounter() {
                                            var launch = new Date('" . esc_js($counter_clock) . "');
                                            var days = jQuery('.tg-days');
                                            var hours = jQuery('.tg-hours');
                                            var minutes = jQuery('.tg-minutes');
                                            var seconds = jQuery('.tg-seconds');
                                            setDate();
                                            function setDate() {
                                                var now = new Date();
                                                if (launch < now) {
                                                    days.html('<h3>0</h3><h4>" . esc_html__('Day', 'soccer-acumen') . "</h4>');
                                                    hours.html('<h3>0</h3><h4>" . esc_html__('Hour', 'soccer-acumen') . "</h4>');
                                                    minutes.html('<h3>0</h3><h4>" . esc_html__('Minute', 'soccer-acumen') . "</h4>');
                                                    seconds.html('<h3>0</h3><h4>" . esc_html__('Second', 'soccer-acumen') . "</h4>');
                                                }
                                                else {
                                                    var s = -now.getTimezoneOffset() * 60 + (launch.getTime() - now.getTime()) / 1000;
                                                    var d = Math.floor(s / 86400);
                                                    days.html('<h3>' + d + '</h3><h4>" . esc_html__('Day', 'soccer-acumen') . "' + (d > 1 ? 's' : ''), '</h4>');
                                                    s -= d * 86400;
                                                    var h = Math.floor(s / 3600);
                                                    hours.html('<h3>' + h + '</h3><h4>" . esc_html__('Hour', 'soccer-acumen') . "' + (h > 1 ? 's' : ''), '</h4>');
                                                    s -= h * 3600;
                                                    var m = Math.floor(s / 60);
                                                    minutes.html('<h3>' + m + '</h3><h4>" . esc_html__('Minute', 'soccer-acumen') . "' + (m > 1 ? 's' : ''), '</h4>');
                                                    s = Math.floor(s - m * 60);
                                                    seconds.html('<h3>' + s + '</h3><h4>" . esc_html__('Second', 'soccer-acumen') . "' + (s > 1 ? 's' : ''), '</h4>');
                                                    setTimeout(setDate, 1000);
                                                }
                                            }
                                        }
                                        
                                        matchCounter();
                                        
                                        ";
                                    wp_add_inline_script('soccer_acumen_functions', $slider_scripts);
                                    ?>
                                </div> 
                            <?php } else { ?>
                                <div class="tg-matchresult">
                                    <div class="tg-box">
                                        <div class="tg-score"><h3><?php echo intval($home_goal); ?> - <?php echo intval($away_goal); ?></h3></div>
                                        <div class="tg-teamscore">
                                            <?php if (!empty($home_flag['url'])) { ?>
                                                <strong class="tg-team-logo">
                                                    <img src="<?php echo esc_url($home_flag['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                                </strong>
                                            <?php } ?>
                                            <div class="tg-team-nameplusstatus">
                                                <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title($home_team); ?> <?php if (!empty($home_result)) { ?>( <?php echo esc_attr($home_result); ?>  ) <?php } ?></a></h4>
                                            </div>
                                            <?php if (!empty($home_player) && is_array($home_player)) { ?>
                                                <ul class="tg-playernameplusgoadtime">
                                                    <?php
                                                    foreach ($home_player as $key => $player) {
                                                        if (!empty($player['player_name']))
                                                            
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
                                                <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title($away_team); ?><?php if (!empty($away_result)) { ?>( <?php echo esc_attr($away_result); ?>)<?php } ?></a></h4>
                                            </div>
                                            <?php if (!empty($away_player) && is_array($away_player)) { ?>
                                                <ul class="tg-playernameplusgoadtime">
                                                    <?php
                                                    foreach ($away_player as $key => $player) {
                                                        if (!empty($player['player_name']))
                                                            
                                                            ?>
                                                        <li><?php echo esc_attr($player['player_name']); ?> (<?php echo intval($player['time_of_score']); ?>)</li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="tg-mathtextbox">
                                <?php
                                the_Content();
                                wp_link_pages(array(
                                    'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'soccer-acumen') . '</span>',
                                    'after' => '</div>',
                                    'link_before' => '<span>',
                                    'link_after' => '</span>',
                                    'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'soccer-acumen') . ' </span>%',
                                    'separator' => '<span class="screen-reader-text">, </span>',
                                ));
                                ?>
                            </div>
                            <?php
                            if (( isset($enable_category) &&
                                    $enable_category === 'enable' ) ||
                                    (isset($enable_share) &&
                                    $enable_share === 'enable' )
                            ) {
                                ?>
                                <div class="tg-tags-social tg-haslayout">
                                    <?php
                                    if (isset($enable_category) && $enable_category === 'enable') {
                                        $category = get_the_terms($post->ID, 'fixture-category');
                                        if (!empty($category)) {
                                            echo '<div class="tg-tags pull-left"><i class="fa fa-tag"></i><span>' . esc_html__('Categories: ', 'soccer-acumen') . '</span>';
                                            foreach ($category as $cat) {
                                                echo '<a href="' . get_term_link($cat->slug, 'fixture-category') . '" class="tg-btn">' . $cat->name . '</a>';
                                            }
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                    <?php if (isset($enable_share) && $enable_share === 'enable') { ?>
                                        <div class="tg-social-share pull-right">
                                            <div class="tg-social-share pull-right">
                                                <?php soccer_acumen_prepare_social_sharing($default_icon = 'true', $title = true, $heading = 'Share'); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();

                    if ($enable_comments === 'enable') {
                        if (comments_open($post->ID) || get_comments_number()) :
                            comments_template();
                        endif;
                    }
                    ?>
                </div>
                <?php if (function_exists('fw_ext_sidebars_get_current_position')) { ?>
                    <div class="col-sm-3 <?php echo sanitize_html_class($aside_class); ?>">
                        <aside id="tg-sidebar-upper" class="tg-sidebar tg-haslayout sidebar-section"> <?php echo fw_ext_sidebars_show('blue'); ?>
                        </aside>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>	
</div>
<?php get_footer(); ?>
