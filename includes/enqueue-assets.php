<?php
/**
 * Gestiona el encolado de scripts y estilos para el plugin y el tema.
 *
 * @package PluginJuniorTest
 */

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Plugin_Junior_Test_Assets_Manager' ) ) {

    class Plugin_Junior_Test_Assets_Manager {

        public function __construct() {
            // Hook para encolar scripts y estilos en el front-end
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_assets' ) );

            add_action( 'init', array( $this, 'registrar_mis_shortcodes' ) );
        }

        /**
         * Encola los scripts y estilos para el front-end del sitio.
         *
         * @hook wp_enqueue_scripts
         *
         * Explicación del Hook 'wp_enqueue_scripts':
         * Este--
         */

        public function registrar_mis_shortcodes() {
            add_shortcode( 'mi_formulario_junior', array( $this, 'mostrar_plantilla_formulario' ) );
        }

        public function mostrar_plantilla_formulario() {
            // Para evitar que el output se imprima directamente, usamos "output buffering".
            ob_start();

            // Aquí incluyes la ruta a tu archivo de plantilla PHP que contiene el HTML del formulario.
            // Asegúrate de que la ruta sea correcta.
            // Por ejemplo, si tu plantilla está en: tu-plugin/templates/form-template.php
            include( PLUGIN_JUNIOR_TEST_PATH . 'templates/form-template.php' );

            // Retornamos el contenido capturado.
            return ob_get_clean();
        }


        
        public function enqueue_public_assets() {

            // --- ESTILOS (CSS) ---

            // Estilos para el shortcode de proyectos
            wp_enqueue_style(
                'pjt-bootstrap-css', // Identificador único
                PLUGIN_JUNIOR_TEST_URL . 'assets/css/bootstrap.min.css', // 
                array(), // Dependencias (otros CSS que debe cargar antes)
                '1.0.0', // Versión del archivo (útil para caché)
                'all' // Medio (screen, print, all)
            );


            
            wp_enqueue_style(
                'pjt-main-style', // Identificador único
                PLUGIN_JUNIOR_TEST_URL . 'assets/css/style.css', // 
                array(), // Dependencias (otros CSS que debe cargar antes)
                '1.0.0', // Versión del archivo (útil para caché)
                'all' // Medio (screen, print, all)
            );

            // Puedes añadir aquí la hoja de estilos principal de tu TEMA (si usas una aparte del style.css principal del tema)
            // Es común que los temas carguen sus estilos directamente, pero si tu tema tiene CSSs adicionales en una carpeta, los cargarías así:
            wp_enqueue_style(
                'pjt-form-style', // Identificador único
                PLUGIN_JUNIOR_TEST_URL . 'assets/css/projects-list.css', // 
                array(), // Dependencias (otros CSS que debe cargar antes)
                '1.0.0', // Versión del archivo (útil para caché)
                'all' // Medio (screen, print, all)
            );

            // --- SCRIPTS (JavaScript) ---

            wp_enqueue_script(
                'pjt-bootstrap-js', 
                PLUGIN_JUNIOR_TEST_URL . 'assets/js/bootstrap.min.js',
                array( 'jquery' ), 
                '1.0.0', 
                true
            );


            // Script para la funcionalidad JS del shortcode o del tema
            wp_enqueue_script(
                'pjt-main-script', 
                PLUGIN_JUNIOR_TEST_URL . 'assets/js/main.js',
                array( 'jquery' ), 
                '1.0.0', 
                true
            );

            wp_localize_script(
                'plugin-junior-test-main-script',
                'pluginJuniorTestAjax', // Nombre de la variable JS
                array(
                    'ajaxurl' => admin_url( 'admin-ajax.php' ), // URL para peticiones AJAX
                    'nonce'   => wp_create_nonce( 'plugin_junior_test_form_nonce' ), // Nonce de seguridad
                )
            );

        }
    }
}