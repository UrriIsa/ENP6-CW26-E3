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
    <link rel="stylesheet" href="../statics/css/registro.css">
    <title>Document</title>
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
        <h2 class="registro">Registro de usuarios</h2>
        <div class="form">
            <form action="./registro.php" method="post">
                <div class="input">
                    <label for="username">Ingresa número de cuenta:</label><br>
                    <input type="text" id="username" name="username" placeholder="Ej; 218949218" required><br>
                </div>
                <div class="input">
                    <label for="password">Ingresa contraseña:</label><br>
                    <input type="password" id="password" name="password" placeholder="contraseña" required><br>
                </div>
                <div class="input">
                    <label for="name">Ingresa nombre completo:</label><br>
                    <input type="text" id="name" name="name" placeholder="Nombre completo" required><br>
                </div>
                <?php
                    echo "<div class='input'>";
                        echo "<label for='grupo'>Grupo</label><br>";
                        echo "<select id='grupo' name='grupo' required>";
                            echo "<option value=''>--Selecciona--</option>";
                            while($grupo=mysqli_fetch_assoc($query))
                            {
                                echo "<option value='" . $grupo['id_grupo'] . "'>" . $grupo['grupo'] . "</option>"; 
                            }
                        echo"</select></div>";
                    echo "<div class='input'>";
                        echo "<label for='plantel'>Plantel</label><br>";
                        echo "<select id='plantel' name='plantel' required>";
                            echo "<option value=''>--Selecciona--</option>";
                            while($plantel=mysqli_fetch_assoc($query2))
                            {
                                echo "<option value='" . $plantel['num_plantel'] . "'>" . $plantel['nombre_plantel'] . "</option>"; 
                            }
                        echo"</select></div>";
                    echo "<div class='input'>";
                        echo "<label for='ete'>ETE</label><br>";
                        echo "<select id='ete' name='ete' required>";
                            echo "<option value=''>--Selecciona--</option>";
                            while($ete=mysqli_fetch_assoc($query3))
                            {
                                echo "<option value='" . $ete['id_ete'] . "'>" . $ete['nombre_ete'] . "</option>";
                            }
                        echo"</select></div>";

                ?>
                <div class="boton">
                    <div><button type="submit" id="boton"> Registrar </button></div>
                </div>    
            </form>
        </div>
    </main>    
</body>
</html>