<?php
require_once("../conections/conexion.php");

$nombres_tela = $_POST['nombre_tela'];
$tipo_tela = $_POST['tipo_tela'];
$marca = $_POST['tipo_marca'];
$colr = $_POST['tipo_color'];
$metraje = $_POST['metraje'];


if($nombres_tela === "" || $tipo_tela === "" || $marca === "" || $colr === "" || $metraje === ""){
    echo 3;
   
}else{
    $sql = "INSERT INTO material_textil (NOM_MATERIAL_TEXTIL, ID_TIP_MATE_TEXTIL, ID_MARCA, ID_COLOR, METRAJE) 
    VALUES ('$nombres_tela','$tipo_tela','$marca','$colr','$metraje')";
    $consulta = mysqli_query($connection,$sql);

    if ($consulta){
        echo 1;
    }else{
        echo 2;
    }
   
}

?>