<?php
require_once("../conections/conexion.php");

$serial = $_POST['serial'];
$placa_sena = $_POST['placa_sena'];
$nombre_maquina = $_POST['nombre_maqui'];
$estado_maquina =$_POST['estado_maqui'];
$color_maquina = $_POST['color_maqui'];
$marca_maquina = $_POST['marca_maqui'];
$tipo_maquina = $_POST['tipo_maqui'];
$obser_maquina = $_POST['obser_maqui'];


if($serial !== "" && $placa_sena !=="" && $nombre_maquina !== "" && $estado_maquina !== "" && $color_maquina !=="" && $marca_maquina !=="" && $tipo_maquina !==""){  
  
    

    $sql ="INSERT INTO `maquinaria` (`SERIAL_MAQUINARIA`, `PLACA_SENA`, `NOM_MAQUINARIA`, `ID_TIP_MAQUINARIA`, `ID_MARCA`, `ID_COLOR`, `ID_ESTADO`, `OBSERVACIONES`) VALUES ('$serial', '$placa_sena', '$nombre_maquina', '$tipo_maquina', '$marca_maquina', '$color_maquina', '$estado_maquina', '$obser_maquina')";

    $verificar_serial = mysqli_query($connection, "SELECT * FROM maquinaria WHERE SERIAL_MAQUINARIA = $serial");

    if(mysqli_num_rows($verificar_serial) > 0){
       /*  echo '
        <script>
        alert("el serial ya esta creado ");
        </script>
        '; */
        echo 1;
        exit();
    }

    $verificar_placasena = mysqli_query($connection, "SELECT * FROM maquinaria WHERE PLACA_SENA = $placa_sena");

    if(mysqli_num_rows($verificar_placasena) > 0){
        echo '
        <script>
        alert("la placa esta repetida ");
        </script>
        '
        echo 2;
        exit();
    }



    $consul = mysqli_query($connection,$sql);
    
    if($consul){
       echo 3;
    }
    else{
       
        /* echo '
        <script>
        alert(" el serial esta repetido ");
        </script>
        '; */
        echo 4;
    }
  
    
}else{
   /*  /* llene los campos  */
      /* echo '
        <script>
        alert("llene los campos ");
        </script>
        ';  */
    echo 5;
} 


?>