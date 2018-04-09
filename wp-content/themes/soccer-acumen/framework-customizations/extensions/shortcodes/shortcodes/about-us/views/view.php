<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>
<div class="sc-about-us">
    <div class="tg-contentbox">
        <?php if (!empty($atts['aboutus_title'])) { ?>
            <div class="tg-section-heading"><h2><?php echo esc_attr($atts['aboutus_title']); ?></h2></div>
        <?php } ?>
        <?php if (!empty($atts['aboutus_description'])) { ?>
        <div class="tg-description">
            <p><?php echo do_shortcode($atts['aboutus_description']); ?></p>
        </div>
        <?php } ?>
        <div class="tg-btnbox">
            <?php
            $link = '';
            if (!empty($atts['link'])) {
                $link = $atts['link'];
            }
            $target = $atts['link_target'];
            ?>
            <a class="tg-btn" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
                <?php if (!empty($atts['read_more'])) { ?>
                    <span><?php echo esc_attr($atts['read_more']); ?></span>
                <?php } ?>
            </a>  
        </div>
    </div> 
</div>
