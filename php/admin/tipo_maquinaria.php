<?php 
require_once("../conections/conexion.php");


$tip_maquinaria = $_POST['maquina'];

if($tip_maquinaria === ""){
    echo 2;
}else{
    $cosul_maqui = "SELECT * FROM tipo_maquina WHERE NOM_TIP_MAQUINARIA = '$tip_maquinaria'";
    $confirma = mysqli_query($connection,$cosul_maqui);
    $datos = mysqli_fetch_assoc($confirma);

    if($datos['NOM_TIP_MAQUINARIA'] == $tip_maquinaria){
        echo 1;
    }
    else{
        $sql = "INSERT INTO tipo_maquina (NOM_TIP_MAQUINARIA) VALUES('$tip_maquinaria')";
        $insertar = mysqli_query($connection,$sql);
            
        if($insertar){
            echo 3;
        }else{
            echo 2;
        } 
    }
}