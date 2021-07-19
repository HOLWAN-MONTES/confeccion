<?php
require_once("../conections/conexion.php");

$nombres_tela = $_POST['nombre_tela'];
$tipo_tela = $_POST['tipo_tela'];
$marca = $_POST['tipo_marca'];
$color = $_POST['tipo_color'];
$metraje = $_POST['metraje'];


if($nombres_tela !== "" && $tipo_tela !== "" && $marca !== "" && $color !== "" && $metraje !== ""){
    /* vacios por favor llenelos */
    $sql = "INSERT INTO material_textil (ID_MATERIAL_TEXTIL,NOM_MATERIAL_TEXTIL, ID_TIP_MATE_TEXTIL, ID_MARCA, ID_COLOR, METRAJE) 
    VALUES ('','$nombres_tela','$tipo_tela','$marca','$color','$metraje')";
    $consulta = mysqli_query($connection,$sql);
    echo 1;
}else{

   echo 3;
}

?>