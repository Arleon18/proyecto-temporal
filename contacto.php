<?php
    require './includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>
        <form class="formulario" method="GET">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input name="Nombre" id="nombre" type="text" placeholder="Tu nombre">
                <label for="mail">E-mail:</label>
                <input name="Mail" id="mail" type="text" placeholder="Tu E-mail">
                <label for="tel">Teléfono:</label>
                <input name="Telefono" id="tel" type="tel" placeholder="Tu Teléfono">
                <label for="mensaje">Mensaje:</label>
                <textarea name="Mensaje" id="mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="ven-o-com">Vende o compra:</label>
                <select id="ven-o-com">
                    <option disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="precio-presupuesto">Precio o presupuesto:</label>
                <input id="precio-presupuesto" type="number">
            </fieldset>
            <fieldset>
                <legend>Información de contacto</legend>

                <p>¿Cómo desea ser contactado?</p>
                <div class="como-ser-contactado">
                    <label for="telefono">Teléfono:</label>
                    <input name="info-p" id="telefono" type="radio">

                    <label for="e-mail">E-mail:</label>
                    <input name="info-p" id="e-mail" type="radio">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>
                <label for="fecha">Fecha:</label>
                <input id="fecha" type="date">

                <label for="tiempo">Hora:</label>
                <input id="tiempo" type="time" min="08:00" max="18:00">

            </fieldset>

            <button type="submit">Enviar</button>
        </form>
    </main>
    
<?php
    incluirTemplate('footer');
?>