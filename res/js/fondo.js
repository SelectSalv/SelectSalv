$(document).ready(function(){

	$(window).scroll(function(){
	var barra = $(window).scrollTop();
	var posicion = barra * 0.07;	

	$('body').css({
		'background-position': '0 -' + posicion +'px'
	})
    $('.parallax').css({
        'background-position': '0 -' + posicion +'px'
    });    
	});
});