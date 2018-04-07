$(document).ready(function() {
	$('#btnPersona').click(function() {
		var datos = $('#frmPersona').serialize();

		$.ajax({
			type: 'POST',
			data: datos;
			url: '../proc/procRegPersona.php',
			success: function(r)
			{
				switch(r)
				{
					case '1':
						alert('simon');
						break;

					case '0':
						alert('nel prro');
						break;
				}
			}
		});
	});
});