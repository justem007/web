jQuery(document).ready(function() {
		/* BOF MINI CART MODAL */
		jQuery('#nav li.parent').addClass('has-dropdown not-click');
		jQuery('#nav li.parent > ul').addClass('dropdown');
		jQuery("li.has-dropdown").removeClass('active');
		
		var _top_links = jQuery(".top-bar-section .links").clone();
		jQuery(".top-bar-section.navigation").append(_top_links);
		
		var _minicart = jQuery(".minicart-head-container").clone();
		jQuery(".minicart-small-container").append(_minicart);
		/* EOF MINI CART MODAL */
		
		/* BOF SEARCH DROPDOWN */
		var _search_form = jQuery(".top-search-container").html();
		jQuery(".top-bar-section.navigation").append("<ul class='show-for-small-only'><li>"+_search_form+"</li></ul>");
		/* EOF SEARCH DROPDOWN */
		
		/* BOF FOOTER ACCORDION */
		jQuery(window).on('resize', function(e){
			if(Foundation.utils.is_small_up()) {
				jQuery(".footer-container .links .resize-activation").addClass("accordion");
			}
			if(Foundation.utils.is_large_up()) {
				jQuery(".footer-container .links .resize-activation").removeClass("accordion");
			}
			
			if(Foundation.utils.is_medium_up()) {
				jQuery(".footer-container .links .resize-activation").removeClass("accordion");
			}
		});
		/* EOF FOOTER ACCORDION */
		
		jQuery("table").each(function() {
			jQuery(this).addClass("responsive");
		});
		
		
		
});
