<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ecomatic
 */
get_header();

$section_width = 'col-sm-8';
?>

<div class="container">
    <div class="row">
        <div id="tg-twocolumns-upper" class="tg-twocolumns tg-haslayout archive-none tg-main-section">
            <div class="<?php echo esc_attr($section_width); ?> page-section">
                <div id="tg-content" class="tg-content tg-haslayout tg-latest-technology">
                    <?php
                    global $paged;
                    $tg_get_excerpt = get_option('rss_use_excerpt');
                    if (is_author()) {
                        global $author;
                        $userdata = get_userdata($author);
                    }
                    if (category_description() || is_tag() || (is_author() && isset($userdata->description) && !empty($userdata->description))) {
                        echo '<article class="widget orgnizer">';
                        if (is_author()) {

                            $author_photo = get_the_author_meta('author_photo', $author->ID);
                            ?>
                            <figure>
                                <?php if (!empty($author_photo)) { ?>
                                    <div class="author-img">
                                        <img src="<?php echo esc_url($author_photo) ?>" alt="<?php esc_attr_e('Author Avatar', 'soccer-acumen'); ?>" />
                                    </div>
                                <?php } ?>
                            </figure>
                            <div class="left-sp">
                                <h5><a><?php echo esc_attr($userdata->display_name); ?></a></h5>
                                <p><?php echo balanceTags($userdata->description, true); ?></p>
                            </div>
                            <?php
                        } elseif (is_category()) {
                            $category_description = category_description();
                            if (!empty($category_description)) {
                                ?>
                                <div class="left-sp">
                                    <p><?php echo category_description(); ?></p>
                                </div>
                            <?php } ?>
                            <?php
                        } elseif (is_tag()) {
                            $tag_description = tag_description();
                            if (!empty($tag_description)) {
                                ?>
                                <div class="left-sp">
                                    <p><?php echo apply_filters('tag_archive_meta', $tag_description); ?></p>
                                </div>
                                <?php
                            }
                        }
                        echo '</article>';
                    }

                    if (empty($paged)) {
                        $paged = 1;
                    }

                    if (!isset($_GET["s"])) {
                        $_GET["s"] = '';
                    }

                    $taxonomy = 'category';
                    $taxonomy_tag = 'post_tag';
                    $args_cat = array();

                    if (is_author()) {
                        $args_cat = array('author' => $wp_query->query_vars['author']);
                        $post_type = array('post');
                    } elseif (is_date()) {
                        if (is_month() || is_year() || is_day() || is_time()) {
                            $args_cat = array('m' => $wp_query->query_vars['m'], 'year' => $wp_query->query_vars['year'], 'day' => $wp_query->query_vars['day'], 'hour' => $wp_query->query_vars['hour'], 'minute' => $wp_query->query_vars['minute'], 'second' => $wp_query->query_vars['second']);
                        }
                        $post_type = array('post');
                    } else if ((isset($wp_query->query_vars['taxonomy']) && !empty($wp_query->query_vars['taxonomy']))) {
                        $taxonomy = $wp_query->query_vars['taxonomy'];
                        $taxonomy_category = '';
                        $taxonomy_category = $wp_query->query_vars[$taxonomy];

                        $taxonomy = 'category';
                        $args_cat = array();
                        $post_type = 'post';
                    } else if (is_category()) {
                        $taxonomy = 'category';
                        $args_cat = array();
                        $category_blog = $wp_query->query_vars['cat'];
                        $post_type = 'post';
                        $args_cat = array('cat' => "$category_blog");
                    } else if (is_tag()) {
                        $taxonomy = 'category';
                        $args_cat = array();
                        $tag_blog = $wp_query->query_vars['tag'];
                        $post_type = 'post';
                        $args_cat = array('tag' => "$tag_blog");
                    } else {
                        $taxonomy = 'category';
                        $args_cat = array();
                        $post_type = 'post';
                    }
                    $args = array(
                        'post_type' => $post_type,
                        'paged' => $paged,
                        'post_status' => 'publish',
                        'order' => 'ASC',
                    );

                    $args = array_merge($args_cat, $args);
                    $custom_query = new WP_Query($args);
                    if ($custom_query->have_posts()):
                        while ($custom_query->have_posts()) : $custom_query->the_post();
                            global $post;
                            $width = '1170';
                            $height = '450';
                            $title_limit = 1000;
                            $thumbnail = soccer_acumen_prepare_thumbnail($post->ID, $width, $height);
                            $image_src = soccer_acumen_prepare_thumbnail($post->ID, 'full');
                            $stickyClass = '';

                            if (!function_exists('fw_get_db_post_option')) {
                                $blog_settings = '';
                                $enable_time = '';
                                $enable_auhtor_info = '';
                                $enable_comments = '';
                                $enable_views = '';
                            } else {
                                $enable_time = fw_get_db_post_option($post->ID, 'enable_time', true);
                                $enable_auhtor_info = fw_get_db_post_option($post->ID, 'enable_auhtor_info', true);
                                $enable_comments = fw_get_db_post_option($post->ID, 'enable_comments', true);
                                $enable_views = fw_get_db_post_option($post->ID, 'enable_views', true);
                                $blog_settings = fw_get_db_post_option($post->ID, 'post_settings', true);
                            }

                            if (is_sticky()) {
                                $stickyClass = 'sticky';
                            }
                            ?> 
                            <article class="tg-theme-post tg-category-full">
                                <?php if (!empty($thumbnail)) { ?>
                                    <figure>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                        </a>
                                        <figcaption>
                                            <?php if (is_sticky()) { ?>
                                                <a class="tg-tag tg-tag-hotstory" href="javascript:;"><i class="fa fa-star"></i></a>
                                            <?php } ?>
                                            <?php if (isset($blog_settings['gadget']) && $blog_settings['gadget'] === 'video') { ?>
                                                <a class="tg-tag tg-videotag"><i class="fa fa-play"></i></a>
                                            <?php } ?>
                                        </figcaption>
                                    </figure>
                                <?php } ?>
                                <div class="tg-box">
                                    <div class="tg-postcontent">
                                        <div class="tg-border-heading">
                                            <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                        </div>
                                        <ul class="tg-postmetadata">
                                            <?php if (isset($enable_time) && $enable_time === 'enable') { ?>
                                                <li>
                                                    <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span><?php echo date_i18n(get_option('date_format'), strtotime(get_the_date())); ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($enable_auhtor_info) && $enable_auhtor_info === 'enable') { ?>
                                                <li>
                                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <i class="fa fa-user"></i>
                                                        <span>&nbsp;<?php esc_html_e('by', 'soccer-acumen'); ?> <?php echo ucfirst(get_the_author_meta('nickname')); ?>&nbsp;</span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($enable_comments) && $enable_comments === 'enable') { ?>
                                                <li>
                                                    <span><?php comments_popup_link('<i class="fa fa-comments-o"></i>&nbsp;<span>0</span>', '<i class="fa fa-comments-o"></i>&nbsp;<span>1</span>', '<i class="fa fa-comments-o"></i>&nbsp;<span> %</span>', 'comments-link', '0'); ?></span>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($enable_views) && $enable_views === 'enable') { ?>
                                                <li>
                                                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                        <i class="fa fa-eye"></i>
                                                        <span><?php echo intval($post_view); ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="tg-description">
                                            <p><?php soccer_acumen_prepare_excerpt(400, 'false', ''); ?></p>
                                        </div>
                                        <div class="tg-read-more">
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('Read More', 'soccer-acumen'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <?php
                        endwhile;
                    else:
                        esc_html_e('Nothing Found.', 'soccer-acumen');
                    endif;
                    $qrystr = '';
                    if ($wp_query->found_posts > get_option('posts_per_page')) {
                        if (function_exists('soccer_acumen_prepare_pagination')) {
                            echo soccer_acumen_prepare_pagination(wp_count_posts()->publish, get_option('posts_per_page'));
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-4 aside sidebar-section" id="sidebar">
                <aside id="tg-sidebar-upper" class="tg-sidebar tg-haslayout">
                    <?php get_sidebar(); ?>
                </aside>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
