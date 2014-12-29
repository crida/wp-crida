/*
=====================================================
		
		FlexSlider.js 
	
=====================================================
*/	

jQuery(document).ready(function($) { // Wrap all scripts in this

$(window).load(function() {
    $('.testimonials-slider').flexslider({
			animationLoop: false,
    		slideshow: false,
			animation: "slide",
		 	directionNav: false,
		 	smoothHeight: true,
	 	});
  });

/* Client logo carousel */
$(window).load(function() {
    $('.logo-carousel').flexslider({
			animationLoop: true,
    		animation: "slide",
		 	slideshowSpeed: 4000,  
			itemWidth: 210,
    		itemMargin: 5
	 	});
  });

}); // end Wrap all scripts in this
