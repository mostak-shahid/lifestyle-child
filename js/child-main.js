jQuery(document).ready(function($) {
	$('#main-header .menu-item-home a').html('<i class="fa fa-home"></i>');
	$('#testimonials').owlCarousel({
	    loop:true,
	    nav:true,
	    dots:false,
	    items:1
	})
	$('#testimonials.owl-theme .owl-nav .owl-prev').html('<i class="fa fa-angle-left"></i>');
	$('#testimonials.owl-theme .owl-nav .owl-next').html('<i class="fa fa-angle-right"></i>');
});