<?php
require '../conections/conexion.php';
session_start();

$responsable = $_SESSION["DOCUMENTO"];
$fecha = $_POST['fecha_dev'];
$hora = $_POST['hora_dev'];
$cat = $_POST['categoria_dev'];
$nombr = $_POST['nombre_dev'];
$cantidad = $_POST['canti_dev'];

$sql_pres = "INSERT INTO devolucion(ID_INSTRUCTOR, FECHA, HORA, CANT_TEXTIL) VALUES('$responsable', '$fecha', '$hora', '$cantidad')";
$query_pres = mysqli_query($connection, $sql_pres);
if($query_pres){
    $sel = "SELECT * FROM devolucion WHERE ID_INSTRUCTOR = '$responsable' ORDER BY ID_PRES_MATE DESC LIMIT 1";
    $inser2 = mysqli_query($connection ,$sel);
    $tip2 = mysqli_fetch_array($inser2);
    $tipp = $tip2['ID_DEVOLUCION'];

    $ins = "SELECT * FROM tipo_material";
    $in_insu = mysqli_query($connection ,$ins);
    $tip_insu = mysqli_fetch_array($in_insu);
    $tip_in = $tip_insu['ID_TIP_MATE'];

    if($tip_in == $cat){
        $sql = "INSERT INTO detalle_devolucion(ID_DEVOLUCION, ID_INSUMOS, CANTIDAD) VALUES ('$tipp', '$nombr', '$cantidad')";
        $query = mysqli_query($connection, $sql);
    }
    $res = array(
        "error"=> false,
        "status"=> http_response_code(200),
        "statusText"=>"Todo esta bien",
        
    );
    echo json_encode($res);
}
