<?php
    require './includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Conoce sobre nosotros</h1>
        <div class="nosotros">
            <img src="build/img/nosotros.webp" alt="imagen nosotros">
            <div>
                <h4>25 Años de experiencia</h4>
                <p>Proin consequat viverra sapien, malesuada tempor tortor feugiat vitae. In dictum felis et nunc aliquet molestie. Proin tristique commodo felis, sed auctor elit auctor pulvinar. Nunc porta, nibh quis convallis sollicitudin, arcu nisl semper mi, vitae sagittis lorem dolor non risus. Vivamus accumsan maximus est, eu mollis mi. Proin id nisl vel odio semper hendrerit. Nunc porta in justo finibus tempor. Suspendisse lobortis dolor quis elit suscipit molestie.</p>
            </div>
        </div>
    </main>

    <h1 class="titulo-m-s-nosotros">Más sobre nosotros</h1>

    <section class="m-s-nosotros contenedor">
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


<?php
    incluirTemplate('footer');
?>