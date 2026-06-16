<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    include 'conecta.php';
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        // $nombre = $_POST["nombre"];


                // $conexion
        // separamos claves (columnas) y valores
        $columnas = array_keys($_POST) ; 
        $valores = array_values($_POST) ;
        $nombres_columnas = implode (', ', $columnas) ;
        // grupo, nombre, nocta, ....
        $valores_escapados = array_map(function($v) use ($conexion){
            if(is_array($v)) {
                return "'" . mysqli_real_escape_string($conexion, implode(', ', $v)) . "'";
            } else {
                return "'" . mysqli_real_escape_string($conexion, $v) . "'";
            }
        } , $valores) ;
        // mysql_escape_string($v)
        //
        $valores_cadena = implode(", ", $valores_escapados); 
        
        try
        {
            $sql = "INSERT INTO formulario ($nombres_columnas) VALUES ($valores_cadena)" ;
            $resultado = mysqli_query($conexion, $sql);
?>
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../statics/css/form-diagnos.css">
                    <title>Formulario Diagnóstico - MetETE a estudiar</title>
                </head>
                <body>
                    <header>
                        <!--agregue un div y un class-->
                        <div class="head">
                            <!--logo de la enp6 y unam y titulo del sitio-->
                            <div class="head-left">
                                <img src="../statics/imgs/logo-unam.png" alt="logo-unam" class="logo-unam" width="10%" height="10%">
                                <img src="../statics/imgs/logo-enp6.png" alt="logo-enp6" class="logo-enp6" width="5%" height="5%">
                                <h1>MetETE a estudiar</h1>
                            </div>
                            <!--Foto de perfil-->
                            <img src="../statics/imgs/perfil.png" alt="foto-perfil" class="perfil" width="10%" height="10%">
                        </div>
                    </header>
                    <main>
                        <h2>¡Datos insertados correctamente!</h2>
                        <h3><a href="../templates/inicio-alumno.html">Regresar</a></h3>
                    </main>
                </body>
            </html>
<?php
        } catch(mysqli_sql_exception $e)
        {            
?>     
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../statics/css/form-diagnos.css">
                    <title>Formulario Diagnóstico - MetETE a estudiar</title>
                </head>
                <body>
                    <header>
                        <!--agregue un div y un class-->
                        <div class="head">
                            <!--logo de la enp6 y unam y titulo del sitio-->
                            <div class="head-left">
                                <img src="../statics/imgs/logo-unam.png" alt="logo-unam" class="logo-unam" width="10%" height="10%">
                                <img src="../statics/imgs/logo-enp6.png" alt="logo-enp6" class="logo-enp6" width="5%" height="5%">
                                <h1>MetETE a estudiar</h1>
                            </div>
                            <!--Foto de perfil-->
                            <img src="../statics/imgs/perfil.png" alt="foto-perfil" class="perfil" width="10%" height="10%">
                        </div>
                    </header>
                    <main>
                        <h2>Error al insertar los datos</h2>
                        <h3><a href="../templates/inicio-alumno.html">Regresar</a></h3>
                        <p>Verifica que hayas iniciado sesión e ingresado todo correctamente</p>
                    </main>
                </body>
            </html>
<?php
        }
        
    }
?>