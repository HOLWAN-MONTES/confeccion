<?php
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$documento = $_POST['docu'];
$nombre = $_POST['nom'];
$apellido = $_POST['apel'];
$tipo_usuario = $_POST['tip_us_crea'];
$tipo_documento = $_POST['tip_docu'];
$edad = $_POST['fecha_nacimiento'];
$contra = $_POST['contra'];
$telefono = $_POST["tele"];
$correo = $_POST['cor'];


# RECIBIR FORMATO DE LA FOTO Y GUARDDARLO EN LA CARPETA SELECCIONADA
// if($_FILES['imagen']["error"]>0){
//     echo "error al cargar";
// }
// else{
//     $permitidos = array("image/png", "image/jpg", "image/jpeg")
//     $limite_kb = 200;
//     if(in_array($_FILES["imagen"]["type"], $permitidos) && $_FILES["imagen"]["size"]<= $limite_kb * 1024){
//         $foto = $_FILES['imagen'] ['name'];
//         $ruta = $_FILES['imagen'] ['tmp_name'];
//         $destino = "../../imagesUsers/".$foto;
//         copy($ruta,$destino);
//     }
//     else{
//         echo "archivo no permitido";
//     }
// }

$foto = $_FILES['imagen'] ['name'];
$ruta = $_FILES['imagen'] ['tmp_name'];
$destino = "../../imagesUsers/".$foto;
copy($ruta,$destino);

$sql = "INSERT INTO usuario (DOCUMENTO, ID_TIP_DOCU, ID_TIP_USU, NOMBRE, APELLIDO, CLAVE, FECHA_NACIMIENTO, CELULAR, CORREO, FOTO) values ('$documento','$tipo_documento','$tipo_usuario','$nombre','$apellido','$contra','$edad','$telefono','$correo','$foto')";
$insertar = mysqli_query($connection,$sql);

if ($insertar){
    echo 1;
}else {
    echo 2;
}
?>