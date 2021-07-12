<?php 
require_once("../conections/conexion.php");


$tip_maquinaria = $_POST['maquina'];

if($tip_maquinaria === ""){
    echo 3;
}else{
    $sql = "INSERT INTO tipo_maquina (NOM_TIP_MAQUINARIA) VALUE ('$tip_maquinaria')";
    $insertar = mysqli_query($connection,$sql);
    if ($insertar){
        echo 1;
    }else{
        echo 2;
    }
}