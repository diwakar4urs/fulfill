<?php
/**
 * Single Product title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $post;
$terms = get_the_terms($post->ID, 'product_cat');
if (!empty($terms)) {
    foreach ($terms as $term) {
        $term->name;
        $category_id = $term->term_id;
    }
}
if (!empty($category_id) && !empty($term->name)) {
?>
<a class="tg-theme-tag" href="<?php echo get_category_link($category_id) ?>"><?php echo esc_attr($term->name); ?></a>
<?php } ?>
<div class="tg-producttitle">
    <a href="<?php echo esc_url(get_the_permalink()); ?>" ><h2 itemprop="name"><?php the_title(); ?></h2></a>
</div>