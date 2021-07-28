<?php 
require_once ('../../php/conections/conexion.php');

if(isset($_POST['enivar_devol'])){
    $envia = $_POST['cantidad_devolver'];
print_r ($envia);
}
?>