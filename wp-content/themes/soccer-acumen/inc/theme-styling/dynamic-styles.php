<?php
if (function_exists('fw_get_db_settings_option')) {
	$site_view = fw_get_db_settings_option('site_view');	
    $body_background_color = fw_get_db_settings_option('background_color');
	$theme_type = fw_get_db_settings_option('theme_type');
    $theme_color = fw_get_db_settings_option('theme_color');
    $enable_typo = fw_get_db_settings_option('enable_typo');
    $background = fw_get_db_settings_option('background');
    $custom_css = fw_get_db_settings_option('custom_css');
    $body_font = fw_get_db_settings_option('body_font');
    $h1_font = fw_get_db_settings_option('h1_font');
    $h2_font = fw_get_db_settings_option('h2_font');
    $h3_font = fw_get_db_settings_option('h3_font');
    $h4_font = fw_get_db_settings_option('h4_font');
    $h5_font = fw_get_db_settings_option('h5_font');
    $h6_font = fw_get_db_settings_option('h6_font');
}	
?>

<style>
	
body{background:<?php echo (!empty($body_background_color)) ? $body_background_color : '#FFF'; ?>; }
<?php echo (isset($custom_css)) ? $custom_css : ''; ?>

<?php if (isset($enable_typo) && $enable_typo === 'on') { ?>
	body,p,ul,li {
		font-size:<?php echo (isset($body_font['size'])) ? $body_font['size'] : '100%'; ?>px;
		font-family:<?php echo (isset($body_font['family'])) ? $body_font['family'] : 'Lato'; ?>;
		font-style:<?php echo (isset($body_font['style'])) ? $body_font['style'] : ''; ?>;
		color:<?php echo (isset($body_font['color'])) ? $body_font['color'] : '#000'; ?>;
	}
	h1{
		font-size:<?php echo (isset($h1_font['size'])) ? $h1_font['size'] : ''; ?>px;
		font-family:<?php echo (isset($h1_font['family'])) ? $h1_font['family'] : ''; ?>;
		font-style:<?php echo (isset($h1_font['style'])) ? $h1_font['style'] : ''; ?>;
		color:<?php echo (isset($h1_font['color'])) ? $h1_font['color'] : ''; ?>;
	}
	h2{
		font-size:<?php echo (isset($h2_font['size'])) ? $h2_font['size'] : ''; ?>px;
		font-family:<?php echo (isset($h2_font['family'])) ? $h2_font['family'] : ''; ?>;
		font-style:<?php echo (isset($h2_font['style'])) ? $h2_font['style'] : ''; ?>;
		color:<?php echo (isset($h2_font['color'])) ? $h2_font['color'] : ''; ?>;
	}
	h3{font-size:<?php echo (isset($h3_font['size'])) ? $h3_font['size'] : ''; ?>px;
	   font-family:<?php echo (isset($h3_font['family'])) ? $h3_font['family'] : ''; ?>;
	   font-style:<?php echo (isset($h3_font['style'])) ? $h3_font['style'] : ''; ?>;
	   color:<?php echo (isset($h3_font['color'])) ? $h3_font['color'] : ''; ?>;
	}
	h4{font-size:<?php echo (isset($h4_font['size'])) ? $h4_font['size'] : 'Lato'; ?>px;
	   font-family:<?php echo (isset($h4_font['family'])) ? $h4_font['family'] : 'Lato'; ?>;
	   font-style:<?php echo (isset($h4_font['style'])) ? $h4_font['style'] : 'Lato'; ?>;
	   color:<?php echo (isset($h4_font['color'])) ? $h4_font['color'] : 'Lato'; ?>;
	}
	h5{font-size:<?php echo (isset($h5_font['size'])) ? $h5_font['size'] : 'Lato'; ?>px;
	   font-family:<?php echo (isset($h5_font['family'])) ? $h5_font['family'] : 'Lato'; ?>;
	   font-style:<?php echo (isset($h5_font['style'])) ? $h5_font['style'] : 'Lato'; ?>;
	   color:<?php echo (isset($h5_font['color'])) ? $h5_font['color'] : 'Lato'; ?>;
	}
	h6{font-size:<?php echo (isset($h6_font['size'])) ? $h6_font['size'] : 'Lato'; ?>px;
	   font-family:<?php echo (isset($h6_font['family'])) ? $h6_font['family'] : 'Lato'; ?>;
	   font-style:<?php echo (isset($h6_font['style'])) ? $h6_font['style'] : 'Lato'; ?>;
	   color:<?php echo (isset($h6_font['color'])) ? $h6_font['color'] : 'Lato'; ?>;
	}	
<?php } ?>
<?php if (isset($theme_type) && $theme_type === 'custom') { 
	 if (isset($theme_color) && $theme_color != '') { ?>
		.tg-btn:after,
		.tg-navigation ul li + li:before,
		.tg-addnav ul li + li:before,
		.tg-socialicons li + li:before,
		.tg-matchresult:after,
		.tg-bgboxtwo,
		.tg-tag:hover,
		.tg-player-slider .tg-postimg .tg-img-hover .tg-theme-tag,
		.tg-widget ul li a:hover i,
		.ui-slider-horizontal .ui-slider-range,
		.tg-tags-widget ul li .tg-btn:hover,
		.tg-player-data .tg-playcontent .tg-theme-tag,
		.tg-themetabnav li a:hover,
		.tg-themetabnav li.active a,
		.tg-oldmatchresult:hover .tg-matchdate,
		.tg-oldmatchresult:hover .tg-matchdetail .tg-theme-tag,
		.tg-ticket:hover .tg-theme-tag,
		.tg-ticket:hover .tg-matchdate,
		.tg-tags-social .tg-btn:hover,
		.tg-authorinfo .tg-theme-tag,
		.tg-shopbanner:before,
		.tg-limitedoffer:after,
		.tg-shopcontent .tg-contentbox .tg-theme-tag,
		.tg-productinfo .tg-theme-tag,
		.tg-checkbox input[type=checkbox]:checked + label:before,
		.tg-officeaddressnav .tg-theme-tag,
		.tg-officeaddressnav .item:hover,
		.tg-officeaddressnav .owl-item.synced .item,
		.tg-filterbale-nav li a:hover,
		.tg-filterbale-nav li a.active,
		.tg-project figure figcaption .tg-theme-tag,
		.tg-btnnav span,
		.tg-btnnav span:after,
		.tg-btnnav span:before,
		.tg-btnnav:before,
		.tg-sidenav .tg-nav ul li.tg-cart a em:before,
		.tg-topaddnav .navbar-header .navbar-toggle,
		.tg-nav .navbar-header .navbar-toggle,
		.mCSB_scrollTools .mCSB_buttonUp:hover,
		.mCSB_scrollTools .mCSB_buttonDown:hover,
		.points-table tbody tr th,
		.tagcloud > a:hover,
		.tg-saletag,
		.top-head
		{background:<?php echo esc_attr($theme_color); ?>;}
		
		.tg-nav .navbar-toggle:hover{background:<?php echo esc_attr($theme_color); ?> !important;}

		/*Theme Text Color*/
		a,
		p a,
		p a:hover,
		a:hover,
		a:focus,
		a:active,
		.tg-stars span:after,
		.tg-btn,
		.tg-btn:hover,
		.tg-navigation ul li a:hover,
		.tg-socialicons li a:hover,
		.tg-socialicons li a:hover i,
		.tg-addnav ul li a:hover,
		.tg-addnav ul li a:hover i,
		.tg-cartcontent ul li .tg-product-detail h3 a:hover,
		.tg-navigation > div > ul > li > ul > li:hover > a,
		.tg-navigation > div > ul > li > ul > li > a:hover,
		.tg-navigation ul li ul li.tg-dropdown a:before,
		.tg-slider-content h1,
		.tg-home-slider .tg-btn-next,
		.tg-home-slider .tg-btn-prev,
		.tg-upcomingmatch-counter .tg-section-heading h2 span,
		.tg-counter h4,
		.tg-team-nameplusstatus h4 a,
		.tg-themebtnnext:hover span,
		.tg-themebtnprev:hover span,
		.tg-statistic h3,
		.tg-videobox figure figcaption h2,
		.tg-player:hover .tg-playcontent h3 a,
		.tg-pointstable-slider .tg-themebtnnext span,
		.tg-pointstable-slider .tg-themebtnprev span,
		.tg-postmetadata li a:hover,
		.tg-footernav ul li a:hover,
		.tg-productcontent h4 a:hover,
		.tg-contactinfo li i,
		.tg-navigation span,
		.tg-oursponsers .tg-upcomingmatch .tg-match .tg-box span,
		.tg-breadcrumb,
		.tg-breadcrumb li a,
		.tg-player-slider .tg-postimg .tg-img-hover h3 a:hover,
		.tg-widget h3,
		.tg-playerslider .tg-themebtnnext span,
		.tg-playerslider .tg-themebtnprev span,
		.tg-detail li i,
		.tg-matchdate span,
		.tg-oldmatchresult .tg-matchdetail .tg-theme-tag,
		.tg-oldmatchresult .tg-matchdetail h4 span,
		.tg-oldmatchresult:hover .tg-matchdetail h4,
		.tg-theme-tag time,
		.tg-btnreply:hover,
		.tg-btnreply:hover:before,
		.tg-ticket h4 span,
		.tg-ticket .tg-theme-tag,
		.tg-ticket:hover h4,
		.tg-pagination li a:hover i,
		.tg-fixturecounter .tg-section-heading h2 span,
		.tg-authorinfo .tg-section-heading h3,
		.tg-shopcontent .tg-contentbox h2,
		.tg-shopcontent .tg-contentbox h2 a,
		.tg-shopviewnav li a:hover i,
		.tg-shopviewnav li.tg-active a i,
		.tg-btncart:hover i,
		.tg-productquentity .minus:hover,
		.tg-productquentity .plus:hover,
		.tg-productinfo .tg-description ul li:before,
		.tg-officeaddressnav .tg-contactinfo li i,
		.tg-officeaddressnav .item:hover .tg-theme-tag,
		.tg-officeaddressnav .owl-item.synced .item .tg-theme-tag,
		.tg-navigation ul > li.active,
		.tg-testimonial-slider .tg-themebtnnext span,
		.tg-btnnav i,
		.tg-comming-sooncounter .timer_box:first-child h1,
		.tg-footercol .tg-widget .tg-contactinfo li a,
		.tg-pagination li.tg-nextpage a:hover span,
		.tg-pagination li.tg-prevpage a:hover span,
		.tg-widget ul li a:hover,
		.tg-widget h3 a,
		.woocommerce-MyAccount-navigation  ul li.is-active a,
		.woocommerce-MyAccount-navigation  ul li:hover a,
		.woocommerce .woocommerce-info:before,
		.tg-footercol .widget_categories .cat-item,
		.tg-footercol .widget_categories .cat-item a,
		.tg-footercol .tg-widget.widget_categories ul li:hover,
		.tg-footercol .tg-widget.widget_categories ul li a:hover
		{ color: <?php echo esc_attr($theme_color); ?>;}



		.tg-home-slider .tg-btn-next span:first-child,
		.tg-home-slider .tg-btn-prev span:first-child,
		.tg-matchresult:before,
		.tg-tag:hover,
		.tg-btn,
		.tg-tags-widget ul li .tg-btn:hover,
		.tg-playerslider .tg-themebtnnext,
		.tg-playerslider .tg-themebtnprev,
		.tg-home-slidertwobg:after,
		.tg-themetabnav li a:hover,
		.tg-themetabnav li.active a,
		.tg-checkbox input[type=checkbox]:checked + label:before,
		.tg-filterbale-nav li a:hover,
		.tg-filterbale-nav li a.active,
		.tg-testimonial-slider .tg-themebtnnext,
		.tg-testimonial-slider .tg-themebtnprev,
		.mCSB_scrollTools .mCSB_buttonUp:hover,
		.mCSB_scrollTools .mCSB_buttonDown:hover,
		.tagcloud > a:hover,
		.woocommerce .woocommerce-info
		{border-color:<?php echo esc_attr($theme_color); ?>;}
		
		.tg-filterbale-nav li a:after,
		.tg-tag.tg-tag-hotstory:after{border-top-color: <?php echo esc_attr($theme_color); ?> !important;}
		.tg-breadcrumbs .tg-breadcrumb{border-bottom-color: <?php echo esc_attr($theme_color); ?>;}

	<?php } 
 } ?>
/*---Boxed View--*/ 
<?php
	//Just for demo 
	$post_name = soccer_acumen_get_post_name();
	if( isset( $post_name ) && $post_name === 'index-3' ){
		$site_view['gadget']	= 'boxed';
	}
	
	//Site Boxed View	
	if ( !empty( $site_view['gadget'] ) && $site_view['gadget'] === 'boxed') {
		if( !empty( $site_view['boxed']['boxed_pattren']['data']['icon'] ) ){
		?>
			.site-boxed-layout{ background-image:url(<?php echo ( $site_view['boxed']['boxed_pattren']['data']['icon']);?>); }
		<?php
		}
	}
?>
</style>

