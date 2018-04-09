<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($tabs)) :
    ?>
    <div class="tg-product-tabarea">
        <ul class="tg-themetabnav" role="tablist">
            <?php
            $counter = 1;
            foreach ($tabs as $key => $tab) :

                $active = $counter === 1 ? 'active' : '';
                ?>
                <li role="presentation" class="<?php echo esc_attr($active); ?>">
                    <a data-toggle="tab" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>" href="#<?php echo esc_attr($key); ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', esc_html($tab['title']), $key); ?></a>
                </li>
        <?php $counter++;
    endforeach; ?>
        </ul>
    </div>
    <div class="tab-content tg-themetabcontent">
        <?php
        $counter = 1;
        foreach ($tabs as $key => $tab) :
            $active = $counter === 1 ? ' in active' : '';
            ?>
            <div id="<?php echo esc_attr($key); ?>" class="tab-pane fade <?php echo esc_attr($active); ?>" role="tabpanel">
                <?php call_user_func($tab['callback'], $key, $tab); ?>
            </div>
            <?php $counter++;
        endforeach; ?>
    </div>

<?php endif; ?>
