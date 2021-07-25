<?php
require_once("../../conections/conexion.php");

$sql_insumo = "SELECT NOM_MATERIAL_TEXTIL, COUNT(*) as cantidad FROM `material_textil` WHERE ID_MATERIAL_TEXTIL != 7 GROUP BY NOM_MATERIAL_TEXTIL";
$consulta_insumo = mysqli_query($connection,$sql_insumo);

foreach($consulta_insumo as $cantidad){

    echo('
    
    <p>'.$cantidad["NOM_MATERIAL_TEXTIL"].' '.$cantidad["cantidad"].'</p>
');
}

?>