$(document).ready(function() {
	$('#btnPersonaFrm').click(function() {
		modalRegPersona();
	});

	$('#dui').change(function()
	{
		var dui = $('#dui').val().toString();
		compDui(dui);
	});

	$('.btnPersona').click(function(){
		Datos();
	});

});

function compDui(ndui)
{

	if((ndui.length > 0) && (ndui.length < 10))
	{
		$('#ayudaDui').html('');
		$('#mensajeDui').html('El N° de DUI debe tener 10 caracteres');
		$('#dui').addClass('is-invalid');
	}
	else if(ndui.length == 0)
	{
		$('#ayudaDui').html('');
		$('#mensajeDui').html('Introduzca un N° de DUI');
		$('#dui').addClass('is-invalid');
	}
	else{
		$.ajax({
			type: 'POST',
			data: 'dui='+ndui+'&tipo=compDui',
			url: '../proc/procRegPersona.php',
			success: function(r)
			{
				switch(r)
				{
					case 'usuario registrado':
						$('#ayudaDui').html('');
						$('#mensajeDui').html('Ya se registró este N° de DUI');
						$('#dui').addClass('is-invalid');
						break;

					case 'disponible':
						$('#ayudaDui').html('El guión será agregado automáticamente');
						$('#mensajeDui').html('');
						$('#dui').removeClass('is-invalid');
						break;
				}
			}
		});

		
	}
}


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
						$('#modalFrmPersona').hide();
						$('#modal-title-sec').html(``);
						$('#modal-body-sec').html(`Persona Registrada Exitosamente`);
						$('.btnPersona').hide();
						$('#btnCancelar').html('Aceptar');
						$('#btnCancelar').addClass('btn-success');
						$('#btnCancelar').click(function(){
							location.reload();
						});			
						break;

					case 'error al registrar':
						$('#modalFrmPersona').hide();
						$('#modal-title-sec').html(``);
						$('#modal-body-sec').html(`Ocurrió un error al registrar`);
						$('.btnPersona').hide();
						$('#btnCancelar').html('Aceptar');
						$('#btnCancelar').addClass('btn-danger');
						break;

					case 'dui registrado':
						$('#modalFrmPersona').hide();
						$('#modal-title-sec').html(``);
						$('#modal-body-sec').html(`Ya existe una persona registrada con este N° de DUI`);
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
		$("#modal-body-sec").html("");

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
			$('#modalFrmPersona').hide();
			$('#modal-title-sec').html(`Registrar Persona`);
			$('.btnPersona').show();
			$('#btnCancelar').html('Cancelar');
			$('#btnCancelar').removeClass('btn-danger');
			$("#modal-body-sec").append( "<b>"+ nombreCampo + ":</b> " + campo.value + "<br>");  
		}); 
	}
	else{
		$('#modalFrmPersona').hide();
		$('#modal-title-sec').html(``);
		$('#modal-body-sec').html(`Complete todos los campos`);
		$('.btnPersona').hide();
		$('#btnCancelar').html('Aceptar');
		$('#btnCancelar').addClass('btn-danger');
		$('#btnCancelar').click(function(){
			$('#modalFrmPersona').show();
		});
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