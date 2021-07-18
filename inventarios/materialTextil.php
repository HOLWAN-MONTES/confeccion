<?php
session_start();
require_once('../php/conections/conexion.php');

$usario = $_SESSION["DOCUMENTO"];

if ($usario == "" || $usario == null) {
    header("location: ../../php/exit/salir.php");
}
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
                    <button id="" >----------------</button>
                </form>

                <form action="" method="post">
                    <button id="todo">-------------</button>
                </form>
                <form action="" method="post">
                    <button id="todo">---------------</button>
                </form>
                <form action="" method="post">
                    <button id="todo">-------------</button>
                </form>
                <form action="" method="post">
                    <button id="todo">----------------</button>
                </form>

                <form action="" method="POST" id="" class="buscarmaquinaria">
                    <input type="number" name="docu" id="buscador-user" placeholder="Buscar">
                </form>

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
    <?php
    }
    ?> 
      </div>
    </main>
    
    
</body>
</html>