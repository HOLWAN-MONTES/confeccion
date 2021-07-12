<?php
require_once("../conections/conexion.php");

$instructor = $_POST['responsable'];
$proveedor = $_POST['provedor'];

$sql = "INSERT INTO ingreso_material (ID_INSTRUCTOR,DOCUMENTO_PROVE,FECHA,HORA) values ('$instructor','$proveedor',NOW(),NOW())";
$consulta = mysqli_query($connection,$sql);
if ($consulta){

    $uso = "SELECT * from ingreso_material where ID_INSTRUCTOR = 1005 and DOCUMENTO_PROVE = 382328601 ORDER by ID_INGRESO_MATERIAL DESC LIMIT 1";
    $consul = mysqli_query($connection,$uso);
    $dato = mysqli_fetch_assoc($consul);

    echo ('<input type="hidden" name="responsable" id="" value="'.$dato['ID_INGRESO_MATERIAL'].'">');
}
?>