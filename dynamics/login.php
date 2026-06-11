<?php 
    session_start();
    if (isset($_POST["username"]))
    {
        //Haremos la consulta en la base de datos
        require './conexion.php';
        $con = connect();

        $username = trim($_POST["username"]); // Quitamos espacios al inicio y al final del string recibido por formulario
        $password = trim($_POST["password"]);

        // Revisamos que no sean las credenciales del docente
        $query = "SELECT count(*) AS total FROM alumnos WHERE nocta = '$username' AND contraseña = '$password'";
        $result = mysqli_query($con, $query);
        $registro = mysqli_fetch_assoc($result);
        if($registro["total"] == 1)
        {
            $query = "SELECT * FROM alumnos WHERE nocta = '$username' AND contraseña = '$password'";
            $result = mysqli_query($con, $query);
            $registro = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $registro["nocta"];
            $_SESSION["rol"] = "alumno";
            setcookie("activo", $registro["nocta"], time() + (86400*7)); // 1 dia = 86400 segundos, expirará en un dia
            header("Location: alumno.php");
        }

        else
        {
            $query = "SELECT count(*) AS total FROM docentes WHERE notra = '$username' AND contraseña = '$password'";
            $result = mysqli_query($con, $query);
            $registro = mysqli_fetch_assoc($result);
            if($registro["total"] == 1)
            {
                $query = "SELECT * FROM docentes WHERE notra = '$username' AND contraseña = '$password'";
                $result = mysqli_query($con, $query);
                $registro = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $registro["notra"];
                $_SESSION["rol"] = "docente";
                setcookie("activo", $registro["notra"], time() + (86400*7)); // 1 dia = 86400 segundos, expirará en un dia
                header("Location: ../templates/admin-usuarios/admin_general_usuarios.html");
            }
            else
            {
                header("Location: index.html");
            }
        }
    }

    else 
    {
        require './conexion.php';
        $con = connect();
        // Verificamos que tenga la cookie
        if (isset($_COOKIE["activo"]))
        {
            $username = $_COOKIE["activo"]; //Se asigna la cookie al usuario

            if ($_SESSION["rol"] == "docente")
            {
                header("Location: ../templates/admin-usuarios/admin_general_usuarios.html");
            }
            elseif($_SESSION["rol"] == "alumno")
            {
                header("Location: alumno.php");
            }
            else
            {
                header("Location: login.html");
            }
        }
    }
?>