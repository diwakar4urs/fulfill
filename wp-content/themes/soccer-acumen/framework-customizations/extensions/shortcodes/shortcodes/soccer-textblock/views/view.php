<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>

<?php if (isset($atts['textblock_description']) && $atts['textblock_description'] != '') { ?>
    <div class="description">
        <?php echo do_shortcode($atts['textblock_description']); ?>
    </div>
<?php } ?>