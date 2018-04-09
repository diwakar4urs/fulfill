<?php
/**
 * Define the Slider shortcode
 * @since    1.0
 */
if (!class_exists('SC_Soccer_Slider')) {

    class SC_Soccer_Slider {

        /**
         * @constructor
         */
        public function __construct() {
            add_shortcode('soccer_slider', array(&$this, 'shortCodeCallBack'));
        }

        /**
         * @return Slider Data
         */
        public function shortCodeCallBack($args, $content = '') {
            if (isset($args['id']) && !empty($args['id'])) {
                $slider_type = fw_get_db_post_option($args['id'], 'slider_type', true);
                if (isset($slider_type['gadget']) && $slider_type['gadget'] === 'slider_v1') {
                    $this->soccer_prepare_slider_v1($args['id']);
                } else if (isset($slider_type['gadget']) && $slider_type['gadget'] === 'slider_v2') {
                    $this->soccer_prepare_slider_v2($args['id']);
                }
            }
        }

        /**
         * @Slider
         * @return {HTML}
         * */
        public function soccer_prepare_slider_v1($id = '') {
            $margin_top = fw_get_db_post_option($id, 'margin_top', true);
            $margin_bottom = fw_get_db_post_option($id, 'margin_bottom', true);
            $pagination = fw_get_db_post_option($id, 'pagination', true);
            $auto = fw_get_db_post_option($id, 'auto', true);
            $slider_type = fw_get_db_post_option($id, 'slider_type', true);
            $custom_classes = fw_get_db_post_option($id, 'custom_classes', true);

            $v1_slides = !empty($slider_type['slider_v1']['slider_popup']) ? $slider_type['slider_v1']['slider_popup'] : '';
            $texture_image = $slider_type['slider_v1']['texture_image'];

            $flag = fw_unique_increment();

            $autoPlay = '3500';
            if (isset($auto) && $auto == 'disable') {
                $autoPlay = '';
            }

            $navigation = 'true';
            if (isset($pagination) && $pagination == 'disable') {
                $navigation = 'false';
            }

            $css = array();
            if (isset($margin_top) && !empty($margin_top)) {
                $css[] = 'margin-top:' . $margin_top . 'px;';
            }

            if (isset($margin_bottom) && !empty($margin_bottom)) {
                $css[] = 'margin-bottom:' . $margin_bottom . 'px;';
            }

            if (isset($v1_slides) && is_array($v1_slides) && !empty($v1_slides)) {
                ?>
                <div class="soccer-custom-slider tg-sliderbox <?php echo esc_attr($custom_classes); ?>" style="<?php echo implode(' ', $css); ?>">
                    <?php if (!empty($texture_image['url'])) { ?>
                        <div class="tg-imglayer">
                            <img src="<?php echo esc_url($texture_image['url']); ?>" alt="<?php echo esc_html_e('Texture Image', 'soccer-acumen'); ?>">
                        </div>
                    <?php } ?>
                    <div id="tg-home-slider-<?php echo esc_attr($flag); ?>" class="tg-home-slider tg-haslayout">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($v1_slides as $key => $slide) {
                                $fixture_buttons = !empty($slide['buttons']) ? $slide['buttons'] : '';
                                ?>       
                                <div class="swiper-slide">
                                    <div class="container">
                                        <?php if (!empty($slide['float_image']['url'])) { ?>
                                            <figure class="floating">
                                                <img src="<?php echo esc_url($slide['float_image']['url']); ?>" alt="<?php esc_html_e('slide', 'soccer_core'); ?>">
                                            </figure>
                                        <?php } ?>
                                        <?php
                                        if (!empty($fixture_buttons) ||
                                                !empty($slide['slider_subtitle'])
                                        ) {
                                            ?>
                                            <div class="tg-slider-content">
                                                <?php if (!empty($slide['slider_title'])) { ?>
                                                    <h1><?php echo do_shortcode($slide['slider_title']); ?></h1>
                                                <?php } ?>
                                                <div class="tg-btnbox">
                                                    <?php if (!empty($slide['slider_subtitle'])) { ?>
                                                        <h2><?php echo do_shortcode($slide['slider_subtitle']); ?></h2>
                                                    <?php } ?>

                                                    <?php
                                                    if (!empty($fixture_buttons)) {
                                                        foreach ($fixture_buttons as $key => $button) {
                                                            if (!empty($button['button_title'])) {
                                                                $button_link = !empty($button['button_link']) ? $button['button_link'] : '#';
                                                                ?>
                                                                <a class="tg-btn" href="<?php echo esc_url($button_link); ?>">
                                                                    <span><?php echo esc_attr($button['button_title']); ?></span>
                                                                </a>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if (isset($pagination) && $pagination === 'enable') { ?>
                            <div class="tg-btn-next">
                                <span><?php echo esc_html_e('next', 'soccer-acumen'); ?></span>
                                <span class="fa fa-angle-down"></span>
                            </div>
                            <div class="tg-btn-prev">
                                <span><?php echo esc_html_e('prev', 'soccer-acumen'); ?></span>
                                <span class="fa fa-angle-down"></span>
                            </div>
                        <?php } ?>
                    </div>
                    <script>
                        jQuery(document).ready(function (e) {
                            var swiper = new Swiper('#tg-home-slider-<?php echo esc_js($flag); ?>', {
                                nextButton: '.tg-btn-next',
                                prevButton: '.tg-btn-prev',
                                autoplay:<?php echo esc_js($autoPlay); ?>,
                                loop: true,
                            });
                        });

                    </script>
                </div>    
                <?php
            }
        }

        public function soccer_prepare_slider_v2($id = '') {
            $margin_top = fw_get_db_post_option($id, 'margin_top', true);
            $margin_bottom = fw_get_db_post_option($id, 'margin_bottom', true);
            $pagination = fw_get_db_post_option($id, 'pagination', true);
            $auto = fw_get_db_post_option($id, 'auto', true);
            $custom_classes = fw_get_db_post_option($id, 'custom_classes', true);
            $slider_type = fw_get_db_post_option($id, 'slider_type', true);
            $v2_slides = !empty($slider_type['slider_v2']['slider_fixture']) ? $slider_type['slider_v2']['slider_fixture'] : '';


            $background_images = !empty($slider_type['slider_v2']['background_image']) ? $slider_type['slider_v2']['background_image'] : '';
            $pattern_image = !empty($slider_type['slider_v2']['pattern_image']) ? $slider_type['slider_v2']['pattern_image'] : '';


            $parent_flag = rand(1, 99999);
            $child_flag = rand(1, 99999);

            $autoPlay = 'true';
            if (isset($auto) && $auto == 'disable') {
                $autoPlay = 'false';
            }

            $navigation = 'true';
            if (isset($pagination) && $pagination == 'disable') {
                $navigation = 'false';
            }

            $css = array();
            if (isset($margin_top) && !empty($margin_top)) {
                $css[] = 'margin-top:' . $margin_top . 'px;';
            }

            if (isset($margin_bottom) && !empty($margin_bottom)) {
                $css[] = 'margin-bottom:' . $margin_bottom . 'px;';
            }
			
            //Pattern
            $pattern = '';
            if (!empty($pattern_image['url'])) {
                $pattern = 'style="background-image: url(' . $pattern_image['url'] . ');"';
            }
            ?>
            <div class="tg-sliderbox <?php echo esc_attr($custom_classes); ?>" style="<?php echo implode(' ', $css); ?>">
                <?php if (!empty($background_images)) { ?>
                    <div id="tg-home-sliderfade-<?php echo esc_attr($parent_flag); ?>" class="tg-home-sliderfade tg-haslayout">
                        <div class="swiper-wrapper">
                            <?php foreach ($background_images as $images) {
                                ?>  
                                <div class="swiper-slide" style="background-image:url(<?php echo esc_url($images['url']); ?>);"></div>
                            <?php } ?>
                        </div>
                        <script>
                            jQuery(document).ready(function (e) {
                                var swiper = new Swiper('#tg-home-sliderfade-<?php echo esc_js($parent_flag); ?>', {
                                    autoplay: 3000,
                                    effect: 'fade',
                                    loop: true,
                                });
                            });
                        </script>
                    </div>
                <?php } ?>
                <div class="tg-home-slidertwobg" <?php echo ( $pattern ); ?>></div>
                <?php if (!empty($v2_slides)) { ?>
                    <div id="tg-home-slidertwo-<?php echo esc_attr($child_flag); ?>" class="tg-home-slider tg-home-slidertwo tg-haslayout">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($v2_slides as $fixture) {
                                $flag = rand(1, 99999);
                                $formatted_date = fw_get_db_post_option($fixture['fixture'], 'date_match', true);
                                $fixture_buttons = !empty($fixture['buttons']) ? $fixture['buttons'] : '';
                                ?>                
                                <div class="swiper-slide">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8 tg-verticalmiddle">
                                                <div class="tg-slider-content">
                                                    <?php if (!empty($fixture['fixture'])) { ?>
                                                        <div class="tg-section-heading">
                                                            <h1><?php echo get_the_title($fixture['fixture']); ?></h1>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="tg-description">
                                                        <p><?php echo soccer_acumen_prepare_excerpt_by_id($fixture['fixture'], 70); ?></p>
                                                    </div>
                                                    <div class="tg-counters">
                                                        <div class="tg-counter tg-days" id="tg-days-<?php echo esc_attr($flag); ?>"></div>
                                                        <div class="tg-counter tg-hours" id="tg-hours-<?php echo esc_attr($flag); ?>"></div>
                                                        <div class="tg-counter tg-minutes" id="tg-minutes-<?php echo esc_attr($flag); ?>"></div>
                                                        <div class="tg-counter tg-seconds" id="tg-seconds-<?php echo esc_attr($flag); ?>"></div>
                                                    </div>
                                                    <div class="tg-btnbox">
                                                        <?php if (!empty($fixture['slider_subtitle'])) { ?>
                                                            <h2><?php echo esc_attr($fixture['slider_subtitle']); ?></h2>
                                                            <?php
                                                        }

                                                        if (!empty($fixture_buttons)) {
                                                            foreach ($fixture_buttons as $key => $button) {
                                                                if (!empty($button['button_title'])) {
                                                                    $button_link = !empty($button['button_link']) ? $button['button_link'] : '#';
                                                                    ?>
                                                                    <a class="tg-btn" href="<?php echo esc_url($button_link); ?>">
                                                                        <span><?php echo esc_attr($button['button_title']); ?></span>
                                                                    </a>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (!empty($fixture['float_image']['url'])) { ?>
                                                <div class="col-sm-4 tg-verticalmiddle">
                                                    <figure class="floating">
                                                        <img src="<?php echo esc_url($fixture['float_image']['url']); ?>" alt="<?php echo sanitize_title(get_the_title()); ?>">
                                                    </figure>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <script>

                                    function matchCounter() {
                                        var launch = new Date('<?php echo esc_js($formatted_date); ?>');
                                        var days = jQuery('#tg-days-<?php echo esc_js($flag); ?>');
                                        var hours = jQuery('#tg-hours-<?php echo esc_js($flag); ?>');
                                        var minutes = jQuery('#tg-minutes-<?php echo esc_js($flag); ?>');
                                        var seconds = jQuery('#tg-seconds-<?php echo esc_js($flag); ?>');
                                        setDate();
                                        function setDate() {
                                            var now = new Date();
                                            if (launch < now) {
                                                days.html('<h3>0</h3><h4>Day</h4>');
                                                hours.html('<h3>0</h3><h4>Hour</h4>');
                                                minutes.html('<h3>0</h3><h4>Minute</h4>');
                                                seconds.html('<h3>0</h3><h4>Second</h4>');
                                            }
                                            else {
                                                var s = -now.getTimezoneOffset() * 60 + (launch.getTime() - now.getTime()) / 1000;
                                                var d = Math.floor(s / 86400);
                                                days.html('<h3>' + d + '</h3><h4>Day' + (d > 1 ? 's' : ''), '</h4>');
                                                s -= d * 86400;
                                                var h = Math.floor(s / 3600);
                                                hours.html('<h3>' + h + '</h3><h4>Hour' + (h > 1 ? 's' : ''), '</h4>');
                                                s -= h * 3600;
                                                var m = Math.floor(s / 60);
                                                minutes.html('<h3>' + m + '</h3><h4>Minute' + (m > 1 ? 's' : ''), '</h4>');
                                                s = Math.floor(s - m * 60);
                                                seconds.html('<h3>' + s + '</h3><h4>Second' + (s > 1 ? 's' : ''), '</h4>');
                                                setTimeout(setDate, 1000);
                                            }
                                        }
                                    }
                                    matchCounter();

                                </script>
                            <?php } ?>
                        </div>
                    </div>
                    <script>
                        jQuery(document).ready(function (e) {
                            var swiper = new Swiper('#tg-home-slidertwo-<?php echo esc_js($child_flag); ?>', {
                                autoplay: 3000,
                                loop: true,
                                direction: 'vertical',
                            });
                        });
                    </script>
                <?php } ?>
            </div>
            <?php
        }

    }

    new SC_Soccer_Slider();
}
