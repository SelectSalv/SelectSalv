$(document).ready(function() {

    var idPartido;
    var nomPartido;

    $(document).on("click", ".cuadro-boleta", function() {
        idPartido = $(this).attr("voto");
        nomPartido = $('.nombre-partido', this).html();
        nomPartido = nomPartido.trim()

        $('.cuadro-boleta').each(function() {
        	$(this).removeClass('seleccionado');
        });

        $(this).addClass('seleccionado');
        
        $('#btnVotar').removeAttr('disabled');
        $('#btnVotar').addClass('btn-raised');
    });

    $(document).on("click", '#btnVotar', function() {

        $('#modal-body-votar').html("¿Está seguro de votar por el partido " + nomPartido + "?");

        $("#modalVotar").modal({
            backdrop: "static",
            keyboard: false
        });

    });

    $(document).on("click", '#btnVotoNulo', function() {
        $("#modalVotoNulo").modal({
            backdrop: "static",
            keyboard: false
        });

        idPartido = 1;
    });


});