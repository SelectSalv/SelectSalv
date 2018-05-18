$(document).ready(function() {

   

    if ($('#tableUsuarios').length) {
        var tabla = $('#tableUsuarios').DataTable({
            "ajax": {
                "url": "index.php?1=Usuario&2=getJSON",
                "type": "POST"
            },
            "columns": [
                { "data": "idUsuario" },
                { "data": "Nombre de Usuario" },
                { "data": "Permisos" },
                { "data": "Acciones" }
            ],
            "order": [
                [0, "desc"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        }); // Termina configuración de dataTable


        // Ocultar columna de id de Usuario
        tabla.column(0).visible(false);
        setTimeout(function() {
            $('tr td:last-child').addClass('text-right');
            // $('tr td:last-child').addClass('text-center');
        }, 800);
        $(document).on('click', '.page-link', function() {
            $('tr td:last-child').addClass('text-right');
        });

    }

    // ACTIVAR MODAL DE REGISTRO
    $('#btnNuevoUsuario').click(function() {
        $("#modalRegistrar").modal({ backdrop: "static", keyboard: false });
    });

    // CONFIRMAR DATOS DE USUARIO
    $('#btnRegistrar').click(function() {

        var datos = $('#frmRegistrar').serializeArray();

        var val = validar('.requeridoRegistrar');
        if (val == 0) {
            var datos = JSON.stringify($('#frmRegistrar').serializeArray());

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: { datos: datos },
                url: '?1=Usuario&2=registrar',
                success: function(datos) {
                    if (datos.estado) {
                        location.reload();
                    }
                }
            });
        }
        else{
            $('#modal-body-datos').html(`Complete todos los campos`);
            $('#btnDatos').hide();
            $('#btnCancelarDatos').html('Aceptar');
            $('#btnCancelarDatos').addClass('btn-danger');
            $('#btnCancelarDatos').addClass('waves-red')
            $("#modalDatos").modal({ backdrop: "static", keyboard: false });;
            $('#modalRegistrar').modal('hide');
            $('#btnCancelarDatos').click(function() {
                $('#modalRegistrar').modal('show');
            });
        }
       
    });

    $('#btnLogin').click(function() {
        Login();
    });
    $('body').keyup(function(e) {
        if (e.keyCode == 13) {
            Login();
        }
    });
});

function Login() {
    var datos = JSON.stringify($('#frmLogin :input').serializeArray());

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: { datos: datos },
        url: '?1=Usuario&2=login',
        success: function(r) {

            var resultado = r.resultado;

            switch (resultado) {
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

function validar(parametro) {
    var num = 0;
    $(parametro).each(function() {
        var valor = $(this).val();

        if ((valor == "") || (valor == "-")) {
            num++;
        }

    });
    return num;
}