<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>
<div class="sc-contactinfo tg-contactus tg-haslayout">
    <?php if (!empty($atts['title'])) { ?>
        <div class="tg-section-heading">
            <h2><?php echo esc_attr($atts['title']); ?></h2>
        </div>
    <?php } ?>
    <?php if (!empty($atts['short_descripion'])) { ?>
        <div class="tg-description">
            <p> <?php echo esc_attr($atts['short_descripion']); ?></p>
        </div>
    <?php } ?>
    <?php if (!empty($atts['contact_info_box'])) { ?>
        <ul class="tg-contactinfo">
            <?php foreach ($atts['contact_info_box'] as $contact_info_box) { ?>     
                <li>
                    <i class="<?php echo esc_attr($contact_info_box['icons']); ?>"></i>
                    <?php echo force_balance_tags($contact_info_box['details']); ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>
