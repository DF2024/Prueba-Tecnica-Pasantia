<?php
/**
 * Define el Shortcode para mostrar el Custom Post Type 'project'.
 *
 * @package PluginJuniorTest
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Plugin_Junior_Test_Shortcode' ) ) {

    class Plugin_Junior_Test_Shortcode {
        private $plugin_templates;

        public function __construct() {
            add_shortcode( 'formulario_contacto', array( $this, 'render_contact_form_shortcode' ) ); 
            add_action( 'admin_post_nopriv_save_contact_form', array( $this, 'handle_contact_form_submission' ) );
            add_action( 'admin_post_save_contact_form', array( $this, 'handle_contact_form_submission' ) );

            // Inicializamos el array de plantillas
            $this->plugin_templates = array(
                'templates/home-template.php' => 'Plantilla Home'
            );

            // Hook para añadir la plantilla al desplegable del editor 
            add_filter('theme_page_templates', array($this, 'add_plugin_page_template'));

            // Hook para cargar el archivo de la plantilla desde nuestro plugin 
            add_filter('template_include', array($this, 'load_plugin_page_template'));

        }

        public function add_plugin_page_template($templates) {
            // Unimos el array de plantillas existentes con nuestro array de plantillas del plugin
            $templates = array_merge($templates, $this->plugin_templates);
            return $templates;
        }

        public function load_plugin_page_template($template) {
        // Comprobamos si estamos en una página singular (página, post, etc.)
            if (is_singular('page')) {
                // Obtenemos la plantilla que tiene asignada esta página en la base de datos
                $page_template = get_post_meta(get_the_ID(), '_wp_page_template', true);

                // Comprobamos si la plantilla asignada es una de las de nuestro plugin
                if (isset($this->plugin_templates[$page_template])) {
                    // Si lo es, construimos la ruta completa al archivo dentro del plugin
                    $plugin_file_path = PLUGIN_JUNIOR_TEST_PATH . $page_template;
                    
                    // Si el archivo existe, lo usamos. Si no, WordPress seguirá con el original.
                    if (file_exists($plugin_file_path)) {
                        return $plugin_file_path;
                    }
                }
            }
            
            // Si no es nuestra plantilla, devolvemos la ruta original sin modificarla.
            return $template;
        }


        /**
         *
         * @param array $atts Atributos del shortcode.
         * @return string El HTML generado.
         */
        
                /**
         * Maneja el envío del formulario de contacto.
         * Valida el nonce, sanea los datos y los guarda en el CPT 'contact_message'.
         */
        public function handle_contact_form_submission() {

            // 1. Verificar el Nonce de seguridad
            if ( ! isset( $_POST['contact_form_nonce_field'] ) || ! wp_verify_nonce( $_POST['contact_form_nonce_field'], 'save_contact_form_nonce' ) ) {
                // Si la verificación falla, detenemos la ejecución.
                wp_die('¡La verificación de seguridad ha fallado!');
            }

            // 2. Sanear los datos del formulario
            $name    = sanitize_text_field( $_POST['contact_name'] );
            $email   = sanitize_email( $_POST['contact_email'] );
            $message = sanitize_textarea_field( $_POST['contact_message'] );

            // 3. Preparar los datos para crear el nuevo post
            $post_data = array(
                'post_type'    => 'contact_message', // El slug de tu CPT
                'post_title'   => 'Mensaje de: ' . $name, // Título del post
                'post_content' => $message, // El mensaje irá en el contenido principal
                'post_status'  => 'publish', // Publicar inmediatamente
            );

            // 4. Insertar el post en la base de datos
            $post_id = wp_insert_post( $post_data );

            // Importante: terminar la ejecución después de la redirección
            exit;
        }





            /**
         * Callback para el shortcode [formulario_contacto].
         * Muestra un formulario de contacto HTML.
         *
         * @return string El HTML del formulario.
         */

        public function render_contact_form_shortcode() {
            ob_start();
            ?>

            <div class="contact-form-wrapper">
                <h2>Contáctanos</h2>

                <?php
                // Mostrar mensaje de éxito o error después de la redirección
                if ( isset( $_GET['status'] ) && $_GET['status'] == 'success' ) {
                    echo '<p style="color: green;">¡Gracias por tu mensaje! Ha sido enviado correctamente.</p>';
                } elseif ( isset( $_GET['status'] ) && $_GET['status'] == 'error' ) {
                    echo '<p style="color: red;">Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo.</p>';
                }
                ?>

                <!-- El action apunta a admin-post.php y el método es POST -->
                <form id="contact-form" class="contact-form" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
                    
                    <!-- Campo oculto para decirle a WordPress qué acción ejecutar -->
                    <input type="hidden" name="action" value="save_contact_form">
                    
                    <!-- Nonce de seguridad para verificar la solicitud -->
                    <?php wp_nonce_field( 'save_contact_form_nonce', 'contact_form_nonce_field' ); ?>

                    <div class="form-group">
                        <label for="contact-name">Nombre:</label>
                        <input type="text" id="contact-name" name="contact_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact-email">Email:</label>
                        <input type="email" id="contact-email" name="contact_email" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-message">Mensaje:</label>
                        <textarea id="contact-message" name="contact_message" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="contact-submit">Enviar Mensaje</button>
                    </div>
                </form>
            </div>

            <?php
            return ob_get_clean();
        }
    }
}