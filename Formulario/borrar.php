<?php
    include 'datos.php';
    $con = mysqli_connect($bd_host, $bd_usuario, $bd_password, $bd_base); 
     
    if(isset($_POST['documento'])) {
        //variables POST

        $documento=$_POST['documento'];

        //consulta todos los empleados
        $query = $con->query("DELETE FROM Personas where documento=".$documento);
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
            echo $documento.' borrado exitosamente';
        }
    }else{
        echo 'No se ha podido borrar el  elemento';
    }
    //mysql_free_result($query);
    //mysqli_close($con);
	error_reporting(E_ALL ^ E_DEPRECATED);
    include('consulta.php');
