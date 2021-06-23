<?php
require_once("../conections/conexion.php");



$categorias = $_POST['categorias'];

if ($categorias == "insumos") {
    
    $sql_insumo ="SELECT ID_INSUMOS,NOM_INSUMOS, color.NOM_COLOR FROM insumos, color WHERE insumos.ID_COLOR=color.ID_COLOR";
    $consulta_insumo = mysqli_query($connection,$sql_insumo);

    foreach ($consulta_insumo as $insumo){

        echo('
            <option value="'.$insumo['ID_INSUMOS'].'">'.$insumo['NOM_INSUMOS'].' '.$insumo['NOM_COLOR'].'</option>
        ');

    }
}elseif($categorias == "material_textil"){

}else {
    echo "fallo"; 
}
?>