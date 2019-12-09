/*** Loader ***/
jQuery('.cure-loader').show();
jQuery(window).load(function(){
	jQuery('.cure-loader').hide();
});	
jQuery(document).ready(function($) {
		


	/* plaeholder add for newsletter form */
	$(".tnp-name").attr("placeholder", "Your name");
	$(".tnp-email").attr("placeholder", "Email Address");
	$(".search-field").attr("placeholder", "Search for post here ...");
	
	/* on click to redirect */
	$('.callaction-right , .quote_cell').click(function() {
		window.location.href = document.location.href+'contact-us';
		return false;
		
	});
	
	$('.contact-form input, .contact-form textarea').on('click focus', function(event){
		$(this).parent().parent().addClass('focus-color');
		event.stopPropagation();
	}); 
	/*** Testimonial slider ***/
	var slider = $("#testimonials-slider").lightSlider({
		loop:true,
		keyPress:true,
		bullets: true,
		item:1,
		auto:false,
		pauseOnHover:true,
		pause:5000,
		slideMargin:5,
		pager: true,
		currentPagerPosition:'left',
		adaptiveHeight:true,
		arrows:false,
		controls:false,
		
	});
	$('#goToPrevSlide').on('click', function () {
	    slider.goToPrevSlide();
	});
	$('#goToNextSlide').on('click', function () {
	    slider.goToNextSlide();
	});
	
	/*** home client slider ***/
		$('#clientslider').lightSlider({
					item:4,
					loop:true,
					auto:true,
					controls:false,
					pager:false,
					slideMove:2,
					easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
					speed:300,
					responsive : [
						{
							breakpoint:800,
							settings: {
								item:3,
								slideMove:1,
								slideMargin:6,
							  }
						},
						{
							breakpoint:480,
							settings: {
								item:1,
								slideMove:1
							  }
						}
					]
		});
	/*** home client slider ***/
		var historyslider = $('#historyslider').lightSlider({
			item:2,
			loop:true,
			auto:false,
			controls:true,
			slideMargin:40,
			pager:true,
			slideMove:2,
			easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
			speed:600,	
			prevHtml: '<i class="fa fa-arrow-left"></i>',
			nextHtml: '<i class="fa fa-arrow-right"></i>',
			responsive : [
						{
							breakpoint:480,
							settings: {
								item:1,
								slideMove:1
							  }
						}
			]
		});
	/*** home client slider ***/
		var categoryslider = $('#categoryslider').lightSlider({
			item:1,
			loop:true,
			auto:false,
			mode: 'slide',
			adaptiveHeight:true,
			controls:true,
			slideMargin:40,
			pager:false,
			slideMove:1,
			easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
			speed:600,
		});
		$('#goToPrevcat').on('click', function () {
			categoryslider.goToPrevSlide();
		});
		$('#goToNextcat').on('click', function () {
			categoryslider.goToNextSlide();
		});

});



