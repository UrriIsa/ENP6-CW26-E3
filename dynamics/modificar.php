<?php
    session_start();
    if(isset($_COOKIE['activo']) && $_SESSION['rol'] == 'docente')
    {
        require './conexion.php';
        $con = connect();
        //Incluímos conexion.php y designamos connect a $con
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $name = $_POST["name"];
        $new_username = $_POST["new_username"];
        $new_password = $_POST["new_password"];
        $new_name = $_POST["new_name"];
        //Quitamos espacios
        $mod_val = "UPDATE alumnos SET nocta = '$new_username', contraseña = '$new_password', nombre = '$new_name' WHERE nombre = '$name' AND nocta = '$username' AND contraseña = '$password'";
        $result = mysqli_query($con, $mod_val);
        if(!$result)
        {
            echo "Error al modificar";
        }
        else
        {
            echo "Modificación exitosa";
        }
    }

    else
    {
        echo "No tienes permiso para acceder a esta página.";
    }
    echo "<button><a href = '../templates/docente.html'>Regresar a la página de docente</a></button>";
?>