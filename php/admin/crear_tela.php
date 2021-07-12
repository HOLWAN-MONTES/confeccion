<?php
require_once("../conections/conexion.php");

$nombre_tela = $_POST['nombre_tela'];
$tipo_tela = $_POST['tipo_tela'];
$marca = $_POST['marca'];
$colr = $_POST['color'];

$validacion = "SELECT * from material_textil where NOM_M_TEXTIL = '$nombre_tela' and ID_COLOR = $colr";
$consul_vali = mysqli_query($connection,$validacion);
$dato_vali = mysqli_fetch_assoc($consul_vali);



if ($dato_vali['NOM_M_TEXTIL'] == $nombre_tela) {
    echo "existe";
}else{
    
    $sql = "INSERT INTO material_textil (NOM_M_TEXTIL,ID_TIP_MATE,ID_TIPO_TELA,ID_MARCA,ID_COLOR) values ('$nombre_tela',1,'$tipo_tela','$marca','$colr')";
    $consulta = mysqli_query($connection,$sql);

    if ($consulta) {
        echo 1;
    } else {
        echo 2;
    }
};




?>