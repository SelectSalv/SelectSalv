$(document).ready(function() {
	var alturaBarra = $('.navbar').height();
	var distancia = $('.btn').offset().top;
	
	$(window).on('scroll', function() {

		if($(window).scrollTop() > (distancia - alturaBarra))
		{
			$(this).hide();
		}

	});

});