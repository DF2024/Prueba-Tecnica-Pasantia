<?php
/**
 * Template Name: Plantilla de Contacto Especial
 * Template Post Type: page
 */

// Cargamos la cabecera del tema actual
get_header();
?>    

    <!-- 2. Estilos personalizados -->

    <div class="form-container">
        
        <!-- Título del Formulario -->
        <h1 class="form-title">Contáctenos</h1>
        
        <!-- Inicio del Formulario -->
        <form action="#" method="POST">
            
            <!-- Campo Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
            </div>
            
            <!-- Campo Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter a valid email address" required>
            </div>
            
            <!-- Campo Mensaje -->
            <div class="mb-4">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control textarea-message" id="message" name="message" placeholder="Enter your message" required></textarea>
            </div>
            
            <!-- Botón de Envío -->
            <div class="d-grid">
                <button type="submit" class="btn btn-custom-red text-uppercase">Enviar</button>
            </div>

        </form>
        
        <!-- Pie de página -->
        <div class="text-center mt-4 footer-text">
            <span>Imagen de <a href="https://www.freepik.com" target="_blank">Freepik</a></span>
        </div>

    </div>

<?php
// Cargamos la barra lateral (si el tema la tiene y la queremos)
// get_sidebar(); 

// Cargamos el pie de página del tema actual
get_footer();