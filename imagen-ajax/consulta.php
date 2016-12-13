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
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody style="background-color: grey; color: black;">
<?php
  while($row = mysql_fetch_array($sql)){
      $doc = $row["documento"];
    echo "      <tr>";
    echo "          <td><b>".$row['nombre']."</b></td>";
    echo "          <td>".$doc."</td>";
    echo "          <td>".$row['email']."</td>";

    if (file_exists('imagenes/'.$doc.'.jpg')){
        echo '          <td ><img src="imagenes/'.$doc.'.jpg"></img>'."</td>";
    }  else if (file_exists('imagenes/'.$doc.'.png')){
        echo '          <td><img src="imagenes/'.$doc.'.png"></img>'."</td>";
    }  else if (file_exists('imagenes/'.$doc.'.jpeg')){
        echo '          <td><img src="imagenes/'.$doc.'.jpeg"></img>'."</td>";
    }  else if (file_exists('imagenes/'.$doc.'.gif')){
        echo '          <td><img src="imagenes/'.$doc.'.gif"></img>'."</td>";
    } else{
        echo '          <td>Sin foto'."</td>";
    }
    echo "          <td>".'<i class="material-icons prefix" onclick="del('.$doc.')">delete</i></td>';    
    echo "      </tr>";
  }
  
  mysql_free_result($sql);
  mysql_close($con);
?>
    </tbody>
</table>