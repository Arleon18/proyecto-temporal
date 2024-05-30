<?php 
//Importar la base de datos

require 'includes/config/database.php';

$db = conectarDB();

//Escribir Query
$query = "SELECT * FROM propiedades LIMIT $limite;";

//Ejecutar Query
$resultado = mysqli_query($db, $query);

?>


<div class="propiedades__contenido contenedor">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
    <article class="propiedades__propiedad">

        <img loading="lazy" src="<?php echo '/imagenes/' . $propiedad['imagen']; ?>" alt="Imagen propiedad">

        <div class="propiedades__info">
            <h3><?php echo $propiedad['titulo'];?></h3>
            <p><?php echo $propiedad['descripcion'];?></p>
            <p class="propiedades__precio">$ <?php echo $propiedad['precio'];?></p>
            <ul>
                <li>
                    <img src="build/img/icono_wc.svg" alt="">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['id'] ?>">Ver propiedad</a>
        </div>
    </article> <!-- propiedades__propiedad -->
    <?php endwhile;?>
</div> <!-- propiedades__contenido -->

<?php 
    mysqli_close($db);
?>
