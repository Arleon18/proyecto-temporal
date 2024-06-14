<?php
    include '../includes/funciones.php';
    incluirTemplate('header');

    $auth = estaAutenticado();
    // Hola sexoooo
    echo $auth;
    
    if(!$auth){
        header('Location: /');
    }

    //Conectar con la base de datos
    require '../includes/config/database.php';
    $db = conectarDB();

    //Escribir nuestro query
    $query = "SELECT * FROM propiedades";

    //Consultar la BD
    $consulta = mysqli_query($db, $query);
    

    $mensaje = $_GET['mensaje'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){

            //Eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen']);
            
            //Eliminar propiedad
            $query = "DELETE FROM propiedades WHERE id = $id;";
            echo $query;
            

            $resultado = mysqli_query($db, $query);

            if ($resultado){
                header('Location: /admin?mensaje=3');
            }
        }
    }
?>

    <main class="contenedor">

        <h1>Administrador de bienes raices</h1>
        <?php if(intval($mensaje) === 1){ ?>
        <p class="alerta satisfactoria">Propiedad creada correctamente.</p>
        <?php  }elseif (intval($mensaje) === 2) {?>
        <p class="alerta satisfactoria">Propiedad actualizada correctamente.</p>
        <?php  }?>
        <a class="boton" href="/admin/propiedades/crear.php">Agregar propiedad</a>
        
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar la conexión -->
                <?php while($propiedad = mysqli_fetch_assoc($consulta) ) {?> 
                <tr>
                    <td><?php echo $propiedad['id'] ?></td>
                    <td><?php echo $propiedad['titulo'] ?></td>
                    <td><img src="<?php echo '../imagenes/' . $propiedad['imagen'] ?>" alt="propiedad" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio'] ?></td>
                    <td class="acciones">

                        <form method="post" class="eliminar">
                            <input type="hidden" name="id" value= <?php echo $propiedad['id'] ?>  >

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo$propiedad['id']?>" class="boton-naranja-block">Actualizar</a>
                    </td> 
                </tr>
                <?php }?>
            </tbody>
        </table>


        </main>

<?php

    //Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');
?>