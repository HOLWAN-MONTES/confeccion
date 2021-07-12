<?php 
require_once("../conections/conexion.php");

$tela_tex = $_POST['tela_textil'];

#Hacemos la consulta para que me seleccione los datos en la BD y valide
$cosul_tela = "SELECT * FROM tipo_material_textil WHERE NOM_TIP_MATE_TEXTIL = '$tela_tex'";
$confirma = mysqli_query($connection,$cosul_tela);
$datos = mysqli_fetch_assoc($confirma);

if ($datos['NOM_TIP_MATE_TEXTIL'] == $tela_tex) {
    echo 3;
}else{}
// else{
//     $sql = "INSERT INTO tipo_material_textil (NOM_TIP_MATE_TEXTIL) VALUE ('$tela_tex')";
//     $insertar = mysqli_query($connection,$sql);
//     if ($insertar){
//         echo 1;
//     }
//     // }else if($datos['NOM_TIP_MATE_TEXTIL'] = $tela_tex){

//     //     // $consulta = "SELECT * FROM tipo_material_textil WHERE NOM_TIP_MATE_TEXTIL = '$tela_tex'";
//     //     // $rray = $connection->query($consulta);
//     //     // $arreg= $rray->num_rows;
//     //     // if($arreg >= 1){
//     //     //     echo 2;  

//     //     // }else{
//     //     //     echo 3;
//     //     // }

//     // }
//     else{
//         echo 3;
//     }
// }

    