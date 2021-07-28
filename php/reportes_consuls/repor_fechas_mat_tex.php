<?php
require '../conections/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $fec_ini = $_GET['fec_ini'];
    $fec_fin = $_GET['fec_fin']; 
    
    $consulta = "SELECT DISTINCT detalle_ingreso.ID_INGRE_MATERIAL FROM detalle_ingreso 
                    INNER JOIN ingreso_material ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                    WHERE detalle_ingreso.ID_TIP_INGRESO = 1 AND FECHA BETWEEN '$fec_ini' AND '$fec_fin'";

    $consulta_repo_maq = mysqli_query($connection,$consulta);
    // $db = mysqli_fetch_array($consulta_repo_maq);
    // print_r($db);
        foreach($consulta_repo_maq as $rep_maq){
            $data1 = $rep_maq['ID_INGRE_MATERIAL'];
            $cons1 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
                    ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                    INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                    INNER JOIN material_textil ON detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL 
                    INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO 
                    INNER JOIN empresa ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
                    ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 1
                    AND FECHA BETWEEN '$fec_ini' AND '$fec_fin' AND detalle_ingreso.ID_INGRE_MATERIAL = '$data1'";

            $consul1 = mysqli_query($connection, $cons1);
            $dato1 = mysqli_fetch_array($consul1);
            // print_r($dato3);

            $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 1 
                        ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
            $consul = mysqli_query($connection, $cons);
            $dato = mysqli_fetch_array($consul);
            $cant_mat = $dato["CANTIDAD_TOTAL"]; 
            
            echo (' 
            <div class="contentdocumentosotras" id="contentdocumentosotras">
            
                <div class="documentosotras" id="documentosotras">
                    <div>NUM. RECIBO :<p id="ingre_mat">'. $rep_maq["ID_INGRE_MATERIAL"] .'</p></div>
                                            
                    <div>NOMBRE RESPONSABLE:<p>'.$dato1["NOMBRE"].'</p></div>
                    
                    <div>PROVEEDOR :<p style="text-transform: uppercase;">'. $dato1["NOM_EMPLEADO"].'</p></div>
                    
                    <div>FECHA :<p>'. $dato1["FECHA"].'</p></div>
                    
                    <div>HORA :<p>'.$dato1["HORA"].'</p></div>
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
            
            
            $consultica1 = "SELECT material_textil.NOM_MATERIAL_TEXTIL, tipo_ingreso.NOM_TIP_INGRESO, CANTIDAD,
            bodega.NOM_BODEGA FROM material_textil, detalle_ingreso, tipo_ingreso, bodega
            WHERE detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL AND 
            detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO AND detalle_ingreso.ID_TIP_INGRESO = 1
            AND detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA AND detalle_ingreso.ID_INGRE_MATERIAL = '$data1'";
            $consu_can1 = mysqli_query($connection, $consultica1);

                foreach($consu_can1 as $con3){
                    
            
            echo ('<tbody>
                    <tr class="todo">
                        <td class="tab_rep">'.$con3["NOM_TIP_INGRESO"].'</td>
                        <td class="tab_rep">'.$con3["NOM_MATERIAL_TEXTIL"].'</td>
                        <td class="tab_rep">'.$con3["CANTIDAD"].'</td>
                        <td class="tab_rep">'.$con3["NOM_BODEGA"].'</td>
                        <td class="tab_rep">'.$cant_mat.'</td>
                    </tr>
                </tbody>');

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
