<?php
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$documento = $_POST['docu'];
$nombre = $_POST['nom'];
$apellido = $_POST['apel'];
$tipo_usuario = $_POST['tip_us_crea'];
$tipo_documento = $_POST['tip_docu'];
$edad = $_POST['EDAD'];
$contra = $_POST['contra'];
$telefono = $_POST["tele"];
$correo = $_POST['cor'];


# RECIBIR FORMATO DE LA FOTO Y GUARDDARLO EN LA CARPETA SELECCIONADA
$foto = $_FILES['imagen'] ['name'];
$ruta = $_FILES['imagen'] ['tmp_name'];
$destino = "../../imagesUsers/".$foto;
copy($ruta,$destino);

$sql = "INSERT INTO usuario (DOCUMENTO, ID_TIPO_DOCU, ID_TIPO_USU, NOMBRE, APELLIDO, PASSWORD, EDAD, TELEFONO, CORREO, FOTO) values ($documento,$tipo_documento,$tipo_usuario,'$nombre','$apellido','$contra',$edad,$telefono,'$correo','$foto')";
$insertar = mysqli_query($connection,$sql);

if ($insertar){
    echo 1;
}else {
    echo 2;
}
?>