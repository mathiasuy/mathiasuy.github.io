<?php
 //Configuracion de la conexion a base de datos
    $bd_host = "localhost"; 
    $bd_usuario = "root"; 
    $bd_password = ""; 
    $bd_base = "tareaphp"; 
 
    $con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
    mysql_select_db($bd_base, $con); 
 
    if(isset($_POST['documento'])) {
        //variables POST

        $documento=$_POST['documento'];

        //consulta todos los empleados
        $query = mysql_query("DELETE FROM Personas where documento=".$documento,$con);
        $pathimage = "imagenes/".$documento;
        if ($query){
            if (is_file($pathimage.".jpg"))
            { 
              unlink($pathimage.".jpg");
            }else if (is_file($pathimage.".jpeg"))
            { 
              unlink($pathimage.".jpeg");
            }else if (is_file($pathimage.".gif"))
            { 
              unlink($pathimage.".gif");
            }else if (is_file($pathimage.".png"))
            { 
              unlink($pathimage.".png");
            }
            echo 'Borrado exitosamente';
        }
    }else{
        echo 'No se ha podido borrar el  elemento';
    }
    //mysql_free_result($query);
    mysql_close($con);
    include('consulta.php');
