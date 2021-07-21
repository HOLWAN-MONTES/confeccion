<?php
require_once("../../conections/conexion.php");

$sql_insumo = "SELECT NOM_INSUMO,COUNT(*) as cantidad FROM insumo GROUP BY NOM_INSUMO";
$consulta_insumo = mysqli_query($connection,$sql_insumo);

foreach($consulta_insumo as $cantidad){

    echo('
    
    <p>'.$cantidad["NOM_INSUMO"].' '.$cantidad["cantidad"].'</p>
');
}

?>