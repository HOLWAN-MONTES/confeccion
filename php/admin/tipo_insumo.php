<?php 
require_once("../conections/conexion.php");


$tip_insumo = $_POST['Inptipinsu'];

if($tip_insumo === ""){
    echo 2;
}else{
    $cosul_maqui = "SELECT * FROM tipo_insumo WHERE NOM_TIP_INSUMO = '$tip_insumo'";
    $confirma = mysqli_query($connection,$cosul_maqui);
    $datos = mysqli_fetch_assoc($confirma);

    if($datos['NOM_TIP_INSUMO'] == $tip_insumo){
        echo 1;
    }
    else{
        $sql = "INSERT INTO tipo_insumo (NOM_TIP_INSUMO) VALUES('$tip_insumo')";
        $insertar = mysqli_query($connection,$sql);
            
        if($insertar){
            echo 3;
        }else{
            echo 2;
        } 
    }
}