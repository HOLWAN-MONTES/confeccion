<?php 
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$nombre = $_POST['tip_docum'];


#Hacemos la consulta para que me seleccione los datos en la BD y valide

if($nombre === ""){
    echo 3;
    
}else{
    $consul = "INSERT INTO tipo_documento (NOM_TIP_DOCU) VALUES('$nombre')";
    $agregar = mysqli_query($connection,$consul);
    if($agregar){
        echo 1;
    
    }else{
        echo 2;        
    }
    
}


?>