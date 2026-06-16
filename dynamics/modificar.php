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
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../statics/css/registro.css">
            <title>Document</title>
        </head>
        <body>
            <header>
                <div class="head">
                    <div class="head-left">
                        <img src="../statics/imgs/logo-unam.png" alt="logo-unam" class="logo-unam" width="10%" height="10%">
                        <img src="../statics/imgs/logo-enp6.png" alt="logo-enp6" class="logo-enp6" width="5%" height="5%">
                        <h1>MetETE a estudiar</h1>
                    </div>
                    <img src="../statics/imgs/perfil.png" alt="foto-perfil" class="perfil" width="10%" height="10%">
                </div>
            </header>
            <nav>
                <a id="boton-nav" href="./docente.php">Regresar</a>
                <a id="boton-nav" href="./prof-estadisticas.php">Datos estadísticos</a>
            </nav>
            <main>
    <?php
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
                echo "<h2>Cambios realizados exitosamente</h2>";
            } else
            {
                echo "<h2>No se realizó ningún cambio (no seleccionaste ninguna opción)</h2>";
            }
        } catch(mysqli_sql_exception $e)
        {
            var_dump($e);
            echo "<h2>Esa acción no se puede realizar</h2>";
        }
    }

    else
    {
        echo "<h1>No tienes permiso para acceder a esta página.</h1>";
    }
?>
</main>    
</body>
</html>