<?php
    include 'conecta.php';

     // Se cambiará por la query correcta eventualmente
    $sql2="SELECT grupo FROM alumnos";
    $sql3="SELECT * FROM grupos";
    
    $query2=mysqli_query($conexion, $sql2);
    $query3=mysqli_query($conexion, $sql3);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../statics/css/prof-estadisticas.css">
        <title>Formulario Diagnóstico ETE</title>
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
        <!--Barra de navegación: estadísticas, notificaciones y registro de usuarios-->
        <nav>
            <!--Eventualmente cada botón llevará al lugar correcto
                Por el momento todos llevan a esta página-->
            <a id="boton-nav" href="./docente.php">Regresar</a>
            <a id="boton-nav" href="./prof-estadisticas.php">Datos estadísticos</a>
        </nav>
        <main>
            <h2>Datos estadísticos</h2>
            <h3>Consulta las estadísticas individuales o grupales.</h3>
            <div class="fondo">
                <!--Habrá código PHP que realice las consultas correspondientes en la base de datos
                y que solamente muestre los grupos y estudiantes que sean necesarios-->
                <?php
                    /*
                    Se realiza la consulta de todos los grupos, que se iteran en el primer while y se imprimen con otra consulta que verifica el nombre.
                    Posteriormente, con otro while (adentro del primero), se imprimen solamente los alumnos que pertenezcan al grupo correspondiente, validándolo con otra query.
                    */
                    while($grupos=mysqli_fetch_assoc($query3)) {  
                        $grupo=mysqli_fetch_assoc(mysqli_query($conexion, "SELECT grupo FROM grupos WHERE id_grupo=" . $grupos['id_grupo']));
                        echo"<div class='grupo'>";
                            echo"<p>" . $grupo['grupo'] . "</p>";
                            echo"<form action='consulta.php' method='POST'>"; //Le dirá al servidor cuál grupo/estudiante deseamos consultar en detalle
                                //Se me ocurrió hacerlo de esta manera:
                                echo "<input type='hidden' name='grupo' value='" . $grupos['id_grupo'] . "'>";//Los values serán los ID del grupo/estudiante
                                echo"<button type='submit' id='boton-estadistica-blanco'><img id='img-boton-estadistica' src='../statics/imgs/estadistica-blanco.svg'></button>";
                                /*Un form por grupo/estudiante.
                                Aunque también descubrí que se podía hacer poniendo un montón de botones submit en un solo form,
                                cada uno con diferente valor...
                                Tal vez haya otra manera*/
                            echo "</form>";
                        echo "</div>";
                        $sql="SELECT nocta, nombre, id_activo FROM alumnos WHERE id_activo=1 AND grupo=" . $grupos["id_grupo"];
                        $query=mysqli_query($conexion, $sql);
                        while($lista=mysqli_fetch_assoc($query)) 
                        {
                            echo "<div class='estudiante'>";
                                echo "<p>" . $lista['nombre'] . "</p>";
                                echo "<form action='consulta.php' method='POST'> <!--Lo mismo de arriba-->";
                                    echo "<input type='hidden' name='estudiante' value=" . $lista['nocta'] . ">";
                                    echo "<button type='submit' id='boton-estadistica-azul'><img id='img-boton-estadistica' src='../statics/imgs/estadistica-azul.svg'></button>";
                                echo "</form>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </main>
    </body>
</html>