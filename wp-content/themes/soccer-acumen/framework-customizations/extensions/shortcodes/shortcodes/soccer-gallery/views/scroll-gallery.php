<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$category = $atts['soccoer_categories'];
$match_view = $atts['soccer_match_view'];
$show_gallery = $atts['show_gallery'];
$show_filterable = $atts['show_filterable'];
$order = !empty($atts['order']) ? $atts['order'] : 'DESC';
$orderby = !empty($atts['orderby']) ? $atts['orderby'] : 'ID';
?>
<div class="sc-soccermedia-scroll tg-soccermedia">
    <?php
    $cat_sepration = array();
    $filterable = array();
    if (isset($category) && !empty($category)) {
        $cat_sepration = $category;
    }
    if (isset($cat_sepration) && !empty($cat_sepration)) {
        $slugs = array();
        $loop = array();
        foreach ($cat_sepration as $key => $value) {
            $term = get_term($value, 'gallery-category');
            $slugs[] = $term->slug;
            $loop[$term->slug] = $term->name;
        }
        $filterable = $slugs;
        $filterable_loop = $loop;
        $tax_query['tax_query'] = array('relation' => 'AND', array(
                'taxonomy' => 'gallery-category',
                'terms' => $filterable,
                'field' => 'slug',
        ));
    }
    $show_gallery = isset($show_gallery) && !empty($show_gallery) ? $show_gallery : '8';
    $query_args = array(
        'posts_per_page' => "-1",
        'post_type' => 'tg_gallery',
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1);

    if (isset($cat_sepration) && !empty($cat_sepration)) {
        $query_args = array_merge($query_args, $tax_query);
    }
    $query = new WP_Query($query_args);
    $count_post = $query->post_count;
    //Main Query	
    $query_args = array(
        'posts_per_page' => $show_gallery,
        'post_type' => 'tg_gallery',
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1);

    if (isset($cat_sepration) && !empty($cat_sepration)) {
        $query_args = array_merge($query_args, $tax_query);
    }
    ?>
    <?php if (isset($show_filterable) && $show_filterable === 'yes') { ?>
        <div class="tg-tg-soccermedia-head tg-haslayout">
            <ul id="tg-filterbale-nav" class="tg-filterbale-nav option-set">
                <li><a class="active" data-filter="*" href="javascript:void(0);"><?php esc_html_e('All', 'soccer-acumen'); ?></a></li>
                <?php
                if (!empty($filterable_loop)) {
                    foreach ($filterable_loop as $key => $value) {
                        ?>
                        <li><a data-filter=".<?php echo esc_attr($key); ?>" href="javascript:void(0);"><?php echo esc_attr($value); ?></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    <?php } ?>
    <div id="tg-<?php echo esc_attr($match_view); ?>" class="tg-<?php echo esc_attr($match_view); ?> tg-haslayout">
      <div id="filter-masonry" class="tg-soccermedia-content tg-haslayout">
            <?php
            global $post;
            while ($query->have_posts()) : $query->the_post();
                $width = 384;
                $height = 500;
                $thumbnail = soccer_acumen_prepare_thumbnail($post->ID, $width, $height);
                if (isset($thumbnail) && $thumbnail) {
                    $thumbnail = $thumbnail;
                } else {
                    $thumbnail = get_template_directory_uri() . '/images/gallery-scroll.png';
                }
                $categories_array = array();
                $categories = get_the_terms($post->ID, 'gallery-category');
                if (is_array($categories)) {
                    foreach ($categories as $category) {
                        $categories_array[$category->slug] = $category->slug;
                    }
                }
                if (!function_exists('fw_get_db_post_option')) {
                    $gallery_settings = '';
                    $gallery_video = '';
                    $date_event = '';
                } else {
                    $gallery_settings = fw_get_db_post_option($post->ID, 'gallery_settings', true);
                    $date_event = fw_get_db_post_option($post->ID, 'date-event', true);
                    $gallery_video = $gallery_settings['video']['gallery_video_link'];
                }
                if (isset($gallery_settings['gadget']) && $gallery_settings['gadget'] === 'video') {
                    ?>
                    <div class="masonry-grid <?php echo implode(' ', $categories_array); ?>">
                        <div class="tg-project">
                            <figure class="tg-postimg">
                                <a data-rel="prettyPhoto[iframe]" href="<?php echo esc_url($gallery_video); ?>" class="tg-playbtn"></a>
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                <figcaption>
                                    <a class="tg-theme-tag" data-rel="prettyPhoto[iframe]" href="<?php echo esc_url($gallery_video); ?>"><i class="fa fa-play"></i></a>
                                    <?php if (!empty($date_event)) { ?>
                                        <a class="tg-theme-tag"><?php esc_html_e('in', 'soccer-acumen'); ?> <?php echo intval($date_event); ?></a>
                                    <?php } ?>
                                    <h3><?php the_title(); ?></h3>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="masonry-grid <?php echo implode(' ', $categories_array); ?>">
                        <div class="tg-project">
                            <figure class="tg-postimg">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="image description">
                                <figcaption>
                                    <a class="tg-theme-tag" data-rel="prettyPhoto[iframe]" href="<?php echo esc_url($thumbnail); ?>"><i class="fa fa-image"></i></a>
                                    <?php if (!empty($date_event)) { ?>
                                        <a class="tg-theme-tag"><?php esc_html_e('in', 'soccer-acumen'); ?> <?php echo intval($date_event); ?></a>
                                    <?php } ?>
                                    <h3><?php the_title(); ?></h3>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <?php
                }
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
