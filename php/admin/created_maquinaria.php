<?php
require_once("../conections/conexion.php");

$serial = $_POST['serial'];
$placa_sena = $_POST['placa_sena'];
$nombre_maquina = $_POST['nombre_maqui'];
$color_maquina = $_POST['color_maqui'];
$marca_maquina = $_POST['marca_maqui'];
$tipo_maquina = $_POST['tipo_maqui'];


if($tipo_maquina === "" || $nombre_maquina === "" || $marca_maquina === "" || $color_maquina === "" || $serial === "" || $placa_sena === ""){
    echo 2;
}else{
    $cosul_maqui = "SELECT * FROM maquinaria WHERE SERIAL_MAQUINARIA = '$serial'";
    $confirma = mysqli_query($connection,$cosul_maqui);
    $datos = mysqli_fetch_assoc($confirma);

    if($datos['NOM_MAQUINARIA'] == $nombre_maquina){
        echo 1;
    }
    else{
        $sql = "INSERT INTO maquinaria (SERIAL_MAQUINARIA, PLACA_SENA, ID_TIP_MAQUINARIA, NOM_MAQUINARIA, ID_MARCA, ID_COLOR)  values ($serial,$placa_sena,$tipo_maquina,'$nombre_maquina',$marca_maquina,$color_maquina)";
        $insertar = mysqli_query($connection,$sql);
            
        if($insertar){
            echo 3;
        }else{
            echo 2;
        } 
    }
}

?>