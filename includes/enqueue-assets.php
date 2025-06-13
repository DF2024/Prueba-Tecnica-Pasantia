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
        }

        /**
         * Encola los scripts y estilos para el front-end del sitio.
         *
         * @hook wp_enqueue_scripts
         *
         * Explicación del Hook 'wp_enqueue_scripts':
         * Este hook es el método preferido y más seguro para añadir archivos JavaScript y CSS a tu sitio WordPress.
         * Se dispara en la parte frontal (front-end) de tu sitio.
         * Usarlo previene conflictos (cuando diferentes plugins o temas intentan cargar archivos con el mismo nombre)
         * y asegura que los archivos se carguen en el orden correcto y solo cuando son necesarios.
         * Es crucial para la optimización y el buen funcionamiento.
         */
        public function enqueue_public_assets() {

            // --- ESTILOS (CSS) ---

            // Estilos para el shortcode de proyectos
            wp_enqueue_style(
                'plugin-main', // Identificador único
                PLUGIN_JUNIOR_TEST_URL . 'assets/css/bootstrap.min.css', // 
                array(), // Dependencias (otros CSS que debe cargar antes)
                '1.0.0', // Versión del archivo (útil para caché)
                'all' // Medio (screen, print, all)
            );


            
            wp_enqueue_style(
                'plugin-main', // Identificador único
                PLUGIN_JUNIOR_TEST_URL . 'assets/css/style.css', // 
                array(), // Dependencias (otros CSS que debe cargar antes)
                '1.0.0', // Versión del archivo (útil para caché)
                'all' // Medio (screen, print, all)
            );

            // Puedes añadir aquí la hoja de estilos principal de tu TEMA (si usas una aparte del style.css principal del tema)
            // Es común que los temas carguen sus estilos directamente, pero si tu tema tiene CSSs adicionales en una carpeta, los cargarías así:
            wp_enqueue_style(
                'mi-reto-tema-main-style',
                get_template_directory_uri() . '/assets/css/main.css', // Ruta al CSS principal de tu tema
                array(),
                '1.0.0',
                'all'
            );


            // --- SCRIPTS (JavaScript) ---

            wp_enqueue_script(
                'plugin-junior-test-main-script', 
                PLUGIN_JUNIOR_TEST_URL . 'assets/js/bootstrap.min.js',
                array( 'jquery' ), 
                '1.0.0', 
                true
            );


            // Script para la funcionalidad JS del shortcode o del tema
            wp_enqueue_script(
                'plugin-junior-test-main-script', 
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

            // Puedes pasar variables PHP a tu script JS si es necesario
            // wp_localize_script(
            //     'plugin-junior-test-main-script',
            //     'pluginJuniorTestAjax', // Nombre de la variable JS (ej. pluginJuniorTestAjax.ajaxurl)
            //     array(
            //         'ajaxurl' => admin_url( 'admin-ajax.php' ), // URL para peticiones AJAX en WordPress
            //         'nonce'   => wp_create_nonce( 'plugin_junior_test_nonce' ), // Un nonce de seguridad
            //     )
            // );
        }
    }
}