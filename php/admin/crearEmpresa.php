<?php
require_once("../conections/conexion.php");

$nit = $_POST['nit'];
$nombreEMpresa = $_POST['nomEmpresa'];
$razonSocial = $_POST['razonSocial'];
$tipousu = 3;/* tip_us == empresa */
$telefonoEmpre = $_POST['telefonoEmpre'];
$correoEmpre = $_POST['correoEmpre'];

if(filter_var($correoEmpre,FILTER_VALIDATE_EMAIL)){
    echo "esto es un correo";
    /* if(filter_var()) */
}else{
    /* esto no es un correo */
    echo 6;
}


?>


