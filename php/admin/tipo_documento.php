<?php 
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$tip_doc = $_POST['nom_tipo_docu'];


#Hacemos la consulta para que me seleccione los datos en la BD y valide
$consul = "INSERT INTO tipo_documento (NOM_TIP_DOCU) VALUES('$tip_doc')";
$agregar = mysqli_query($connection,$consul);
if($agregar){
    echo 1;
}else{
    echo 2;
}


// $cosul_doc = "SELECT * FROM tipo_documento WHERE NOM_TIP_DOCU = '$tipo_doc'";
// $ray = $conexion->query($cosul_doc);
// $arre = $ray->num_rows;
// if($arre >= 1){
//     echo 3;
            
// }
// else{
//     echo 4;        
// }




?>