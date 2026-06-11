<?php
    session_start();
    // Aquí va la validación del rol del usuario
    $usuario = $_SESSION["usuario"];
    $nombre = $_SESSION["nombre_completo"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perfil</title>
</head>
<body>
<?php
include 'dynamics/header.php';
?>

<div id="contenedor">
    <?php
    include "dynamics/sidebar_usu.php";
    ?>
    <main id="contenido-principal">
        <?php
            echo "<h1>Saludos, querid@ $nombre.</h1>"
        ?>
    </main>
</div>
</body>
</html>