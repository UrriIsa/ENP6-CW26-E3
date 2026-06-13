<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    if(isset($_COOKIE['activo']) && $_SESSION['rol'] == 'docente' && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        require './conexion.php';
        $con = connect();
        //Incluímos conexion.php y designamos connect a $con
        $username = $_POST["username"];
        $new_username = $_POST["new_username"];
        $new_password = $_POST["new_password"];
        $new_name = $_POST["new_name"];
        $new_ete = $_POST["new_ete"];
        $new_plantel = $_POST["new_plantel"];
        $new_grupo = $_POST["new_grupo"];
        $mod_val = array();
        $result = array();
        //Quitamos espacios
        try 
        {
            if(isset($new_password) && !empty($new_password)) 
            {
                $mod_val[] = "UPDATE alumnos SET contraseña = '$new_password' WHERE  nocta = '$username'";
            }
            if(isset($new_name) && !empty($new_name))
            {
                $mod_val[] = "UPDATE alumnos SET nombre = '$new_name' WHERE  nocta = '$username'";
            }
            if(isset($new_ete) && !empty($new_ete)) 
            {
                $mod_val[] = "UPDATE alumnos SET ete = '$new_ete' WHERE  nocta = '$username'";
            }
            if(isset($new_plantel) && !empty($new_plantel)) 
            {
                $mod_val[] = "UPDATE alumnos SET plantel = '$new_plantel' WHERE  nocta = '$username'";
            }
            if(isset($new_grupo) && !empty($new_grupo))
            {
                var_dump($new_grupo);
                $mod_val[] = "UPDATE alumnos SET grupo = '$new_grupo' WHERE  nocta = '$username'";
            }
            if(isset($new_username) && !empty($new_username))
            {
                $mod_val[] = "UPDATE alumnos SET nocta = '$new_username' WHERE  nocta = '$username'";
            }
            if(!empty($mod_val))
            {
                foreach($mod_val as $mod) {
                    $result[] = mysqli_query($con, $mod);
                }
                echo "<h1>Cambios realizados exitosamente</h1>";
            } else
            {
                echo "<h1>No se realizó ningún cambio (no seleccionaste ninguna opción)</h1>";
            }
        } catch(mysqli_sql_exception $e)
        {
            var_dump($e);
            echo "<h1>Esa acción no se puede realizar</h1>";
        }
    }

    else
    {
        echo "No tienes permiso para acceder a esta página.";
    }
    echo "<button><a href = '../templates/docente.html'>Regresar a la página de docente</a></button>";
?>