<?php 
require_once ('../../php/conections/conexion.php');
$_POST= json_decode(file_get_contents("php://input"),true);

$id = $_POST["id"];
$cantidad = $_POST["cantidad"];
$observacion = $_POST["observacion"];



    $total = $canti - intval($cantidad);
    $cons = "UPDATE detalle_accion SET CANTIDAD_TOTAL = CANTIDAD_TOTAL + $cantidad , CANTIDAD = cantidad - $cantidad WHERE ID_DETA_ACCION = '$id'";
    $sec = mysqli_query($connection, $cons);
    
    if ($sec) {
        
       echo 1;
    }else {
        echo 2;
    }
    


?>