<?php

function conectarDB () : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo 'NO se pudo conectar a la abse de datos.';
        exit;
    } 

    return $db;
};