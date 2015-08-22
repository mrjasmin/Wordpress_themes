$(function() {

	$('#rssicon a').css({opacity:"0.1"});
	
	$('#rssicon a').hover(function() {
		$(this).animate({opacity:"1.0"});
	}, function() {
		$(this).animate({opacity:"0.1"});
	});
	
	
	});
	
});
