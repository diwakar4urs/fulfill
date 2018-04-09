<?php
/**
 * The template for displaying all single posts.
 *
 * @package Soccer Acumen
 */
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

while (have_posts()) : the_post();
    global $post;

    if (function_exists('soccer_acumen_init_owl_script')) {
        soccer_acumen_init_owl_script();
    }
    $width = 1170;
    $height = 400;
    $thumbnail = soccer_acumen_prepare_thumbnail($post->ID, $width, $height);
    $image_src = soccer_acumen_prepare_thumbnail($post->ID, 'full');
    $user_id = get_the_author_meta('ID');
    $author_photo = get_the_author_meta('author_photo', $user_id);
    $user_id = get_the_author_meta('ID');
    $post_id = $post->ID;

    if (!function_exists('fw_get_db_post_option')) {
        $blog_settings = '';
        $enable_category = '';
        $enable_auhtor_info = 'enable';
        $enable_comments = 'enable';
        $enable_tags = '';
        $enable_share = '';
    } else {
        $blog_settings = fw_get_db_post_option($post->ID, 'post_settings', true);
        $enable_category = fw_get_db_post_option($post->ID, 'enable_category', true);
        $enable_auhtor_info = fw_get_db_post_option($post->ID, 'enable_auhtor_info', true);
        $enable_comments = fw_get_db_post_option($post->ID, 'enable_comments', true);
        $enable_tags = fw_get_db_post_option($post->ID, 'enable_tags', true);
        $enable_share = fw_get_db_post_option($post->ID, 'enable_share', true);

        $enable_comments = !empty($enable_comments) ? $enable_comments : 'enable';
    }

    if (isset($blog_settings) && $blog_settings == 'gallery') {
        $blogClass = 'gallery-post';
    } else if (isset($blog_settings) && $blog_settings == 'slider') {
        $blogClass = 'tg-post-slider';
    } else if (isset($blog_settings) && $blog_settings == 'video') {
        $url = parse_url($blog_post_video_custom);
        if ($url['host'] == 'soundcloud.com') {
            $blogClass = 'tg-audio-post';
        } else {
            $blogClass = 'tg-video-post';
        }
    } else {
        $blogClass = '';
    }

    $blog_post_gallery = array();
    $post_video = '';

    if (isset($blog_settings['gallery']['blog_post_gallery']) && !empty($blog_settings['gallery']['blog_post_gallery'])) {
        $blog_post_gallery = $blog_settings['gallery']['blog_post_gallery'];
    }

    if (isset($blog_settings['video']['blog_video_link']) && !empty($blog_settings['video']['blog_video_link'])) {

        $post_video = $blog_settings['video']['blog_video_link'];
    }
    ?>
    <div class="tg-main-section tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns tg-haslayout">
                    <?php
                    if (isset($blog_settings['gadget']) && $blog_settings['gadget'] === 'image' && !empty($thumbnail)
                    ) {
                        ?>
                        <div class="col-sm-12 col-xs-12">
                            <figure class="tg-postimg tg-postimgdetail">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>" />
                                <figcaption>
                                    <ul class="tg-postmetadata">
                                        <?php if (isset($enable_auhtor_info) && $enable_auhtor_info === 'enable') { ?>
                                            <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_html_e('by', 'soccer-acumen'); ?> <?php echo ucfirst(get_the_author_meta('nickname')); ?></a></li>
                                        <?php } ?>
                                        <?php if (isset($enable_comments) && $enable_comments === 'enable') { ?>
                                            <li><?php comments_popup_link('<span>0 ' . esc_html__('Comments', 'soccer-acumen') . '</span>', '' . esc_html__('Comments', 'soccer-acumen') . '&nbsp;<span>1</span>', '' . esc_html__('Comments', 'soccer-acumen') . '&nbsp;<span> %</span>', 'comments-link', '0'); ?></li>
                                        <?php } ?>
                                        <?php if (isset($enable_category) && $enable_category === 'enable') { ?>
                                            <li><?php echo get_the_category_list(',', $post->ID); ?></li>
                                        <?php } ?>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                        <?php
                    } elseif (isset($blog_settings['gadget']) && $blog_settings['gadget'] === 'gallery' && !empty($blog_post_gallery) && $blog_post_gallery != ''
                    ) {
                        $uniq_flag = rand(99, 99999);
                        ?>
                        <div class="col-sm-12 col-xs-12">
                            <figure class="tg-postimg tg-postimgdetail">
                                <div id="tg-post-slider-<?php echo esc_attr($uniq_flag); ?>" class="post-slider">
                                    <?php
                                    foreach ($blog_post_gallery as $blog_gallery) {
                                        $attachment_id = $blog_gallery['attachment_id'];
                                        $image_data = wp_get_attachment_image_src($attachment_id, 'soccer_acumen_blog_listing');
                                        if (isset($image_data) && !empty($image_data) && $image_data[0] != '') {
                                            ?>
                                            <div class="item">
                                                <img src="<?php echo esc_url($image_data[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <script>
                                    jQuery(document).ready(function () {
                                        jQuery("#tg-post-slider-<?php echo esc_js($uniq_flag); ?>").owlCarousel({
                                            navigation: true, // Show next and prev buttons
                                            singleItem: true,
                                            autoPlay: true,
                                            autoPlay: true,
                                                    slideSpeed: 300,
                                            paginationSpeed: 400,
                                            pagination: false,
                                            navigation: true,
                                                    navigationText: [
                                                        "<i class='fa fa-angle-left'></i>",
                                                        "<i class='fa fa-angle-right'></i>"
                                                    ]
                                        });
                                    });
                                </script>
                            </figure>
                        </div>
                        <?php
                    } elseif (isset($blog_settings['gadget']) && $blog_settings['gadget'] === 'video'
                    ) {
                        $url = parse_url($post_video);
                        if (isset($url['host']) && $url['host'] == $_SERVER["SERVER_NAME"]) {
                            echo '<div class="tg-fullpost-slider tg-inner-banner tg-fullpost"><article class="tg-theme-post"><figure class="tg-postimg tg-postimgdetail"><div class="video">';
                            echo do_shortcode('[video width="' . $width . '" height="' . $height . '" src="' . $post_video . '"][/video]');
                            echo '</figure></article></div>';
                        } else {

                            if (isset($url['host']) && ( $url['host'] == 'vimeo.com' || $url['host'] == 'player.vimeo.com')) {
                                echo '<div class="col-sm-12 col-xs-12"><article class="tg-theme-post"><figure class="tg-postimg tg-postimgdetail"><div class="video">';
                                $content_exp = explode("/", $post_video);
                                $content_vimo = array_pop($content_exp);
                                echo '<iframe width="' . $width . '" height="' . $height . '" src="https://player.vimeo.com/video/' . $content_vimo . '" 
                                ></iframe>';
                                echo '</figure></article></div>';
                            } elseif (isset($url['host']) && $url['host'] == 'soundcloud.com') {
                                $height = 205;
                                $width = 1920;
                                $video = wp_oembed_get($post_video, array('height' => $height));
                                $search = array('webkitallowfullscreen', 'mozallowfullscreen', 'frameborder="no"', 'scrolling="no"');
                                echo '<div class="col-sm-12 col-xs-12"><article class="tg-theme-post"><figure class="tg-postimg tg-postimgdetail"><div class="audio">';
                                $video = str_replace($search, '', $video);
                                echo str_replace('&', '&amp;', $video);
                                echo '</figure></article></div>';
                            } else {
                                echo '<div class="col-sm-12 col-xs-12"><article class="tg-theme-post"><figure class="tg-postimg tg-postimgdetail"><div class="video">';
                                $content = str_replace(array('watch?v=', 'http://www.dailymotion.com/'), array('embed/', '//www.dailymotion.com/embed/'), $post_video);
                                echo '<iframe width="' . $width . '" height="' . $height . '" src="' . $content . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                                echo '</figure></article></div>';
                            }
                        }
                    } else if (!empty($thumbnail)) {
                        ?>
                        <div class="col-sm-12 col-xs-12">
                            <figure class="tg-postimg tg-postimgdetail">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>" />
                            </figure>
                        </div>			
                    <?php } ?>
                    <div class="<?php echo esc_attr($section_width); ?> <?php echo sanitize_html_class($content_class); ?>">
                        <div class="tg-postdetail">
                            <div class="tg-mathtextbox">
                                <div class="blog-single-description">
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
                            <?php print_r($enable_tags); print_r($enable_share); ?>
                            <?php if(!empty($enable_tags) || !empty($enable_share)) { ?>
                            <div class="tg-tags-social tg-haslayout">
                                <?php
                                if (!empty($enable_tags) && $enable_tags === 'enable') {
                                    the_tags('<div class="tg-tags pull-left"><i class="fa fa-tag"></i> <span>' . esc_html__('Tags: ', 'soccer-acumen') . '</span>', '', '</div>');
                                }
                                ?>
                                <?php if (!empty($enable_share) && $enable_share === 'enable') { ?>
                                    <div class="tg-social-share pull-right">
                                        <div class="tg-social-share pull-right">
                                            <?php soccer_acumen_prepare_social_sharing($default_icon = 'true', $title = true, $heading = 'Share'); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php 
							if ( isset($enable_auhtor_info) 
								&& $enable_auhtor_info === 'enable' 
							) { ?>
                                <div class="tg-authorbox">
                                    <figure class="tg-authorpic">
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php if (!empty($author_photo)) { ?>
                                                <img src="<?php echo esc_url($author_photo); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                                <?php
                                            } else {
                                                echo get_avatar($user_id, 100);
                                            }
                                            ?>
                                        </a>
                                    </figure>
                                    <div class="tg-authorinfo">
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="tg-theme-tag"><?php esc_html_e('About the Author', 'soccer-acumen'); ?></a>
                                        <div class="tg-section-heading">
                                            <h3><?php echo ucfirst(get_the_author_meta('nickname')); ?></h3>
                                        </div>
                                        <div class="tg-description">
                                            <p><?php echo get_the_author_meta('description'); ?></p>
                                        </div>
                                        <ul class="tg-socialicons">
                                            <?php
                                            $facebook_url = get_the_author_meta('facebook');
                                            $twitter_url = get_the_author_meta('twitter');
                                            $pinterest_url = get_the_author_meta('pinterest');
                                            $linkedin_url = get_the_author_meta('linkedin');
                                            $tumblr_url = get_the_author_meta('tumblr');

                                            if (!empty($facebook_url)) {
                                                ?>
                                                <li><a href="<?php echo esc_url($facebook_url); ?>"><i class="fa fa-facebook-f"></i></a></li>
                                            <?php } ?>
                                            <?php if (!empty($twitter_url)) { ?>
                                                <li><a href="<?php echo esc_url($twitter_url); ?>"><i class="fa fa-twitter"></i></a></li>
                                            <?php } ?>
                                            <?php if (!empty($pinterest_url)) { ?>
                                                <li><a href="<?php echo esc_url($pinterest_url); ?>"><i class="fa fa-pinterest-p"></i></a></li>
                                            <?php } ?>
                                            <?php if (!empty($linkedin_url)) { ?>
                                                <li><a href="<?php echo esc_url($linkedin_url); ?>"><i class="fa fa-linkedin"></i></a></li>
                                            <?php } ?>
                                            <?php if (!empty($tumblr_url)) { ?>
                                                <li><a href="<?php echo esc_url($tumblr_url); ?>"><i class="fa fa-tumblr"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }

                            if ($enable_comments === 'enable') {
                                if (comments_open($post->ID) || get_comments_number()) :
                                    comments_template();
                                endif;
                            }
                            ?>
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
</div>
<?php get_footer(); ?>