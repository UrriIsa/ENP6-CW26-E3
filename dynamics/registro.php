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
        //Quitamos espacios
        $ins_val = "INSERT INTO alumnos(nocta, nombre, contraseña, id_activo) VALUES ('$username', '$name', '$password', 1)";
        $result = mysqli_query($con, $ins_val);
        if(!$result)
        {
            echo "<h2>Error al registrar</h2>";
        }
        else
        {
            echo "<h2>Registro exitoso</h2>";
        }
    }

    else
    {
        echo "No tienes permiso para acceder a esta página.";
    }
    echo "<button><a href = '../templates/docente.html'>Regresar a la página de docente</a></button>";
?>