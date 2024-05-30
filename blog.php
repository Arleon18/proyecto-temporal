<?php
    require './includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenido">
        <div class="nuestro-blog">
            <h1>Nuestro Blog</h1>
            <article class="nuestro-blog__entrada">
                <img src="build/img/blog1.webp" alt="imagen blog 1">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                </a>
            </article>
            <article class="nuestro-blog__entrada">
                <img src="build/img/blog2.webp" alt="imagen blog 1">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </article>
            <article class="nuestro-blog__entrada">
                <img src="build/img/blog3.webp" alt="imagen blog 1">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                </a>
            </article>
            <article class="nuestro-blog__entrada">
                <img src="build/img/blog4.webp" alt="imagen blog 1">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </article>      
        </div>
    </main>

    <?php
    incluirTemplate('footer');
?>