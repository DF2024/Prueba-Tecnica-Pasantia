<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); // Función vital para que WordPress añada sus scripts y estilos ?>
</head>
<body <?php body_class(); ?>>
    <header id="masthead" class="site-header">
        <div class="site-branding">
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
        </div><nav id="site-navigation" class="main-navigation">
            </nav>
    </header><div id="content" class="site-content">