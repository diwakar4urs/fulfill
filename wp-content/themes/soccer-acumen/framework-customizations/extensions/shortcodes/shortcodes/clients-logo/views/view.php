<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$uniq_flag = fw_unique_increment();
$auto = !empty( $atts['client_auto'] ) ? $atts['client_auto'] : '0';
?>
<div class="sc-client-logos tg-latestresult tg-oursponsers">
    <?php if( !empty( $atts['logo_slides'] ) ){?>
        <div id="tg-upcomingmatch-slider-<?php echo esc_attr($uniq_flag); ?>" class="tg-upcomingmatch-slider tg-upcomingmatch">
            <div class="swiper-wrapper">
                <?php
                $counter	= 0;
                foreach ($atts['logo_slides'] as $logo) {
                    $counter++;
                    $url = !empty( $logo['client_url'] ) ? $logo['client_url'] : '#';
                    $target = $logo['client_logo_target'];
                    ?>
                    <div class="swiper-slide">
                        <div class="tg-match">
                            <div class="tg-matchdetail">
                                <?php if (!empty($logo['client_image']['url'])) { ?>
                                    <div class="tg-box">
                                        <strong class="tg-teamlogo">
                                            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"> 
                                                <img src="<?php echo esc_url($logo['client_image']['url']); ?>" alt="<?php echo esc_attr($logo['client_title']); ?>">
                                            </a>
                                        </strong>
                                    </div>
                                <?php } ?>
                                <?php if ( !empty($logo['client_sponsers']) || !empty($logo['client_title'])) { ?>
                                    <div class="tg-box">
                                        <?php if ( !empty($logo['client_sponsers'])) { ?>
                                        	<span><?php echo esc_attr($logo['client_sponsers']); ?></span>
                                        <?php } ?>
                                        <?php if ( !empty($logo['client_title'])) { ?>
                                        	<h3><?php echo esc_attr($logo['client_title']); ?></h3>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php if( $counter > 3 ){?>
                <div class="tg-themebtnnext"><span class="fa fa-angle-down"></span></div>
                <div class="tg-themebtnprev"><span class="fa fa-angle-up"></span></div>
            <?php } ?>
        </div>
        <?php 
            $slider_scripts	= "jQuery(document).ready(function(e) {
                                     var mainswiper = new Swiper('#tg-upcomingmatch-slider-".esc_js($uniq_flag)."', {
                                        direction: 'vertical',
                                        slidesPerView: 3,
                                        spaceBetween: 10,
										speed:2000,
                                        mousewheelControl: true,
                                        nextButton: '.tg-themebtnnext',
                                        prevButton: '.tg-themebtnprev',
                                        autoplay: ".esc_js($auto).",
                                    });
								});";
			wp_add_inline_script('soccer_acumen_functions',$slider_scripts);
	}
   ?>
</div>