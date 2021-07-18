<?php
require_once("../conections/conexion.php");

$serial = $_POST['serial'];
$placa_sena = $_POST['placa_sena'];
$nombre_maquina = $_POST['nombre_maqui'];
$estado_maquina =$_POST['estado_maqui']
$color_maquina = $_POST['color_maqui'];
$marca_maquina = $_POST['marca_maqui'];
$tipo_maquina = $_POST['tipo_maqui'];
$obser_maquina = $_POST['obser_maqui'];


if($tipo_maquina === "" && $nombre_maquina === "" && $marca_maquina === "" && $color_maquina === "" && $serial === "" && $placa_sena === "" && $estado_maquina === ""){
    
}else{
    $cosul_maqui = "SELECT * FROM maquinaria WHERE SERIAL_MAQUINARIA = '$serial'";
    $confirma = mysqli_query($connection,$cosul_maqui);
    $datos = mysqli_fetch_assoc($confirma);

    if($datos['NOM_MAQUINARIA'] == $nombre_maquina){
        echo 1;
    }
    else{
        $sql = "INSERT INTO maquinaria (SERIAL_MAQUINARIA, PLACA_SENA, ID_TIP_MAQUINARIA, NOM_MAQUINARIA, ID_MARCA, ID_COLOR, ID_ESTADO, OBSERVACIONES)  values ($serial,$placa_sena,$tipo_maquina,'$nombre_maquina',$marca_maquina,$color_maquina,$estado_maquina,'$observaciones')";
        $insertar = mysqli_query($connection,$sql);
            
        if($insertar){
            echo 3;
        }else{
            echo 2;
        } 
    }
}

?>