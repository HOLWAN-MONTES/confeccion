<?php
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$documento = $_POST['documento'];
$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$tipo_usuario = $_POST['tip_us_crea'];
$tipo_documento = $_POST['tip_docu'];
$edad = $_POST['fecha_nacimiento'];
$contra = $_POST['contra'];
$telefono = $_POST["telefono"];
$correo = $_POST['correo'];


# RECIBIR FORMATO DE LA FOTO Y GUARDDARLO EN LA CARPETA SELECCIONADA

$foto = $_FILES['imagen'] ['name'];
$ruta = $_FILES['imagen'] ['tmp_name'];
$destino = "../../imagesUsers/".$foto;
copy($ruta,$destino);

if($documento != "" && $nombre != "" && $apellido != "" && $tipo_usuario != "" && $tipo_documento != ""
&& $edad != "" && $contra != "" && $telefono != "" && $correo != "" && $foto != ""){

    $sql = "INSERT INTO usuario (DOCUMENTO, ID_TIP_DOCU, ID_TIP_USU, NOMBRE, APELLIDO, CLAVE, FECHA_NACIMIENTO, CELULAR, CORREO, FOTO) values ('$documento','$tipo_documento','$tipo_usuario','$nombre','$apellido','$contra','$edad','$telefono','$correo','$foto')";
    $insertar = mysqli_query($connection,$sql);
    if ($insertar){
        echo 1;
    }else{
        echo 2;
    }
    
}else{
   echo 3; 
}

?>