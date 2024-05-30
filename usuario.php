<?php

//Importar la conexión
require 'includes/config/database.php';

$db = conectarDB();
//Crear un email y password
$email = "correo@correo.com";
$password = '123456';

//$passwordHash = password_hash($password, PASSWORD_DEFAULT); Otra opcion para hashear passwords
$passwordHash = password_hash($password, PASSWORD_BCRYPT); //Siempre generan una contraseña de 60 caracteres

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

echo $query;

//Argegarlo a la base de datos
mysqli_query($db, $query);