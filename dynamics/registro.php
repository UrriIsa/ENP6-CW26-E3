<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    if(isset($_COOKIE['activo']) && $_SESSION['rol'] == 'docente' && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        require './conexion.php';
        $con = connect();
        //Incluímos conexion.php y designamos connect a $con
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $grupo = $_POST["grupo"];
        $plantel = $_POST["plantel"];
        $ete = $_POST["ete"];
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
            if(!ctype_digit($username))
            {
                echo "No puedes introducir letras en un número de cuenta";
                header("Location: ./registro.php");
            }
            try {
                $ins_val = "INSERT INTO alumnos(nocta, nombre, contraseña, grupo, plantel, ete, id_activo) VALUES ('$username', '$name', '$password', '$grupo', '$plantel', '$ete',  1)";
                $result = mysqli_query($con, $ins_val);
                echo"<h2>Registro Exitoso</h2>";
            } catch(mysqli_sql_exception $e)
            {
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