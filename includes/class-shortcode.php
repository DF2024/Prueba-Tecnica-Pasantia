<?php
/**
 * Define el Shortcode para mostrar el Custom Post Type 'project'.
 *
 * @package PluginJuniorTest
 */

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Plugin_Junior_Test_Shortcode' ) ) {

    class Plugin_Junior_Test_Shortcode {


        public function __construct() {
            add_shortcode( 'proyectos_listado', array( $this, 'render_projects_list_shortcode' ) );
            add_shortcode( 'formulario_contacto', array( $this, 'render_contact_form_shortcode' ) ); 


               // --- AÑADE ESTAS LÍNEAS ---
        // Engancha la función de guardado para usuarios no logueados
            add_action( 'admin_post_nopriv_save_contact_form', array( $this, 'handle_contact_form_submission' ) );
            // Engancha la función de guardado para usuarios logueados
            add_action( 'admin_post_save_contact_form', array( $this, 'handle_contact_form_submission' ) );
        // -------
        }

        /**
         * Callback para el shortcode [proyectos_listado].
         * Muestra una lista de proyectos con paginación y filtro por taxonomía.
         *
         * @param array $atts Atributos del shortcode.
         * @return string El HTML generado.
         */
        public function render_projects_list_shortcode( $atts ) {
            // Atributos por defecto del shortcode.
            // 'categoria' se refiere a la taxonomía 'tecnologia'.
            $atts = shortcode_atts( array(
                'categoria' => '', // Permite filtrar por una categoría de tecnología (ej. 'php', 'javascript')
            ), $atts, 'proyectos_listado' );

            ob_start(); // Inicia el almacenamiento en búfer de la salida

            // Obtenemos el número de página actual para la paginación
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            // Argumentos para WP_Query
            $args = array(
                'post_type'      => 'project', // Nuestro CPT
                'posts_per_page' => 3,         // No más de 3 entradas por paginación (Requisito 5)
                'paged'          => $paged,    // Página actual para la paginación
                'orderby'        => 'date',    // Ordenar por fecha
                'order'          => 'DESC',    // Orden descendente (más recientes primero)
            );

            // Si se especificó una categoría en el shortcode, añadirla a la consulta
            if ( ! empty( $atts['categoria'] ) ) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'tecnologia', // La taxonomía que queremos filtrar
                        'field'    => 'slug',      // Filtrar por el slug de la taxonomía
                        'terms'    => $atts['categoria'], // El valor de la categoría proporcionado en el shortcode
                    ),
                );
            }

            // Ejecutamos la consulta WP_Query
            $projects_query = new WP_Query( $args );

            if ( $projects_query->have_posts() ) :
                ?>
                <div class="projects-list">
                    <?php while ( $projects_query->have_posts() ) : $projects_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'project-item' ); ?>>
                            <h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="project-thumbnail">
                                    <?php the_post_thumbnail( 'medium' ); // 'medium' es un tamaño de imagen de WordPress ?>
                                </div>
                            <?php endif; ?>
                            <div class="project-content">
                                <?php the_excerpt(); // Muestra un extracto del contenido ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more-button">Ver más</a>
                            <?php
                            // Mostrar taxonomías asociadas (Tecnologías y Sectores)
                            $tecnologias = get_the_terms( get_the_ID(), 'tecnologia' );
                            if ( ! empty( $tecnologias ) && ! is_wp_error( $tecnologias ) ) :
                                echo '<div class="project-taxonomies">';
                                echo '<strong>Tecnologías:</strong> ';
                                foreach ( $tecnologias as $tecnologia ) {
                                    echo '<span class="taxonomy-item">' . esc_html( $tecnologia->name ) . '</span> ';
                                }
                                echo '</div>';
                            endif;

                            $sectores = get_the_terms( get_the_ID(), 'sector' );
                            if ( ! empty( $sectores ) && ! is_wp_error( $sectores ) ) :
                                echo '<div class="project-taxonomies">';
                                echo '<strong>Sectores:</strong> ';
                                foreach ( $sectores as $sector ) {
                                    echo '<span class="taxonomy-item">' . esc_html( $sector->name ) . '</span> ';
                                }
                                echo '</div>';
                            endif;
                            ?>
                        </article><?php endwhile; ?>
                </div><?php
                // Paginación
                $total_pages = $projects_query->max_num_pages;
                if ( $total_pages > 1 ) {
                    echo '<nav class="pagination">';
                    echo paginate_links( array(
                        'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, get_query_var( 'paged' ) ),
                        'total'     => $total_pages,
                        'prev_text' => '&laquo; Anterior',
                        'next_text' => 'Siguiente &raquo;',
                    ) );
                    echo '</nav>';
                }

                // Restablece los datos globales de post a la consulta principal de WordPress
                wp_reset_postdata();

            else :
                echo '<p>No se encontraron proyectos.</p>';
            endif;

            return ob_get_clean(); // Devuelve el contenido del búfer
        }

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