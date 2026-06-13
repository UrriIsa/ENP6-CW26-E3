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
    <link rel="stylesheet" href="../statics/css/modificar.css">
    <title>Modificar usuarios</title>
</head>
<body>
    <header>
        <div class="head">
            <div class="head-left">
                <img src="../statics/imgs/logo-unam.png" alt="logo-unam" class="logo-unam" width="10%" height="10%">
                <img src="../statics/imgs/logo-enp6.png" alt="logo-enp6" class="logo-enp6" width="5%" height="5%">
                <h1>Nombre del Proyecto</h1>
            </div>
            <img src="../statics/imgs/perfil.png" alt="foto-perfil" class="perfil" width="10%" height="10%">
        </div>
    </header>
    <nav>
            <a id="boton-nav" href="./admin_general_usuarios.php">Regresar</a>
            <a id="boton-nav" href="./prof-estadisticas.php">Datos estadísticos</a>
            <a id="boton-nav" href="./admin_general_usuarios.php">Administrar usuarios</a>
    </nav>
    <main>
        <h2>Modificar usuarios</h2>
        <div class="form">
            <form action="./modificar.php" method="post">
                <?php
                    echo "<div class='input'>";
                            echo "<label for='username'>Selecciona el alumno a modificar</label><br>";
                            echo "<select id='username' name='username' required>";
                                echo "<option value=''>--Selecciona--</option>";
                                while($estudiante=mysqli_fetch_assoc($query))
                                {
                                    echo "<option value='" . $estudiante['nocta'] . "'>" . $estudiante['nombre'] . "</option>"; 
                                }
                            echo"</select></div>";
                ?>
                <div class="input">
                    <label for="new_username">Ingresa nuevo número de cuenta:</label><br>
                    <input type="text" id="new_username" name="new_username" placeholder="123456789"><br>
                </div>
                <div class="input">
                    <label for="new_password">Ingresa nueva contraseña:</label><br>
                    <input type="password" id="new_password" name="new_password" placeholder="contraseña"><br>
                </div>
                <div class="input">
                    <label for="new_name">Ingresa nuevo nombre completo:</label><br>
                    <input type="text" id="new_name" name="new_name" placeholder="Jaimito Perez"><br>
                </div>
                <?php
                    echo "<div class='input'>";
                            echo "<label for='new_grupo'>Grupo nuevo</label><br>";
                            echo "<select id='new_grupo' name='new_grupo'>";
                                echo "<option value=''>--Selecciona--</option>";
                                while($grupo=mysqli_fetch_assoc($query2))
                                {
                                    echo "<option value='" . $grupo['id_grupo'] . "'>" . $grupo['grupo'] . "</option>"; 
                                }
                            echo"</select></div>";
                    echo "<div class='input'>";
                            echo "<label for='new_plantel'>Nuevo plantel</label><br>";
                            echo "<select id='new_plantel' name='new_plantel'>";
                                echo "<option value=''>--Selecciona--</option>";
                                while($plantel=mysqli_fetch_assoc($query3))
                                {
                                    echo "<option value='" . $plantel['num_plantel'] . "'>" . $plantel['nombre_plantel'] . "</option>"; 
                                }
                            echo"</select></div>";
                    echo "<div class='input'>";
                            echo "<label for='new_ete'>Nuevo ETE</label><br>";
                            echo "<select id='new_ete' name='new_ete'>";
                                echo "<option value=''>--Selecciona--</option>";
                                while($ete=mysqli_fetch_assoc($query4))
                                {
                                    echo "<option value='" . $ete['id_ete'] . "'>" . $ete['nombre_ete'] . "</option>"; 
                                }
                            echo"</select></div>";
                ?>
                <br>
                <div class="boton">
                    <button type="submit" id="boton"> Modificar </button>
                </div>
            </form>
        </div>
    </main>
</body>