<?php 
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!$email){
            $errores[] = "El email es obligatorio o no es válido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio";
        }

        if(empty($errores)) {
            $query = 'INSERT INTO usuarios (email, password) VALUES ("'.$email.'", "'.$password.'");';
            try {
                $resultado = mysqli_query($db, $query);
                session_start();
                    
                $_SESSION['usuario'] = $email;
                $_SESSION['login'] = true;
                header('Location: /');
            } catch (\Throwable $th) {
                echo "Fallamos lol".$th." :V";
            }
        }
    }
?>