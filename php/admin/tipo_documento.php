<?php 
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$nombre = $_POST['tip_docum'];



if($nombre === ""){
    echo 3;
    
}

else{
    $consul = "INSERT INTO tipo_documento (NOM_TIP_DOCU) VALUES('$nombre')";
    $agregar = mysqli_query($connection,$consul);
    if($agregar){
        echo 1;
    
    }else{
        // #Hacemos la consulta para que me seleccione los datos en la BD y valide
        // $cosul_doc = "SELECT * FROM tipo_documento WHERE NOM_TIP_DOCU = '$nombre'";
        // $confirma = mysqli_query($connection,$cosul_doc);
        // $datos = mysqli_fetch_assoc($confirma);
        $consulta = "SELECT * FROM tipo_documento WHERE NOM_TIP_DOCU = '$nombre'";
        $rray = $connection->query($consulta);
        $arreg= $rray->num_rows;
        if($arreg >= 1){
            echo 2;  

        }else{
            echo 3;
        }
    }
    
}

?>