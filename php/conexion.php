<?php
    $servidor="localhost";
    $nombreBd="id22161398_carrito";
    $usuario="root";
    $pass="";
    $conexion = new mysqli($servidor,$usuario,$pass,$nombreBd);

    if($conexion-> connect_error ){
        die('Error de conexion');

    }
?>