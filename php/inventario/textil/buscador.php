<?php
require_once("../../conections/conexion.php");

$_POST = json_decode(file_get_contents("php://input"),true);

$textil = $_POST["textil"];

if($textil == 1 || $textil == 2 || $textil == 3 || $textil == 4 || $textil == 5 || $textil == 6 || $textil == 7 || $textil == 8 || $textil == 9 || $textil == 0 ){

    $consulta = "SELECT ID_MATERIAL_TEXTIL,NOM_MATERIAL_TEXTIL,tipo_material_textil.NOM_TIP_MATE_TEXTIL,marca.NOM_MARCA,color.NOM_COLOR,METRAJE FROM material_textil,tipo_material_textil,marca,color WHERE material_textil.ID_TIP_MATE_TEXTIL=tipo_material_textil.ID_TIP_MATE_TEXTIL and material_textil.ID_MARCA=marca.ID_MARCA and material_textil.ID_COLOR=color.ID_COLOR and material_textil.ID_MATERIAL_TEXTIL like '$textil%' ";

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
    $consulta = "SELECT ID_MATERIAL_TEXTIL,NOM_MATERIAL_TEXTIL,tipo_material_textil.NOM_TIP_MATE_TEXTIL,marca.NOM_MARCA,color.NOM_COLOR,METRAJE FROM material_textil,tipo_material_textil,marca,color WHERE material_textil.ID_TIP_MATE_TEXTIL=tipo_material_textil.ID_TIP_MATE_TEXTIL and material_textil.ID_MARCA=marca.ID_MARCA and material_textil.ID_COLOR=color.ID_COLOR and  material_textil.NOM_MATERIAL_TEXTIL LIKE '$textil%'";

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