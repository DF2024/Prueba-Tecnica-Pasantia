<?php
/**
 * Template Name: Lista de Mensajes de Contacto
 *
 * Esta plantilla muestra todos los mensajes recibidos a través del formulario.
 *
 * @package PluginJuniorTest
 */

get_header(); // Carga el header de tu tema
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>

            <div class="messages-list">
                <?php
                $args = array(
                    'post_type'      => 'contact_message',
                    'posts_per_page' => -1, // -1 para traer todos
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                $messages_query = new WP_Query($args);

                if ($messages_query->have_posts()) :
                    while ($messages_query->have_posts()) : $messages_query->the_post();
                        $email = get_post_meta(get_the_ID(), '_contact_email', true);
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('contact-message-item'); ?>>
                            <header class="entry-header">
                                <h3 class="entry-title"><?php the_title(); ?></h3>
                                <?php if ($email) : ?>
                                    <div class="entry-meta">
                                        <strong>Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                    </div>
                                <?php endif; ?>
                            </header>

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                        <hr>
                    <?php
                    endwhile;
                    wp_reset_postdata(); // Restaura los datos del post original
                else :
                    ?>
                    <p><?php _e('No se han recibido mensajes todavía.', 'plugin-junior-test'); ?></p>
                <?php
                endif;
                ?>
            </div>
        </div>
    </main>
</div>

<?php
get_footer(); // Carga el footer de tu tema
?>
