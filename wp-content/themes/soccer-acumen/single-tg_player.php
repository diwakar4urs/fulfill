<?php
/**
 * The template for displaying all single posts.
 *
 * @package Soccer Acumen
 */
//soccer_acumen_post_views(get_the_ID()); // Update Post Views
get_header();
$soccer_acumen_sidebar = 'full';
$section_width = 'col-md-12 col-sm-12 col-xs-12';

if (function_exists('fw_ext_sidebars_get_current_position')) {
    $current_position = fw_ext_sidebars_get_current_position();
    if ($current_position != 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
        $soccer_acumen_sidebar = $current_position;
        $section_width = 'col-md-9 col-sm-8 col-xs-12';
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
<div class="container">
    <div class="row">
        <div id="tg-twocolumns" class="tg-twocolumns tg-main-section tg-haslayout">
            <?php
            while (have_posts()) : the_post();
                global $post;
                $width = '245';
                $height = '416';
                $thumbnail = soccer_acumen_prepare_thumbnail($post->ID, $width, $height);

                if (!function_exists('fw_get_db_post_option')) {
                    $position = '';
                    $rating = '';
                    $nick_name = '';
                    $team = '';
                    $player_birth = '';
                    $age = '';
                    $birth_place = '';
                    $height = '';
                    $width = '';
                    $position = '';
                    $first_club = '';
                    $enable_social_network = '';
                    $player_social_icons = '';
                    $biography_title = '';
                    $description = '';
                    $biography_photo = '';
                    $gallery = '';
                    $player_option = '';
                    $map_height = '';
                    $latitude = '';
                    $longitude = '';
                    $map_zoom = '11';
                    $map_type = 'default';
                    $map_styles = '';
                    $map_info = '';
                    $info_box_width = 150;
                    $info_box_height = 150;
                    $marker = '';
                    $map_controls = 'true';
                    $map_dragable = 'true';
                    $scroll = 'false';
                    $extra_field = '';
                } else {
                    $position = fw_get_db_post_option($post->ID, 'position', true);
                    $rating = fw_get_db_post_option($post->ID, 'rating', true);
                    $nick_name = fw_get_db_post_option($post->ID, 'nick_name', true);
                    $team = fw_get_db_post_option($post->ID, 'team', true);
                    $player_birth = fw_get_db_post_option($post->ID, 'player_birth', true);
                    $age = fw_get_db_post_option($post->ID, 'age', true);
                    $birth_place = fw_get_db_post_option($post->ID, 'birth_place', true);
                    $height = fw_get_db_post_option($post->ID, 'height', true);
                    $width = fw_get_db_post_option($post->ID, 'width', true);
                    $position = fw_get_db_post_option($post->ID, 'position', true);
                    $first_club = fw_get_db_post_option($post->ID, 'first_club', true);
                    $enable_social_network = fw_get_db_post_option($post->ID, 'enable_social_network', true);
                    $player_social_icons = fw_get_db_post_option($post->ID, 'player_social_icons', true);
                    $extra_field = fw_get_db_post_option($post->ID, 'extra_field', true);
                    $biography_title = fw_get_db_post_option($post->ID, 'biography_title', true);
                    $biography_photo = fw_get_db_post_option($post->ID, 'biography_image', true);
                    $description = fw_get_db_post_option($post->ID, 'description', true);
                    $gallery = fw_get_db_post_option($post->ID, 'gallery', true);
                    $player_option = fw_get_db_post_option($post->ID, 'player_option', true);
                    //Map
                    $map_height = fw_get_db_post_option($post->ID, 'map_height', true);
                    $latitude = fw_get_db_post_option($post->ID, 'latitude', true);
                    $longitude = fw_get_db_post_option($post->ID, 'longitude', true);
                    $map_zoom = fw_get_db_post_option($post->ID, 'map_zoom', true);
                    $map_type = fw_get_db_post_option($post->ID, 'map_type', true);
                    $map_styles = fw_get_db_post_option($post->ID, 'map_styles', true);
                    $map_info = fw_get_db_post_option($post->ID, 'map_info', true);
                    $info_box_width = fw_get_db_post_option($post->ID, 'info_box_width', true);
                    $info_box_height = fw_get_db_post_option($post->ID, 'info_box_height', true);
                    $marker = fw_get_db_post_option($post->ID, 'marker', true);
                    $map_controls = fw_get_db_post_option($post->ID, 'map_controls', true);
                    $map_dragable = fw_get_db_post_option($post->ID, 'map_dragable', true);
                    $scroll = fw_get_db_post_option($post->ID, 'scroll', true);
                }

                if (function_exists('fw_get_db_settings_option')) {
                    $google_key = fw_get_db_settings_option('google_key');
                } else {
                    $google_key = 'AIzaSyDzIBTj0lh1y6Z-nnb2YaBQoj6th5J5iOI'; //Juts for demo
                }

                if ($map_type == 'ROADMAP') {
                    $map_type_id = 'google.maps.MapTypeId.ROADMAP';
                } else if ($map_type == 'SATELLITE') {
                    $map_type_id = 'google.maps.MapTypeId.SATELLITE';
                } else if ($map_type == 'HYBRID') {
                    $map_type_id = 'google.maps.MapTypeId.HYBRID';
                } else if ($map_type == 'TERRAIN') {
                    $map_type_id = 'google.maps.MapTypeId.TERRAIN';
                } else {
                    $map_type_id = 'google.maps.MapTypeId.ROADMAP';
                }

                $uni_flag = fw_unique_increment();
                if (function_exists('soccer_acumen_enque_map_library')) {
                    soccer_acumen_enque_map_library();
                }
                ?>
                <div class="<?php echo esc_attr($section_width); ?> <?php echo sanitize_html_class($content_class); ?>">
                    <div class="tg-player-detail tg-haslayout">
                        <div class="tg-player-data tg-haslayout">
                            <div class="tg-player-info tg-haslayout">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php if (!empty($thumbnail)) { ?>
                                            <div class="tg-widget tg-imagewidget">
                                                <figure>
                                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                                </figure>
                                            </div>
                                        <?php } ?>
                                        <div class="tg-widget tg-mapwidget">
                                            <div id="tg-map" class="tg-map tg-haslayout">
                                                <div id="tg-map-<?php echo esc_attr($uni_flag); ?>" style="height:<?php echo esc_attr($map_height); ?>px" class="tg-map tg-haslayout"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <?php if (!empty($position) || !empty($rating)) { ?>
                                            <div class="tg-playcontent">
                                                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="tg-theme-tag"><?php echo esc_attr($position); ?></a>
                                                <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                                <?php
                                                $star_value = $rating / 5 * 100;
                                                if (!empty($star_value)) {
                                                    ?>
                                                    <span class="tg-stars"><span style="width:<?php echo esc_attr($star_value); ?><?php esc_html_e('%', 'soccer-acumen'); ?>"></span></span>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <ul>
                                            <?php if (!empty($nick_name)) { ?>
                                                <li><?php esc_html_e('Nick Name :', 'soccer-acumen'); ?></li>
                                                <li><?php echo esc_attr($nick_name); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($team)) { ?>
                                                <li><?php esc_html_e('Team :', 'soccer-acumen'); ?></li>
                                                <li><?php echo get_the_title($team); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($player_birth)) { ?>
                                                <li><?php esc_html_e('Birth Date :', 'soccer-acumen'); ?></li>
                                                <li><?php echo date('F jS,Y', strtotime($player_birth)); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($age)) { ?>
                                                <li><?php esc_html_e('age :', 'soccer-acumen'); ?></li>
                                                <li><?php echo intval($age) ?> <?php esc_html_e('Year old', 'soccer-acumen'); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($birth_place)) { ?>
                                                <li><?php esc_html_e('Birth Place :', 'soccer-acumen'); ?></li>
                                                <li><?php echo esc_attr($birth_place); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($height)) { ?>
                                                <li><?php esc_html_e('Height :', 'soccer-acumen'); ?></li>
                                                <li><?php echo intval($height); ?> <?php esc_html_e('cm ', 'soccer-acumen'); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($width)) { ?>
                                                <li><?php esc_html_e('Weight :', 'soccer-acumen'); ?></li>
                                                <li><?php echo intval($width); ?> <?php esc_html_e('kg ', 'soccer-acumen'); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($position)) { ?>
                                                <li><?php esc_html_e('Field position :', 'soccer-acumen'); ?></li>
                                                <li><?php echo esc_attr($position); ?></li>
                                            <?php } ?>
                                            <?php if (!empty($first_club)) { ?>
                                                <li><?php esc_html_e('First professional club :', 'soccer-acumen'); ?></li>
                                                <li><?php echo esc_attr($first_club); ?></li>
                                            <?php } ?>
                                            <?php
                                            if (!empty($extra_field)) {
                                                foreach ($extra_field as $item) {
                                                    ?>
                                                    <li><?php echo esc_attr($item['title']); ?></li>
                                                    <li><?php echo esc_attr($item['details']); ?></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php if (isset($enable_social_network) && $enable_social_network === 'enable') { ?>
                                                <li><?php esc_html_e('Social Networks :', 'soccer-acumen'); ?></li>

                                                <li>
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
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tg-player-description tg-haslayout">
                                <?php
                                the_content();
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
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            <?php if (function_exists('fw_ext_sidebars_get_current_position')) { ?>
                <div class="col-md-3 col-sm-4 col-xs-12 <?php echo sanitize_html_class($aside_class); ?>">
                    <aside id="tg-sidebar-upper" class="tg-sidebar tg-haslayout sidebar-section"> <?php echo fw_ext_sidebars_show('blue'); ?>
                    </aside>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script type='text/javascript'>
    function initialize() {
        var myLatlng = new google.maps.LatLng(<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>);
        var mapOptions = {
            zoom: <?php echo esc_js($map_zoom); ?>,
            scrollwheel: <?php echo esc_js($scroll); ?>,
            draggable: <?php echo esc_js($map_dragable); ?>,
            streetViewControl: false,
            center: myLatlng,
            mapTypeId: <?php echo esc_js($map_type_id); ?>,
            disableDefaultUI: <?php echo esc_js($map_controls); ?>,
        }


        var map = new google.maps.Map(document.getElementById('tg-map-<?php echo esc_attr($uni_flag); ?>'), mapOptions);

        var styles = soccer_acumen_get_map_styles('<?php echo esc_js($map_styles); ?>');
        if (styles != '') {
            var styledMap = new google.maps.StyledMapType(styles, {name: 'Styled Map'});
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
        }
        var infowindow = new google.maps.InfoWindow({
            content: '<?php echo esc_js($map_info); ?>',
            maxWidth: '<?php echo esc_js($info_box_width); ?>',
            maxHeight: '<?php echo esc_js($info_box_height); ?>',
        });

<?php if (!empty($marker)) { ?>
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: '',
                icon: '<?php echo esc_js($marker['url']); ?>',
                shadow: ''
            });
<?php } ?>

        if (infowindow.content != '') {
            infowindow.open(map, marker);
            map.panBy(1, -60);
            google.maps.event.addListener(marker, 'click', function (event) {
                infowindow.open(map, marker);
            });
        }

    }

    jQuery(document).ready(function (e) {
        google.maps.event.addDomListener(window, 'load', initialize);
    });


</script>	
<?php get_footer(); ?>
