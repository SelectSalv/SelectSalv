$(document).ready(function() {



    if ($('#tableUsuarios').length) {
        var tablaUsuarios = $('#tableUsuarios').DataTable({
            "ajax": {
                "url": "index.php?1=Usuario&2=getJSON",
                "type": "POST"
            },
            "columns": [{
                    "data": "idUsuario"
                },
                {
                    "data": "Nombre de Usuario"
                },
                {
                    "data": "Permisos"
                },
                {
                    "data": "Acciones"
                }
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
        tablaUsuarios.column(0).visible(false);
        setTimeout(function() {
            $('tr td:last-child').addClass('text-right');
            // $('tr td:last-child').addClass('text-center');
        }, 800);
        $(document).on('click', '.page-link', function() {
            $('tr td:last-child').addClass('text-right');
        });

    }

    if ($('#tableTransacciones').length) {
        var tablaTransacciones = $('#tableTransacciones').DataTable({
            "ajax": {
                "url": "index.php?1=Usuario&2=getTransacciones",
                "type": "POST"
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "Nombre de Usuario"
                },
                {
                    "data": "Permisos del Usuario"
                },
                {
                    "data": "Tipo de Transaccion"
                },
                {
                    "data": "Fecha"
                },
                {
                    "data": "Hora"
                },
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
        tablaTransacciones.column(0).visible(false);
    }

    // ACTIVAR MODAL DE REGISTRO
    $('#btnNuevoUsuario').click(function() {
        $("#modalRegistrar").modal({
            backdrop: "static",
            keyboard: false
        });
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
                data: {
                    datos: datos
                },
                url: '?1=Usuario&2=registrar',
                success: function(datos) {
                    if (datos.estado) {
                        swal({
                            title: "Éxito!",
                            text: "Usuario Registrado",
                            timer: 1500,
                            type: 'success',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        });
                        $('#modalRegistrar').modal('hide');
                        tablaUsuarios.ajax.reload();
                        vaciarRegistrar();
                        setTimeout(function() {
                            $('tr td:last-child').addClass('text-right');
                            // $('tr td:last-child').addClass('text-center');
                        }, 800);
                    }
                }
            });
        } else {
            swal({
                            title: "Error",
                            text: "Complete todos los Campos",
                            timer: 1500,
                            type: 'warning',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        });
        }

    });

    // Funcion para eliminar Usuario
    $(document).on('click', '.btnEliminar', function() {
        $("#modalEliminar").modal({
            backdrop: "static",
            keyboard: false
        });

        var idUsuario = $(this).attr("id");

        $('#btnEliminar').click(function() {

            $.ajax({
                type: 'POST',
                data: { idUsuario: idUsuario },
                url: '?1=Usuario&2=eliminarUsuario',
                success: function(data) {
                    switch (data) {
                        case 'eliminado':
                            swal({
                                title: "Éxito!",
                                text: "Usuario eliminado exitósamente",
                                timer: 1500,
                                type: 'success',
                                closeOnConfirm: true,
                                closeOnCancel: true
                            });
                            tablaUsuarios.ajax.reload();
                            setTimeout(function() {
                                $('tr td:last-child').addClass('text-right');
                                // $('tr td:last-child').addClass('text-center');
                            }, 800);
                            break;

                        default:
                            alert(data);
                            break;
                    }
                }
            });

        });

    });

    // Funcion para mostrar datos a editar de Usuario
    $(document).on('click', '.btnModificar', function() {
        $("#modalEditar").modal({
            backdrop: "static",
            keyboard: false
        });

        var idUsuario = $(this).attr("id");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: { idUsuario: idUsuario },
            url: '?1=Usuario&2=getUsuario',
            success: function(data) {
                $('#idUsuarioEditar').val(idUsuario);

                $('#nomUsuarioEditar').val(data.nomUsuarioEditar);
                $('#nomUsuarioEditar').parent().addClass('is-filled');

                $('#rolUsuarioEditar').val(data.codRolEditar);
            }
        });
    });

    $('#nomUsuario').change(function() {
        var nombre = $(this).val();

        $.ajax({
            type: 'POST',
            data: { nombre: nombre },
            url: '?1=Usuario&2=compNomUsuario',
            success: function(data) {
                switch (data) {
                    case 'Usuario Disponible':
                        $('#mensajeUsuario').html('');
                        $('#nomUsuario').css("background-image", "linear-gradient(to top, rgba(33, 150, 243, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                        $('#labelUsuario').css("color", "rgba(33, 150, 243, 1)");
                        $('#nomUsuario').removeClass('is-invalid');
                        $('#btnRegistrar').removeAttr('disabled');
                        break;
                    case 'Usuario no Disponible':
                        $('#mensajeUsuario').html('Nombre de Usuario no disponible');
                        $('#nomUsuario').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                        $('#labelUsuario').css("color", "rgba(244, 67, 54, 1)");
                        $('#nomUsuario').addClass('is-invalid');
                        $('#btnRegistrar').attr('disabled', 'true');
                        break;

                    default:
                        alert(data);
                        break;
                }
            }
        });
    });

    $('#btnCancelarRegistrar').click(function() {
        vaciarRegistrar();
    });
    $('#btnCancelarEditar').click(function() {
        vaciarEditar();
    });


    $('#nomUsuarioEditar').change(function() {
        var nombre = $(this).val();

        $.ajax({
            type: 'POST',
            data: { nombre: nombre },
            url: '?1=Usuario&2=compNomUsuario',
            success: function(data) {
                switch (data) {
                    case 'Usuario Disponible':
                        $('#mensajeUsuarioEditar').html('');
                        $('#nomUsuarioEditar').css("background-image", "linear-gradient(to top, rgba(33, 150, 243, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                        $('#labelUsuarioEditar').css("color", "rgba(33, 150, 243, 1)");
                        $('#nomUsuarioEditar').removeClass('is-invalid');
                        $('#btnEditar').removeAttr('disabled');
                        break;
                    case 'Usuario no Disponible':
                        $('#mensajeUsuarioEditar').html('Nombre de Usuario no disponible');
                        $('#nomUsuarioEditar').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                        $('#labelUsuarioEditar').css("color", "rgba(244, 67, 54, 1)");
                        $('#nomUsuarioEditar').addClass('is-invalid');
                        $('#btnEditar').attr('disabled', 'true');
                        break;

                    default:
                        alert(data);
                        break;
                }
            }
        });
    });



    // Funcion para comprobar contraseña antigua del usuario 
    $('#passAntiguaEditar').change(function() {
        var contra = $(this).val();
        var id = $('#idUsuarioEditar').val();

        $.ajax({
            type: 'POST',
            data: { id: id, contra: contra },
            url: '?1=Usuario&2=compContra',
            success: function(data) {
                switch (data) {
                    case 'Contra Incorrecta':

                        $('#mensajeContra').html('Contraseña Incorrecta');
                        $('#passAntiguaEditar').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                        $('#labelContra').css("color", "rgba(244, 67, 54, 1)");
                        $('#passAntiguaEditar').addClass('is-invalid');
                        $('#btnEditar').attr('disabled', 'disabled');
                        break;
                    case 'Contra Correcta':

                        $('#mensajeContra').html('');
                        $('#passAntiguaEditar').css("background-image", "linear-gradient(to top, rgba(33, 150, 243, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                        $('#labelContra').css("color", "rgba(33, 150, 243, 1)");
                        $('#passAntiguaEditar').removeClass('is-invalid');
                        $('#btnEditar').removeAttr('disabled');
                        break;
                    default:
                        alert(data);
                        break;
                }
            }
        });
    });

    // Funcion para editar datos de Usuario
    $('#btnEditar').click(function() {

        var datos = JSON.stringify($('#frmEditar :input').serializeArray());
        var val = validar('.requeridoEditar');

        if(val == 0)
        {
            $.ajax({
            type: 'POST',
            data: { datos: datos },
            url: '?1=Usuario&2=editarUsuario',
            success: function(data) {
                switch (data) {
                    case 'Cambios Guardados':
                        swal({
                            title: "Éxito!",
                            text: "Los cambios fueron Guardados",
                            timer: 1500,
                            type: 'success',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        });
                        tablaUsuarios.ajax.reload();
                        $('#modalEditar').modal('hide');
                        vaciarEditar();
                        setTimeout(function() {
                            $('tr td:last-child').addClass('text-right');
                            // $('tr td:last-child').addClass('text-center');
                        }, 800);
                        break;
                    case 'Contra Incorrecta':
                         swal({
                            title: "Error",
                            text: "Complete los Campos",
                            timer: 1500,
                            type: 'warning',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        });
                        break;
                    default:
                        alert(data);
                        break;
                }
            }
        });
        }
        else
        {
            swal({
                            title: "Error",
                            text: "Complete los Campos",
                            timer: 1500,
                            type: 'warning',
                            closeOnConfirm: true,
                            closeOnCancel: true
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
        data: {
            datos: datos
        },
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
                        location.href = "?1=Usuario&2=buildDashboard";
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

// Funcion para comprobar disponibilidad de nombre de usuario

function vaciarEditar() {
    $('#nomUsuarioEditar').val("");
    $('#passAntiguaEditar').val("");
    $('#rolUsuario').val("lcqe0p8=");
}

function vaciarRegistrar() {
    $('#nomUsuario').val("");
    $('#passUsuario').val("");
    $('#rolUsuario').val("lcqe0p8=");
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