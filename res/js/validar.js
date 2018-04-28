$(document).ready(function() {
	$('.numero').on('input', function() {
		var input = $(this).val();

		if(isNaN(input))
		{
			$(this).val("");
		}
	})
});