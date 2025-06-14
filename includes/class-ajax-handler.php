<?php
/**
 * Maneja las peticiones AJAX del plugin.
 *
 * @package PluginJuniorTest
 */

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Plugin_Junior_Test_Ajax_Handler' ) ) {

    class Plugin_Junior_Test_Ajax_Handler {

        public function __construct() {
            // Hook para manejar la acción AJAX de usuarios logueados
            add_action( 'wp_ajax_submit_contact_form', array( $this, 'handle_contact_form_submission' ) );
            // Hook para manejar la acción AJAX de usuarios no logueados
            add_action( 'wp_ajax_nopriv_submit_contact_form', array( $this, 'handle_contact_form_submission' ) );
        }

        /**
         * Maneja el envío del formulario de contacto a través de AJAX.
         */
        public function handle_contact_form_submission() {
            // 1. Verificar el Nonce de seguridad
            if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'plugin_junior_test_form_nonce' ) ) {
                wp_send_json_error( 'Error de seguridad: Nonce inválido.' );
            }

            // 2. Validar y sanear los datos
            $name    = isset( $_POST['contact_name'] ) ? sanitize_text_field( $_POST['contact_name'] ) : '';
            $email   = isset( $_POST['contact_email'] ) ? sanitize_email( $_POST['contact_email'] ) : '';
            $message = isset( $_POST['contact_message'] ) ? sanitize_textarea_field( $_POST['contact_message'] ) : '';

            if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
                wp_send_json_error( 'Todos los campos son obligatorios.' );
            }

            if ( ! is_email( $email ) ) {
                wp_send_json_error( 'Por favor, introduce un email válido.' );
            }

            // 3. Guardar los datos como un nuevo CPT 'contact_message'
            $post_title = sprintf( 'Mensaje de %s (%s)', $name, $email );
            $post_content = $message;

            $new_post_args = array(
                'post_title'   => $post_title,
                'post_content' => $post_content,
                'post_status'  => 'publish', 
                'post_type'    => 'contact_message', // Nuestro CPT para mensajes
            );

            $post_id = wp_insert_post( $new_post_args );

            if ( is_wp_error( $post_id ) ) {
                wp_send_json_error( 'Error al guardar el mensaje: ' . $post_id->get_error_message() );
            } else if ( $post_id === 0 ) {
                wp_send_json_error( 'No se pudo guardar el mensaje.' );
            } else {
                
                update_post_meta( $post_id, '_contact_email', $email );

                // 4. Enviar respuesta JSON al cliente
                wp_send_json_success( '¡Gracias! Tu mensaje ha sido enviado correctamente.' );
            }

            // Asegurarse de salir correctamente
            wp_die();
        }
    }
}