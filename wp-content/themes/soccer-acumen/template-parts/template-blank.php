<?php
/*
  Template Name: Blank Page
 */
get_header();
?>
<div class="full-width">
    <div class="col-md-12">
        <?php
        while (have_posts()) : the_post();
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-links tg-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'soccer-acumen') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'soccer-acumen') . ' </span>%',
                'separator' => '<span class="screen-reader-text">, </span>',
            ));
        endwhile;
        ?>
    </div>
</div>
<?php
get_footer();
?>