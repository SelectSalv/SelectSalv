$(document).ready(function() {
	$('#btnDUI').click(function(){
		var datos = $('#frmDui').serialize();

		$.ajax({
			type: 'POST',
			data: datos,
			url: '../proc/ingresar-dui.php',
			success: function(r)
			{
				switch(r)
				{
					 case '1': 
					 	location.href = "boleta.php";
					 	break;

					 case '2':
					 	alert(r);
					 	break; 
					 default: 
					 	alert(r);
					 	break;
				}
			}
		});
	});
});