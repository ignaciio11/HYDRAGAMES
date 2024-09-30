
$(document).ready(function() {
    // Función para cargar el contenido de la página a través de AJAX
    function cargarContenidoEnlace(url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                // Actualizar el contenido del cuerpo con la respuesta del servidor
                $('html').html(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error("Error al cargar el contenido del enlace:", error);
            }
        });
    }

    // Manejar clics en los enlaces del cuerpo
    $('html').on('click', '.ayax', function(e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        var url = $(this).attr('href'); // Obtener la URL del enlace
        cargarContenidoEnlace(url); // Cargar el contenido del enlace a través de AJAX
    });
});
