jQuery(document).ready(function($){
	var $container = $('#manson');
	// initialize
	$container.imagesLoaded( function() {
		$container.masonry({
		  columnWidth: '.item',
		  itemSelector: '.item'
		});
	});

	$('.carousel').carousel({
	  interval: slider_speed.vars
	});

	$("#search-button").click(function(){
			$(".search-bar .serch-form-coantainer").animate({
            width: 'toggle'
        });
		$( ".desktop .search-top" ).focus();
    });

	$('.flexslider .slides > li').hover(function(){
        $(this).find('.slide-desc').fadeIn(500);
    },
    function(){
        $(this).find('.slide-desc').fadeOut(500);
    });

});
