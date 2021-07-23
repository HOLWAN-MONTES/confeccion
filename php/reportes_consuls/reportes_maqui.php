<?php
require_once('../conections/conexion.php');

// if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $_POST = json_decode(file_get_contents('php://input'), true);
    $ingre_mat = $_POST['ingre_mat'];

    $consultica = "SELECT * FROM detalle_ingreso";
    $cons = mysqli_query($connection, $consultica);
    $db = mysqli_fetch_array($cons);

    $insu = $db['ID_INSUMO'];
    echo $insu;
    $mat_textil = $db['ID_MATERIAL_TEXTIL'];
    echo $mat_textil;
    $maqui = $db['SERIAL_MAQUINARIA'];
    echo $maqui;
    if($cons){
        // echo "Nmms si fuciono";
        if($maqui != 0 AND $insu === 7 AND $mat_textil === 7){
            echo "Nmms si fuciono x2";
            $consul = "SELECT * FROM detalle_ingreso INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                        INNER JOIN maquinaria ON detalle_ingreso.SERIAL_MAQUINARIA = maquinaria.SERIAL_MAQUINARIA 
                        WHERE detalle_ingreso.ID_INGRE_MATERIAL = '$ingre_mat'";

            $query = mysqli_query($connection, $consul);
            $dato = mysqli_fetch_array($query);
            if($query){
            echo ('
                <div>TIPO DE INGRESO :<p>'.$dato["NOM_TIP_INGRESO"].'</p></div>
                
                <div>MAQUINARIA :<p>'.$dato["NOM_MAQUINARIA"].'</p></div>
            ');
            }
            $res;
            if($query){
                $res = array(
                    'err' => false, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted hizo la consulta bien',
                    'data' => $query
                ); 
                echo json_encode($res); 
            }
            else{
                $res = array(
                    'err' => true, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted no hizo la consulta bien'
                ); 
            }
            echo json_encode($res);

        }
        elseif($mat_textil != 7 AND $insu === 7 AND $maqui === 0){
            echo "Nmms si fuciono x3";
            $consul = "SELECT * FROM detalle_ingreso INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                        INNER JOIN material_textil ON detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL
                        WHERE detalle_ingreso.ID_INGRE_MATERIAL = '$ingre_mat'";
            $query = mysqli_query($connection, $consul);
            $dato = mysqli_fetch_array($query);
            if($query){
                echo ('
                    <div>TIPO DE INGRESO :<p>'.$dato["NOM_TIP_INGRESO"].'</p></div>
                    
                    <div>MATERIAL TEXTIL :<p>'.$dato["NOM_MATERIAL_TEXTIL"].'</p></div>
                ');
            }
            $res;
            if($query){
                $res = array(
                    'err' => false, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted hizo la consulta bien',
                    'data' => $query
                ); 
                echo json_encode($res); 
            }
            else{
                $res = array(
                    'err' => true, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted no hizo la consulta bien'
                ); 
            }
            echo json_encode($res);

        }
        elseif($insu != 7 AND $mat_textil === 7 AND $maqui === 0){
            echo "Nmms si fuciono x4";
            $consul = "SELECT * FROM detalle_ingreso INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                        INNER JOIN insumo ON detalle_ingreso.ID_INSUMO = insumo.ID_INSUMO 
                        WHERE detalle_ingreso.ID_INGRE_MATERIAL = '$ingre_mat'";
            $query = mysqli_query($connection, $consul);
            $dato = mysqli_fetch_array($query);
            if($query){
            echo ('
                <div>TIPO DE INGRESO :<p>'.$dato["NOM_TIP_INGRESO"].'</p></div>
    
                <div>INSUMO :<p>'.$dato["NOM_INSUMO"].'</p></div>
            ');
            }
            $res;
            if($query){
                $res = array(
                    'err' => false, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted hizo la consulta bien',
                    'data' => $query
                ); 
                echo json_encode($res); 
            }
            else{
                $res = array(
                    'err' => true, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted no hizo la consulta bien'
                ); 
            }
            echo json_encode($res);

        }    
        elseif($mat_textil != 7 AND $maqui != 0 AND $insu != 7){
            // echo "Nmms si fuciono x5";
            $consul = "SELECT * FROM detalle_ingreso INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                        INNER JOIN insumo ON detalle_ingreso.ID_INSUMO = insumo.ID_INSUMO INNER JOIN material_textil
                        ON detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL INNER JOIN maquinaria
                        ON detalle_ingreso.SERIAL_MAQUINARIA = maquinaria.SERIAL_MAQUINARIA 
                        WHERE detalle_ingreso.ID_INGRE_MATERIAL = '$ingre_mat'";
    
            $query = mysqli_query($connection, $consul);
            $dato = mysqli_fetch_array($query);
            if($query){
            echo ('
                <div class="documentosotras" >
                    <div>TIPO DE INGRESO :<p>'.$dato["NOM_TIP_INGRESO"].'</p></div>
        
                    <div>INSUMO :<p>'.$dato["NOM_INSUMO"].'</p></div>
                                    
                    <div>MATERIAL TEXTIL :<p>'.$dato["NOM_MATERIAL_TEXTIL"].'</p></div>
                    
                    <div>MAQUINARIA :<p>'.$dato["NOM_MAQUINARIA"].'</p></div>
                </div>  
            ');
            }

            $res;
            if($query){
                $res = array(
                    'err' => false, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted hizo la consulta bien',
                    'data' => $query
                ); 
                echo json_encode($res); 
            }
            else{
                $res = array(
                    'err' => true, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted no hizo la consulta bien'
                ); 
            }
            echo json_encode($res);

        }
        else{
            echo "No cogio una mano";
        }
    }
    
// }


