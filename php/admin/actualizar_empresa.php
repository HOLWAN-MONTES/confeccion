<?php
require_once("../conections/conexion.php");

$nit = $_POST["nit"];
$nombre_empleado = $_POST["nombre"];
$correo = $_POST["correo"];
$nombre_empresa = $_POST["nom_empresa"];
$telefono = $_POST["telefono"];

$sql = "UPDATE empresa set NOM_EMPLEADO = '$nombre_empleado', COR_EMPR = '$correo', NOM_EMPRESA = '$nombre_empresa', TELEFONO = '$telefono' where NIT_DOC = '$nit'";
$consulta = mysqli_query($connection,$sql);

if ($consulta) {
    
    $sql_empresa = "SELECT * from  empresa";
    $consulta_empresa = mysqli_query($connection,$sql_empresa);

    if ($consulta_empresa){
        
    
        foreach($consulta_empresa as $empresa){
            echo ('
            <div class="contenedorFichaEmpre">
                
                <div class="documentosotrasEMPRE" >
                    <div>NIT de la empresa :<p>'.$empresa["NIT_DOC"].'</p></div>
                                        
                    <div>EMPLEADO :<p>'.$empresa["NOM_EMPLEADO"].'</p></div>
                    
                    <div>NOMBRE DE LA EMPRESA :<p>'.$empresa["NOM_EMPRESA"].'</p></div>
                    
                    <div>TELEFONO :<p>'.$empresa["TELEFONO"].'</p></div>
                    
                    <div>CORREO :<p> '.$empresa["COR_EMPR"].' </p></div>
                    <button class="editar">Editar</button>
                    <button class="eliminar">Eliminar</button>
                </div>  
            </div>
            ');
            
        };
    }
}else {
    echo "error";
}
?>