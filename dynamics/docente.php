<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    if(isset($_COOKIE['activo']) && $_SESSION["rol"] == "docente")
    {
        require './conexion.php';
        $con = connect();
        //Incluímos conexion.php y designamos connect a $con
        $username = $_SESSION['username'];
        $sql="SELECT nombre FROM docentes WHERE notra=" . $username;
        $query=mysqli_query($con, $sql);
        $datos=mysqli_fetch_assoc($query);
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
                            <h1>MetETE a estudiar</h1>
                        </div>
                        <!--Foto de perfil-->
                        <img src="../statics/imgs/perfil.png" alt="foto-perfil" class="perfil" width="10%" height="10%">
                    </div>
                </header>
                <main>
                    
                    <h2>¡Te damos la bienvenida !</h2>
                    <h3>Aquí puedes consultar tus notificaciones, los datos estadísticos y administrar usuarios</h3>
                    <div class="datos-prof">
                        <?php
                            $sql_1 = "SELECT ete FROM docentes WHERE notra = '" . $username . "'";
                            $result_1 = mysqli_query($con, $sql_1);
                            $no_ete = mysqli_fetch_assoc($result_1);
                            $sql_ete = "SELECT nombre_ete FROM etes WHERE id_ete = " . intval($no_ete['ete']);
                            $sql_grupo = "SELECT grupo FROM grupos WHERE docente = '" . $username . "'";
                            $result_data = mysqli_query($con, $sql_ete);
                            $result_data2 = mysqli_query($con, $sql_grupo);
                            $datos_ete = mysqli_fetch_assoc($result_data);
                            $datos_grupo = mysqli_fetch_assoc($result_data2);
                            echo "<p id='datos'><strong>ETE:</strong> " . $datos_ete['nombre_ete'] . "<br><strong>Grupo:</strong> " . $datos_grupo['grupo'] . "</p>";
                        ?>
                    </div>
                    <div class="botones">
                        <div class="boton-izq">
                            <a id="boton-nav" class="boton-link" href="./prof-estadisticas.php"><strong>Datos<br>estadísticos<img src="../statics/imgs/statistics.png" alt="logo-estadística" class="logo-estadística" width="70px" height="70px"></strong></a>
                        </div>
                        <div class="botones-der">
                            <a class="boton-link boton-nav-usuario" href="./registro_usuarios.php"><strong>Registrar usuarios</strong></a>
                            <a class="boton-link boton-nav-usuario" href="./modificar_usuarios.php"><strong>Modificar usuarios</strong></a>
                            <a class="boton-link boton-nav-usuario" href="./desactivar_usuarios.php"><strong>Desactivar usuarios</strong></a>
                        </div>
                    </div>
                </main>
            </body>
        </html>
        
<?php
    }
    else
    {
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
                    <h2>No tienes permiso >:C</h2>
                    
                </main>
            </body>
        </html>
<?php
    }
?>