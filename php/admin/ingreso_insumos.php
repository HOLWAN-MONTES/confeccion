<?php
session_start();
require '../conections/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $insumos = json_decode($_POST["json"], true);
   
    $responsable = $insumos[0]['responsable'];
    $proveedor = $insumos[0]['proveedor'];
    $fecha = $insumos[0]['fecha'];
    $hora = $insumos[0]['hora'];
    
    if($insumos == "" && $insumos == 0){
        echo "Efe en la valida";
    }
    else{
        $sql = "INSERT INTO ingreso_material(ID_INGRE_MATERIAL, DOCUMENTO, NIT_DOC, FECHA, HORA) VALUES ('', '$responsable', '$proveedor', '$fecha', '$hora')";
        $consulta = mysqli_query($connection,$sql);
        if($consulta){
            $uso = "SELECT * FROM ingreso_material WHERE DOCUMENTO = '$responsable' AND NIT_DOC = '$proveedor' ORDER BY ID_INGRE_MATERIAL DESC LIMIT 1";
            $consul = mysqli_query($connection, $uso);
            $dato = mysqli_fetch_array($consul);
            $doc_ingre_mat = $dato["ID_INGRE_MATERIAL"];     
            if ($consul){
                foreach($insumos as $insumo){
                    $categoria = $insumo['categorias'];
                    $nom_cate = $insumo['name'];
                    $canti = $insumo['cantidad'];
                    if($categoria == 1){
                        $sql_inser_insumos = "INSERT INTO detalle_ingreso(ID_DETA_INGRESO, ID_INGRE_MATERIAL, 
                        ID_TIP_INGRESO, ID_MATERIAL, CANTIDAD, ID_BODEGA)
                        VALUES ('', '$doc_ingre_mat', '$categoria', '$nom_cate', '$canti', 0)";
                        $cons_inser_insum = mysqli_query($connection,$sql_inser_insumos); 
                        if($cons_inser_insum){
                            $ultimo = "SELECT ID_DETA_INGRESO FROM detalle_ingreso WHERE ID_INGRE_MATERIAL = '$doc_ingre_mat' ORDER BY ID_DETA_INGRESO DESC LIMIT 1";
                            $con_ulti = mysqli_query($connection, $ultimo);
                            $dat_ulti = mysqli_fetch_array($con_ulti);
                            $ulti_arr = $dat_ulti["ID_DETA_INGRESO"];

                            $consult = "SELECT SUM(CANTIDAD) FROM detalle_ingreso WHERE ID_TIP_INGRESO = 1";
                            $total = mysqli_query($connection,$consult);
                            $tot_canti = mysqli_fetch_array($total);
                            $cani_total = $tot_canti[0];

                            $cons_bod = "UPDATE detalle_ingreso SET ID_BODEGA = 1, CANTIDAD_TOTAL = '$cani_total' WHERE ID_DETA_INGRESO = '$ulti_arr'";
                            $consu_bod = mysqli_query($connection,$cons_bod); 
                        }
                    }
                    elseif($categoria == 2){
                        $sql_inser_insumos = "INSERT INTO detalle_ingreso(ID_DETA_INGRESO, ID_INGRE_MATERIAL, 
                        ID_TIP_INGRESO, ID_MATERIAL_TEXTIL, ID_INSUMO, SERIAL_MAQUINARIA, CANTIDAD)
                        VALUES ('', '$doc_ingre_mat', '$categoria', 7, '$nom_cate', 0, '$canti')";

                        $cons_inser_insum = mysqli_query($connection,$sql_inser_insumos); 
                        if($cons_inser_insum){
                            $ultimo = "SELECT ID_DETA_INGRESO FROM detalle_ingreso WHERE ID_INGRE_MATERIAL = '$doc_ingre_mat' ORDER BY ID_DETA_INGRESO DESC LIMIT 1";
                            $con_ulti = mysqli_query($connection, $ultimo);
                            $dat_ulti = mysqli_fetch_array($con_ulti);
                            $ulti_arr = $dat_ulti["ID_DETA_INGRESO"];

                            $consult = "SELECT SUM(CANTIDAD) FROM detalle_ingreso WHERE ID_TIP_INGRESO = 2";
                            $total = mysqli_query($connection,$consult);
                            $tot_canti = mysqli_fetch_array($total);
                            $cani_total = $tot_canti[0];

                            $cons_bod = "UPDATE detalle_ingreso SET ID_BODEGA = 2, CANTIDAD_TOTAL = '$cani_total' WHERE ID_DETA_INGRESO = '$ulti_arr'";
                            $consu_bod = mysqli_query($connection,$cons_bod); 
                        }
                    }
                    elseif($categoria == 3){
                        $sql_inser_insumos = "INSERT INTO detalle_ingreso(ID_DETA_INGRESO, ID_INGRE_MATERIAL, 
                        ID_TIP_INGRESO, ID_MATERIAL_TEXTIL, ID_INSUMO, SERIAL_MAQUINARIA, CANTIDAD)
                        VALUES ('', '$doc_ingre_mat', '$categoria', 7, 7, '$nom_cate', '$canti')";
                        
                        $cons_inser_insum = mysqli_query($connection,$sql_inser_insumos); 
                        if($cons_inser_insum){
                            $ultimo = "SELECT ID_DETA_INGRESO FROM detalle_ingreso WHERE ID_INGRE_MATERIAL = '$doc_ingre_mat' ORDER BY ID_DETA_INGRESO DESC LIMIT 1";
                            $con_ulti = mysqli_query($connection, $ultimo);
                            $dat_ulti = mysqli_fetch_array($con_ulti);
                            $ulti_arr = $dat_ulti["ID_DETA_INGRESO"];

                            $consult = "SELECT SUM(CANTIDAD) FROM detalle_ingreso WHERE ID_TIP_INGRESO = 3";
                            $total = mysqli_query($connection,$consult);
                            $tot_canti = mysqli_fetch_array($total);
                            $cani_total = $tot_canti[0];

                            $cons_bod = "UPDATE detalle_ingreso SET ID_BODEGA = 3, CANTIDAD_TOTAL = '$cani_total' WHERE ID_DETA_INGRESO = '$ulti_arr'";
                            $consu_bod = mysqli_query($connection,$cons_bod); 
                        }
                    }
                    // if ($cons_inser_insum){
                    //     if($categoria == 1){
                    //         $ultimo = "SELECT ID_DETA_INGRESO FROM detalle_ingreso WHERE ID_INGRE_MATERIAL = '$doc_ingre_mat' ORDER BY ID_DETA_INGRESO DESC LIMIT 1";
                    //         $con_ulti = mysqli_query($connection, $ultimo);
                    //         $dat_ulti = mysqli_fetch_array($con_ulti);
                    //         $ulti_arr = $dat_ulti["ID_DETA_INGRESO"];

                    //         $consult = "SELECT SUM(CANTIDAD) FROM detalle_ingreso WHERE ID_TIP_INGRESO = 1";
                    //         $total = mysqli_query($connection,$consult);
                    //         $tot_canti = mysqli_fetch_array($total);
                    //         $cani_total = $tot_canti[0];

                    //         $cons_bod = "UPDATE detalle_ingreso SET ID_BODEGA = 1, CANTIDAD_TOTAL = '$cani_total' WHERE ID_DETA_INGRESO = '$ulti_arr'";
                    //         $consu_bod = mysqli_query($connection,$cons_bod); 
                            
                    //     }
                    //     elseif($categoria == 2){
                    //         $ultimo = "SELECT ID_DETA_INGRESO FROM detalle_ingreso WHERE ID_INGRE_MATERIAL = '$doc_ingre_mat' ORDER BY ID_DETA_INGRESO DESC LIMIT 1";
                    //             $con_ulti = mysqli_query($connection, $ultimo);
                    //             $dat_ulti = mysqli_fetch_array($con_ulti);
                    //             $ulti_arr = $dat_ulti["ID_DETA_INGRESO"];
    
                    //             $consult = "SELECT SUM(CANTIDAD) FROM detalle_ingreso WHERE ID_TIP_INGRESO = 2";
                    //             $total = mysqli_query($connection,$consult);
                    //             $tot_canti = mysqli_fetch_array($total);
                    //             $cani_total = $tot_canti[0];
    
                    //             $cons_bod = "UPDATE detalle_ingreso SET ID_BODEGA = 2, CANTIDAD_TOTAL = '$cani_total' WHERE ID_DETA_INGRESO = '$ulti_arr'";
                    //             $consu_bod = mysqli_query($connection,$cons_bod); 
                    //     }
                    //     elseif($categoria == 3){
                    //         $ultimo = "SELECT ID_DETA_INGRESO FROM detalle_ingreso WHERE ID_INGRE_MATERIAL = '$doc_ingre_mat' ORDER BY ID_DETA_INGRESO DESC LIMIT 1";
                    //             $con_ulti = mysqli_query($connection, $ultimo);
                    //             $dat_ulti = mysqli_fetch_array($con_ulti);
                    //             $ulti_arr = $dat_ulti["ID_DETA_INGRESO"];
    
                    //             $consult = "SELECT SUM(CANTIDAD) FROM detalle_ingreso WHERE ID_TIP_INGRESO = 3";
                    //             $total = mysqli_query($connection,$consult);
                    //             $tot_canti = mysqli_fetch_array($total);
                    //             $cani_total = $tot_canti[0];
    
                    //             $cons_bod = "UPDATE detalle_ingreso SET ID_BODEGA = 3, CANTIDAD_TOTAL = '$cani_total' WHERE ID_DETA_INGRESO = '$ulti_arr'";
                    //             $consu_bod = mysqli_query($connection,$cons_bod); 
                    //     }
                    //     else{

                    //     }  
                    }
                }
            }
            $res = array(
                "error"=> false,
                "status"=> http_response_code(200),
                "statusText"=>"Todo esta bien",
            );
            echo json_encode($res);
        
        // else{
        //     $res = array(
        //         'err' => true, 
        //         'status' => http_response_code(500),
        //         'statusText' => 'Usted no hizo la consulta bien',
        //     ); 
        //     echo json_encode($res);
        // }
    }
    
    
    


    // foreach($insumos as $insumo){
    //     $responsable = $insumo['responsable'];
    //     $proveedor = $insumo['proveedor'];
    //     $fecha = $insumo['fecha'];
    //     $hora = $insumo['hora'];
    //     $categoria = $insumo['categorias'];
    //     $nom_cate = $insumo['name'];
    //     $canti = $insumo['cantidad'];

    //     $sql = "INSERT INTO ingreso_material(ID_INGRE_MATERIAL, DOCU_PROVEEDOR, DOCU_ADMI, FECHA, HORA) VALUES ('', '$proveedor', '$responsable', '$fecha', '$hora')";
    //     $consulta = mysqli_query($connection,$sql);
    //     if($consulta){
    //         $res = array(
    //             "error"=> false,
    //             "status"=> http_response_code(200),
    //             "statusText"=>"Todo esta bien",
    //         );
    //         echo json_encode($res);
    //     }
    //     else{
    //         $res = array(
    //             'err' => true, 
    //             'status' => http_response_code(500),
    //             'statusText' => 'Usted no hizo la consulta bien',
    //         ); 
    //         echo json_encode($res);
    //     }
    //     if($consulta){
    //         echo $sql;
    //     }
    //     echo $responsable;
    // }
}
else {
    echo "Ta vacio";
}