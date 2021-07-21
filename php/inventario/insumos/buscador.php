<?php
require_once("../../conections/conexion.php");
$_POST=json_decode(file_get_contents("php://input"),true);

$insumo = $_POST["insumo"];

$consulta = "SELECT ID_INSUMO,NOM_INSUMO,tipo_insumo.NOM_TIP_INSUMO,marca.NOM_MARCA,color.NOM_COLOR FROM insumo,tipo_insumo,marca,color WHERE insumo.ID_TIP_INSUMO=tipo_insumo.ID_TIP_INSUMO and insumo.ID_MARCA=marca.ID_MARCA and insumo.ID_COLOR=color.ID_COLOR and ID_INSUMO like '$insumo%'";

$consulta_insumos = mysqli_query($connection,$consulta);
$dato = mysqli_fetch_assoc($consulta_insumos);

if ($dato["ID_INSUMO"] != "" ){

    foreach ($consulta_insumos as $insumos){

        echo('
            <div class="contentdocumentosotras">
            
                <div class="documentosotras" >
                    <div>ID :<p> '.$insumos["ID_INSUMO"].' </p></div>
                                    
                    <div>NOMBRE  :<p> '.$insumos["NOM_INSUMO"].'</p></div>
                    
                    <div>TIPO DE INSUMO :<p> '.$insumos["NOM_TIP_INSUMO"].'</p></div>
                    
                    <div>MARCA :<p> '.$insumos["NOM_MARCA"].'</p></div>
                    
                    <div>COLOR :<p> '.$insumos["NOM_COLOR"].'</p></div>

                </div>  

                <div class="contentGeneralBtns">
                    <div>
                        <form action="" method="post" id="" >
                            <input type="hidden" name="" value="1">
                            <button id="" >EDITAR</button>
                        </form>
                    </div>
                    <div>
                        <form action="" method="post" id="" >
                            <input type="hidden" name="" value="1">
                            <button id="" >ELIMINAR</button>
                        </form>
                    </div>
                </div>
            </div>
        ');
    }
}else {
    echo('<h3 class="aviso" >No existe insumo</h3>');
} 

?>