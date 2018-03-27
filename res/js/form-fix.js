/*JorgeSidgoPimentel*/
$(document).ready(function() {

	if($(this).val() != "")
		{
			$(this).parent().addClass('is-filled');
		} else{
			
		}

	$('.form-control').focus(function(event) {
			$(this).parent().addClass('is-focused');
	});
	$('.form-control').focusout(function(event) {
		if($(this).val() == "")
		{
			$(this).parent().removeClass('is-focused');
			$(this).parent().removeClass('is-filled');
		} else{
			$(this).parent().removeClass('is-focused');
			$(this).parent().addClass('is-filled');
		}
	});
});