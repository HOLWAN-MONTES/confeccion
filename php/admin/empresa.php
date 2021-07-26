<?php
require_once("../conections/conexion.php");

$sql = "SELECT * from  empresa";
$consulta = mysqli_query($connection,$sql);

if ($consulta){
    
    foreach($consulta as $empresa){
        echo ('
        <div class="contenedorFichaEmpre">
            
            <div class="documentosotrasEMPRE" >
                <div>NIT de la empresa :<p>'.$empresa["NIT_DOC"].'</p></div>
                                    
                <div>EMPLEADO :<p>'.$empresa["NOM_EMPLEADO"].'</p></div>
                
                <div>NOMBRE DE LA EMPRESA :<p>'.$empresa["NOM_EMPRESA"].'</p></div>
                
                <div>TELEFONO :<p>'.$empresa["TELEFONO"].'</p></div>
                
                <div>CORREO :<p> '.$empresa["COR_EMPR"].'</p></div>
            </div>  
        </div>
        ');
    };
}
?>