<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var atts
 */
$testimonials = $atts['testimonial_popup'];
$uni_flag = fw_unique_increment();
?>
<div class="sc-testimonial">
    <div class="col-lg-offset-1 col-sm-10">
        <div id="tg-testimonial-slider-<?php echo esc_attr($uni_flag); ?>" class="tg-testimonial-slider tg-haslayout">
            <div class="swiper-wrapper">
                <?php
                if (!empty($testimonials)) {
                    foreach ($testimonials as $key => $testimonial) {
                        ?>
                        <div class="swiper-slide">
                            <?php if (!empty($testimonial['testimonial_image']['url'])) { ?>
                                <div class="col-sm-4">
                                    <figure class="tg-postimg">
                                        <img src="<?php echo esc_url($testimonial['testimonial_image']['url']); ?>" alt="<?php echo esc_attr($testimonial['testimonial_title']); ?>">
                                    </figure>
                                </div>
                            <?php } ?>
                            <div class="col-sm-8">
                                <div class="tg-contentbox">
                                    <?php if (!empty($testimonial['testimonial_title'])) { ?>
                                        <div class="tg-section-heading">
                                            <h2><?php echo esc_attr( $testimonial['testimonial_title']);?></h2>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($testimonial['testimonial_detail'])) { ?>
                                        <div class="tg-description">
                                            <p><?php echo esc_attr($testimonial['testimonial_detail']);?></p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($testimonial['social_icons'])) { ?>
                                        <ul class="tg-socialicons">
                                            <?php
                                            foreach ($testimonial['social_icons'] as $social_icons) {
                                                if (!empty($social_icons['social_url'])) {
                                                    $social_link = $social_icons['social_url'];
                                                }
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url($social_link); ?>">
                                                        <?php if (!empty($social_icons['social_icons_list'])) { ?>
                                                            <i class="<?php echo esc_attr($social_icons['social_icons_list']); ?>"></i>
                                                        <?php } ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="tg-themebtnprev"><span class="fa fa-angle-left"></span></div>
            <div class="tg-themebtnnext"><span class="fa fa-angle-right"></span></div>
        </div>
    </div>
    <script>
        /*------------------------------------------
         TESTIMONIOAL SLIDER
         ------------------------------------------*/
        jQuery(document).ready(function (e) {
            var swiper = new Swiper('#tg-testimonial-slider-<?php echo esc_js($uni_flag); ?>', {
                slidesPerView: 1,
                nextButton: '.tg-themebtnnext',
				speed:2000,
                prevButton: '.tg-themebtnprev',
                autoplay: 2000,
            });
        });

    </script>
</div>

