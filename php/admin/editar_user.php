<?php
    require '../conections/conexion.php';
    header('Content-Type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $_POST = json_decode(file_get_contents('php://input'), true);
        $docume = $_POST['docum'];
        
        $consul = "SELECT * FROM usuario WHERE DOCUMENTO = '$docume'";
        $query = mysqli_query($connection, $consul);
        if(mysqli_num_rows($query) == 0){
            echo json_encode([
                "err" => true,
                "status" => http_response_code(200),
                "statusText" => "No hay no existe",
                "data" => []
            ]);
        }
        else{
            $file = mysqli_fetch_assoc($query);
            $res; 

            if($file){
                $res = array(
                    'err' => false, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted hizo la consulta bien',
                    'data' => $file
                ); 
            }
            else{
                $res = array(
                    'err' => true, 
                    'status' => http_response_code(200),
                    'statusText' => 'Usted no hizo la consulta bien',
                    'data' => []
                ); 
            }
            echo json_encode($res);
        }
        

    }
    
?>