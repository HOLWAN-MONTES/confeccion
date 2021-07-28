<?php 
require '../conections/conexion.php';
$imprime = $_GET['id'];
// print_r($imprime);
// $consulta = "SELECT DISTINCT detalle_ingreso.ID_INGRE_MATERIAL FROM detalle_ingreso 
//                         WHERE detalle_ingreso.ID_TIP_INGRESO = 3";

//         $consulta_repo_maq = mysqli_query($connection,$consulta);
//         $datos = mysqli_fetch_array($consulta_repo_maq);
//         $data3 = $datos['ID_INGRE_MATERIAL'];
        $cons3 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
                ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                INNER JOIN maquinaria ON detalle_ingreso.SERIAL_MAQUINARIA = MAQUINARIA.SERIAL_MAQUINARIA 
                INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO INNER JOIN empresa 
                ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
                ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 3
                AND detalle_ingreso.ID_INGRE_MATERIAL = '$imprime'";

        $consul3 = mysqli_query($connection, $cons3);
        $dato3 = mysqli_fetch_array($consul3);

        $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 3
                ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
        $consul = mysqli_query($connection, $cons);
        $dato = mysqli_fetch_array($consul);
        $cant_maq = $dato["CANTIDAD_TOTAL"];
            
               
        $consultica3 = "SELECT maquinaria.NOM_MAQUINARIA, tipo_ingreso.NOM_TIP_INGRESO, CANTIDAD,
        bodega.NOM_BODEGA FROM maquinaria, detalle_ingreso, tipo_ingreso, bodega
        WHERE detalle_ingreso.SERIAL_MAQUINARIA = maquinaria.SERIAL_MAQUINARIA AND 
        detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO AND 
        detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA AND detalle_ingreso.ID_TIP_INGRESO = 3
        AND detalle_ingreso.ID_INGRE_MATERIAL = '$imprime'";
        $consu_can3 = mysqli_query($connection, $consultica3);
        $consu3 = mysqli_fetch_array($consu_can3);

        $array = ['dato3' => $dato3, 'dato' => $dato, 'consu3' => $consu3];
        echo json_encode($array);                    
?>
