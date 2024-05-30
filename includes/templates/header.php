<?php
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raíces</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <header class="header <?php  echo $inicio? 'inicio' : ''  ?>">
        <div class="header__contenido contenedor <?php  echo $inicio? 'inicio' : ''  ?>">

            <a href="index.php"><img class="logo" src="/build/img/logo.svg" alt="Logo Principal"></a>
            <img class="barras" src="/build/img/barras.svg" alt="Barras navegación">
            <nav class="navegacion">
                <a href="/nosotros.php">Nosotros</a>
                <a href="/anuncios.php">Anuncios</a>
                <a href="/blog.php">Blog</a>
                <a href="/contacto.php">Contacto</a>
                <?php if($auth):?>
                    <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                <?php endif;?>
                <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Logo Dark Mode">
            </nav>
        </div>
        <?php
        if ($inicio){ ?>
            <div class="contenedor header__subtitulos">
                <h2 class="header__subtitulo">Venta de casas y depeartamentos</h2>
                <h3 class="header__subtitulo">Exclusivos de Lujo</h3>
            </div>
        <?php
        } ?>
    </header>