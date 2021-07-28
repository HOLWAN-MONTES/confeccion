<?php
require_once("../conections/conexion.php");

$nit = $_POST['nit'];
$nombreEMpresa = $_POST['nomEmpresa'];
$razonSocial = $_POST['razonSocial'];
$tipousu = 3;/* tip_us == empresa */
$telefonoEmpre = $_POST['telefonoEmpre'];
$correoEmpre = $_POST['correoEmpre'];



if($nit !=="" && $nombreEMpresa !=="" && $razonSocial !=="" && $telefonoEmpre !=="" && $correoEmpre !==""){

if(filter_var($correoEmpre,FILTER_VALIDATE_EMAIL)){
    
    
    $sql ="INSERT INTO `empresa` (`NIT_DOC`, `NOM_EMPLEADO`, `ID_TIP_USU`, `NOM_EMPRESA`, `TELEFONO`, `COR_EMPR`) VALUES ('$nit', '$nombreEMpresa', '$tipousu', '$razonSocial', '$telefonoEmpre', '$correoEmpre')";

    $verificar_correo = mysqli_query($connection, "SELECT * FROM empresa WHERE COR_EMPR='$correoEmpre'");

    if(mysqli_num_rows($verificar_correo) > 0){
       /*  echo '
        <script>
        alert("el correo esta repetido envie eso bien ");
        </script>
        '; */
        echo 1;

        exit();
    }

    $verificar_telefono = mysqli_query($connection, "SELECT * FROM empresa WHERE TELEFONO='$telefonoEmpre'");

    if(mysqli_num_rows($verificar_telefono) > 0){
       /*  echo '
        <script>
        alert("el telefono esta repetido envie eso bien ");
        </script>
        '; */
        echo 2;
        exit();
    }



    $consul = mysqli_query($connection,$sql);
    
    if($consul){
       /*  echo "insertado en la db"; */
       echo 3;
    }
    else{
        /* echo "verifica que el nit no este repetido"; */
        echo 4;
    }
  



}else{
    /* esto no es un correo */
   /*  echo "esto NOO es un correo"; */
    echo 6;
}



    
}else{
    /* llene los campos  */
    echo 5;
    /* echo "LLENE LOS CAMPOS "; */
}



?>


