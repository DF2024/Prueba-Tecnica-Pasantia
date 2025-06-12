jQuery(document).ready(function($) {
    console.log('¡El script principal del plugin ha cargado correctamente!');

    // Ejemplo de funcionalidad JS: alert al hacer clic en un botón (puedes adaptarlo)
    // Por ejemplo, si tienes un botón con la clase 'my-js-button' en tu HTML
    $('.read-more-button').on('click', function(e) {
        // e.preventDefault(); // Si quieres prevenir el comportamiento por defecto del enlace
        console.log('Botón "Ver más" clicado para el proyecto: ' + $(this).siblings('.project-title').text());
        // Puedes añadir aquí una animación, un modal, etc.
    });

    // Otro ejemplo: un efecto simple al pasar el ratón por encima de los proyectos
    $('.project-item').hover(
        function() {
            $(this).css('transform', 'scale(1.02)');
            $(this).css('box-shadow', '0 4px 8px rgba(0,0,0,0.2)');
            $(this).css('transition', 'all 0.3s ease');
        },
        function() {
            $(this).css('transform', 'scale(1)');
            $(this).css('box-shadow', '0 2px 4px rgba(0,0,0,0.1)');
        }
    );
});

// ... (Tu código JavaScript existente para proyectos) ...

// Manejo del formulario de contacto con Ajax <-- AÑADE ESTO AL FINAL DEL ARCHIVO
$('#contact-form').on('submit', function(e) {
    e.preventDefault(); // Evita el envío tradicional del formulario (recarga de página)

    var form = $(this);
    var submitButton = $('#contact-submit');
    var messageDiv = $('#contact-form-message');

    // Deshabilitar botón y mostrar mensaje de carga
    submitButton.prop('disabled', true).text('Enviando...');
    messageDiv.removeClass('success error').text('Enviando mensaje...');

    // Recolectar datos del formulario
    var formData = {
        action: 'submit_contact_form', // La acción que WordPress buscará en PHP
        nonce: pluginJuniorTestAjax.nonce, // El nonce de seguridad
        contact_name: $('#contact-name').val(),
        contact_email: $('#contact-email').val(),
        contact_message: $('#contact-message').val()
    };

    // Petición AJAX
    $.ajax({
        url: pluginJuniorTestAjax.ajaxurl, // La URL de admin-ajax.php
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.success) {
                messageDiv.addClass('success').text(response.data); // Muestra el mensaje de éxito
                form[0].reset(); // Limpia el formulario
            } else {
                messageDiv.addClass('error').text(response.data); // Muestra el mensaje de error
            }
        },
        error: function(xhr, status, error) {
            messageDiv.addClass('error').text('Ocurrió un error al enviar el mensaje.');
            console.error('AJAX Error:', status, error, xhr);
        },
        complete: function() {
            submitButton.prop('disabled', false).text('Enviar Mensaje'); // Habilitar botón de nuevo
        }
    });
});