<?php

require_once("../../conections/conexion.php");
$_POST= json_decode(file_get_contents("php://input"),true);

$accion = $_POST["accion"];
$identificador = $_POST["identificador"];

$sql_eliminar = "DELETE from insumo where ID_INSUMO = $identificador";
    $consulta_eliminar = mysqli_query($connection,$sql_eliminar);

    if ($consulta_eliminar) {
        echo 1;
    }else {
        echo 2;
    }
?>