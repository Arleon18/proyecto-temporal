<?php
    require './includes/funciones.php';
    incluirTemplate('header');
?>
    <script src="./validarContacto.js"></script>
    <main class="contenedor">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <div id="errores"></div>
        <h2>Llene el formulario de contacto</h2>
        <form class="formulario" method="POST" onsubmit="return validarContacto();">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input name="Nombre" id="nombre" type="text" placeholder="Tu nombre">
                <label for="mail">E-mail:</label>
                <input name="Mail" id="mail" type="email" placeholder="Tu E-mail">
                <label for="tel">Teléfono:</label>
                <input name="Telefono" id="tel" type="tel" placeholder="Tu Teléfono">
                <label for="mensaje">Mensaje:</label>
                <textarea name="Mensaje" id="mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="ven-o-com">Vende o compra:</label>
                <select name="Opc" id="ven-o-com">
                    <option disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="precio-presupuesto">Precio o presupuesto:</label>
                <input id="precio-presupuesto" type="number">
            </fieldset>
            <button type="submit">Enviar</button>
        </form>
    </main>
    
<?php
    incluirTemplate('footer');
?>