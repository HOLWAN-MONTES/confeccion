<?php
session_start();
require_once('../php/conections/conexion.php');

$usario = $_SESSION["DOCUMENTO"];

if ($usario == "" || $usario == null) {
    header("location: ../../php/exit/salir.php");
}

$sql_marca = "SELECT * from marca where ID_TIP_MARCA = 1";
$consulta_marca = mysqli_query($connection,$sql_marca);

$sql_tipo_material = "SELECT * from tipo_material_textil";
$consulta_tipo_material = mysqli_query($connection,$sql_tipo_material)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventarios/materialTextil.css">
    <title>INVENTARIOS MATERIAL TEXTIL</title>
</head>
<body>
    <header>
        <div class="titulohea">
            <h1>INVENTARIO DE MATERIAL TEXTIL</h1>
        </div>
        <div class="contenedorbotonesCrear">
            <div class="btn-m-users">

                <form action="" method="post" id="" >
                    <input type="hidden" name="" value="1">
                    <button id="cantidad" >CANTIDAD</button>
                </form>

                
                <form action="" method="POST" id="" class="buscarmaquinaria">
                    <input type="text" name="docu" id="buscador-textil" placeholder="Buscar">
                </form>

                <select name="" id="marca">
                    <option value="">Seleccione una marca</option>
                    <?php
                    foreach($consulta_marca as $marca){
                        ?> <option value="<?=$marca['ID_MARCA']?>"><?=$marca['NOM_MARCA']?></option>
                    <?php
                    }
                    ?>
                </select>
                <select name="" id="tipo_material">
                    <option value="">Seleccione una material</option>
                    <?php
                    foreach($consulta_tipo_material as $material){
                        ?> <option value="<?=$material['ID_TIP_MATE_TEXTIL']?>"><?=$material['NOM_TIP_MATE_TEXTIL']?></option>
                    <?php
                    }
                    ?>
                </select>


            </div>
            <div class="iconouserr">
                <a href="../users/admin/admin.php">
                <div>x </div>
            </a>
               
            </div>
        </div>
       
    </header>
    <main>
        <div class="contenedorCajaInventario">
        <?php
        $consulta = "SELECT ID_MATERIAL_TEXTIL,NOM_MATERIAL_TEXTIL,tipo_material_textil.NOM_TIP_MATE_TEXTIL,marca.NOM_MARCA,color.NOM_COLOR,METRAJE FROM material_textil,tipo_material_textil,marca,color WHERE material_textil.ID_TIP_MATE_TEXTIL=tipo_material_textil.ID_TIP_MATE_TEXTIL and material_textil.ID_MARCA=marca.ID_MARCA and material_textil.ID_COLOR=color.ID_COLOR";

        $consulta_text = mysqli_query($connection,$consulta);

        foreach ($consulta_text as $mtextil){
    ?>
        <div class="contentdocumentosotras">
           
            <div class="documentosotras" >
                <div>ID MATERIAL :<p> <?=$mtextil["ID_MATERIAL_TEXTIL"]?> </p></div>
                                
                <div>NOMBRE :<p> <?=$mtextil["NOM_MATERIAL_TEXTIL"]?></p></div>
                
                <div>TIPO DE MATERIAL :<p> <?=$mtextil["NOM_TIP_MATE_TEXTIL"]?> </p></div>
                
                <div>MARCA:<p> <?=$mtextil["NOM_MARCA"]?> </p></div>
                
                <div>COLOR:<p> <?=$mtextil["NOM_COLOR"]?></p></div>
                
                <div>METRAJE:<p> <?=$mtextil["METRAJE"]?> </p></div>

            </div>  

            <div class="contentGeneralBtns">
                
                <div>
                    <form action="" method="post" id="" >
                        <input type="hidden" name="" value="1">
                        <button id="" class="eliminar" >ELIMINAR</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?> 
      </div>
    </main>
     <!-- ^ventana de las canidades  -->
     <div class="fondo">
        <div  class="ventana_maquinaria">
            <h2>Maquinarias</h2>
            <div id="contenido"></div>
        </div>
    </div>
    
    <script src="../js/inventario/textil.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>
</html>