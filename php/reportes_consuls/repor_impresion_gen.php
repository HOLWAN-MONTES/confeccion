<?php 
require '../conections/conexion.php';
$imprime = $_GET['id'];
    $cons3 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
    ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
    INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO 
    INNER JOIN material_textil ON detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL 
    INNER JOIN maquinaria ON detalle_ingreso.SERIAL_MAQUINARIA = maquinaria.SERIAL_MAQUINARIA 
    INNER JOIN insumo ON detalle_ingreso.ID_INSUMO = insumo.ID_INSUMO 
    INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO INNER JOIN empresa 
    ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA
    WHERE detalle_ingreso.ID_INGRE_MATERIAL = '$imprime' LIMIT 1";

    $consul3 = mysqli_query($connection, $cons3);
    $dato3 = mysqli_fetch_array($consul3);

    $consultica3 = "SELECT maquinaria.NOM_MAQUINARIA, insumo.NOM_INSUMO, material_textil.NOM_MATERIAL_TEXTIL, 
    CANTIDAD, tipo_ingreso.NOM_TIP_INGRESO, bodega.NOM_BODEGA 
    FROM maquinaria, detalle_ingreso, insumo, material_textil, tipo_ingreso, bodega 
    WHERE maquinaria.SERIAL_MAQUINARIA = detalle_ingreso.SERIAL_MAQUINARIA 
    AND insumo.ID_INSUMO = detalle_ingreso.ID_INSUMO AND material_textil.ID_MATERIAL_TEXTIL = detalle_ingreso.ID_MATERIAL_TEXTIL 
    AND detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO AND detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA
    AND detalle_ingreso.ID_INGRE_MATERIAL = '$imprime'";
    $consu_can3 = mysqli_query($connection, $consultica3);
    $consu3 = mysqli_fetch_array($consu_can3);

    if($consu3['NOM_TIP_INGRESO'] == 'Material Textil'){
        $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 1 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
        $consul = mysqli_query($connection, $cons);
        $dato = mysqli_fetch_array($consul);

        $array = ['dato3' => $dato3, 'dato' => $dato, 'consu3' => $consu3];
        echo json_encode($array);
    }
    else if($consu3['NOM_TIP_INGRESO'] == 'Insumos'){
        $cons2 = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 2 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
        $consul2 = mysqli_query($connection, $cons2);
        $dato2 = mysqli_fetch_array($consul2);
        $cant_maq2 = $dato2["CANTIDAD_TOTAL"];
        $array = ['dato3' => $dato3, 'dato2' => $dato2, 'consu3' => $consu3];
        echo json_encode($array);
    }
    else if($consu3['NOM_TIP_INGRESO'] == 'Maquinaria'){
        $cons33 = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 3 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
        $consul33 = mysqli_query($connection, $cons33);
        $dato33 = mysqli_fetch_array($consul33);
        $cant_maq3 = $dato33["CANTIDAD_TOTAL"];
        $array = ['dato3' => $dato3, 'dato33' => $dato33, 'consu3' => $consu3];
        echo json_encode($array);
    }

                        
?>
