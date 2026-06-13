<?php
    include 'conecta.php';
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        $nocta=$_POST["estudiante"];
        $sql="SELECT * FROM formulario WHERE nocta=" . $nocta . ""; // Se cambiará por la query correcta eventualmente
        $query=mysqli_query($conexion, $sql);
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../statics/css/consulta.css">
        <title>Consulta</title>
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
        <main>
            <?php
                if($query) {
                    $lista=mysqli_fetch_assoc($query);
                    echo "<h2>Consulta de " . $lista["id_form"] . "</h2>";
                    echo "<h3>Respuestas del formulario diagnóstico</h3>";
                    echo "<div class='fondo'>";
                        echo "<h4>DATOS PERSONALES</h4>";
                        echo "<div class='seccion'>";
                            echo "<div class='res'><p><span>Nombre:</span>" . $lista['id_form'] . "</p></div>";
                            echo "<div class='res'><p><span>Número de cuenta:</span>" . $lista['nocta'] . "</p></div>";
                            echo "<div class='res'><p><span>Grupo:</span>" . $lista['pa0'] . "</p></div>";
                            echo "<div class='res'><p><span>Turno:</span>" . $lista['turno'] . "</p></div>";
                        echo "</div>";
                        echo "<h4>INFORMACIÓN ACADÉMICA</h4>";
                        echo "<div class='seccion'>";
                            echo "<div class='res'><p><span>Motivo de inscripción:</span>" . $lista['pa1'] . "</p></div>";
                            echo "<div class='res'><p><span>Conocimientos previos:</span>" . $lista['pa2_0'] . "</p></div>";
                            if(isset($lista['pa2_1']))
                            {
                                echo "<div class='res'><p><span>Los cuales son:</span>" . $lista['pa2_1'] . "</p></div>";
                            }
                            $pa3_1=$lista["pa3_1"];
                            $pa3_2=$lista["pa3_2"];
                            if(isset($pa3_1)||isset($pa3_2)) 
                            {
                                echo "<div class='res'><p><span>Actividades extra: </span>" . $lista['pa3_0'] . "</p>";
                                echo "<ul>";
                                if(isset($pa3_1)) 
                                {    
                                    $re_pa3=str_split($pa3_1); // Utilizamos esta función para obtener un arreglo en vez de una string
                                    foreach ($re_pa3 as $pa3)
                                    {
                                        if($pa3 == 1 )
                                            echo "<li>Actividades extracurriculares de la ENP</li>";
                                        else if($pa3 ==2)
                                            echo "<li>Trabajo</li>";
                                        else if($pa3 ==3)
                                            echo "<li>Asignaturas en contraturno</li>";
                                        else if($pa3 ==4)
                                            echo "<li>Otro Estudio Técnico</li>";
                                    }
                                }
                                if(isset($pa3_2))
                                {
                                    echo "<li>Otros: " . $pa3_2 . "</li>";
                                }
                                echo "</ul></div>";    
                            }
                            // echo "<p><span>Actividades extra:</span>" . $lista['pa3_0'] . "</p>";
                            echo "<div class='res'><p><span>Horas: </span>";
                            if($lista['pa4'] == 1){
                                echo"Sí, podré asistir a las 10 horas semanales</p></div>";
                            }
                            else if($lista['pa4']== 2){
                                echo"No, tendré que faltar 1-2 horas a la semana</p></div>";
                            }
                            else if($lista['pa4']== 3){
                                echo"No, tendré que faltar 3-4 horas a la semana</p></div>";
                            }
                            else if($lista['pa4']== 4){
                                echo"No, tendré que faltar más de 4 horas a la semana</p></div>";
                            }
                            echo "<div class='res'><p><span>Grupo demandante: </span>" . $lista['pa5'] . "</p></div>";
                            echo "<div class='res'><p><span>Alumno regular: </span>" . $lista['pa6'] . "</p></div>";
                            if($lista['pa7_0']==1)
                                echo "<div class='res'><p><span>Método de estudio: </span>" . $lista['pa7_1'] . "</p></div>";
                            else
                            {
                                $pa7_2=$lista["pa7_2"];
                                $pa7_4=$lista["pa7_4"];
                                if(isset($pa7_2)||isset($pa7_4)) 
                                {
                                    echo "<div class='res'><p><span>No conoce método de estudio, por lo que hace:</span></p>";
                                    echo "<ul>";
                                    if(isset($pa7_2)) 
                                    {    
                                        $re_pa7=str_split($pa7_2); // Utilizamos esta función para obtener un arreglo en vez de una string
                                        foreach ($re_pa7 as $pa7)
                                        {
                                            if($pa7 == 1 )
                                                echo "<li>Leer</li>";
                                            else if($pa7 ==2)
                                                echo "<li>Memorizar</li>";
                                            else if($pa7 ==3)
                                                echo "<li>Hacer ejercicios</li>";
                                            else if($pa7 ==4)
                                                echo "<li>Material de apoyo</li>";
                                            else if($pa7 ==5)
                                                echo "<li>Cursos</li>";
                                        }
                                    }
                                    if(isset($pa7_4))
                                    {
                                        echo "<li>Otros: " . $pa7_4 . "</li>";
                                    }
                                    echo "</ul></div>";    
                                }
                            }
                            echo "<div class='res'><p><span>Si no llegáse a funcionar el método:</span>" . $lista['pa7_1'] . "</p></div>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
            
        </main>
    </body>
</html>