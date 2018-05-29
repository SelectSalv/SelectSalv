$(document).ready(function() {

    //METODO PARA LLENAR SELECT DESDE BASE DE DATOS
    $.ajax({
        url: '?1=Candidato&2=getAllPartido',
        type: 'POST',
        dataType: 'json',

        success:function(data)
        {
         
         console.log(JSON.stringify(data));
            
         $.each(data,function(key, value) {
            $('.partido').append('<option value="'+key+'">'+value+'</option>');
      }); 

     
        }
    
    });


    //LLENANDO LOS SELECT DE TIPO CANDIDATO
    $.ajax({
        url: '?1=Candidato&2=getAllTipo',
        type: 'POST',
        dataType: 'json',

        success:function(data)
        {
         
         console.log(JSON.stringify(data));
            
         $.each(data,function(key, value) {
            $('.tipo').append('<option value="'+key+'">'+value+'</option>');
      }); 

     
        }
    
    });
    


    // Método para configurar DataTable de Candidato
    if($('#tableCandidato').length) {
        
          var tabla = $('#tableCandidato').DataTable({
        "ajax": {
            "url": "index.php?1=Candidato&2=getCandidatos",
            "type": "POST"
        },
        "columns": [{
                "data": "idCandidato"
            },
            {
                "data": "dui"
            },
            {
                "data": "nombre"
            },
            {
                "data": "apellido"
            },

            {
                "data": "partido"
            },
            
            {
                "data": "tipo"
            },
            {
                "data": "ruta",
                "render":function(data, type, row){
                    var data_e=data.split("/");
                    return '<center><img src="'+data_e[0]+"/"+data_e[1]+"/"+data_e[2]+"/"+data_e[3]+'" width="80"></center>';
                }
           },
            {
                "data": "acciones"
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
    }); // Termina Configuración de DataTable

    // función para ocultar columna de ids
    tabla.column(0).visible(false);

    // Función para centrar acciones de las filas
    setTimeout(function() {
        $('tr td:last-child').css('display', 'flex');
        $('tr td:last-child').css('justify-content', 'space-around');
        $('tr td:last-child').css('align-items', 'center');
        // $('tr td:last-child').addClass('text-center');
    }, 500);

    $(document).on('click', '.page-link', function() {
        $('tr td:last-child').css('display', 'flex');
        $('tr td:last-child').css('justify-content', 'space-around');
        $('tr td:last-child').css('align-items', 'center');
    });
    }


    // Método para Modal con Resumen de Datos
    $('#btnFrmRegistrar').click(function() {
        var contenedor = '#frmCandidato';
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
                    case 'nomCandidato':
                        nombreCampo = 'Nombres';
                        break;
                    case 'apellidosCandidato':
                        nombreCampo = 'Apellidos';
                        break;
                        case 'genero':
                        nombreCampo = 'Género';
                        dato = $("#genero option:selected").text();
                        break;
                    case 'estadoCivil':
                        nombreCampo = 'Estado Civil';
                        dato = $("#estadoCivil option:selected").text();
                        break;
                    case 'fechaNacimiento':
                        nombreCampo = 'Fecha de Nacimiento';
                        var fecha = new Date(dato).toString('dd/MM/yyyy');
                        dato = fecha;
                        break;
                    case 'fechaVencimiento':
                        nombreCampo = 'Fecha de Vencimiento';
                        var fecha = new Date(dato).toString('dd/MM/yyyy');
                        dato = fecha;
                        break;
                    case 'partido':
                        dato = $("#partido option:selected").text();;
                        break;
                    case 'tipoCandidato':
                        nombreCampo = 'tipoCandidato';

                        dato = $("#tipoCandidato option:selected").text();;
                        break;
                    
                    
                }

                var fila = `<tr>
                                <th scope="row">` + nombreCampo + `</th>
                                <td>` + dato + `</td>
                            </tr>`;
                $('#mensaje-modal').html(``);
                $('#tablaModalDatos').show();
                $('#modal-title-datos').html(`Registrar Candidato`);
                $('#btnDatos').show();
                $('#btnCancelarDatos').html('Cancelar');
                $('#btnCancelarDatos').removeClass('btn-danger');
                $('#btnCancelarDatos').removeClass('waves-red');

                $("#bodyTablaDatos").append(fila);

                $('#modalFrmCandidato').modal('hide');
                $("#modalDatos").modal({
                    backdrop: "static",
                    keyboard: false
                });
                $('#btnCancelarDatos').click(function() {
                    $('#modalFrmCandidato').modal('show');
                });
            });
        } else {
            $('#modal-title-datos').html(``);
            $('#tablaModalDatos').hide();
            $('#mensaje-modal').html(`Complete todos los campos`);
            $('#btnDatos').hide();
            $('#btnCancelarDatos').html('Aceptar');
            $('#btnCancelarDatos').addClass('btn-danger');
            $('#btnCancelarDatos').addClass('waves-red')
            $("#modalDatos").modal({
                backdrop: "static",
                keyboard: false
            });;
            $('#modalFrmCandidato').modal('hide');
            $('#btnCancelarDatos').click(function() {
                $('#modalFrmCandidato').modal('show');
            });
        }
    });

    // Método para Comprobar N° de DUI
    /*$('#dui').change(function() {
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
                data: {
                    ndui: ndui
                },
                url: '?1=Candidato&2=compDui',
                success: function(r) {
                    switch (r) {
                        case 'Candidato registrado':
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
    });*/

    // Método para Eliminar Candidato
    $(document).on('click', '.btnEliminar', function() {
        $("#modalEliminar").modal({
            backdrop: "static",
            keyboard: false
        });

        $('#eliminado').html('');
        var idCandidato = $(this).attr("id");

        $(document).on("click", "#btnEliminar", function() {
            $.ajax({
                type:'POST',
                data:{idCandidato:idCandidato},
                url: '?1=Candidato&2=eliminarCandidato',
                success: function(data) {

                             $('#eliminado').append('<p>"'+data+'"</p>');
                   
                        $('#modalConfirmacionEliminado').modal({
                        backdrop:"static",
                        keyboard:false
                    });

                     tabla.ajax.reload();

                   
                    
                }
            });
        });
    });

    // Método para Editar Candidato
    $('#btnFrmModificar').click(function() {
        var data= new FormData($("#frmModificar")[0])

    var url="?1=Candidato&2=editarCandidato";
    $.ajax({
        url: url,
        type: 'POST',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        data: data,
        contentType:false,
        processData: false,

        success: function(data){
           


 $('#modalFrmModificar').modal('hide');

            $('#modal-title-datos').html(``);
                        $('#modal-body-datos').html(data);
                        $('#btnDatos').hide();
                        $('#btnCancelarDatos').html('Aceptar');
                        $('#btnCancelarDatos').addClass('btn-success');
                        $('#btnCancelarDatos').click(function() {
                            $('#btnCancelarFrm').click();
                            tabla.ajax.reload();
                            $('#modalFrmModificar').modal('hide');
                        });

$("#modalDatos").modal({
            backdrop: "static",
            keyboard: false
        });




             }

        });
    });


    // Método para Registrar Candidato
    $('#btnDatos').click(function() {
        var datos= new FormData($("#frmCandidato")[0])


$('#agregado').html('');
        $.ajax({
            type: 'POST',
            data:datos,
            contentType:false,
            processData: false,
            url: '?1=Candidato&2=registrarCandidato',
            success: function(r) {
              
                     $('#agregado').append('<p>"'+r+'"</p>');
                   
                        $('#modalConfirmacionAgregado').modal({
                        backdrop:"static",
                        keyboard:false
                    });

                    $('#modalDatos').modal('hide');
                    
                
            }
        });
    });


    // Control de Modales
    $('#btnRegistrar').click(function() {
        $("#modalFrmCandidato").modal({
            backdrop: "static",
            keyboard: false
        });
    });

    $(document).on('click', '.btnDetalles', function() {
        $("#modalDetalles").modal({
            backdrop: "static",
            keyboard: false
        });
    });

    // Retornar datos de Candidato
    $(document).on('click', '.btnModificar', function() {

        $('#viewFoto').html('');
        var idCandidato = $(this).attr("id");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                idCandidato: idCandidato
            },
            url: '?1=Candidato&2=getInformation',
            success: function(data) {

                 $('#idCandidato').val(idCandidato);

                $('#duiModificar').val(data.dui);
                 
                $('#partido').val(data.idPartido);

                $('#TipoCandidato').val(data.idTipoCandidato);

                $('#viewFoto').append('<center><img src="'+data.rutaCandidato+'" height="120"></center>');

            }

        });


        //LLENANDO SELECT


        $("#modalFrmModificar").modal({
            backdrop: "static",
            keyboard: false
        });




        
    });

    


// Función para validar campos requeridos
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