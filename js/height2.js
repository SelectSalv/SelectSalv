$(document).ready(function(){
	var altura = $('.hero-2').offset().top;
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.btn-header').css('display', 'block');
		}
		else{
			$('.btn-header').css('display', 'none');
		}
	});	
});