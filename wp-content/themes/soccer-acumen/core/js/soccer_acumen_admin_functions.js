"use strict";
jQuery(document).ready(function (e) {

	jQuery(document).on('click', '.add_more_services', function (event) {
		//alert('asd');
		var widget	= jQuery(this).data('widget');
		var $html	= '';
		$html	= '<div class="data-services"><p class="data-day"><label for="">Day</label><input type="text" id="day" name="widget-opening_hours['+widget+'][day][]" value="" class="widefat" /></p><p class="data-hours"><label for="">Time</label><input type="text" id="time" name="widget-opening_hours['+widget+'][time][]" value="" class="widefat" /></p><p class="data-closed"><input type="hidden" id="closed" name="widget-opening_hours['+widget+'][closed][]" value="off" class="widefat" /><input type="checkbox" id="closed" name="widget-opening_hours['+widget+'][closed][]" value="" class="widefat" /><label for="">Closed?</label></p><p class="data-del"><a href="javascript:;" class="delete-me"><i class="fa fa-times"></i></a></p>';
		
		jQuery('.accordion_html').append($html);
	});
	
	jQuery(document).on('click','.delete-me', function (e) {
		jQuery(this).parents('.data-services').remove();
	});
	
	//Accordion
	jQuery(document).on('click', '.add_more_accordion', function (event) {
		//alert('asd');
		var widget	= jQuery(this).data('widget');
		var $html	= '';
		$html	= '<div class="data-services"><p><label for="">Heading</label><input type="text" id="heading" name="widget-tg_accordion['+widget+'][heading][]" value="" class="widefat" /></p> <p><label for="description">Description</label><textarea id="description"  rows="8" cols="10" name="widget-tg_accordion['+widget+'][description][]" class="widefat"></textarea></p><p class="data-del"><a href="javascript:;" class="delete-me"><i class="fa fa-times"></i></a></p></div>';
		
		jQuery('.accordion_html').append($html);
	});
	
	jQuery(document).on('click','.delete-accordion', function (e) {
		jQuery(this).parents('.data-services').remove();
	});
	
	jQuery(document).on('click','#closed', function (e) {
		var $this	= jQuery(this);
		if ( jQuery(this).is(':checked' )) {
			jQuery(this).val('on');
		} else{
			jQuery(this).val('off');
		}
	});
	/* -------------------------------------
     Upload Avatar
     -------------------------------------- */
	jQuery('#upload-user-avatar').on('click', function () {
		"use strict";
		var $ = jQuery;
		var $this = jQuery(this);
		var custom_uploader = wp.media({
			title: 'Select File',
			button: {
				text: 'Add File'
			},
			multiple: false
		})
				.on('select', function () {
					var attachment = custom_uploader.state().get('selection').first().toJSON();
					jQuery('#author_photo').val(attachment.url);
					jQuery('#avatar-src').attr('src', attachment.url);
					jQuery('#avatar-wrap').show();
					$this.parents('tr').next('tr').find('.backgroud-image').show();
					$this.parents('tr').next('tr').attr('class','');
				}).open();

	});
	
	jQuery('#upload-user-avatar-bg').on('click', function () {
		"use strict";
		var $ = jQuery;
		var $this = jQuery(this);
		var custom_uploader = wp.media({
			title: 'Select File',
			button: {
				text: 'Add File'
			},
			multiple: false
		})
				.on('select', function () {
					var attachment = custom_uploader.state().get('selection').first().toJSON();
					jQuery('#user_avatar_bg_display').val(attachment.url);
					jQuery('#avatar-src-bg').attr('src', attachment.url);
					jQuery('#avatar-wrap-bg').show();
					$this.parents('tr').next('tr').find('.backgroud-image').show();
					$this.parents('tr').next('tr').attr('class','');
				}).open();

	});
	
	jQuery(document).on('click','.delete-auhtor-media', function (e) {
		jQuery(this).parents('.backgroud-image').find('img').attr('src', '');
		jQuery(this).parents('tr').prev('tr').find('.media-image').val('');
		jQuery(this).parents('.backgroud-image').hide();
	});
	
	//color picker
	jQuery('.soccer_acumen_cat_color').wpColorPicker();
	
});