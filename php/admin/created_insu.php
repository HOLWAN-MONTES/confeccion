<?php
require_once("../conections/conexion.php");

$tipo_insumo = $_POST['tip_insumo'];
$nombre_insumo = $_POST['NombreInsumo'];
$marca_insumo = $_POST['marca_insumo'];
$color_insumo = $_POST['color_insumo'];


if($tipo_insumo === "" || $nombre_insumo === "" || $marca_insumo === "" || $color_insumo === ""){
    echo 2;
}else{
    $cosul_maqui = "SELECT * FROM insumo WHERE NOM_INSUMO = '$nombre_insumo'";
    $confirma = mysqli_query($connection,$cosul_maqui);
    $datos = mysqli_fetch_assoc($confirma);

    if($datos['NOM_INSUMO'] == $nombre_insumo){
        echo 1;
    }
    else{
        $sql = "INSERT INTO insumo (ID_TIP_INSUMO, NOM_INSUMO, ID_MARCA, ID_COLOR)  values ($tipo_insumo,'$nombre_insumo',$marca_insumo,$color_insumo)";
        $insertar = mysqli_query($connection,$sql);
            
        if($insertar){
            echo 3;
        }else{
            echo 2;
        } 
    }
}

?>