<?php
require_once("../conections/conexion.php");

# RECIBIR DATOS DEL FORMULARIO 
$tipo_insumo = $_POST['tip_insumo'];
$nombre_insumo = $_POST['NombreInsumo'];
$marca_insumo = $_POST['marca_insumo'];
$color_insumo = $_POST['color_insumo'];



    $validacion = "SELECT * from insumos where NOM_INSUMOS = '$nombre_insumo'";
    $consul_vali = mysqli_query($connection,$validacion);
    $dato_vali = mysqli_fetch_assoc($consul_vali);
        if ($dato_vali['NOM_INSUMOS'] == $nombre_insumo){
            echo 3;
        }
        else{
             //Hacemos la consulta para que me seleccione los datos en la BD y valide
                $sql = "INSERT INTO insumos (ID_TIPO_INSUMO, NOM_INSUMOS, ID_MARCA, ID_COLOR)  values ($tipo_insumo,'$nombre_insumo',$marca_insumo,$color_insumo)";
                $insertarInsumo = mysqli_query($connection,$sql);

                if ($insertarInsumo){
                    echo 1;
                }else {
                    echo 2;
                }
        }
?>
