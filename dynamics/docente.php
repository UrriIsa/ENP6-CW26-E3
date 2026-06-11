<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    if(isset($_COOKIE['activo']) && $_SESSION['rol'] == 'docente')
    {
        require './conexion.php';
        $con = connect();
        //Incluímos conexion.php y designamos connect a $con
        $username = $_SESSION['username'];
        $sql="SELECT nombre FROM docentes WHERE notra=" . $username;
        $query=mysqli_query($con, $sql);
        $datos=mysqli_fetch_assoc($query);




        //Quitamos espacios
        /*try {
            $ins_val = "INSERT INTO alumnos(nocta, nombre, contraseña, grupo, plantel, id_activo) VALUES ('$username', '$name', '$password', '$grupo', '$plantel', '$ete',  1)";
            $result = mysqli_query($con, $ins_val);

        } catch(mysqli_sql_exception $e)
        {
            echo "<h1>Esa acción no se puede realizar</h1>";
        }*/
    }
    else
    {
        echo "No tienes permiso para acceder a esta página.";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../statics/css/docente.css">
        <title>Docente</title>
    </head>
    <body>
        <header>
            <!--El mismo encabezado-->
            <div class="head">
                <!--logo de la enp6 y unam y titulo del sitio-->
                <div class="head-left">
                    <img src="../statics/imgs/logo-unam.png" alt="logo-unam" class="logo-unam" width="10%" height="10%">
                    <img src="../statics/imgs/logo-enp6.png" alt="logo-enp6" class="logo-enp6" width="5%" height="5%">
                    <h1>Nombre del Proyecto</h1>
                </div>
                <!--Foto de perfil-->
                <img src="../statics/imgs/perfil.png" alt="foto-perfil" class="perfil" width="10%" height="10%">
            </div>
        </header>
        <main>
            
            <h2>¡Te damos la bienvenida !</h2>
            <h3>Aquí puedes consultar tus notificaciones, los datos estadísticos y admiinistrar usuarios</h3>
            
            <div class="botones">
                <div class="boton-nav"><button><a id="boton-nav" href="./docente.php">Notificaciones</a></button></div>
                <div class="boton-nav"><button><a id="boton-nav" href="./docente.php">Datos estadísticos</a></button></div>
                <div class="boton-nav"><button><a id="boton-nav" href="./docente.php">Registro de usuarios</a></button></div>
            </div>
        </main>
    </body>
</html>