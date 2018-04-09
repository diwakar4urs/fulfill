<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Soccer Acumen
 */
get_header();

if (!function_exists('fw_get_db_settings_option')) {
    $title = esc_html__('We are really sorry but the page you requested is missing.', 'soccer-acumen');
    $image_404['url'] = get_template_directory_uri() . '/images/404-img.jpg';
    $message = '';
    ;
} else {
    $title = fw_get_db_settings_option('404_title');
    $image_404 = fw_get_db_settings_option('404_image');
    $message = fw_get_db_settings_option('404_message');
    $image_404['url'] = !empty($image_404['url']) ? $image_404['url'] : get_template_directory_uri() . '/images/404-img.jpg';
}
?>
<section class="tg-main-section tg-haslayout">
    <div class="container">
        <div class="row">
            <?php if( !empty( $image_404['url'] ) ) {?>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="tg-404">
                    <h2>4<span><img src="<?php echo esc_url($image_404['url']); ?>" alt="<?php esc_html_e('404','soccer-acumen');?>" /></span>4</h2>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="tg-404-content">
                    <?php if (!empty($title)) { ?>
                        <div class="tg-section-heading">
                            <h2><?php echo esc_attr($title); ?></h2>
                        </div>
                    <?php } ?>
                    <?php if (!empty($message)) { ?>
                        <div class="tg-description">
                            <p><?php echo force_balance_tags($message); ?></p>
                        </div>
                    <?php } ?>
                    <?php get_search_form();?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
