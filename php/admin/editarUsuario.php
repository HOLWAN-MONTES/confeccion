<?php
require_once("../conections/conexion.php");

    
    $telefono = $_POST['tele_edi'];
    $contra = $_POST['contra_edi'];
    $docume = $_POST['docu'];
    $foto = $_FILES['imagen'] ["name"];
    $ruta = $_FILES["imagen"] ["tmp_name"];
    $destino = "../../imagesUsers/".$foto;
    copy($ruta,$destino);


    $consul = "UPDATE usuario SET CLAVE = '$contra', CELULAR = $telefono, FOTO = '$foto' 
            WHERE DOCUMENTO = '$docume'";
    $query = mysqli_query($connection, $consul);
    
    $res;
    // UPDATE usuario SET usuario.PASSWORD = '54', TELEFONO = 3124124, CORREO = 'oscarllanos.com' WHERE DOCUMENTO = '1007'
    if($query){
        $res = array(
            'err' => false, 
            'status' => http_response_code(200),
            'statusText' => 'Hizo la consulta bien',
            'data' => $query
        );    
    }
    else{
        $res = array(
            'err' => true, 
            'status' => http_response_code(500),
            'statusText' => 'No hizo la consulta bien',
            'data' => []
        ); 
    }
    echo json_encode($res);

?>