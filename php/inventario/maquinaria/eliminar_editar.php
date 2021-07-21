<?php
require_once("../../conections/conexion.php");
$_POST= json_decode(file_get_contents("php://input"),true);

$accion = $_POST["accion"];


if ($accion == "editar") {
    $identificador = $_POST["identificador"];
    $estado = $_POST["estado"];
    $observacion = $_POST["observacion"];

    if($estado == 5 || $estado == 6 || $estado == 7){

        $sql_editar = "UPDATE maquinaria SET ID_ESTADO = '$estado',OBSERVACIONES='$observacion' where SERIAL_MAQUINARIA = '$identificador'";
        $consulta_editar = mysqli_query($connection,$sql_editar);

        if($consulta_editar){
            echo 1;
        }else{
            echo 2;
        } 

    }else{

        $sql_editar = "UPDATE maquinaria SET OBSERVACIONES='$observacion' where SERIAL_MAQUINARIA = '$identificador'";
        $consulta_editar = mysqli_query($connection,$sql_editar);

        if($consulta_editar){
            echo 1;
        }else{
            echo 2;
        } 

    }
    


}else{
    $identificador = $_POST["identificador"];
    $sql_eliminar = "DELETE from maquinaria where SERIAL_MAQUINARIA = $identificador";
    $consulta_eliminar = mysqli_query($connection,$sql_eliminar);

    if ($consulta_eliminar) {
        echo 1;
    }else {
        echo 2;
    }

}


?>