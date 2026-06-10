<?php
    $host= "localhost";
    $usuario= "root";
    $password = "";
    $base = "ete";

    $conexion = mysqli_connect($host, $usuario, $password, $base);
    if (!$conexion) 
    {
        die("Error de conexión: " . mysqli_connect_error());
    }
?>