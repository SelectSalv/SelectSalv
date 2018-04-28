$(document).ready(function() {
	$('#btn-menu-nav').click(function() {
		$('.menu').toggleClass('show').focus();
		if($('#menu-icon').html() == "menu")
		{
			$('#menu-icon').html("close");
		}
		else if($('#menu-icon').html() == "close")
		{
			$('#menu-icon').html("menu");
		}
	});
	$('.menu').focusout(function() {
		$('.menu').removeClass('show');
	});
});