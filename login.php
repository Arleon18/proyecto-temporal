<?php
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es válido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio";
        }

        if(empty($errores)){
            //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email';";
            $resultado = mysqli_query($db, $query);

            if($resultado -> num_rows){
                //Revisar si el passwordes correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar si el password es correcto o no

                $auth = password_verify($password, $usuario['password']);
                if($auth){
                    session_start();
                    
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');

                }else{
                    $errores[] = 'La contraseña es incorrecta.';
                }
            } else{
                $errores[] = "El usuario no existe";
            }
            
        }

    }

    include 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenido">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error):?>
            <p class="alerta error"><?php echo $error ?></p>
        <?php endforeach;?>

        <form class="formulario" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="email">E-mail</label>
                <input name="email" id="email" type="email" placeholder="Tu Email" required>
                <label for="password">Password</label>
                <input name="password" id="password" type="text" placeholder="Tu password" required>

                <div class="contenedor-boton-login">
                    <button type="submit" class="boton">Iniciar Sesión</button>
                </div>
            </fieldset>
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>