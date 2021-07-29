<?php
require_once("../conections/conexion.php");

$_POST= json_decode(file_get_contents("php://input"),true);

$id = $_POST["documento"];
$accion = $_POST["accion"];

if ($accion == "editar") {
    
    $sql="SELECT * from empresa where NIT_DOC = $id";
    $consulta = mysqli_query($connection,$sql);
    $dato = mysqli_fetch_assoc($consulta);

    echo('
    <form action="" method="post">
        <input type="hidden" name="nit" value="'.$id.'">
        <label for="">Nombre del empleado</label><br>
        <input type="text" name="nombre" id="" value="'.$dato["NOM_EMPLEADO"].'"><br>
        <label for="">Correo</label><br>
        <input type="email" name="correo" id="" value="'.$dato["COR_EMPR"].'"><br>
        <label for="">Nombre de la empresa</label><br>
        <input type="text" name="nom_empresa" id="" value="'.$dato["NOM_EMPRESA"].'"><br>
        <label for="">Telefono</label><br>
        <input type="number" name="telefono" id="" value="'.$dato["TELEFONO"].'"><br>
        <button id="btn_actualizar_empresa">Actualizar</button><br>
        <button id="btn_cerrar_empresa">Cerrar</button>

    </form>
    
    ');


} else if ($accion == "eliminar"){

    $sql = "DELETE from empresa where NIT_DOC = $id";
    $consulta = mysqli_query($connection,$sql);
 
    if($consulta){

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
        echo 2;
    }

    
}

?>