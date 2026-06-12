<?php
    include 'conexion.php';
    $con=connect();
    $sql="SELECT * FROM grupos";
    $query=mysqli_query($con, $sql);
    $sql2="SELECT * FROM planteles";
    $query2=mysqli_query($con, $sql2);
    $sql3= "SELECT * FROM etes";
    $query3=mysqli_query($con, $sql3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/css/registro_usuarios.css">
    <title>Document</title>
</head>
<body>
    <div class="registro-container">
        <h1>Registro de usuarios</h1>
        <form action="./registro.php" method="post">
            <input type="text" id="username" name="username" placeholder="Ej; 218949218" required><br><br>
            <input type="password" id="password" name="password" placeholder="contraseña" required><br><br>
            <input type="text" id="name" name="name" placeholder="Nombre completo" required><br><br>
            <?php
                echo "<div class='opcion'>";
                    echo "<label for='grupo'>Grupo</label>";
                    echo "<select id='grupo' name='grupo' required>";
                        echo "<option value=''>--Selecciona--</option>";
                        while($grupo=mysqli_fetch_assoc($query))
                        {
                            echo "<option value='" . $grupo['id_grupo'] . "'>" . $grupo['grupo'] . "</option>"; 
                        }
                    echo"</select></div>";
                echo "<div class='opcion'>";
                    echo "<label for='plantel'>Plantel</label>";
                    echo "<select id='plantel' name='plantel' required>";
                        echo "<option value=''>--Selecciona--</option>";
                        while($plantel=mysqli_fetch_assoc($query2))
                        {
                            echo "<option value='" . $plantel['num_plantel'] . "'>" . $plantel['nombre_plantel'] . "</option>"; 
                        }
                    echo"</select></div>";
                echo "<div class='opcion'>";
                    echo "<label for='ete'>ETE</label>";
                    echo "<select id='ete' name='ete' required>";
                        echo "<option value=''>--Selecciona--</option>";
                        while($ete=mysqli_fetch_assoc($query3))
                        {
                            echo "<option value='" . $ete['id_ete'] . "'>" . $ete['nombre_ete'] . "</option>";
                        }
                    echo"</select></div>";

            ?>
            <button type="submit"> Registrar </button>
        </form>
    </div>
</body>
</html>