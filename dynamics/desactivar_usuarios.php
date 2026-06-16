<?php
    
    include 'conexion.php';
    $con = connect();
    $sql="SELECT nocta, nombre, id_activo FROM alumnos";
    $query=mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/css/desactivar.css">
    <title>Desactivar o activar usuarios</title>
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
        <h2>Desactivar usuarios</h2>
        <div class="form">
            <form action="./desactivar.php" method="POST">
                <?php
                    echo "<div class='input'>";
                        echo "<label for='username'>Selecciona el alumno a modificar</label><br>";
                        echo "<select id='username' name='username' required>";
                            echo "<option value=''>--Selecciona--</option>";
                            while($estudiante=mysqli_fetch_assoc($query))
                            {
                                $sql2="SELECT estado FROM usuario_activo WHERE id_usuario_activo=" . $estudiante['id_activo'];
                                $query2=mysqli_query($con, $sql2);
                                $estado=mysqli_fetch_assoc($query2);
                                echo "<option value='" . $estudiante['nocta'] . "'>" . $estudiante['nombre'] . " [" . $estado['estado'] . "]</option>"; 
                            }
                        echo"</select></div>";
                ?>
                <div class="botones">
                    <div><button type="submit" id="boton" name="activacion" value="desactivar"> Desactivar </button></div>
                    <div><button type="submit" id="boton" name="activacion" value="activar"> Activar </button></div>
                </div>
            </form>
        </div>
    </main>
</body>