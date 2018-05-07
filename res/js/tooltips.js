$(document).ready(function(){
	$(function(){
        setTimeout(function() {
            // TOOLTIPS CRUD 

            // Tooltip botón detalles
            $('.btnDetalles').tooltip({
                title: "Detalles",
                delay: {
                    show: 1000,
                    hide: 100
                },
                trigger: "hover",
                placement: "top"
             });

            // Tooltip botón modificar
            $('.btnModificar').tooltip({
                title: "Modificar",
                delay: {
                    show: 1000,
                    hide: 100
                },
                trigger: "hover",
                placement: "top"
             });

            // Tooltip botón eliminar
            $('.btnEliminar').tooltip({
                title: "Eliminar",
                delay: {
                    show: 1000,
                    hide: 100
                },
                trigger: "hover",
                placement: "top"
             });
        }, 800);

        // FUNCION PARA INICIALIZAR TOOLTIPS EN TODO EL DOM
        $(document).on('click', '.page-link', function() {
            // TOOLTIPS CRUD 

            // Tooltip botón detalles
            $('.btnDetalles').tooltip({
                title: "Detalles",
                delay: {
                    show: 1000,
                    hide: 100
                },
                trigger: "hover",
                placement: "top"
             });

            // Tooltip botón modificar
            $('.btnModificar').tooltip({
                title: "Modificar",
                delay: {
                    show: 1000,
                    hide: 100
                },
                trigger: "hover",
                placement: "top"
             });

            // Tooltip botón eliminar
            $('.btnEliminar').tooltip({
                title: "Eliminar",
                delay: {
                    show: 1000,
                    hide: 100
                },
                trigger: "hover",
                placement: "top"
             });
        });
	});

    // funciones para cambiar color de tooltip botones CRUD
    $(document).on("mouseover", ".btnModificar", function() {
        setTimeout(function() {
            $('.tooltip-inner').css('background-color', 'rgba(3, 169, 244, 0.9)');
        }, 1002);
        
    });
    $(document).on("mouseover", ".btnDetalles", function() {
        setTimeout(function() {
            $('.tooltip-inner').css('background-color', 'rgba(108, 117, 125, 0.9)');
        }, 1002);
        
    });
    $(document).on("mouseover", ".btnEliminar", function() {
        setTimeout(function() {
            $('.tooltip-inner').css('background-color', 'rgba(244, 67, 54, 0.9)');
        }, 1002);
        
    });

}); // Fin document.ready
