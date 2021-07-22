<?php
require_once("../conections/conexion.php");

$nit = $_POST['nit'];
$nombreEMpresa = $_POST['nomEmpresa'];
$razonSocial = $_POST['razonSocial'];
$tipousu = 3;/* tip_us == empresa */
$telefonoEmpre = $_POST['telefonoEmpre'];
$correoEmpre = $_POST['correoEmpre'];



if($nit !=="" && $nombreEMpresa !=="" && $razonSocial !=="" && $telefonoEmpre !=="" && $correoEmpre !==""){

if(filter_var($correoEmpre,FILTER_VALIDATE_EMAIL)){
    echo "esto es un correo";
    /* if(filter_var()) */
}else{
    /* esto no es un correo */
    echo "esto NOO es un correo";
    echo 6;
}



    
}else{
    /* llene los campos  */
    echo 5;
    echo "LLENE LOS CAMPOS ";
}



?>


