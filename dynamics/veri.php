<?php
    include 'conecta.php';
    echo "aaaaa";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        // $nombre = $_POST["nombre"];
        echo "sirve";


                // $conexion
        // separamos claves (columnas) y valores
        $columnas = array_keys($_POST) ; 
        $valores = array_values($_POST) ;
        $nombres_columnas = implode (', ', $columnas) ;
        // grupo, nombre, nocta, ....
        $valores_escapados = array_map(function($v) use ($conexion){
            if(is_array($v)) {
                return "'" . mysqli_real_escape_string($conexion, implode(', ', $v)) . "'";
            } else {
                return "'" . mysqli_real_escape_string($conexion, $v) . "'";
            }
        } , $valores) ;
        // mysql_escape_string($v)
        //
        $valores_cadena = implode(", ", $valores_escapados); 
        $sql = "INSERT INTO formulario ($nombres_columnas) VALUES ($valores_cadena)" ;
        var_dump($sql);
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            echo "Datos insertados correctamente" ;
        }else{
            echo " Error " ;
        }
        
    }
?>