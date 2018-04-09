"use strict";


jQuery(document).ready(function($) {
	$(document).on('click', '.icon-picker-elm', function () {
        var _this = jQuery(this);
        var icon = _this.find('i').data('icon');
        _this.parents('.zpb-wrapper').prev('.zpb-wrapper').find('input.icons-search').val(icon);
        _this.parents('.zpb-wrapper').prev('.zpb-wrapper').find('i').attr('class', icon);
        _this.parents('.zpb-wrapper').prev('.zpb-wrapper').find('.selected-icon').show();
        _this.parents('.zpb-wrapper').find('.icon-picker-elm').removeClass('active');
        _this.addClass('active');
    });
});