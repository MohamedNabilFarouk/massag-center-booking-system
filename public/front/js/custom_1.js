/* =====================================
All JavaScript fuctions Start
======================================*/


/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

	// Submenu_toogle_nav function by = custom.js		
	// Video responsive function by = custom.js	
	// Popular Categories Gallery Carousel no margin function by = owl.carousel.js
	// page scroll top on click function custom	
	// Main menu fixed on top  when scroll down function custom	


(function ($) {
    'use strict';
	
/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/


	// Submenu_toogle_nav function by = custom.js
	function Submenu_toogle_nav(){		
		jQuery(".sub-menu").parent('li').addClass('has-child');
		jQuery(".mega-menu").parent('li').addClass('has-child');
		jQuery("<div class='fa fa-angle-down open-close-btn'></div>").insertAfter(".header-nav .has-child > a");
		jQuery('.has-child a+.open-close-btn').click(function(ev) {
			jQuery(this).next(jQuery('.sub-menu')).slideToggle('fast', function(){
				jQuery(this).parent().toggleClass('nav-active');
			});
			ev.stopPropagation();
		});
	}
	
	// Popular Categories Gallery Carousel no margin function by = owl.carousel.js
	function blog_image_slider() {
		jQuery('.blog-image-slider').owlCarousel({
			rtl: false,
			loop:false,
			margin:0,
			nav:true,
			dots: false,
			items:1,
			navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
		})
	}					

	// Video responsive function
	function video_responsive(){
	  jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
  	  jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');	
	}
	
	// page scroll top on click function custom
	function btn_scroltop(){
		jQuery("button.scroltop").on('click', function() {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 1000);
			return false;
		});
	
		jQuery(window).bind("scroll", function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll > 900) {
				jQuery("button.scroltop").fadeIn(1000);
			} else {
				jQuery("button.scroltop").fadeOut(1000);
			}
		});
	}

	// > Main menu sticky on top  when scroll down function by = custom.js ========== //		
	function sticky_header(){
			if(jQuery('.sticky-header').length){
				var sticky = new Waypoint.Sticky({
				  element: jQuery('.sticky-header')
				})
			}
		}
			
	// > Sidebar sticky  when scroll down function by = custom.js ========== //		
	function sticky_sidebar(){		
		$('.leftSidebar, .contentSticy, .rightSidebar')
			.theiaStickySidebar({
				additionalMarginTop: 30
			});		
	}

/*--------------------------------------------------------------------------------------------
    Window on scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
    function color_fill_header() {
        var scroll = jQuery(window).scrollTop();
        if(scroll >= 100) {
            jQuery(".is-fixed").addClass("color-fill");
        } else {
            jQuery(".is-fixed").removeClass("color-fill");
        }
    };	
	
/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

	jQuery(document).ready(function() {
		
	// Submenu_toogle_nav function by = custom.js	
		 Submenu_toogle_nav(),

	// Blog Slider Carousel no margin function by = owl.carousel.js
		 blog_image_slider(),			 
		 
	// Video responsive function
		 video_responsive(),

	// page scroll top on click function custom
		 btn_scroltop(),
		 
	// Main menu fixed on top  when scroll down function custom
		 sticky_header(),
		 
	// > Sidebar sticky  when scroll down function by = custom.js ========== //		
		sticky_sidebar()		 

	}); 
	

/*--------------------------------------------------------------------------------------------
	Window Load START
---------------------------------------------------------------------------------------------*/
	jQuery(window).on('load', function () {

	});	

 /*===========================
	Window Scroll ALL FUNCTION START
===========================*/

	jQuery(window).on('scroll', function () {
		
		color_fill_header()
		
	});

 /*===========================
	Window Resize ALL FUNCTION START
===========================*/
	jQuery(window).on('resize', function () {

	});	
	
})(window.jQuery);	

