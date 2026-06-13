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
    <meta name="author" content="Regina Arantza González Hernández">
    <meta name="description" content="Pagina de registro para Orientacion educativa ETEC">
    <link rel="stylesheet" href="../../statics/css/registro_usuarios.css">
    <title>Document</title>
</head>
<body>
    <div class="registro-container">
        <h1>Desactivar usuarios OE ETEC</h1>
        <form action="./desactivar.php" method="POST">
            <?php
                echo "<div class='opcion'>";
                    echo "<label for='username'>Selecciona el alumno a modificar</label>";
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
            <button type="submit" name="activacion" value="desactivar"> Desactivar </button>
            <button type="submit" name="activacion" value="activar"> Activar </button>
        </form>
    </div>
</body>