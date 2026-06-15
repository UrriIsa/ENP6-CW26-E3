<?php
    session_start();
    // Aquí va la validación del rol del usuario
    $usuario = $_SESSION["username"];
    $rol = $_SESSION["rol"];

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
            <a href="#"> Regresar </a>
        </div>

        </header>
        <div id="contenedor">
                <?php
                    echo "<h1>Hola $usuario.</h1>";
                    echo "<p>Gracias por ser $rol del ETEC</p>";
                ?>
        </div>
    </body>
</html>