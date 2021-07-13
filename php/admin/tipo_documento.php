<?php 
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$nombre = $_POST['tip_docum'];

if($nombre === ""){
    echo 2;
}else{
    $cosul_doc = "SELECT * FROM tipo_documento WHERE NOM_TIP_DOCU = '$nombre'";
    $confirma = mysqli_query($connection,$cosul_doc);
    $datos = mysqli_fetch_assoc($confirma);

    if($datos['NOM_TIP_DOCU'] == $nombre){
        echo 1;
    }
    else{
        $consul = "INSERT INTO tipo_documento (NOM_TIP_DOCU) VALUES('$nombre')";
        $agregar = mysqli_query($connection,$consul);
            
        if($agregar){
            echo 3;
        }else{
            echo 2;
        } 
    }
}

?>