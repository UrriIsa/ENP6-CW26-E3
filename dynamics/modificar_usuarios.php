<?php
    include 'conexion.php';
    $con=connect();
    $sql="SELECT nocta, nombre FROM alumnos";
    $query=mysqli_query($con, $sql);
    $sql2="SELECT id_grupo, grupo FROM grupos";
    $query2=mysqli_query($con, $sql2);
    $sql3="SELECT * FROM planteles";
    $query3=mysqli_query($con, $sql3);
    $sql4= "SELECT * FROM etes";
    $query4=mysqli_query($con, $sql4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../statics/css/registro_usuarios.css">
    <title>Modificar usuarios</title>
</head>
<body>
    <div class="registro-container">
    <h1>Modificar usuarios</h1>
    <form action="./modificar.php" method="post">
        <?php
            echo "<div class='opcion'>";
                    echo "<label for='username'>Selecciona el alumno a modificar</label>";
                    echo "<select id='username' name='username' required>";
                        echo "<option value=''>--Selecciona--</option>";
                        while($estudiante=mysqli_fetch_assoc($query))
                        {
                            echo "<option value='" . $estudiante['nocta'] . "'>" . $estudiante['nombre'] . "</option>"; 
                        }
                    echo"</select></div>";
        ?>
        <input type="text" id="new_username" name="new_username" placeholder="Nuevo Núm. Cuenta"><br><br>
        <input type="password" id="new_password" name="new_password" placeholder="Nueva contraseña"><br><br>
        <input type="text" id="new_name" name="new_name" placeholder="Nuevo nombre completo"><br><br>
        <?php
            echo "<div class='opcion'>";
                    echo "<label for='new_grupo'>Grupo nuevo</label>";
                    echo "<select id='new_grupo' name='new_grupo'>";
                        echo "<option value=''>--Selecciona--</option>";
                        while($grupo=mysqli_fetch_assoc($query2))
                        {
                            echo "<option value='" . $grupo['id_grupo'] . "'>" . $grupo['grupo'] . "</option>"; 
                        }
                    echo"</select></div>";
            echo "<div class='opcion'>";
                    echo "<label for='new_plantel'>Nuevo plantel</label>";
                    echo "<select id='new_plantel' name='new_plantel'>";
                        echo "<option value=''>--Selecciona--</option>";
                        while($plantel=mysqli_fetch_assoc($query3))
                        {
                            echo "<option value='" . $plantel['num_plantel'] . "'>" . $plantel['nombre_plantel'] . "</option>"; 
                        }
                    echo"</select></div>";
            echo "<div class='opcion'>";
                    echo "<label for='new_ete'>Nuevo ETE</label>";
                    echo "<select id='new_ete' name='new_ete'>";
                        echo "<option value=''>--Selecciona--</option>";
                        while($ete=mysqli_fetch_assoc($query4))
                        {
                            echo "<option value='" . $ete['id_ete'] . "'>" . $ete['nombre_ete'] . "</option>"; 
                        }
                    echo"</select></div>";
        ?>
        <button type="submit"> Modificar </button>
    </form>
    </div>
</body>