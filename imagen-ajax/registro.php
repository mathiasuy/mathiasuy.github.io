<?php
 //Configuracion de la conexion a base de datos
  $bd_host = "localhost"; 
  $bd_usuario = "root"; 
  $bd_password = ""; 
  $bd_base = "tareaphp"; 
 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con); 
 


//variables POST
  $nombre=$_POST['nombre'];
  $documento=$_POST['documento'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  
//consulta todos los empleados
$consulta = mysql_query("SELECT * FROM Personas where documento=".$documento,$con);
$sql=mysql_num_rows ($consulta);
if ($sql==0){
    //registra los datos del empleados
    $sql="INSERT INTO Personas (nombre, documento, email, pass) VALUES ('$nombre', '$documento', '$email', '$password')";
    mysql_query($sql,$con) or die('Ocurrió un error :( . '.mysql_error());
}else{
    echo 'Ya existe ese documento en la base de datos';
//    if (unlink('imagenes/'.$documento.".jpg"))
//            if (unlink('imagenes/'.$documento.".jpeg"))
//                    if (unlink('imagenes/'.$documento.".gif"))
//                            if (unlink('imagenes/'.$documento.".png"));
        
}
mysql_free_result($consulta);
include('consulta.php');
    

