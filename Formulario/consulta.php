<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<?php
    include 'datos.php';
    $con = mysqli_connect($bd_host, $bd_usuario, $bd_password, $bd_base);
    
    //consulta todos los empleados
	$sql = $con->query("SELECT * FROM Personas");
    
?>
<table class="table table-bordered table-hover responsive-table">
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
  while($row = $sql->fetch_array()){
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
        echo '          <td><img class="responsive-img"  width="50%" height="50%" src="imagenes/'.$doc.'.gif"></img>'."</td>";
    } else{
        echo '          <td>Sin foto'."</td>";
    }
    echo "          <td>".'<i class="material-icons prefix" onclick="if(confirm(\'¿Realmente desea eliminar el documento '.$doc.'?\')){del('.$doc.')}">delete</i></td>';    
    echo "      </tr>";
  }
  
  //mysqli_free_result($sql);
  //mysqli_close($con);
  error_reporting(E_ALL ^ E_DEPRECATED);
?>
    </tbody>
</table>
