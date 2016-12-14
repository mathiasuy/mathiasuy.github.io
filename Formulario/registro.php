<?php
    include 'datos.php';
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
    }
    mysql_free_result($consulta);
    mysql_close($con);
    include('consulta.php');
    

