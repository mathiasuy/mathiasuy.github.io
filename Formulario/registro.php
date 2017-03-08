<?php
    include 'datos.php';
    $con = mysqli_connect($bd_host, $bd_usuario, $bd_password, $bd_base);

//variables POST
    $nombre=$_POST['nombre'];
    $documento=$_POST['documento'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    //consulta todos los empleados
    $consulta = $con->query("SELECT * FROM Personas where documento=".$documento);
    $sql=mysqli_num_rows ($consulta);
    if ($sql==0){
        //registra los datos del empleados
        $sql="INSERT INTO Personas (nombre, documento, email, pass) VALUES ('$nombre', '$documento', '$email', '$password')";
        $con->query($sql) or die('Ocurrió un error :( . '.mysqli_error());
    }else{
        echo 'Ya existe ese documento en la base de datos';
    }
    //mysqli_free_result($consulta);
    //mysqli_close($con);
	error_reporting(E_ALL ^ E_DEPRECATED);
    include('consulta.php');
    

