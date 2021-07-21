<?php
session_start();
require '../conections/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $materiales = json_decode($_POST["json"], true);

    $instructor = $materiales[0]['responsable'];
    $fecha = $materiales[0]['fecha'];
    $hora = $materiales[0]['hora'];

    if($materiales == "" and $materiales == 0){
        echo "fallo en validacion";
    }else{
        //consulta para insertar a la tabla accion realizada para el prestamo
        $sql_1 = "INSERT INTO accion_realizada(ID_ACCION_REALIZADA, DOCU_ADMI, DOCU_INSTRUCTOR, FECHA, HORA, ID_ESTADO) VALUES('','','$instructor','$fecha','$hora',4)";
        $consul_1 = mysqli_query($connection,$sql_1);
        if($consul_1){
            //consulta que se trae el id para insertarla en el detalle de accion
            $verificar = "SELECT * FROM accion_realizada WHERE DOCU_INSTRUCTOR = '$instructor' ORDER BY ID_ACCION_REALIZADA DESC LIMIT 1";
            $consu_2 = mysqli_query($connection, $verificar);
            $valida = mysqli_fetch_array($consu_2);
            $det_accion = $valida["ID_ACCION_REALIZADA"];
            if($consu_2){
                //creamos un ciclo 
                foreach($materiales as $mater){
                    $categ = $mater['categorias'];
                    $nom_categ = $mater['names'];
                    $cantd = $mater['cantidad'];

                    //insertamos a la base de datos segun el material y la cantidad
                    $sql_insertar = "INSERT INTO detalle_accion(ID_DETA_ACCION, ID_ACCION_REALIZADA, ID_ACCION, ID_MATERIAL, CANTIDAD)
                                    VALUES ('', '$det_accion', 2, '$nom_categ', '$cantd')";
                    $comprobar = mysqli_query($connection,$sql_insertar);
                   
                    if ($comprobar){
                        if($categ == 1){
                            //consulta para traer el id del ultimo detalle de la tabla
                            $final = "SELECT ID_DETA_ACCION FROM detalle_accion WHERE ID_ACCION_REALIZADA = '$det_accion' ORDER BY ID_DETA_ACCION DESC LIMIT 1";
                            $continuar = mysqli_query($connection, $final);
                            $datos_finales = mysqli_fetch_array($continuar);
                            $ultimos = $datos_finales["ID_DETA_ACCION"];

                            // $sql_total = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_BODEGA = 1 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                            // $secuencia = mysqli_query($connection, $sql_total);
                            // $dato_total = mysqli_fetch_array($secuencia);
                            // $cantidad_total = $dato_total["CANTIDAD_TOTAL"];
                            // $insert_total = $cantidad_total - $cantd; 
                            
                            //consulta que edita la tabla para identificar de que bodega se presta el material
                            $cons_bodega = "UPDATE detalle_accion SET ID_BODEGA = 1 WHERE ID_DETA_ACCION = '$ultimos'";
                            $consul_bodega = mysqli_query($connection,$cons_bodega); 
                               
                        }
                        elseif($categ == 2){
                            //consulta para traer el id del ultimo detalle de la tabla
                            $final = "SELECT ID_DETA_ACCION FROM detalle_accion WHERE ID_ACCION_REALIZADA = '$det_accion' ORDER BY ID_DETA_ACCION DESC LIMIT 1";
                            $continuar = mysqli_query($connection, $final);
                            $datos_finales = mysqli_fetch_array($continuar);
                            $ultimos = $datos_finales["ID_DETA_ACCION"];

                            // $sql_total = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_BODEGA = 2 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                            // $secuencia = mysqli_query($connection, $sql_total);
                            // $dato_total = mysqli_fetch_array($secuencia);
                            // $cantidad_total = $dato_total["CANTIDAD_TOTAL"];
                            // $insert_total = $cantidad_total - $cantd;

                            //consulta que edita la tabla para identificar de que bodega se presta el material
                            $cons_bodega = "UPDATE detalle_accion SET ID_BODEGA = 2 WHERE ID_DETA_ACCION = '$ultimos'";
                            $consul_bodega = mysqli_query($connection,$cons_bodega); 
                           
                        }
                        else{

                        }
                    }

                }
            }
            $respuesta = array(
                "error"=> false,
                "status"=> http_response_code(200),
                "statusText"=>"Todo esta bien",
            );
            echo json_encode($respuesta);

        }
        else{
            $respuesta = array(
                'err' => true, 
                'status' => http_response_code(500),
                'statusText' => 'Usted no hizo la consulta bien',
            ); 
            echo json_encode($respuesta);
        }
    }

}
else{
    echo "vacios";
}








// $responsable = $_SESSION["DOCUMENTO"];
// $fecha = $_POST['fecha'];
// $hora = $_POST['hora'];
// $cat = $_POST['categoria'];
// $nombr = $_POST['nombre'];
// $cantidad = $_POST['canti'];

// $sql_pres = "INSERT INTO prestamo_material(ID_PRES_MATE, ID_INSTRUCTOR, FECHA, HORA) 
//             VALUES('', '$responsable', '$fecha', '$hora')";
// $query_pres = mysqli_query($connection, $sql_pres);
// if($query_pres){
//     $sel = "SELECT * FROM prestamo_material WHERE ID_INSTRUCTOR = '$responsable' ORDER BY ID_PRES_MATE DESC LIMIT 1";
//     $inser2 = mysqli_query($connection ,$sel);
//     $tip2 = mysqli_fetch_array($inser2);
//     $tipp = $tip2['ID_PRES_MATE'];

//     $ins = "SELECT * FROM tipo_material";
//     $in_insu = mysqli_query($connection ,$ins);
//     $tip_insu = mysqli_fetch_array($in_insu);
//     $tip_in = $tip_insu['ID_TIP_MATE'];

//     if($tip_in == $cat){
//         $sql = "INSERT INTO detalle_prestamo(ID_PRES_MATE, ID_MATERIAL_TEXTIL, CANTIDAD_MAT_TEXT) VALUES ('$tipp', '$nombr', '$cantidad')";
//         $query = mysqli_query($connection, $sql);
//     }
//     else{
//         $sql = "INSERT INTO detalle_prestamo(ID_PRES_MATE, ID_INSUMOS, CANTIDAD_INSU) VALUES ('$tipp', '$nombr', '$cantidad')";
//         $query = mysqli_query($connection, $sql);
//     }
//     $res = array(
//         "error"=> false,
//         "status"=> http_response_code(200),
//         "statusText"=>"Todo esta bien",
        
//     );
//     echo json_encode($res);
// }





