$(document).ready(function(){
	$('#flecha-atras-boleta').click(function(){
		location.href = "votar.php";
	});

	$('#flecha-atras-votar').click(function(){
		location.href = "../../index.php";
	});

	$('#flecha-atras').click(function() {
		window.history.back();
	});
});