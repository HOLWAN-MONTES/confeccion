<?php 
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO
$marca_mate = $_POST['in_marcaTela'];

if($marca_mate === ""){
    echo 2;
}else{
    $cosul_marc = "SELECT * FROM marca WHERE NOM_MARCA = '$marca_mate' AND ID_TIP_MARCA = 1";
    $confirma = mysqli_query($connection,$cosul_marc);
    $datos = mysqli_fetch_assoc($confirma);
    
    if($datos['NOM_MARCA'] == $marca_mate && $datos['ID_TIP_MARCA'] == 1){
        echo 1;
    }
    else{
        $sql = "INSERT INTO marca (NOM_MARCA, ID_TIP_MARCA) VALUES('$marca_mate', 1)";
        $agregar = mysqli_query($connection,$sql);
            
        if($agregar){
            echo 3;
        }else{
            echo 2;
        }  
    }
}