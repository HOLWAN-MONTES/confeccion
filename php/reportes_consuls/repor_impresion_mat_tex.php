<?php 
require '../conections/conexion.php';
$imprime = $_GET['id'];
    $cons1 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
    ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
    INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
    INNER JOIN material_textil ON detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL 
    INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO 
    INNER JOIN empresa ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
    ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 1
    AND detalle_ingreso.ID_INGRE_MATERIAL = '$imprime'";

    $consul1 = mysqli_query($connection, $cons1);
    $dato1 = mysqli_fetch_array($consul1);

    $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 1 
    ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
    $consul = mysqli_query($connection, $cons);
    $dato = mysqli_fetch_array($consul);
            
               
    $consultica1 = "SELECT material_textil.NOM_MATERIAL_TEXTIL, tipo_ingreso.NOM_TIP_INGRESO, CANTIDAD,
    bodega.NOM_BODEGA FROM material_textil, detalle_ingreso, tipo_ingreso, bodega
    WHERE detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL AND 
    detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO AND detalle_ingreso.ID_TIP_INGRESO = 1
    AND detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA AND detalle_ingreso.ID_INGRE_MATERIAL = '$imprime'";
    $consu_can1 = mysqli_query($connection, $consultica1);
    $consu1 = mysqli_fetch_array($consu_can1);

        $array = ['dato1' => $dato1, 'dato' => $dato, 'consu1' => $consu1];
        echo json_encode($array);                    
?>
