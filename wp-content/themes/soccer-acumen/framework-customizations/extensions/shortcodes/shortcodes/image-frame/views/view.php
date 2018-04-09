<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
if (empty($atts['image'])) {
    return;
}

$width = ( is_numeric($atts['width']) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric($atts['height']) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';
if (!empty($width) && !empty($height)) {
    $image = fw_resize($atts['image']['attachment_id'], $width, $height, true);
} else {
    $image = $atts['image']['url'];
}

$image_frame_class = 'frame-img';

if (isset($atts['image_frame']) && $atts['image_frame'] == 'off') {
    $image_frame_class = 'frame-img-no';
}
?>
<?php if (empty($atts['link'])) : ?>
<div class="tg-aboutussection">
    <figure class="<?php echo esc_attr($image_frame_class); ?>"><img src="<?php echo esc_url($image) ?>" alt="<?php esc_html_e('Image Frame', 'soccer-acumen'); ?>" /></figure>
 </div>
<?php else : ?>
<div class="tg-aboutussection">
    <figure class="<?php echo esc_attr($image_frame_class); ?>">
        <a href="<?php echo esc_url($atts['link']); ?>" target="<?php echo esc_attr($atts['target']) ?>">
            <img src="<?php echo esc_url($image) ?>" alt="<?php esc_html_e('Image Frame', 'soccer-acumen'); ?>" />
        </a>
    </figure>
</div>
<?php endif ?>