<?php
if (isset($_FILES["file"]))
{
    $nombre             = $_GET["documento"];
    $tipo               = $_FILES["file"]["type"];
    $ruta_provisional   = $_FILES["file"]["tmp_name"];
    $carpeta            = "imagenes/";
    
    switch ($tipo){
        case 'image/jpg' : $tipo = ".jpg"; break;
        case 'image/jpeg': $tipo = ".jpeg"; break; 
        case 'image/png' : $tipo = ".png"; break;
        case 'image/gif' : $tipo = ".gif"; break;
    }
    
    $src = $carpeta.$nombre.$tipo;
    move_uploaded_file($ruta_provisional, $src);
}