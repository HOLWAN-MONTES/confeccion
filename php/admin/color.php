<?php 
require_once("../conections/conexion.php");


$in_color = $_POST['reg_color'];

if($in_color === ""){
    echo 2;
}else{
    $cosul_color = "SELECT * FROM color WHERE NOM_COLOR = '$in_color'";
    $confirma = mysqli_query($connection,$cosul_color);
    $datos = mysqli_fetch_assoc($confirma);

    if($datos['NOM_COLOR'] == $in_color){
        echo 1;
    }
    else{
        $sql = "INSERT INTO color (NOM_COLOR) VALUES('$in_color')";
        $insertar = mysqli_query($connection,$sql);
            
        if($insertar){
            echo 3;
        }else{
            echo 2;
        }  
    }

}





  