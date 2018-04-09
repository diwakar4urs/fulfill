<?php
if (function_exists('fw_get_db_settings_option')) :
    $background_image = fw_get_db_settings_option('background');
    $comming_title = fw_get_db_settings_option('comming_title');
    $comming_description = fw_get_db_settings_option('comming_description');
    $enable_newsletter = fw_get_db_settings_option('enable_newsletter');
    $maintenance = fw_get_db_settings_option('maintenance');
    $date = fw_get_db_settings_option('date');
    $formatted_date = date('Y,m,d', strtotime($date.'-1 month'));
endif;

if (!empty($background_image['url'])) {
    $background = $background_image['url'];
} else {
    $background = get_template_directory_uri() . '/images/bg-commingsoon.jpg';
}
?>
<div id="tg-wrapper" class="tg-wrapper comingsoon-main tg-haslayout" style="background: url(<?php echo esc_url($background) ?>);background-size: cover;">
	<main id="tg-main" class="tg-main tg-haslayout" >
    	<div class="tg-comming-sooncontent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div id="tg-comming-sooncounter" class="tg-comming-sooncounter">
                        <div id="days" class="timer_box"></div>
                        <div id="hours" class="timer_box"></div>
                        <div id="minutes" class="timer_box"></div>
                        <div id="seconds" class="timer_box"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="tg-404-content">
                        <?php if (!empty($comming_title)) { ?>
                            <div class="tg-section-heading">
                                <h2><?php echo esc_attr($comming_title); ?></h2>
                            </div>
                        <?php } ?>
                        <?php if (!empty($comming_description)) { ?>
                            <div class="tg-description">
                                <p><?php echo esc_attr($comming_description); ?></p>
                            </div>
                        <?php } ?>
                        <?php
                        if(isset($enable_newsletter) && $enable_newsletter === 'enable'){
							$mailchimp = new Soccer_MailChimp();
							$mailchimp->soccer_acumen_mailchimp_form();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</main>
</div>
<script>
    (function ($) {
        var launch = new Date(<?php echo esc_js($formatted_date); ?>);
        var days = $('#days');
        var hours = $('#hours');
        var minutes = $('#minutes');
        var seconds = $('#seconds');
        setDate();
        function setDate() {
            var now = new Date();
            if (launch < now) {
                days.html('<p><?php echo esc_html_e('Days','soccer-acumen');?></p><h1>0</h1>');
                hours.html('<p><?php echo esc_html_e('Hours','soccer-acumen');?></p><h1>0</h1>');
                minutes.html('<p><?php echo esc_html_e('Minutes','soccer-acumen');?></p><h1>0</h1>');
                seconds.html('<p><?php echo esc_html_e('Seconds','soccer-acumen');?></p><h1>0</h1>');
            }
            else {
                var s = -now.getTimezoneOffset() * 60 + (launch.getTime() - now.getTime()) / 1000;
                var d = Math.floor(s / 86400);
                days.html('<h1>' + d + '</h1><p><?php echo esc_html_e('Day','soccer-acumen');?>' + (d > 1 ? 's' : ''), '</p>');
                s -= d * 86400;
                var h = Math.floor(s / 3600);
                hours.html('<h1>' + h + '</h1><p><?php echo esc_html_e('Hour','soccer-acumen');?>' + (h > 1 ? 's' : ''), '</p>');
                s -= h * 3600;
                var m = Math.floor(s / 60);
                minutes.html('<h1>' + m + '</h1><p><?php echo esc_html_e('Minute','soccer-acumen');?>' + (m > 1 ? 's' : ''), '</p>');
                s = Math.floor(s - m * 60);
                seconds.html('<h1>' + s + '</h1><p><?php echo esc_html_e('Second','soccer-acumen');?>' + (s > 1 ? 's' : ''), '</p>');
                setTimeout(setDate, 1000);
            }
        }
    })(jQuery);

</script>
<?php
die();

