<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var atts
 */
$counters = $atts['counter_popup'];
?>
<div class="sc-counters">
    <div class="col-sm-12 col-xs-12">
        <div class="tg-statistics" >
            <?php if (!empty($counters)) { ?>
                <?php
                foreach ($counters as $counter) {              
                    $start_from = isset($counter['counter_start']) && $counter['counter_start'] != '' ? $counter['counter_start'] : 0;
                    $counter_end = isset($counter['counter_end']) && $counter['counter_end'] != '' ? $counter['counter_end'] : 1000;
                    $counter_interval = isset($counter['counter_interval']) && $counter['counter_interval'] != '' ? $counter['counter_interval'] : 50;
                    $counter_speed = isset($counter['counter_speed']) && $counter['counter_speed'] != '' ? $counter['counter_speed'] : 8000;
                    ?>
                    <div class="tg-statistic tg-goals">
                        <?php if(!empty($counter['icons_list'])){ ?>
                        <span class="tg-icon <?php echo esc_attr($counter['icons_list']);?>"></span>
                        <?php } ?>
                        <h2><span class="tg-statistic-count" data-from="<?php echo intval($start_from); ?>" data-to="<?php echo esc_attr($counter_end); ?>" data-speed="<?php echo esc_attr($counter_speed); ?>" data-refresh-interval="<?php echo esc_attr($counter_interval); ?>"><?php echo esc_attr($counter_end); ?></span></h2>
                            <?php if (isset($counter['counter_title']) && !empty($counter['counter_title'])) { ?>
                            <h3><?php echo sanitize_title($counter['counter_title']) ?></h3>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>


