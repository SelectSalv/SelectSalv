$(document).ready(function() {

    var tabla = $('#tablePadron').DataTable({
        "ajax": {
            "url": "index.php?1=Persona&2=getJSON",
            "type": "POST"
        },
        "columns": [
            { "data": "idPersona" },
            { "data": "DUI" },
            { "data": "Apellidos" },
            { "data": "Nombres" },
            { "data": "JRV" },
            { "data": "Genero" },
            { "data": "Fecha" },
            { "data": "Municipio" },
            { "data": "Estado" },
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
    }); // Termina Configuarción de DataTable

    // función para ocultar columna de ids
    tabla.column(0).visible(false);

    // Función para centrar acciones de las filas
    setTimeout(function() {
        $('tr td:last-child').css('display', 'flex');
        $('tr td:last-child').css('justify-content', 'space-around');
        $('tr td:last-child').css('align-items', 'center');
        // $('tr td:last-child').addClass('text-center');
    }, 800);

    $(document).on('click', '.page-link', function() {
        $('tr td:last-child').css('display', 'flex');
        $('tr td:last-child').css('justify-content', 'space-around');
        $('tr td:last-child').css('align-items', 'center');
    });

    $('#btnFrmRegistrar').click(function() {
        var contenedor = '#frmPersona';
        var datos = $(contenedor).serializeArray();
        var val = validar('.requeridoRegistrar');
        if (val == 0) {
            $("#bodyTablaDatos").html("");

            $.each(datos, function(i, campo) {
                var nombreCampo = '';
                var dato = campo.value;

                switch (campo.name) {
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

                        dato = $( "#municipio option:selected" ).text();;
                        break;
                    case 'direccion':
                        nombreCampo = 'Dirección';
                        break;
                    case 'genero':
                        nombreCampo = 'Género';
                        dato = $( "#genero option:selected" ).text();
                        break;
                    case 'estadoCivil':
                        nombreCampo = 'Estado Civil';
                        dato = $( "#estadoCivil option:selected" ).text();
                        break;
                }

                var fila = `<tr>
                                <th scope="row">` + nombreCampo + `</th>
                                <td>` + dato + `</td>
                            </tr>`;

                $('#modal-title-datos').html(`Registrar Persona`);
                $('#btnDatos').show();
                $('#btnCancelarDatos').html('Cancelar');
                $('#btnCancelarDatos').removeClass('btn-danger');
                $('#btnCancelarDatos').removeClass('waves-red');

                $("#bodyTablaDatos").append(fila);

                $('#modalFrmPersona').modal('hide');
                $("#modalDatos").modal({ backdrop: "static", keyboard: false });
                $('#btnCancelarDatos').click(function() {
                    $('#modalFrmPersona').modal('show');
                });
            });
        } else {
            $('#modal-title-datos').html(``);
            $('#modal-body-datos').html(`Complete todos los campos`);
            $('#btnDatos').hide();
            $('#btnCancelarDatos').html('Aceptar');
            $('#btnCancelarDatos').addClass('btn-danger');
            $('#btnCancelarDatos').addClass('waves-red')
            $("#modalDatos").modal({ backdrop: "static", keyboard: false });;
            $('#modalFrmPersona').modal('hide');
            $('#btnCancelarDatos').click(function() {
                $('#modalFrmPersona').modal('show');
            });
        }
    });
    $('#dui').change(function() {
        var ndui = $('#dui').val().toString();

        if ((ndui.length > 0) && (ndui.length < 10)) {
            $('#ayudaDui').html('');
            $('#mensajeDui').html('El N° de DUI debe tener 10 caracteres');
            $('#dui').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
            $('#label-dui').css("color", "rgba(244, 67, 54, 1)");
            $('#dui').addClass('is-invalid');
        } else if (ndui.length == 0) {
            $('#ayudaDui').html('');
            $('#mensajeDui').html('Introduzca un N° de DUI');
            $('#dui').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
            $('#label-dui').css("color", "rgba(244, 67, 54, 1)");
            $('#dui').addClass('is-invalid');
        } else {
            $.ajax({
                type: 'POST',
                data: { ndui: ndui },
                url: '?1=Persona&2=compDui',
                success: function(r) {
                    switch (r) {
                        case 'usuario registrado':
                            $('#ayudaDui').html('');
                            $('#mensajeDui').html('Ya se registró este N° de DUI');
                            $('#dui').css("background-image", "linear-gradient(to top, rgba(244, 67, 54, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                            $('#label-dui').css("color", "rgba(244, 67, 54, 1)");
                            $('#dui').addClass('is-invalid');
                            break;

                        case 'disponible':
                            $('#ayudaDui').html('El guión será agregado automáticamente');
                            $('#mensajeDui').html('');
                            $('#dui').css("background-image", "linear-gradient(to top, rgba(33, 150, 243, 1) 2px, rgba(0, 150, 136, 0) 2px), linear-gradient(to top, rgba(0, 0, 0, 0.26) 1px, transparent 1px)");
                            $('#label-dui').css("color", "rgba(33, 150, 243, 1)");
                            $('#dui').removeClass('is-invalid');
                            break;
                    }
                }
            });


        }
    });
    $('#btnDatos').click(function() {
        var datos = JSON.stringify($('#frmPersona :input').serializeArray());

        $.ajax({
            type: 'POST',
            data: { datos: datos },
            url: '?1=Persona&2=registrarPersona',
            success: function(r) {
                switch (r) {
                    case 'registrado':
                        $('#modal-title-datos').html(``);
                        $('#modal-body-datos').html(`Persona Registrada Exitosamente`);
                        $('#btnDatos').hide();
                        $('#btnCancelarDatos').html('Aceptar');
                        $('#btnCancelarDatos').addClass('btn-success');
                        $('#btnCancelarDatos').click(function() {
                            $('#btnCancelarFrm').click();
                        });
                         $('#tablePadron');
                        break;

                    case 'error al registrar':
                        $('#modal-title-datos').html(``);
                        $('#modal-body-datos').html(`Ocurrió un error al registrar`);
                        $('#btnDatos').hide();
                        $('#btnCancelar').html('Aceptar');
                        $('#btnCancelar').addClass('btn-danger');
                        break;

                    case 'dui registrado':
                        $('#modal-title-datos').html(``);
                        $('#modal-body-sec').html(`Ya existe una persona registrada con este N° de DUI`);
                        $('#btnDatos').hide();
                        $('#btnCancelarDatos').html('Aceptar');
                        $('#btnCancelarDatos').addClass('btn-danger');
                        break;

                    default:
                        alert(r);
                        break;
                }
            }
        });
    });

    $('#btnRegistrar').click(function() {
        $("#modalFrmPersona").modal({ backdrop: "static", keyboard: false });
    });
    $(document).on('click', '.btnEliminar', function() {
        $("#modalEliminar").modal({ backdrop: "static", keyboard: false });
    });
    $(document).on('click', '.btnDetalles', function() {
        $("#modalDetalles").modal({ backdrop: "static", keyboard: false });
    });

    // Retornar datos de persona
    $(document).on('click', '.btnModificar', function() {

        var idUsuario = $(this).attr("id");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: { idUsuario: idUsuario },
            url: '?1=Persona&2=getPersona',
            success: function(data) {

                $('#duiModificar').val(data.dui);
                $('#duiModificar').parent().addClass('is-filled');

                $('#nomPersonaModificar').val(data.nomPersona);
                $('#nomPersonaModificar').parent().addClass('is-filled');

                $('#apellidosPersonaModificar').val(data.apePersona);
                $('#apellidosPersonaModificar').parent().addClass('is-filled');

                $('#generoModificar').val(data.idGenero);

                $('#estadoCivilModificar').val(data.idestadoCivil);


                $('#fechaNacimientoModificar').val(data.fechaNac);
                $('#fechaVencimientoModificar').val(data.fechaVenc);


                $('#profesionModificar').val(data.profesion);
                $('#profesionModificar').parent().addClass('is-filled');

                $('#municipioModificar').val(data.idMunicipio);

                $('#direccionModificar').val(data.direccion);
                $('#direccionModificar').parent().addClass('is-filled');

            }
        });

        $("#modalFrmModificar").modal({ backdrop: "static", keyboard: false });
    });

});


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