<?php 
require_once("../conections/conexion.php");


$tip_insumo = $_POST['Inptipinsu'];

if($tip_insumo !== ""){  
  
    

    $sql = "INSERT INTO tipo_insumo (NOM_TIP_INSUMO) values('$tip_insumo')";
  
    $verificar_tipoMaqui = mysqli_query($connection, "SELECT * FROM tipo_insumo WHERE NOM_TIP_INSUMO = $tip_insumo");
  
    if(mysqli_num_rows($verificar_tipoMaqui) > 0){
    
        echo 1;
        exit();
    }
  
    $consul = mysqli_query($connection,$sql);
    
    if($consul){
       echo 2;
       exit();
    }
    else{
        echo 3;
        exit();
    }
  
    
}else{
    echo 4;
    exit();
  } 

?>


