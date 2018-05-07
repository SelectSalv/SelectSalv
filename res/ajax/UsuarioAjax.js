$(document).ready(function() {
	$('#btnLogin').click(function() {
	   Login();
	});
    $('body').keyup(function(e) {
    if(e.keyCode == 13) {
       Login();
    }
    });
});

function Login()
{
        var datos = JSON.stringify($('#frmLogin :input').serializeArray());

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {datos: datos},
            url: '?1=Usuario&2=login',
            success: function(r){

                var resultado = r.resultado;

                switch(resultado)
                {
                    case 1:
                        $('#title-login').html('Datos Correctos');
                        $('#c-ins-login').addClass('bg-success');
                        $('#c-ins-login').removeClass('bg-info');
                        $('#input-user').css("background-image", "linear-gradient(to top, rgba(76, 175, 80, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.0) 1px, transparent 1px)");
                        $('#label-user').css("color", "rgba(76, 175, 80, 1)");
                        $('#input-pass').css("background-image", "linear-gradient(to top, rgba(76, 175, 80, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.0) 1px, transparent 1px)");
                        $('#label-pass').css("color", "rgba(76, 175, 80, 1)");
                        $('#input-pass').blur();

                        $('#btnLogin').addClass('btn-success');
                        $('#btnLogin').removeClass('btn-info');

                        setTimeout(function() {
                            location.href = "?1=Usuario&2=render&3=DashboardView&4=headerBarUsuario&5=1";
                        }, 1000);

                        break;
                    case 2:
                        $('#title-login').html('Datos Incorrectos');
                        $('#c-ins-login').addClass('bg-danger');
                        $('#pass').val("");

                        $('#input-user').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.0) 1px, transparent 1px)");
                        $('#label-user').css("color", "rgba(244, 67, 54, 1)");
                        $('#input-pass').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.0) 1px, transparent 1px)");
                        $('#label-pass').css("color", "rgba(244, 67, 54, 1)");
                        $('#btnLogin').addClass('btn-danger');
                        $('#btnLogin').removeClass('btn-info');
                        setTimeout(function() {
                            $('#title-login').html('Ingresar');
                            $('#c-ins-login').removeClass('bg-danger');

                             $('#btnLogin').addClass('btn-info');
                            $('#btnLogin').removeClass('btn-danger');
                        }, 1500);
                        break;
                    case 3:
                        $('#title-login').html('Campos Vacíos');
                        $('#c-ins-login').addClass('bg-danger');
                        setTimeout(function() {
                            $('#title-login').html('Ingresar');
                            $('#c-ins-login').removeClass('bg-danger');
                        }, 1500);
                        break;

                    default:
                        alert(resultado);
                        alert('error :\'v');
                        break;
                }
            }
        });
}