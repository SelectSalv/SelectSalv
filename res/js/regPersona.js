$(document).ready(function() {
	$('#btnPersonaFrm').click(function() {
		modalRegPersona();
	});
	$('.btnPersona').click(function(){
		Datos();
	});

});


function Datos()
{
	var datos = $('#frmPersona').serialize();

		$.ajax({
			type: 'POST',
			data: datos,
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
}

function modalRegPersona()
{
	var datos = $('#frmPersona').serializeArray
	var val = validar();

	if(val == 0)
	{

		$.each(datos, function(i, campo){  
			var nombreCampo = '';

			switch(campo.name)
			{
				case 'dui': 
					nombreCampo = 'DUI';
					break;
				case 'nomPersona': 
					nombreCampo = 'Nombres';
					break;
				case 'apellidosPersona':
					nombreCampo = 'Apellidos';
					break;
				case 'fechaNacimiento': 
					nombreCampo = 'Fecha de Nacimiento';
					break;
				case 'fechaVencimiento':
					nombreCampo = 'Fecha de Vencimiento';
					break;
				case 'profesion':
					nombreCampo = 'Profesión';
					break;
				case 'municipio':
					nombreCampo = 'Municipio';
					break;
				case 'direccion':
					nombreCampo = 'Dirección';
					break;
			}

			$(".modal-body").append( "<b>"+ nombreCampo + ":</b> " + campo.value + "<br>");  
		}); 
	}
	else{
		$('.modal-body').html(`Campos Vacios papu >:v`);
	}


}

function validar()
{
	var num = 0;
	$('.requerido').each(function (){
		var valor = $(this).val();

		if(valor == ""){
			num++;	
		}

	});
	return num;
}