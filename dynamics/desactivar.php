<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    if(isset($_COOKIE['activo']) && $_SESSION['rol'] == 'docente' && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        require './conexion.php';
        $con = connect();
        //Incluímos conexion.php y designamos connect a $con
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        //Quitamos espacios
        
        try
        {
            $del_val = "UPDATE alumnos SET id_activo = 2 WHERE nocta = '$username' AND contraseña = '$password'";
            mysqli_query($con, $del_val);
            echo "Acción realizada correctamente";
        } catch(mysqli_sql_exception $e)
        {
            echo "<h1>Esa acción no se puede realizar</h1>";
        }
    }

    else
    {
        echo "No tienes permiso para acceder a esta página.";
    }
    echo "<button><a href = '../templates/docente.html'>Regresar a la página de docente</a></button>";
?>