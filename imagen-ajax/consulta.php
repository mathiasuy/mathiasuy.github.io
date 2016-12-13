<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<?php
    //Configuracion de la conexion a base de datos
    $bd_host = "localhost"; 
    $bd_usuario = "root"; 
    $bd_password = ""; 
    $bd_base = "tareaphp"; 

    $con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
    mysql_select_db($bd_base, $con); 

    //consulta todos los empleados
    $sql=mysql_query("SELECT * FROM Personas",$con);
?>
<table class="table table-bordered table-hover">
    <thead style="background-color: cadetblue; color: white">
        <tr>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Email</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody style="background-color: grey; color: black;">
<?php
  while($row = mysql_fetch_array($sql)){
    echo "      <tr>";
    echo "          <td>".$row['nombre']."</td>";
    echo "          <td>".$row['documento']."</td>";
    echo "          <td>".$row['email']."</td>";

    if (file_exists('imagenes/'.$row['documento'].'.jpg')){
        echo '          <td ><img src="imagenes/'.$row['documento'].'.jpg"></img>'."</td>";
    }  else if (file_exists('imagenes/'.$row['documento'].'.png')){
        echo '          <td><img src="imagenes/'.$row['documento'].'.png"></img>'."</td>";
    }  else if (file_exists('imagenes/'.$row['documento'].'.jpeg')){
        echo '          <td><img src="imagenes/'.$row['documento'].'.jpeg"></img>'."</td>";
    }  else if (file_exists('imagenes/'.$row['documento'].'.gif')){
        echo '          <td><img src="imagenes/'.$row['documento'].'.gif"></img>'."</td>";
    } else{
        echo '          <td>Sin foto'."</td>";
    }
    echo "      </tr>";
  }
?>
    </tbody>
</table>