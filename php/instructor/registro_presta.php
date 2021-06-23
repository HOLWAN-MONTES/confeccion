<?php
require '../conections/conexion.php';
session_start();

$responsable = $_SESSION["DOCUMENTO"];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$cat = $_POST['categoria'];
$nombr = $_POST['nombre'];
$cantidad = $_POST['canti'];

$sql_pres = "INSERT INTO prestamo_material(ID_PRES_MATE, ID_INSTRUCTOR, FECHA, HORA) 
            VALUES('', '$responsable', '$fecha', '$hora')";
$query_pres = mysqli_query($connection, $sql_pres);
if($query_pres){
    $sel = "SELECT * FROM prestamo_material WHERE ID_INSTRUCTOR = '$responsable' ORDER BY ID_PRES_MATE DESC LIMIT 1";
    $inser2 = mysqli_query($connection ,$sel);
    $tip2 = mysqli_fetch_array($inser2);
    $tipp = $tip2['ID_PRES_MATE'];

    $ins = "SELECT * FROM tipo_material";
    $in_insu = mysqli_query($connection ,$ins);
    $tip_insu = mysqli_fetch_array($in_insu);
    $tip_in = $tip_insu['ID_TIP_MATE'];

    if($tip_in == $cat){
        $sql = "INSERT INTO detalle_prestamo(ID_PRES_MATE, ID_MATERIAL_TEXTIL, CANTIDAD_MAT_TEXT) VALUES ('$tipp', '$nombr', '$cantidad')";
        $query = mysqli_query($connection, $sql);
    }
    else{
        $sql = "INSERT INTO detalle_prestamo(ID_PRES_MATE, ID_INSUMOS, CANTIDAD_INSU) VALUES ('$tipp', '$nombr', '$cantidad')";
        $query = mysqli_query($connection, $sql);
    }
}





