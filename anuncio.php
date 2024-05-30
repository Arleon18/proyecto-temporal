<?php
    require 'includes/funciones.php';
    require 'includes/config/database.php';

    incluirTemplate('header');

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }

    $db = conectarDB();

    $query = "SELECT * FROM propiedades WHERE id = $id";

    $resultado = mysqli_query($db, $query);

    if (!$resultado->num_rows){
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

?>

    <main class="contenido">
        <h1><?php echo $propiedad['titulo']?></h1>
        
        <img loading="lazy" src="<?php echo '/imagenes/' . $propiedad['imagen']; ?>" alt="Imagen propiedad">

        <div class="propiedades__info anuncio">
            <p class="propiedades__precio">$ <?php echo $propiedad['precio'];?></p>
            <ul>
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion'];?></p>

        </div>
    </main>
    
<?php
    incluirTemplate('footer');
?>