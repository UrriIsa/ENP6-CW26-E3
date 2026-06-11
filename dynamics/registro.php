<?php
    session_start();
    if(isset($_COOKIE['activo']) && $_SESSION['rol'] == 'docente')
    {
        require './conexion.php';
        $con = connect();
        //Incluímos conexion.php y designamos connect a $con
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        //Quitamos espacios
        $ins_val = "INSERT INTO alumnos (notra, contraseña, id_activo) VALUES ('$username', '$password', 1)";
        $result = mysqli_query($con, $ins_val);
        if(!$result)
        {
            header("Location: docente.html")
            echo "Error al registrar";
        }
        else
        {
            header("Location: docente.html")
            echo "Registro exitoso";
        }
    }

    else
    {
        header("Location: docente.html")
        echo "No tienes permiso para acceder a esta página.";
    }
?>