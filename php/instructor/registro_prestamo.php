<?php
session_start();
require '../conections/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $materiales = json_decode($_POST["json"], true);

    $instructor = $materiales[0]['responsable'];
    $fecha = $materiales[0]['fecha'];
    $hora = $materiales[0]['hora'];

    if($materiales !== ""){
        $sql_1 = "INSERT INTO accion_realizada(ID_ACCION_REALIZADA, DOCU_ADMI, DOCU_INSTRUCTOR, FECHA, HORA, ID_ESTADO) VALUES(NULL, 01,'$instructor','$fecha','$hora',8)";
        $consul_1 = mysqli_query($connection,$sql_1);

        if($consul_1){
         //consulta que se trae el id para insertarla en el detalle de accion
            $verificar = "SELECT * FROM accion_realizada WHERE DOCU_INSTRUCTOR = '$instructor' ORDER BY ID_ACCION_REALIZADA DESC LIMIT 1";
            $consu_2 = mysqli_query($connection, $verificar);
            $valida = mysqli_fetch_array($consu_2);
            $det_accion = $valida["ID_ACCION_REALIZADA"];
            echo ($det_accion);
            if($consu_2){
                foreach($materiales as $mater){
                    $categ = $mater['categorias'];
                    $nom_categ = $mater['names'];
                    $cantd = $mater['cantidad'];
                    
                    if($categ == 1){
                        $sql_inserta = "INSERT INTO detalle_accion(ID_DETA_ACCION, ID_ACCION_REALIZADA, ID_ACCION, ID_INSUMO, ID_MATERIAL_TEXTIL, CANTIDAD)
                                        VALUES (NULL, '$det_accion', 2, 7, '$nom_categ', '$cantd')";
                        $comprobar = mysqli_query($connection, $sql_inserta);

                        if($comprobar){
                            $final = "SELECT ID_DETA_ACCION FROM detalle_accion WHERE ID_ACCION_REALIZADA = '$det_accion' ORDER BY ID_DETA_ACCION DESC LIMIT 1";
                            $continuar = mysqli_query($connection, $final);
                            $datos_finales = mysqli_fetch_array($continuar);
                            $ultimos = $datos_finales["ID_DETA_ACCION"];

                            $sql_total = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_BODEGA = 1 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                            $secuencia = mysqli_query($connection, $sql_total);
                            $dato_total = mysqli_fetch_array($secuencia);
                            $cantidad_total = $dato_total["CANTIDAD_TOTAL"];

                            //consulta que edita la tabla para identificar de que bodega se presta el material
                            $cons_bodega = "UPDATE detalle_accion SET ID_BODEGA = 1, CANTIDAD_TOTAL = '$cantidad_total' WHERE ID_DETA_ACCION = '$ultimos'";
                            $consul_bodega = mysqli_query($connection,$cons_bodega);
                        
                        }
                    }
                    elseif($categ == 2){
                        $sql_inserta = "INSERT INTO detalle_accion(ID_DETA_ACCION, ID_ACCION_REALIZADA, ID_ACCION, ID_INSUMO, ID_MATERIAL_TEXTIL, CANTIDAD)
                        VALUES ('', '$det_accion', 2, '$nom_categ', 7, '$cantd')";
                        $comprobar = mysqli_query($connection, $sql_inserta);

                        if($comprobar){
                            $final = "SELECT ID_DETA_ACCION FROM detalle_accion WHERE ID_ACCION_REALIZADA = '$det_accion' ORDER BY ID_DETA_ACCION DESC LIMIT 1";
                            $continuar = mysqli_query($connection, $final);
                            $datos_finales = mysqli_fetch_array($continuar);
                            $ultimos = $datos_finales["ID_DETA_ACCION"];

                            $sql_total = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_BODEGA = 2 ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                            $secuencia = mysqli_query($connection, $sql_total);
                            $dato_total = mysqli_fetch_array($secuencia);
                            $cantidad_total = $dato_total["CANTIDAD_TOTAL"];

                            //consulta que edita la tabla para identificar de que bodega se presta el material
                            $cons_bodega = "UPDATE detalle_accion SET ID_BODEGA = 2, CANTIDAD_TOTAL = '$cantidad_total' WHERE ID_DETA_ACCION = '$ultimos'";
                            $consul_bodega = mysqli_query($connection,$cons_bodega); 
                        }
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
     

    }else{
        echo "fallooo";
    }

   

}else{
    echo "vacios";
}



