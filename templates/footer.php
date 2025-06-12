</div><footer id="colophon" class="site-footer">
        <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mi-reto-tema' ) ); ?>">
                <?php printf( esc_html__( 'Proudly powered by %s', 'mi-reto-tema' ), 'WordPress' ); ?>
            </a>
            <span class="sep"> | </span>
            <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'mi-reto-tema' ), 'Mi Reto Tema', '<a href="http://ejemplo.com/" rel="designer">Tu Nombre</a>' ); ?>
        </div></footer><?php wp_footer(); // Función vital para que WordPress añada sus scripts y estilos al final del body ?>

</body>
</html>