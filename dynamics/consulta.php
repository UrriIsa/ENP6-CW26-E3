<?php
    include 'conecta.php';
    echo $_POST["estudiante"];
        echo "a";
        $nocta=$_POST["estudiante"];
        $sql="SELECT * FROM alumnos WHERE nocta=" . $nocta . ""; // Se cambiará por la query correcta eventualmente
        $query=mysqli_query($conexion, $sql);
        if($query) 
        {
            while($lista=mysqli_fetch_assoc($query))
            {  
                foreach($lista as $lis)
                {
                    echo $lis;
                }
            }
        }
?>