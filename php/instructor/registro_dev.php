<?php
session_start();
require '../conections/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $devoluciones = json_decode($_POST["json"], true);
    
    $respons = $devoluciones[0]['responsables'];
    $fecha = $devoluciones[0]['fecha'];
    $hora = $devoluciones[0]['hora'];

    if($devoluciones == "" and $devoluciones == 0){
        echo "fallo la validacion";
    }else{
        //consulta para insertar a la tabla accion realizada para la devolucion
        $sql_1 = "INSERT INTO accion_realizada(ID_ACCION_REALIZADA, DOCU_ADMI, DOCU_INSTRUCTOR, FECHA, HORA, ID_ESTADO) VALUES('','','$respons','$fecha','$hora',4)";
        $consulta_1 = mysqli_query($connection,$sql_1);
        if($consulta_1){
            //consulta que se trae el id para insertarla en el detalle de accion
            $verificar = "SELECT * FROM accion_realizada WHERE DOCU_INSTRUCTOR = '$respons' ORDER BY ID_ACCION_REALIZADA DESC LIMIT 1";
            $consul_2 = mysqli_query($connection, $verificar);
            $valida = mysqli_fetch_array($consul_2);
            $det_accion = $valida["ID_ACCION_REALIZADA"];
            if($consul_2){
                //creamos un ciclo
                foreach($devoluciones as $debe){
                    $categ = $debe['categoria'];
                    $nom_categ = $debe['nombres'];
                    $cantd = $debe['cantidad'];

                     //insertamos a la base de datos segun el material y la cantidad
                    $sql_insertar = "INSERT INTO detalle_accion(ID_DETA_ACCION, ID_ACCION_REALIZADA, ID_ACCION, ID_MATERIAL, CANTIDAD)
                                    VALUES ('', '$det_accion', 1, '$nom_categ', '$cantd')";
                    $comprobar = mysqli_query($connection,$sql_insertar);
                    
                    //consulta para traer el id del ultimo detalle de la tabla
                    $final = "SELECT ID_DETA_ACCION FROM detalle_accion WHERE ID_ACCION_REALIZADA = '$det_accion' ORDER BY ID_DETA_ACCION DESC LIMIT 1";
                    $continuar = mysqli_query($connection, $final);
                    $datos_finales = mysqli_fetch_array($continuar);
                    $ultimos = $datos_finales["ID_DETA_ACCION"];

                    //consulta que suma la cantidad del insumo y la suma
                    $consulta_3 = "SELECT SUM(CANTIDAD) FROM detalle_accion WHERE ID_BODEGA = '2'";
                    $total_final = mysqli_query($connection,$consulta_3);
                    $tot_canti = mysqli_fetch_array($total_final);
                    $cand_total = $tot_canti[0] + $cantd;

                     //consulta que edita la tabla para identificar que la devolucion entra a la bodega de insumo
                    $cons_bodega = "UPDATE detalle_accion SET ID_BODEGA = 2, CANTIDAD_TOTAL = '$cand_total' WHERE ID_DETA_ACCION = '$ultimos'";
                    $consul_bodega = mysqli_query($connection,$cons_bodega); 

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
// $fecha = $_POST['fecha_dev'];
// $hora = $_POST['hora_dev'];
// $cat = $_POST['categoria_dev'];
// $nombr = $_POST['nombre_dev'];
// $cantidad = $_POST['canti_dev'];

// $sql_pres = "INSERT INTO devolucion(ID_INSTRUCTOR, FECHA, HORA, CANT_TEXTIL) VALUES('$responsable', '$fecha', '$hora', '$cantidad')";
// $query_pres = mysqli_query($connection, $sql_pres);
// if($query_pres){
//     $sel = "SELECT * FROM devolucion WHERE ID_INSTRUCTOR = '$responsable' ORDER BY ID_PRES_MATE DESC LIMIT 1";
//     $inser2 = mysqli_query($connection ,$sel);
//     $tip2 = mysqli_fetch_array($inser2);
//     $tipp = $tip2['ID_DEVOLUCION'];

//     $ins = "SELECT * FROM tipo_material";
//     $in_insu = mysqli_query($connection ,$ins);
//     $tip_insu = mysqli_fetch_array($in_insu);
//     $tip_in = $tip_insu['ID_TIP_MATE'];

//     if($tip_in == $cat){
//         $sql = "INSERT INTO detalle_devolucion(ID_DEVOLUCION, ID_INSUMOS, CANTIDAD) VALUES ('$tipp', '$nombr', '$cantidad')";
//         $query = mysqli_query($connection, $sql);
//     }
//     $res = array(
//         "error"=> false,
//         "status"=> http_response_code(200),
//         "statusText"=>"Todo esta bien",
        
//     );
//     echo json_encode($res);
// }
