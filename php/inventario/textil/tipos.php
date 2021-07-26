<?php
require_once("../../conections/conexion.php");

$_POST=json_decode(file_get_contents("php://input"),true);

$tipo = $_POST['marca_accion'];
$dato = $_POST['tipo_marca'];


if ($tipo == "marca") {
    
    $consulta = "SELECT ID_MATERIAL_TEXTIL,NOM_MATERIAL_TEXTIL,tipo_material_textil.NOM_TIP_MATE_TEXTIL,marca.NOM_MARCA,color.NOM_COLOR,METRAJE FROM material_textil,tipo_material_textil,marca,color WHERE material_textil.ID_TIP_MATE_TEXTIL=tipo_material_textil.ID_TIP_MATE_TEXTIL and material_textil.ID_MARCA=marca.ID_MARCA and material_textil.ID_COLOR=color.ID_COLOR and  material_textil.ID_MARCA = '$dato'";

    $consulta_text = mysqli_query($connection,$consulta);

    foreach ($consulta_text as $mtextil){

        echo('
        <div class="contentdocumentosotras">
            
        <div class="documentosotras" >
            <div>ID MATERIAL :<p> '.$mtextil["ID_MATERIAL_TEXTIL"].' </p></div>
                            
            <div>NOMBRE :<p> '.$mtextil["NOM_MATERIAL_TEXTIL"].'</p></div>
            
            <div>TIPO DE MATERIAL :<p> '.$mtextil["NOM_TIP_MATE_TEXTIL"].' </p></div>
            
            <div>MARCA:<p> '.$mtextil["NOM_MARCA"].' </p></div>
            
            <div>COLOR:<p> '.$mtextil["NOM_COLOR"].'</p></div>
            
            <div>METRAJE:<p> '.$mtextil["METRAJE"].' </p></div>

        </div>  

        <div class="contentGeneralBtns">
            
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
    
    $consulta = "SELECT ID_MATERIAL_TEXTIL,NOM_MATERIAL_TEXTIL,tipo_material_textil.NOM_TIP_MATE_TEXTIL,marca.NOM_MARCA,color.NOM_COLOR,METRAJE FROM material_textil,tipo_material_textil,marca,color WHERE material_textil.ID_TIP_MATE_TEXTIL=tipo_material_textil.ID_TIP_MATE_TEXTIL and material_textil.ID_MARCA=marca.ID_MARCA and material_textil.ID_COLOR=color.ID_COLOR and  material_textil.ID_TIP_MATE_TEXTIL = '$dato'";

    $consulta_text = mysqli_query($connection,$consulta);

    foreach ($consulta_text as $mtextil){

        echo('
        <div class="contentdocumentosotras">
            
        <div class="documentosotras" >
            <div>ID MATERIAL :<p> '.$mtextil["ID_MATERIAL_TEXTIL"].' </p></div>
                            
            <div>NOMBRE :<p> '.$mtextil["NOM_MATERIAL_TEXTIL"].'</p></div>
            
            <div>TIPO DE MATERIAL :<p> '.$mtextil["NOM_TIP_MATE_TEXTIL"].' </p></div>
            
            <div>MARCA:<p> '.$mtextil["NOM_MARCA"].' </p></div>
            
            <div>COLOR:<p> '.$mtextil["NOM_COLOR"].'</p></div>
            
            <div>METRAJE:<p> '.$mtextil["METRAJE"].' </p></div>

        </div>  

        <div class="contentGeneralBtns">
            
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
}
?>