<?php
    session_start();
    // Aquí va la validación del rol del usuario
    $usuario = $_SESSION["username"];
    $name = $_SESSION["name"];
    $grupo = $_SESSION["grupo"];
    $plantel = $_SESSION["plantel"];

?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Regina Arantza González Hernández">
        <meta name="description" content="Perfil de usuario - Orientación educativa ETEC">
        <link rel="stylesheet" href="../statics/css/perfil.css">

        <title>Perfil</title>
        <title>Perfil de Usuario</title>
    </head>
    
    <body>
        <header> 
            <div id="barra-logos">
                <img src= "../statics/imgs/logo-unam.png" class="logos" alt="logo UNAM">
                <img src="../statics/imgs/logo-prepa6.png" class="logos" alt="logo prepa seis">
                <img src="../statics/imgs/logo-ete.png" class="logos" alt="logo estudios técnicos especializados">
                <a href="../templates/inicio-alumno" id="regresar"> Regresar </a>
            </div>
        </header>
        <?php
            echo "<h1> Bienvenid@ $name </h1>";
        ?> <hr>
        
        <div id="contenedor">
            <h2 class="info-usuario"> Nombre: </h2>
            <?php
            echo "<p> $name </h1>";
            ?> 
            <h2 class="info-usuario"> No. de cuenta: </h2>
            <?php
            echo "<p> $numero-cuenta </h1>";
            ?> 
            <h2 class="info-usuario"> Plantel: </h2>
            <?php
            echo "<p> $plantel </h1>";
            ?> 
            <h2 class="info-usuario"> Grupo ETEC: </h2>
            <?php
            echo "<p> $grupo </h1>";
            ?> 

        </div>
    </body>
</html>