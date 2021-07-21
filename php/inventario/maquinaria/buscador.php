<?php
require_once("../../conections/conexion.php");

$serial = $_POST["serialb"];

$consulta = "SELECT SERIAL_MAQUINARIA,PLACA_SENA,NOM_MAQUINARIA,tipo_maquina.NOM_TIP_MAQUINARIA,marca.NOM_MARCA,color.NOM_COLOR,estado.NOM_ESTADO,OBSERVACIONES FROM maquinaria,tipo_maquina,marca,color,estado where maquinaria.ID_TIP_MAQUINARIA=tipo_maquina.ID_TIP_MAQUINARIA and maquinaria.ID_MARCA=marca.ID_MARCA and maquinaria.ID_COLOR=color.ID_COLOR and maquinaria.ID_ESTADO=estado.ID_ESTADO and maquinaria.SERIAL_MAQUINARIA like '$serial%'";

$consulta_inve = mysqli_query($connection,$consulta);
$dato = mysqli_fetch_assoc($consulta_inve);

if ($dato["SERIAL_MAQUINARIA"] != "" ) {
    
    foreach ($consulta_inve as $maquinaria){

        echo('
            <div class="contentdocumentosotras">
                    
                        <div class="documentosotras" >
                            <div>SERIAL :<p> '.$maquinaria["SERIAL_MAQUINARIA"].' </p></div>
                                            
                            <div>PLACA SENA  :<p> '.$maquinaria["PLACA_SENA"].'</p></div>
                            
                            <div>NOMBRE :<p> '.$maquinaria["NOM_MAQUINARIA"].' </p></div>
                            
                            <div>TIPO DE MAQUINA :<p> '.$maquinaria["NOM_TIP_MAQUINARIA"].' </p></div>
                            
                            <div>MARCA :<p> '.$maquinaria["NOM_MARCA"].'</p></div>
                            
                            <div>COLOR :<p> '.$maquinaria["NOM_COLOR"].'</p></div>
                            <div>ESTADO :<p> '.$maquinaria["NOM_ESTADO"].'</p></div>
                            <div class="observacioneste">OBSERVACIONES :<p> '.$maquinaria["OBSERVACIONES"].'</p></div>
                        </div>  

                        <div class="contentGeneralBtns">
                            <div>
                                <form action="" method="post" id="" >
                                    <input type="hidden" name="" value="1">
                                    <button class="editar" >EDITAR</button>
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
    };   
}else {
    echo('<h3 class="aviso" >No existe maquinaria</h3>');
} 
?>