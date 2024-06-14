<?php
    require './includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenido"><br>
    <form class="formulario" action="./crear-usuario.php" method="post">
        <fieldset>
            <legend> Registro </legend>
            <label for="correo">Correo</label>
            <input type="email" name="email" id="email" placeholder="example@domain.com">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            <button type="submit" class="boton">Registrarme</button>
        </fieldset>
    </form>
</main>

<?php
    incluirTemplate('footer');
?>