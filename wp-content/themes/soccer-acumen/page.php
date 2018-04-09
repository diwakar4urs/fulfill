<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Soccer Acumen
 */
get_header();
$tg_sidebar = 'full';
$section_width = 'col-md-12 col-sm-12 col-xs-12';
if (function_exists('fw_ext_sidebars_get_current_position')) {
    $current_position = fw_ext_sidebars_get_current_position();
    if ($current_position !== 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
        $tg_sidebar = $current_position;
        $section_width = 'col-md-9 col-sm-8 col-xs-12';
    }
}

$page_id = soccer_acumen_get_page_id();
if (isset($tg_sidebar) && ( $tg_sidebar == 'full' )) {
    while (have_posts()) : the_post();
        ?>
        <div class="container">
            <div class="row">
                <?php
                do_action('soccer_acumen_prepare_section_wrapper_before');
					the_content();
					wp_link_pages(array(
						'before' => '<div class="page-links tg-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'soccer-acumen') . '</span>',
						'after' => '</div>',
						'link_before' => '<span>',
						'link_after' => '</span>',
						'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'soccer-acumen') . ' </span>%',
						'separator' => '<span class="screen-reader-text">, </span>',
					));
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open($page_id) && get_comments_number()) :
						echo '<div class="col-xs-12">';
							comments_template();
						echo '</div>';
					endif;
                do_action('soccer_acumen_prepare_section_wrapper_after');
                ?>
             </div>
          </div>  
                <?php
            endwhile;
        } else {
            $section_type = 'content-full';
            if (isset($tg_sidebar) && $tg_sidebar == 'right') {
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
                    <div id="tg-twocolumns-upper" class="tg-main-section main-page-wrapper tg-twocolumns tg-haslayout <?php echo sanitize_html_class($section_type); ?>">
                        <div class="<?php echo esc_attr($section_width); ?> <?php echo sanitize_html_class($content_class); ?>  page-section">
                            <div class="row">
                                <?php
                                while (have_posts()) : the_post();
                                    the_content();
                                    wp_link_pages(array(
                                        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'soccer-acumen') . '</span>',
                                        'after' => '</div>',
                                        'link_before' => '<span>',
                                        'link_after' => '</span>',
                                        'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'soccer-acumen') . ' </span>%',
                                        'separator' => '<span class="screen-reader-text">, </span>',
                                    ));
                                    // If comments are open or we have at least one comment, load up the comment template.

                                    if (comments_open($page_id) && get_comments_number()) :
                                        echo '<div class="col-xs-12">';
                                        comments_template();
                                        echo '</div>';
                                    endif;
                                    ;
                                endwhile;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 sidebar-section <?php echo sanitize_html_class($aside_class); ?>" id="sidebar">
                            <aside id="tg-sidebar-upper" class="tg-sidebar tg-haslayout">
                                <?php echo fw_ext_sidebars_show('blue'); ?>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php get_footer(); ?>