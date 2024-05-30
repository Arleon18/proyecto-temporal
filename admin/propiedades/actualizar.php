<?php
    require '../../includes/funciones.php';

    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /');
    }

    //Validar por URL que sea un id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('location: /admin');
    }

    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consulta para obtener vendedores
    $consultaVendedores = "SELECT * FROM vendedores;";
    $vendedores = mysqli_query($db, $consultaVendedores);

    //Consulta para obtener propiedades
    $consultaPropiedades = "SELECT * FROM propiedades WHERE id = $id;";
    $propiedades = mysqli_query($db, $consultaPropiedades);
    $propiedad = mysqli_fetch_assoc($propiedades);

    //Arreglo de mensaje de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $creado = date('Y/m/d');
    $imagenPropiedad = $propiedad['imagen'];

    if($_SERVER["REQUEST_METHOD"] === 'POST'){

        // echo '<pre>'; 
        // var_dump($_POST);
        // echo '</pre>';


        // echo '<pre>'; 
        // var_dump($_FILES);
        // echo '</pre>';

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string( $db, $_POST['precio']);
        $descripcion= mysqli_real_escape_string( $db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string( $db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedorId']);

        // Asignar FILES a una varibale
        $imagen = $_FILES['imagen'];

        // echo '<pre>'; 
        // var_dump($imagen);
        // echo '</pre>';

        //Comprobaciones
        if(!$titulo){
            $errores[] = 'El nombre de la propiedad es obligatorio';
        }
        
        if (!$precio){
            $errores[] = 'Escribe un precio para la propiedad';
        }

        if (strlen($descripcion) < 50){
            $errores[] = 'La descripción es obligatoria y debe contener al menos 50 caracteres.';
        }

        if (!$habitaciones){
            $errores[] = 'El número de habitaciones es obligatorio';
        }

        if (!$wc){
            $errores[] = 'El número de baños es obligatorio';
        }

        if (!$estacionamiento){
            $errores[] = 'La cantidad de estacionamientos es obligatoria';
        }

        if (!$vendedorId){
            $errores[] = 'El vendedor es obligatorio';
        }

        //Validar por tamaño (1 mega)
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida){
            $errores[] = 'La imagen es muy pesada.';
        }

        if(empty($errores)){
        
            //SUBIDA DE ARCHIVOS
            $carpetaImagenes = '../../imagenes/';

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            };

            $nombreImagen = '';

            //Verificamos si el usuario subio una imagen nueva 
            if($imagen['name']){
                //Eliminar la imagen previa que estaba subida
                unlink($carpetaImagenes . $propiedad['imagen']);

                // Generar nombre unico para la imagen
                $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

                //Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                $nombreImagen = $propiedad['imagen']; 
            }
            

            
            
            //Escribiendo el SQL
            $query = "UPDATE propiedades SET titulo = '$titulo', precio = $precio, imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedorId = $vendedorId WHERE id = $id;";
            
            echo ($query);

            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('Location: /admin?mensaje=2');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>ACTUALIZAR</h1>

        <?php foreach($errores as $error){ ?>
            <p class="alerta error">
                <?php echo $error; ?>
            </p>
        <?php }; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información general</legend>
                
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" accept="image/jpeg, image/png" name="imagen">

                <img class="imagen-peque" src="/imagenes/<?php echo $imagenPropiedad ?>" alt="imagen propiedad">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min='1' max='99' value="<?php echo $habitaciones ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej. 2" min='1' max='99' value="<?php echo $wc ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej. 10" min='1' max='99' value="<?php echo $estacionamiento ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedorId">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php 
                    while($vendedor = mysqli_fetch_assoc($vendedores)){ ?>
                        <option <?php echo $vendedorId === $vendedor['id']? 'selected' : '' ?> value="<?php echo $vendedor['id'] ?>">
                            <?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?>
                        </option>
                        <?php  } ?>
                </select>
            </fieldset>
            <div class="cont-boton">
                <button type="submit" class="boton boton-propiedad">Actualizar propiedad</button>
            </div>
        </form>

        <a class="boton" href="../index.php">Volver</a>
    </main>


<?php
    incluirTemplate('footer');
?>