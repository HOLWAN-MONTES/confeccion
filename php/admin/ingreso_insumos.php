<?php
session_start();
require '../conections/conexion.php';
// $responsable = $_SESSION["DOCUMENTO"];  
$insumos = json_decode($_POST["json"], true);

$responsable -> {'responsable'};
$proveedor -> {'proveedor'};
$fecha -> {'fecha'};
$hora -> {'hora'};
$categoria -> {'categorias'};
$nom_cate -> {'name'};
$canti -> {'cantidad'};

if($insumos == "" and $insumos == 0){
    echo "Efe en la valida";
}
else{
    echo $responsable;
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
    // if($consulta){
    //     echo $sql;
    // }
    // echo $responsable;
// }

// header('Content-Type: application/json');
//     if($_SERVER['REQUEST_METHOD'] == 'POST'){
//         $_POST = json_decode(file_get_contents('php://input'), true);
        
//         
//         $docume = $_POST['docum'];
        
//         $consul = "SELECT * FROM usuario WHERE DOCUMENTO = '$docume'";
//         $query = mysqli_query($connection, $consul);
//         if(mysqli_num_rows($query) == 0){
//             echo json_encode([
//                 "err" => true,
//                 "status" => http_response_code(200),
//                 "statusText" => "No hay no existe",
//                 "data" => []
//             ]);
//         }
//         else{
//             $file = mysqli_fetch_assoc($query);
//             $res; 

//             if($file){
//                 $res = array(
//                     'err' => false, 
//                     'status' => http_response_code(200),
//                     'statusText' => 'Usted hizo la consulta bien',
//                     'data' => $file
//                 ); 
//             }
//             else{
//                 $res = array(
//                     'err' => true, 
//                     'status' => http_response_code(200),
//                     'statusText' => 'Usted no hizo la consulta bien',
//                     'data' => []
//                 ); 
//             }
//             echo json_encode($res);
//         }
        

//     }



