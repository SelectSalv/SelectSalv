$(document).ready(function() {

    var idPartido;
    var nomPartido;

    $(document).on("click", ".cuadro-boleta", function() {
        idPartido = $(this).attr("voto");
        nomPartido = $('.nombre-partido', this).html();
        nomPartido = nomPartido.trim();

        $('.cuadro-boleta').each(function() {
            $(this).removeClass('seleccionado');
        });

        $(this).addClass('seleccionado');

        $('#btnVotar').removeAttr('disabled');
        $('#btnVotar').addClass('btn-raised');
        $('#btnVotar').css('animation', 'pulso .7s alternate infinite');
    });

    $(document).on("click", '#btnVotar', function() {

        $('#modal-body-votar').html("¿Está seguro de votar por el partido " + nomPartido + "?");

        $('#btnVotar').css('animation', '');

        $("#modalVotar").modal({
            backdrop: "static",
            keyboard: false
        });

    });

    $(document).on("click", '#btnVotoNulo', function() {

        $('#btnVotar').css('animation', '');

        $("#modalVotoNulo").modal({
            backdrop: "static",
            keyboard: false
        });

        idPartido = 1;
    });

    $(document).on("click", '#btnModalVotar', function() {
        votar();
    });

    $(document).on("click", '#btnNulo', function() {
        votar();
    });

    function votar() {

        $.ajax({
            type: 'POST',
            data: { idPartido: idPartido },
            url: '?1=Persona&2=votar',
            success: function(data) {
                switch (data) {
                    case 'excelente':
                        swal({
                            title: "Éxito!",
                            text: "Su voto fue efecutado exitosamente",
                            timer: 1500,
                            type: 'success',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        });
                        setTimeout(function() {
                            location.href = 'app/plugs/logout.php';
                        }, 1600);
                        break;
                }
            }
        });
    }

});