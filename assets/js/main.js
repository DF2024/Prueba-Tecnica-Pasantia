jQuery(document).ready(function($) {
    
    // Manejar el envío del formulario de contacto
    $('#contact-form').on('submit', function(e) {
        
        // 1. Prevenir el envío normal del formulario
        e.preventDefault();

        // Referencias al formulario, botón y contenedor de mensajes
        var form = $(this);
        var submitButton = form.find('#contact-submit');
        var messagesDiv = $('#form-messages');
        
        // 2. Serializar los datos del formulario (recoge todos los inputs)
        var formData = form.serialize();

        // 3. Realizar la petición AJAX
        $.ajax({
            url: pluginJuniorTestAjax.ajaxurl, // La URL que pasamos desde PHP
            type: 'POST',
            data: formData, // Los datos del formulario (incluye 'action' y 'nonce')
            
            // Acción antes de enviar: deshabilitar botón y mostrar carga
            beforeSend: function() {
                submitButton.prop('disabled', true).text('Enviando...');
                messagesDiv.hide().text('');
            },

            // 4. Función en caso de éxito
            success: function(response) {
                if (response.success) {
                    // Si el servidor dice que todo fue bien
                    messagesDiv.css('color', 'green').text(response.data).show();
                    form[0].reset(); // Limpiar el formulario
                } else {
                    // Si el servidor reporta un error
                    messagesDiv.css('color', 'red').text(response.data).show();
                }
            },

            // 5. Función en caso de error de red o del servidor
            error: function() {
                messagesDiv.css('color', 'red').text('Ocurrió un error inesperado. Por favor, inténtalo de nuevo.').show();
            },

            // 6. Acción al completar (éxito o error)
            complete: function() {
                // Volver a habilitar el botón
                submitButton.prop('disabled', false).text('Enviar Mensaje');
            }
        });
    });

});
