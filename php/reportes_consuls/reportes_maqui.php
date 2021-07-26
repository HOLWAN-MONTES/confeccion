<?php
require_once('../conections/conexion.php');

if($_SERVER['REQUEST_METHOD'] == 'GET' ){
    $ingre_mat = $_GET['id'];
    $consultica = "SELECT * FROM detalle_ingreso INNER JOIN tipo_ingreso 
                    ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO INNER JOIN maquinaria
                    ON detalle_ingreso.SERIAL_MAQUINARIA = maquinaria.SERIAL_MAQUINARIA INNER JOIN bodega
                    ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 3
                    AND detalle_ingreso.ID_INGRE_MATERIAL = '$ingre_mat'";
    $query = mysqli_query($connection, $consultica);
    $db = mysqli_fetch_array($query);
    $res;
    if($query){
        $res = array(
            'err' => false, 
            'status' => http_response_code(200),
            'statusText' => 'Usted hizo la consulta bien',
            'data' => $db
        ); 
    }
    else{
        $res = array(
            'err' => true, 
            'status' => http_response_code(200),
            'statusText' => 'Usted no hizo la consulta bien'
        ); 
        
    }
        echo json_encode($res);
}