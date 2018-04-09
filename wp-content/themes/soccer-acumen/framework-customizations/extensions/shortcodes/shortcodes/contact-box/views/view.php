<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$uni_flag = fw_unique_increment();
$tabs = $atts['info_box'];
if (function_exists('soccer_acumen_init_owl_script')) {
    soccer_acumen_init_owl_script();
}
?>
<div class="sc-contactinfo tg-contactus">
  <div id="tg-officeaddressslider-<?php echo esc_attr($uni_flag); ?>" class="tg-officeaddressslider tg-officeaddressnav owl-carousel">
     <?php
        if (!empty($tabs)) {
			foreach ($tabs as $tab) {
				?>
				<div class="item">
					<?php /*?><a href="javascript:;"><?php */?>
						<?php if (!empty($tab['title'])) { ?>
							<span class="tg-theme-tag"><?php echo esc_attr($tab['title']); ?></span>
						<?php } ?>
						<?php if (!empty($tab['sub_title'])) { ?>
							<div class="tg-section-heading"><h2><?php echo esc_attr($tab['sub_title']); ?></h2></div>
						<?php } ?>
						<?php if (!empty($tab['contact_info_box'])) { ?>
							<ul class="tg-contactinfo">
								<?php foreach ($tab['contact_info_box'] as $box) { ?>
									<li>
										<i class="<?php echo esc_attr($box['icons']); ?>"></i>
										<?php echo force_balance_tags($box['details']); ?>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					<?php /*?></a><?php */?>
				</div>
				<?php
            }
			
        $slider_scripts	= 'jQuery(document).ready(function(e) {
                               
							   var sync1 = jQuery("#tg-mapcontent");
								var sync2 = jQuery("#tg-officeaddressslider-'.esc_js($uni_flag).'");
								sync1.owlCarousel({
									singleItem: true,
									slideSpeed: 1000,
									navigation: false,
									pagination: false,
									afterAction: syncPosition,
									responsiveRefreshRate: 200,
								});
								sync2.owlCarousel({
									items: 3,
									itemsDesktop: [1199, 3],
									itemsDesktopSmall: [979, 3],
									itemsTablet: [768, 3],
									itemsMobile: [479, 3],
									pagination: false,
									responsiveRefreshRate: 100,
									afterInit: function (el) {
										el.find(".owl-item").eq(0).addClass("synced");
									}
								});
								function syncPosition(el) {
									var current = this.currentItem;
									$("#tg-officeaddressslider-'.esc_js($uni_flag).'")
											.find(".owl-item")
											.removeClass("synced")
											.eq(current)
											.addClass("synced");
									if ($("#tg-officeaddressslider-'.esc_js($uni_flag).'").data("owlCarousel") !== undefined) {
										center(current);
									}
								}
								$("#tg-officeaddressslider-'.esc_js($uni_flag).'").on("click", ".owl-item", function (e) {
									e.preventDefault();
									var number = $(this).data("owlItem");
									sync1.trigger("owl.goTo", number);
								});
								function center(number) {
									var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
									var num = number;
									var found = false;
									for (var i in sync2visible) {
										if (num === sync2visible[i]) {
											var found = true;
										}
									}
									if (found === false) {
										if (num > sync2visible[sync2visible.length - 1]) {
											sync2.trigger("owl.goTo", num - sync2visible.length + 2);
										} else {
											if (num - 1 === -1) {
												num = 0;
											}
											sync2.trigger("owl.goTo", num);
										}
									} else if (num === sync2visible[sync2visible.length - 1]) {
										sync2.trigger("owl.goTo", sync2visible[1]);
									} else if (num === sync2visible[0]) {
										sync2.trigger("owl.goTo", num - 1);
									}
					
								}
							   
                            });';
        wp_add_inline_script('soccer_acumen_functions',$slider_scripts);
     }
    ?>
    </div>
</div>
