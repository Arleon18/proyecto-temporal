<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor">
        <h1 class="titulo-m-s-nosotros">Más sobre nosotros</h1>

        <section class="m-s-nosotros">
            <article class="m-s-nosotros__article">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy"> 
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis molestias quidem aliquam consectetur atque non pariatur sequi eveniet corrupti.</p>
            </article> <!-- .m-s-nosotros__article -->

            <article class="m-s-nosotros__article">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis molestias quidem aliquam consectetur atque non pariatur sequi eveniet corrupti.</p>
            </article> <!-- .m-s-nosotros__article -->

            <article class="m-s-nosotros__article">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis molestias quidem aliquam consectetur atque non pariatur sequi eveniet corrupti.</p>
            </article> <!-- .m-s-nosotros__article -->
        </section> <!-- .m-s-nosotros -->
    </main>
        
    <section class="propiedades">
        <h2>Casas y Depas en Venta</h2>
        
        <?php 
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="contenedor propiedades__boton-ver-todas">
            <a href="anuncios.php">Ver Todas</a>
        </div>
    </section> <!-- propiedades -->

    <section class="contactanos">
        <div class="contactanos__contenido contenedor">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a href="contacto.php">Contáctanos</a>
        </div>
    </section>

    <div class="blog-testimoniales contenedor">
        <section class="nuestro-blog">
            <h3>Nuestro Blog</h3>
            <article class="nuestro-blog__entrada">
                <img src="build/img/blog1.webp" alt="imagen blog 1">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span class="naranja">20/10/2021</span> por: <span class="naranja">Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                </a>
            </article>
            <article class="nuestro-blog__entrada">
                <img src="build/img/blog2.webp" alt="imagen blog 1">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p>Escrito el: <span class="naranja">20/10/2021</span> por: <span class="naranja">Admin</spa></p>
                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </article>         
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimoniales-contenido">
                <img src="build/img/comilla.svg" alt="comillas">
                <div class="testimoniales-texto">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                    </blockquote>
                    <p>- Juan De la torre</p>
                </div>
            </div>         
        </section>
    </div>

<?php
    incluirTemplate('footer');
?>