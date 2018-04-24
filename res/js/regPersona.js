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
					case 'registrado':
						$('.modal-title').html(``);
						$('.modal-body').html(`Persona Registrada Exitosamente`);
						$('.btnPersona').hide();
						$('#btnCancelar').html('Aceptar');
						$('#btnCancelar').addClass('btn-success');
						$('#btnCancelar').click(function(){
							location.reload();
						});			
						break;

					case 'error al registrar':
						$('.modal-title').html(``);
						$('.modal-body').html(`Ocurrió un error al registrar`);
						$('.btnPersona').hide();
						$('#btnCancelar').html('Aceptar');
						$('#btnCancelar').addClass('btn-danger');
						break;

					case 'dui registrado':
						$('.modal-title').html(``);
						$('.modal-body').html(`Ya existe una persona registrada con este N° de DUI`);
						$('.btnPersona').hide();
						$('#btnCancelar').html('Aceptar');
						$('#btnCancelar').addClass('btn-danger');
						break;

					default: 
						alert(r);
						break;
				}
			}
		});
}

function modalRegPersona()
{
	var datos = $('#frmPersona').serializeArray();
	var val = validar();

	if(val == 0)
	{
		$(".modal-body").html("");

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
				case 'generoPersona':
					nombreCampo = 'Género';
					break;
				case 'estadoCivil':
					nombreCampo = 'Estado Civil';
					break;
			}
			$('.modal-title').html(`Registrar Persona`);
			$('.btnPersona').show();
			$('#btnCancelar').html('Cancelar');
			$('#btnCancelar').removeClass('btn-danger');
			$(".modal-body").append( "<b>"+ nombreCampo + ":</b> " + campo.value + "<br>");  
		}); 
	}
	else{
		$('.modal-title').html(``);
		$('.modal-body').html(`Complete todos los campos`);
		$('.btnPersona').hide();
		$('#btnCancelar').html('Aceptar');
		$('#btnCancelar').addClass('btn-danger');
	}

}

function validar()
{
	var num = 0;
	$('.requerido').each(function (){
		var valor = $(this).val();

		if((valor == "") || (valor == "-")){
			num++;	
		}

	});
	return num;
}