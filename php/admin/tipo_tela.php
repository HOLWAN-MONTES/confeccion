<?php 
require_once("../conections/conexion.php");

$tela_tex = $_POST['tela_textil'];

if($tela_tex === ""){
    echo 2;
}else{
    $cosulta = "SELECT * FROM tipo_material_textil WHERE NOM_TIP_MATE_TEXTIL = '$tela_tex'";
    $confirma = mysqli_query($connection,$cosulta);
    $datos = mysqli_fetch_assoc($confirma);
    
    if($datos['NOM_TIP_MATE_TEXTIL'] == $tela_tex){
        echo 1;
    }
    else{
        $consul = "INSERT INTO tipo_material_textil (NOM_TIP_MATE_TEXTIL) VALUES('$tela_tex')";
        $agregar = mysqli_query($connection,$consul);
            
        if($agregar){
            echo 3;
        }else{
            echo 2;
        } 

    }
}

?>
