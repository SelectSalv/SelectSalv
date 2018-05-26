$(document).ready(function(){
	$('#flecha-atras-boleta').click(function(){
		location.href = "?1=Sistema&2=index";
	});

	$('#flecha-atras-votar').click(function(){
		location.href = "?1=Sistema&2=index";
	});

	$('#flecha-atras').click(function() {
		window.history.back();
	});
});