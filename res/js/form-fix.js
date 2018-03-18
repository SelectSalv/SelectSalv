/*JorgeSidgoPimentel*/
$(document).ready(function() {
	$('.form-control').focus(function(event) {
			$(this).parent().addClass('is-focused');
	});
	$('.form-control').focusout(function(event) {
		if($(this).val() == "")
		{
			$(this).parent().removeClass('is-focused');
		} else{
			$(this).parent().removeClass('is-focused');
			$(this).parent().addClass('is-filled');
		}
	});
});