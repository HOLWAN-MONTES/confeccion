<?php
require_once("../../conections/conexion.php");

$sql_maquinaria = "SELECT NOM_MAQUINARIA,COUNT(*) as cantidad FROM maquinaria GROUP BY NOM_MAQUINARIA";
$consulta_maquinaria = mysqli_query($connection,$sql_maquinaria);

foreach($consulta_maquinaria as $cantidad){

    echo('
    
    <p>'.$cantidad["NOM_MAQUINARIA"].' '.$cantidad["cantidad"].'</p>
');
}

?>