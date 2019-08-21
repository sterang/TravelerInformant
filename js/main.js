$(window).scroll(function(){
	if($('.navbar').offset().top > 50) {
		$('.navbar-fixed-top').addClass('colapsar-nav');
	}
	else {
		$('.navbar-fixed-top').removeClass('colapsar-nav');
	}
});

$(function(){
	$('.padding-scroll a').bind('click', function(){
			var $anchar = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchar.attr('href')).offset().top
			  	},1500, 'easeInOutExpo');
	});
	
});