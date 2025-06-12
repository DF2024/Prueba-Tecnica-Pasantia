<?php
/**
 * Plugin Name: Plugin Junior Test
 * Plugin URI:  http://ejemplo.com/
 * Description: Plugin de prueba para el reto de desarrollo de WordPress.
 * Version:     1.0.0
 * Author:      Tu Nombre
 * Author URI:  http://ejemplo.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: plugin-junior-test
 *
 * @package PluginJuniorTest
 */

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define la ruta base del plugin
define( 'PLUGIN_JUNIOR_TEST_PATH', plugin_dir_path( __FILE__ ) );
// Define la URL base del plugin
define( 'PLUGIN_JUNIOR_TEST_URL', plugin_dir_url( __FILE__ ) );

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define la ruta base del plugin
// Define la ruta base del plugin (solo si no ha sido definida ya)
if ( ! defined( 'PLUGIN_JUNIOR_TEST_PATH' ) ) {
    define( 'PLUGIN_JUNIOR_TEST_PATH', plugin_dir_path( __FILE__ ) );
}

// Define la URL base del plugin (solo si no ha sido definida ya)
if ( ! defined( 'PLUGIN_JUNIOR_TEST_URL' ) ) {
    define( 'PLUGIN_JUNIOR_TEST_URL', plugin_dir_url( __FILE__ ) );
}
// Incluir clases
require_once PLUGIN_JUNIOR_TEST_PATH . 'includes/class-cpt.php';

// Inicializar clases
new Plugin_Junior_Test_CPT();


// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define la ruta base del plugin (solo si no ha sido definida ya)
if ( ! defined( 'PLUGIN_JUNIOR_TEST_PATH' ) ) {
    define( 'PLUGIN_JUNIOR_TEST_PATH', plugin_dir_path( __FILE__ ) );
}

// Define la URL base del plugin (solo si no ha sido definida ya)
if ( ! defined( 'PLUGIN_JUNIOR_TEST_URL' ) ) {
    define( 'PLUGIN_JUNIOR_TEST_URL', plugin_dir_url( __FILE__ ) );
}

// Incluir clases
require_once PLUGIN_JUNIOR_TEST_PATH . 'includes/class-cpt.php';
require_once PLUGIN_JUNIOR_TEST_PATH . 'includes/class-shortcode.php'; // Nueva línea

// Inicializar clases
new Plugin_Junior_Test_CPT();
new Plugin_Junior_Test_Shortcode(); // Nueva línea

// ... (Definiciones de constantes y includes anteriores) ...

// Incluir clases
require_once PLUGIN_JUNIOR_TEST_PATH . 'includes/class-cpt.php';
require_once PLUGIN_JUNIOR_TEST_PATH . 'includes/class-shortcode.php';
require_once PLUGIN_JUNIOR_TEST_PATH . 'includes/enqueue-assets.php'; // Nueva línea

// Inicializar clases
new Plugin_Junior_Test_CPT();
new Plugin_Junior_Test_Shortcode();
new Plugin_Junior_Test_Assets_Manager(); // Nueva línea

// ... (tus includes y inicializaciones existentes) ...

require_once PLUGIN_JUNIOR_TEST_PATH . 'includes/class-ajax-handler.php'; // <-- AÑADE ESTA LÍNEA

// Inicializar clases
new Plugin_Junior_Test_CPT();
new Plugin_Junior_Test_Shortcode();
new Plugin_Junior_Test_Assets_Manager();
new Plugin_Junior_Test_Ajax_Handler(); // <-- AÑADE ESTA LÍNEA


// Aquí irán las inclusiones de archivos y la lógica principal del plugin
// Por ahora, lo dejamos vacío para que WordPress lo reconozca.

// Ejemplo de un hook simple (para el requisito 4 - solo de ejemplo, lo profundizaremos más adelante)
// add_action( 'wp_head', 'mi_funcion_de_hook_ejemplo' );
// function mi_funcion_de_hook_ejemplo() {
//     echo '';
// }

