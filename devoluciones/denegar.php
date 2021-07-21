<?php
    require_once("../php/conections/conexion.php");
    session_start();

        $id = $_POST['id_detalle'];
        echo ($id);

        $actualizar="UPDATE accion_realizada SET ID_ESTADO =4 WHERE ID_ACCION_REALIZADA=$id";
        $consultaRR = mysqli_query($connection,$actualizar);

        if($consultaRR){
            echo  "<script>alert('devolucion denegada')</script>";
            echo '<script> window.location="devoluciones.php" </script>';
        }else{
        
            echo("f");
            
        }


?>