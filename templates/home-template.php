<?php
/**
 * Template Name: Plantilla de Contacto Especial
 * Template Post Type: page
 */

// Cargamos la cabecera del tema actual
get_header();
?>    
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-sm ">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/grill_houselogo.PNG');?>" alt="Grill Hour Logo" style="height: 80px;"> 
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto gap-5"> 
                        <a class="nav-link active" aria-current="page" href="#">HOME</a>
                        <a class="nav-link" href="#">MENU</a>
                        <a class="nav-link" href="#">RESERVATION</a>
                        <a class="btn btn-danger c-grill" href="#">CONTACT US</a> 
                    </div>
                </div>
        </div>
    </nav>

    <div id="heroCarousel" class="carousel slide w-100" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active hero-carousel-overlay ">
                <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carneee.jpg');?>" class="d-block w-100 carousel-image-fixed-height object-fit-cover" alt="Carne1">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100" style="bottom: 0; top: 0; left: 0; right: 0;">
                    <h2 class="text-white">TRADITIONAL COOKING</h2>
                    <h1 class="text-white">WITH A MODERN TWIST</h1>
                    <a href="#" class="btn btn-danger mt-3 btn-a c-grill">CONTACT US</a>
                </div>
            </div>
            </div>
        </div>


        </div>
    </div>

        
    </div>

    <section class="c-grill text-white py-5"> 
        <div class="container"> 
            <div class="row text-center text-md-start"> 
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0"> 
                    <h5 class="text-uppercase fw-bold mb-4">Address</h5>
                    <p>
                        2805 Scheuvront Drive.<br>
                        New York, NY
                    </p>
                </div>

                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold mb-4">Opening Hours</h5>
                    <p>
                        Mon - Sun<br>
                        8am - 9pm
                    </p>
                </div>

                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold mb-4">Phones</h5>
                    <p>
                        +166 500 891<br>
                        +166 500 892
                    </p>
                </div>

                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold mb-4">Emails</h5>
                    <p>
                        <a href="mailto:info@demolink.org" class="text-white text-decoration-none">info@demolink.org</a><br>
                        <a href="mailto:mail@demolink.org" class="text-white text-decoration-none">mail@demolink.org</a>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5"> <div class="container"> 
            <div class="row g-4 align-items-center"> 
                <div class="col-lg-6 col-md-12">
                <p class="text-danger fw-bold fs-5 mb-2" style="font-family: 'Playfair Display', serif;">The Best Meals</p> <h1 class="display-3 fw-bold mb-4" style="line-height: 1.1;">THE PERFECT PLACE<br>TO ENJOY THE LIFE<br>AND FOOD</h1>
            </div>

            <div class="col-lg-6 col-md-12">
                <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carne3.PNG');?>" class="img-fluid rounded" alt="Carne a la parrilla">
            </div>

            <div class="row g-4 mt-5 align-items-center"> 
            
                <div class="col-lg-6 col-md-12">
                    <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carne4.PNG');?>" class="img-fluid rounded" alt="Parrilla con fuego">
                </div>

                    <div class="col-lg-6 col-md-12">
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                        </p>
                        <a href="#" class="btn btn-outline-danger fw-bold">MORE ABOUT US</a> </div>

                </div>
            </div>
    </section>

    <div class="container my-5"> 
        <hr class="red-line-separator mx-auto">
    </div>  


    <section class="menu-section py-5">
        <div class="container">
            <div class="row g-4 justify-content-center"> <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="menu-item d-flex align-items-center">
                        <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carne5.PNG');?>" class="img-fluid me-3 rounded w-50" alt="Quesadilla de Champiñones">
                        <div class="menu-content">
                            <h4 class="c-grill-text fw-bold mb-1">MUSHROOM & ONION QUESADILLA</h4>
                            <p class="text-muted small mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                            <p class="price c-grill-text fw-bold fs-4">$16</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="menu-item d-flex align-items-center">
                        <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carne6.PNG');?>" class="img-fluid me-3 rounded w-50" alt="Yakitori de camaron">
                        <div class="menu-content">
                            <h4 class="c-grill-text fw-bold mb-1">MUSHROOM & ONION QUESADILLA</h4>
                            <p class="text-muted small mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                            <p class="price c-grill-text fw-bold fs-4">$16</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="menu-item d-flex align-items-center">
                        <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carne7.PNG');?>" class="img-fluid me-3 rounded w-50" alt="Plato de carne">
                        <div class="menu-content">
                            <h4 class="c-grill-text fw-bold mb-1">MUSHROOM & ONION QUESADILLA</h4>
                            <p class="text-muted small mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                            <p class="price c-grill-text fw-bold fs-4">$16</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="menu-item d-flex align-items-center">
                        <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carne8.PNG');?>" class="img-fluid me-3 rounded w-50" alt="Carne a la Parrilla">
                        <div class="menu-content">
                            <h4 class="c-grill-text fw-bold mb-1">MUSHROOM & ONION QUESADILLA</h4>
                            <p class="text-muted small mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                            <p class="price c-grill-text fw-bold fs-4">$16</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-danger c-grill btn-lg px-4 py-2 fw-bold text-uppercase">SEE MENU</a>
            </div>

        </div>
    </section>

    <section class="py-5 "> 

        <div class="container text-center">
            <div class="row align-items-start dis">
                <div class="col">
                    <img src="<?php echo esc_url( PLUGIN_JUNIOR_TEST_URL . '/assets/img/carne2.PNG');?>" class="img-fluid w-75  object-fit-cover" alt="BBQ Campaign">
                </div>
                <div class="col">
                    <div class="c-grill text-white d-flex flex-column justify-content-center p-5 custom-text-block-height w-75 h-75" > 
                            <p class="text-white fw-bold fs-5 mb-2 custom-cursive-font">Why Choose Us</p> 
                            <h2 class="display-4 fw-bold mb-4" style="line-height: 1.1;">#1 LOCATION FOR<br>FIRST-CLASS BBQ</h2> 
                            <p class="text-white"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="c-grill text-white py-5 newsletter-section">
        <div class="container text-center">
            <p class="custom-cursive-font fs-2 mb-2">Newsletter Signup</p> <h2 class="h3 fw-bold mb-4">JOIN OUR NEWSLETTER LIST TO GET<br>ALL THE LATEST OFFERS AND DISCOUNTS</h2>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4"> <form class="d-flex newsletter-form">
                        <input type="email" class="form-control me-2" placeholder="Your Email">
                        <button type="submit" class="btn btn-dark">Subscribe</button> </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white py-5 footer-main-section">
        <div class="container">
            <div class="row g-4 align-items-center">
                
                <div class="col-lg-3 col-md-6 col-sm-12 text-center text-md-start">
                    <img src="URL_IMAGEN_LOGO.png" alt="Grill Hour Logo" class="img-fluid footer-logo">
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center text-md-start">
                    <p class="mb-1 fw-bold">ADDRESS</p>
                    <p class="text-muted">2605 SCHEUVRONT DRIVE,<br>NEW YORK, NY 99515</p>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center text-md-start">
                    <p class="mb-1 fw-bold">ABOUT US</p>
                    <p class="text-muted">SERVICES<br>CONTACTS</p>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center text-md-start">
                    <p class="mb-1 fw-bold">INFO@DEMOLINK.ORG</p>
                    <p class="text-muted">+166 900 891</p>
                </div>

            </div>
        </div>
    </footer>

    <div class="bg-light py-3 text-center text-muted footer-copyright-section">
        <div class="container">
            <p class="mb-0">&copy; 2020 Grill How. All rights reserved. Privacy Policy</p>
        </div>
    </div>

    

    <script src="/assets/js/bootstrap.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<?php
// Cargamos la barra lateral (si el tema la tiene y la queremos)
// get_sidebar(); 

// Cargamos el pie de página del tema actual
get_footer();