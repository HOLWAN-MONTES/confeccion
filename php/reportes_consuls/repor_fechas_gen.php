<?php
require '../conections/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $fec_ini = $_GET['fec_ini'];
    $fec_fin = $_GET['fec_fin']; 
    
    $consulta = "SELECT DISTINCT detalle_ingreso.ID_INGRE_MATERIAL FROM detalle_ingreso 
                    INNER JOIN ingreso_material ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                    WHERE FECHA BETWEEN '$fec_ini' AND '$fec_fin'";

    $consulta_repo_maq = mysqli_query($connection,$consulta);
    // $db = mysqli_fetch_array($consulta_repo_maq);
    // print_r($db);
        foreach($consulta_repo_maq as $rep_maq){
            $data3 = $rep_maq['ID_INGRE_MATERIAL'];
            // print_r($data3);
            $cons3 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
                    ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                    INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO 
                    INNER JOIN maquinaria ON detalle_ingreso.SERIAL_MAQUINARIA = MAQUINARIA.SERIAL_MAQUINARIA 
                    INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO INNER JOIN empresa 
                    ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
                    ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA 
                    WHERE FECHA BETWEEN '$fec_ini' AND '$fec_fin' AND detalle_ingreso.ID_INGRE_MATERIAL = '$data3' LIMIT 1";

            $consul3 = mysqli_query($connection, $cons3);
            $dato3 = mysqli_fetch_array($consul3);
            
            echo (' 
            <div class="contentdocumentosotras" id="contentdocumentosotras">
            
                <div class="documentosotras" id="documentosotras">
                    <div>NUM. RECIBO :<p id="ingre_mat">'. $rep_maq["ID_INGRE_MATERIAL"] .'</p></div>
                                            
                    <div>NOMBRE RESPONSABLE:<p>'.$dato3["NOMBRE"].'</p></div>
                    
                    <div>PROVEEDOR :<p style="text-transform: uppercase;">'. $dato3["NOM_EMPLEADO"].'</p></div>
                    
                    <div>FECHA :<p>'. $dato3["FECHA"].'</p></div>
                    
                    <div>HORA :<p>'.$dato3["HORA"].'</p></div>
                    <table>
                                <thead>
                                    <tr>
                                        <td class="tab_rep">TIPO DE INGRESO</td>
                                        <td class="tab_rep">NOMBRE DE MAQUINARIA</td>
                                        <td class="tab_rep">CANTIDAD</td>
                                        <td class="tab_rep">BODEGA</td>
                                        <td class="tab_rep">CANTIDAD TOTAL</td>
                                    </tr>
                                </thead>
            ');
            
            
                $consultica3 = "SELECT maquinaria.NOM_MAQUINARIA, insumo.NOM_INSUMO, material_textil.NOM_MATERIAL_TEXTIL, 
                CANTIDAD, tipo_ingreso.NOM_TIP_INGRESO, bodega.NOM_BODEGA 
                FROM maquinaria, detalle_ingreso, insumo, material_textil, tipo_ingreso, bodega 
                WHERE maquinaria.SERIAL_MAQUINARIA = detalle_ingreso.SERIAL_MAQUINARIA 
                AND insumo.ID_INSUMO = detalle_ingreso.ID_INSUMO AND material_textil.ID_MATERIAL_TEXTIL = detalle_ingreso.ID_MATERIAL_TEXTIL 
                AND detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO AND detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA
                AND detalle_ingreso.ID_INGRE_MATERIAL = '$data3'";
                $consu_can3 = mysqli_query($connection, $consultica3);

                foreach($consu_can3 as $con3){
                    if($con3['NOM_TIP_INGRESO'] == 'Material Textil'){
                        $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 1 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                        $consul = mysqli_query($connection, $cons);
                        $dato = mysqli_fetch_array($consul);
                        $cant_maq = $dato["CANTIDAD_TOTAL"];
            
            echo ('<tbody>
                    <tr class="todo">
                        <td class="tab_rep">'.$con3["NOM_TIP_INGRESO"].'</td>
                        <td class="tab_rep">'.$con3["NOM_MATERIAL_TEXTIL"].'</td>
                        <td class="tab_rep">'.$con3["CANTIDAD"].'</td>
                        <td class="tab_rep">'.$con3["NOM_BODEGA"].'</td>
                        <td class="tab_rep">'.$cant_maq.'</td>
                    </tr>
                </tbody>');
                    }
                    else if($con3['NOM_TIP_INGRESO'] == 'Insumos'){
                        $cons2 = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 2 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                        $consul2 = mysqli_query($connection, $cons2);
                        $dato2 = mysqli_fetch_array($consul2);
                        $cant_maq2 = $dato2["CANTIDAD_TOTAL"];
            
                    echo ('<tbody>
                    <tr class="todo">
                        <td class="tab_rep">'.$con3["NOM_TIP_INGRESO"].'</td>
                        <td class="tab_rep">'.$con3["NOM_INSUMO"].'</td>
                        <td class="tab_rep">'.$con3["CANTIDAD"].'</td>
                        <td class="tab_rep">'.$con3["NOM_BODEGA"].'</td>
                        <td class="tab_rep">'.$cant_maq2.'</td>
                    </tr>
                </tbody>');
                    }
                    else if($con3['NOM_TIP_INGRESO'] == 'Maquinaria'){
                        $cons3 = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 3 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                        $consul3 = mysqli_query($connection, $cons3);
                        $dato3 = mysqli_fetch_array($consul3);
                        $cant_maq3 = $dato3["CANTIDAD_TOTAL"];
                        
                    echo ('<tbody>
                                <tr class="todo">
                                    <td class="tab_rep">'.$con3["NOM_TIP_INGRESO"].'</td>
                                    <td class="tab_rep">'.$con3["NOM_INSUMO"].'</td>
                                    <td class="tab_rep">'.$con3["CANTIDAD"].'</td>
                                    <td class="tab_rep">'.$con3["NOM_BODEGA"].'</td>
                                    <td class="tab_rep">'.$cant_maq3.'</td>
                                </tr>
                            </tbody>');
                    }
                }
        echo('
                </table>
            </div>    
            <div class="contentGeneralBtns">
                <div>
                    <form method="post">
                        <button id="ver_mas" class="ver_mas" data-id="'. $rep_maq["ID_INGRE_MATERIAL"].'">IMPRIMIR REPORTES</button>
                    </form>
                </div>
                
            </div>
        </div>
            
        ');
        
}
}
