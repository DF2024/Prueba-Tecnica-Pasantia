<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package MiRetoTema
 */

get_header(); // Incluye el archivo header.php (lo crearemos en un momento)
?>

<main id="primary" class="site-main">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            // Aquí se mostrará el contenido de las entradas
            the_title( '<h1>', '</h1>' );
            the_content();
        endwhile;
    else :
        // No hay contenido para mostrar
        ?>
        <p>Lo siento, no se encontraron entradas.</p>
        <?php
    endif;
    ?>

</main><?php
get_footer(); // Incluye el archivo footer.php (lo crearemos en un momento)
?>