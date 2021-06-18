<?php
# LLAMAMOS AL ARCHIVO DONDE TENEMOS LA CONEXION 
require_once("../conections/conexion.php");
# PROCEDEMOS A TRAER EL VALOR DEL INPUT
$nombre = $_POST['nombre_tip_usu'];
# INSERTA EN LA BASE DE DATOS
$sql = "INSERT INTO tipo_usu (NOM_TIPO_USU) values ('$nombre')";
$insertar = mysqli_query($connection,$sql);

# VALIDAR SI SE HIZO LA CONSULTA
if ($insertar) {
    echo 1;
}else {
    echo 2;
}
?>