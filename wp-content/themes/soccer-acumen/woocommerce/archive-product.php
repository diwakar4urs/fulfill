<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');

$obj = get_queried_object();


if (function_exists('fw_get_db_settings_option')) {
    //Get Slider Values

  
   

    $archive_enable_banner = fw_get_db_settings_option('archive_enable_banner');
    $enable_sidebar = fw_get_db_settings_option('archive_enable_sidebar');
    $sidebar_position = fw_get_db_settings_option('archive_sidebar_position');
    $is_sidebar = isset($enable_sidebar) && $enable_sidebar == 'on' ? 'on' : 'off';
    $content_div = isset($enable_sidebar) && $enable_sidebar == 'on' ? 'col-lg-9 col-md-9 col-sm-8 col-xs-12' : 'col-lg-12 col-md-12 col-sm-12';
    $sidebar_position = $sidebar_position;
} else {
    $content_div = 'col-lg-12 col-md-12 col-sm-12';
    $is_sidebar = 'off';
    $sidebar_position = 'left';
    
}

if (isset($sidebar_position) && $sidebar_position == 'right') {
    $content_div = $content_div . ' pull-left';
    $sidebar_position = ' pull-right';
} else {
    $content_div = $content_div . ' pull-right';
    $sidebar_position = ' pull-left';
}
?>
<?php
/**
 * woocommerce_before_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');
?>
<?php
/**
 * woocommerce_archive_description hook
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
//do_action( 'woocommerce_archive_description' );
?>
<div id="tg-twocolumns" class="tg-twocolumns tg-main-section tg-haslayout">
    <div class="th-products">
        <div class="<?php echo esc_attr($content_div); ?>">
             <?php if (have_posts()) : ?>
                <?php woocommerce_product_subcategories(); ?>
                
                <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                ?>

            <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>
                <?php wc_get_template('loop/no-products-found.php'); ?>
            <?php endif; ?>
        </div>
        <?php if (isset($is_sidebar) && $is_sidebar === 'on') { ?>
            <div id="sidebar" class="col-lg-3 col-md-4 col-sm-4 col-xs-12 aside tg-woocommerce <?php echo esc_attr($sidebar_position); ?>">
                <aside id="tg-sidebar" class="tg-sidebar tg-sidebar-woocommerce tg-haslayout">
                    <?php
                    if (is_woocommerce()) {
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("shop_sidebar")) : endif;
                    }
                    ?>
                </aside>
            </div>
        <?php } ?>
    </div>
</div>

<?php
/**
 * woocommerce_after_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>
<?php get_footer('shop'); ?>
