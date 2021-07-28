<?php 
require '../conections/conexion.php';
$imprime = $_GET['id'];
    $cons2 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
    ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
    INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
    INNER JOIN insumo ON detalle_ingreso.ID_INSUMO = insumo.ID_INSUMO INNER JOIN usuario 
    ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO INNER JOIN empresa 
    ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
    ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 2
    AND detalle_ingreso.ID_INGRE_MATERIAL = '$imprime'";

    $consul2 = mysqli_query($connection, $cons2);
    $dato2 = mysqli_fetch_array($consul2);

    $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 2 
    ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
    $consul = mysqli_query($connection, $cons);
    $dato = mysqli_fetch_array($consul);
            
               
    $consultica2 = "SELECT insumo.NOM_INSUMO, tipo_ingreso.NOM_TIP_INGRESO, CANTIDAD,
    bodega.NOM_BODEGA FROM insumo, detalle_ingreso, tipo_ingreso, bodega
    WHERE detalle_ingreso.ID_INSUMO = insumo.ID_INSUMO 
    AND detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO AND 
    detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA 
    AND detalle_ingreso.ID_TIP_INGRESO = 2 AND detalle_ingreso.ID_INGRE_MATERIAL = '$imprime'";
    $consu_can2 = mysqli_query($connection, $consultica2);
    $consu2 = mysqli_fetch_array($consu_can2);

        $array = ['dato2' => $dato2, 'dato' => $dato, 'consu2' => $consu2];
        echo json_encode($array);                    
?>
