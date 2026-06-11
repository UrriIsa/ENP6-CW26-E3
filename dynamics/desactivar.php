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
        $del_val = "UPDATE alumnos SET id_activo = 0 WHERE notra = '$username' AND contraseña = '$password'";
        $result = mysqli_query($con, $del_val);
        if(!$result)
        {
            header("Location: docente.html")
            echo "Error al desactivar";
        }
        else
        {
            header("Location: docente.html")
            echo "Desactivación exitosa";
        }
    }

    else
    {
        header("Location: login.html");
                echo "No tienes permiso para acceder a esta página.";
    }
?>