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

if($documento !== "" && $nombre !== "" && $apellido !== "" && $tipo_usuario !== "" && $tipo_documento !== ""
&& $edad !== "" && $contra !== "" && $telefono !== "" && $correo !== "" && $foto !== ""){

    $sql = "INSERT INTO usuario (DOCUMENTO, ID_TIP_DOCU, ID_TIP_USU, NOMBRE, APELLIDO, CLAVE, FECHA_NACIMIENTO, CELULAR, CORREO, FOTO) values ('$documento','$tipo_documento','$tipo_usuario','$nombre','$apellido','$contra','$edad','$telefono','$correo','$foto')";
    
    $verificar_celular = mysqli_query($connection, "SELECT * FROM usuario WHERE CELULAR='$telefono'");

    if(mysqli_num_rows($verificar_celular) > 0){
        //verificar que el numero de telefono no este repetido
        echo 1;
        
        exit();
    }
    

    $verificar_correoElec = mysqli_query($connection, "SELECT * FROM usuario WHERE CORREO='$correo'");

    if(mysqli_num_rows($verificar_correoElec) > 0){
        //verificar que el correo no este repetido
        echo 2;

        exit();
    }

    $insertar = mysqli_query($connection,$sql);
    if ($insertar){
        //insertar en la base de datos
        echo 3;
    }else{
        //verificar que el documento no este repetido
        echo 4;
    }
    
}else{
    //llenar los campos que esten vacios
   echo 5; 
}

?>