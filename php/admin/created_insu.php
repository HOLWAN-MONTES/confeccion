<?php 
require_once("../conections/conexion.php");
$_POST= json_decode(file_get_contents("php://input"),true);

$NombreInsumo = $_POST['nombre_insu'];
$tipo_insumo = $_POST['tipo_insumo'];
$marcas_insumo = $_POST['marcas_insumo'];
$colores_insumo = $_POST['colores_insumo'];


if($tipo_insumo !== "" && $NombreInsumo !== "" && $marcas_insumo !== "" && $colores_insumo !== ""){  
    $verificar_Insumo = mysqli_query($connection, "SELECT * FROM insumo WHERE NOM_INSUMO = (UPPER('$NombreInsumo'))");
    if(mysqli_num_rows($verificar_Insumo) == 1){
        echo 1;
        exit();
    }
    else if($verificar_Insumo){
        $sql = "INSERT INTO insumo (ID_TIP_INSUMO, NOM_INSUMO, ID_MARCA, ID_COLOR) values (UPPER('$tipo_insumo'),UPPER('$NombreInsumo'),UPPER('$marcas_insumo'),UPPER('$colores_insumo'))";
        $consul = mysqli_query($connection,$sql);
        if($consul){
            echo 2;
            exit();
        }
        else{
            echo 3;
            exit();
        }
    }
    
}else{
    echo 4;
    exit();
} 
?>