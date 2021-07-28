<?php 
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO
$marca_insu = $_POST['in_marcaInsu'];

if($marca_insu === ""){
    echo 2;
}else{
    $cosul_marc = "SELECT * FROM marca WHERE NOM_MARCA = '$marca_insu' AND ID_TIP_MARCA = 2";
    $confirma = mysqli_query($connection,$cosul_marc);
    $datos = mysqli_fetch_assoc($confirma);
    
    if($datos['NOM_MARCA'] == $marca_insu && $datos['ID_TIP_MARCA'] == 2){
        echo 1;
    }
    else{
        $sql = "INSERT INTO marca (NOM_MARCA, ID_TIP_MARCA) VALUES('$marca_insu', 2)";
        $agregar = mysqli_query($connection,$sql);
            
        if($agregar){
            echo 3;
        }else{
            echo 2;
        }  
    }
}