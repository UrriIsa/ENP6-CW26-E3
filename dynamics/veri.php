<?php
    include 'conecta.php';
    echo "aaaaa";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        // $nombre = $_POST["nombre"];
        echo "sirve";
        /*foreach($_POST as $nombre => $respuesta) {
            echo "sirve 2";
            $sql="INSERT INTO formulario ({$nombre}) VALUES ($respuesta)";
            $query=mysqli_query($conexion, $sql);
            if($query)
            {
                echo "<h1>FELICIDADES SI SIRVIO</h1>";
            } else
            {
                echo "<h1>NO sirve</h1>";
            }
        }*/
        
        // Se tiene que cambiar para que añada todos los registros en un solo query
        $sql="INSERT INTO formulario ";
        foreach($_POST as $nombre => $respuesta) 
        {
            echo "sirve2";
            $sql="INSERT INTO formulario ({$nombre})
            VALUES ('{$respuesta}')";
            
            var_dump($sql);
            $query=mysqli_query($conexion, $sql);
            if($query)
                echo "si";
        }
    }
?>