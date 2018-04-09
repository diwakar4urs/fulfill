<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>
<div class="sc-video tg-videobox tg-haslayout ">
    <figure>
        <?php if (!empty($atts['video_image']['url'])) { ?>
            <img src="<?php echo esc_url($atts['video_image']['url']); ?>" alt="<?php echo esc_attr($atts['video_title']); ?>">
        <?php } ?>
        <figcaption>
            <?php if (!empty($atts['video_link'])) { ?>
                <a class="tg-playbtn" href="<?php echo esc_attr($atts['video_link']);?>" data-rel="prettyPhoto[iframe]"></a>
            <?php } ?>
            <?php if (!empty($atts['video_title'])) { ?>
                <h2><?php echo esc_attr($atts['video_title']); ?></h2>
            <?php } ?>
        </figcaption>
    </figure>
</div>