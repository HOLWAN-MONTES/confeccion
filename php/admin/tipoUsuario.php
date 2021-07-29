<?php
require_once("../conections/conexion.php");

$usu = $_POST["usuario"];

$sql = "SELECT DOCUMENTO,NOMBRE,APELLIDO,tipo_usuario.NOM_TIP_USU as cargo, FECHA_NACIMIENTO,CORREO,tipo_documento.NOM_TIP_DOCU as tipo_docu,FOTO from usuario, tipo_usuario,tipo_documento where usuario.ID_TIP_USU = $usu and usuario.ID_TIP_USU=tipo_usuario.ID_TIP_USU and usuario.ID_TIP_DOCU=tipo_documento.ID_TIP_DOCU ";

$consulta = mysqli_query($connection,$sql);

if ($consulta){
    
    foreach($consulta as $usuario){
        echo ('
        <div class="contenedorFicha">
            <div class="contentImageT">
                <img class="imagenuserT" alt="Sin foto" src="../../imagesUsers/'.$usuario["FOTO"].'">
            </div>
            <div class="documentosotras" >
                <div>DOCUMENTO :<p>'.$usuario["DOCUMENTO"].'</p></div>
                                
                <div>NOMBRE :<p>'.$usuario["NOMBRE"].'</p></div>
                
                <div>APELLIDO :<p>'.$usuario["APELLIDO"].'</p></div>
                
                <div>CARGO :<p>'.$usuario["cargo"].'</p></div>
                
                <div>FECHA DE NACIMIENTO :<p> '.$usuario["FECHA_NACIMIENTO"].'</p></div>
                
                <div>CORREO :<p> '.$usuario["CORREO"].'</p></div>
                
                <div>TIPO DOCUMENTO :<p> '.$usuario["tipo_docu"].'</p></div>
            </div>  
        </div>
        ');
    };
}
?>
