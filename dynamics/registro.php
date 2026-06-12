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
        $name = $_POST["name"];
        $grupo = $_POST["grupo"];
        $plantel = $_POST["plantel"];
        $ete = $_POST["ete"];
        //Quitamos espacios
        try {
            $ins_val = "INSERT INTO alumnos(nocta, nombre, contraseña, grupo, plantel, ete, id_activo) VALUES ('$username', '$name', '$password', '$grupo', '$plantel', '$ete',  1)";
            var_dump($ins_val);
            $result = mysqli_query($con, $ins_val);

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