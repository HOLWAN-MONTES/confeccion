<?php
session_start();
require '../conections/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $insumos = json_decode($_POST["json"], true);
    // var_dump($insumos[0]);
    // $categoria = $_POST['categorias'];
    // $nom_cate = $_POST['name'];
    // $canti = $_POST['cantidad'];
    $responsable = $insumos[0]['responsable'];
    $proveedor = $insumos[0]['proveedor'];
    $fecha = $insumos[0]['fecha'];
    $hora = $insumos[0]['hora'];
    
    if($insumos == "" and $insumos == 0){
        echo "Efe en la valida";
    }
    else{
    
        $sql = "INSERT INTO ingreso_material(ID_INGRE_MATERIAL, DOCU_PROVEEDOR, DOCU_ADMI, FECHA, HORA) VALUES ('', '$proveedor', '$responsable', '$fecha', '$hora')";
        $consulta = mysqli_query($connection,$sql);
        if($consulta){
            
            $res = array(
                "error"=> false,
                "status"=> http_response_code(200),
                "statusText"=>"Todo esta bien",
            );
            echo json_encode($res);
        }
        else{
            $res = array(
                'err' => true, 
                'status' => http_response_code(500),
                'statusText' => 'Usted no hizo la consulta bien',
            ); 
            echo json_encode($res);
        }
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