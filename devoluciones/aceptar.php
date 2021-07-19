<?php
    require_once("../php/conections/conexion.php");
    session_start();

    if(isset($_POST['aceptar'])){

        $id = $_POST['id_deta'];
        echo json_encode("falllllllll");

        // $actualizar="UPDATE accion_realizada SET ID_ESTADO =3 WHERE ID_ACCION_REALIZADA=$id'";
        // $consultaRR = mysqli_query($connection,$actualizar);

        // if($consulta){
        //      json_encode("good");
        // }else{
        
        //     json_encode("f");
            
        // }

    }

?>