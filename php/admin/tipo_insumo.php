<?php 
require_once("../conections/conexion.php");
$_POST= json_decode(file_get_contents("php://input"),true);

$tip_insumo = $_POST['inpu_tip_ins'];
// var_dump($tip_insumo);

if($tip_insumo !== ""){  
    $verificar_tipoMaqui = mysqli_query($connection, "SELECT * FROM tipo_insumo WHERE NOM_TIP_INSUMO = '$tip_insumo'");
    if(mysqli_num_rows($verificar_tipoMaqui) == 1){
        echo 1;
        exit();
    }
    else if($verificar_tipoMaqui){
        $sql = "INSERT INTO tipo_insumo (NOM_TIP_INSUMO) values('$tip_insumo')";
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


