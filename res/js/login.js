$(document).ready(function() {
	$('#btnLogin').click(function() {
		var datos = $('#frmLogin').serialize();
		$.ajax({
			type: 'POST',
			data: datos,
			url: '../proc/procLogin.php',
			success: function(r){
				switch(r)
				{
					case '1':
                        $('#title-login').html('Datos Correctos');
                        $('#c-ins-login').addClass('bg-success');
                        $('#c-ins-login').removeClass('bg-info');
                        $('#input-user').addClass("alv-valido");
                        $('#label-user').css("color", "rgba(76, 175, 80, 1)");
                        $('#input-pass').addClass("alv-valido");
                        $('#label-pass').css("color", "rgba(76, 175, 80, 1)");
                        setTimeout(function() {
	                        location.href = "dashboard.php";
                        }, 1000);

                        break;
                    case '2':
                        $('#title-login').html('Datos Incorrectos');
                        $('#c-ins-login').addClass('bg-danger');
                        $('#pass').val("");
                        setTimeout(function() {
                            $('#title-login').html('Ingresar');
                            $('#c-ins-login').removeClass('bg-danger');
                        }, 1500);
                        $('#input-user').addClass("alv-invalido");
                        $('#label-user').css("color", "rgba(244, 67, 54, 1)");
                        $('#input-pass').addClass("alv-invalido");
                        $('#label-pass').css("color", "rgba(244, 67, 54, 1)");
                        break;
                    case '3':
                        $('#title-login').html('Campos Vacíos');
                        $('#c-ins-login').addClass('bg-danger');
                        setTimeout(function() {
                            $('#title-login').html('Ingresar');
                            $('#c-ins-login').removeClass('bg-danger');
                        }, 1500);
                        break;

                    default:
                        alert(r);
                        alert('error :\'v');
                        break;
				}
			}
		});
	});
});