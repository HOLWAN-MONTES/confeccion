<?php
require_once("../conections/conexion.php");

$serial = $_POST['serial'];
$placa_sena = $_POST['placa_sena'];
$nombre_maquina = $_POST['nombre_maqui'];
$estado_maquina =$_POST['estado_maqui'];
$color_maquina = $_POST['color_maqui'];
$marca_maquina = $_POST['marca_maqui'];
$tipo_maquina = $_POST['tipo_maqui'];
$obser_maquina = $_POST['obser_maqui'];


if($serial !== "" && $placa_sena !=="" && $nombre_maquina !== "" && $estado_maquina !== "" && $color_maquina !=="" && $marca_maquina !=="" && $tipo_maquina !==""){  
   
    $sql ="INSERT INTO `maquinaria` (`SERIAL_MAQUINARIA`, `PLACA_SENA`, `NOM_MAQUINARIA`, `ID_TIP_MAQUINARIA`, `ID_MARCA`, `ID_COLOR`, `ID_ESTADO`, `OBSERVACIONES`) VALUES ('$serial', '$placa_sena', '$nombre_maquina', '$tipo_maquina', '$marca_maquina', '$color_maquina', '$estado_maquina', '$obser_maquina')";
    $consulta = mysqli_query($connection,$sql);     
    if($consulta){
        echo 3; 
    }else{
        echo 4;
    }

    
    
}else{
 echo 2;
}

?>