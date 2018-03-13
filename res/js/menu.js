$(document).ready(function() {
	$('#btn-menu-nav').click(function() {
		$('.menu').css('transform', 'translate(0)');
	});
	$('#btnX').click(function() {
		$('.menu').css('transform', 'translate(250px)');
	});
});