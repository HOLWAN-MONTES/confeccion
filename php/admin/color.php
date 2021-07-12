<?php 
require_once("../conections/conexion.php");


$in_color = $_POST['reg_color'];

if ($in_color === "") {
    echo 3;
}else{
    $sql = "INSERT INTO color (NOM_COLOR) VALUE ('$in_color')";
    $insertar = mysqli_query($connection,$sql);
    if ($insertar){
        echo 1;
    }else{
        echo 2;
    }

}
