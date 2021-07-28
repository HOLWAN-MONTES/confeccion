<?php 
require_once ('../../php/conections/conexion.php');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $envia = $_GET['id'];
    $can = $_GET['cant'];
    $canti = intval($can);
    echo($can);
    print_r($envia);
    $sql_total = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_BODEGA = 2 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
    $secuencia = mysqli_query($connection, $sql_total);
    $dato_total = mysqli_fetch_array($secuencia);
    $cantidad_total = $dato_total["CANTIDAD_TOTAL"];

    if($secuencia){
        $total = $canti - intval($envia);
        $cons = "UPDATE detalle_accion SET CANTIDAD_TOTAL = CANTIDAD_TOTAL + '$envia', CANTIDAD = '$total'";
        $sec = mysqli_query($connection, $cons);
        
    }
}

?>