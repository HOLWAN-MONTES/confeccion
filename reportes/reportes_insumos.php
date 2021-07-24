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
    <link rel="stylesheet" href="../css/inventarios/insumos.css">
    <title>REPORTES</title>
</head>
<body>
    <header>
        <div class="titulohea">
            <h1>REPORTE DE INGRESOS DE INSUMOS</h1>
        </div>
        <div class="contenedorbotonesCrear">
            <div class="btn-m-users">

                <form action="" method="post" id="" >
                    <input type="hidden" name="" value="1">
                    <button id="" >ANUAL</button>
                </form>

                <form action="" method="post">
                    <button id="todo">MENSUAL</button>
                </form>
                <form action="" method="post">
                    <button id="todo">SEMANAL</button>
                </form>
                <form action="" method="post">
                    <button id="todo">-------------------</button>
                </form>
                <form action="" method="post">
                    <button id="todo">---------------------</button>
                </form>

                <!-- <form action="" method="POST" id="" class="buscarmaquinaria">
                    <input type="number" name="docu" id="buscador-user" placeholder="Buscar">
                </form> -->

            </div>
            <div class="iconouserr">
                <a href="../users/admin/admin.php">
                <div>x </div>
            </a>
               
            </div>
        </div>
       
    </header>
    <main>
        <div class="contenedorCajaInventario" id="content">

      
        <?php
        $consulta = "SELECT ID_INSUMO,NOM_INSUMO,tipo_insumo.NOM_TIP_INSUMO,marca.NOM_MARCA,color.NOM_COLOR FROM insumo,tipo_insumo,marca,color WHERE insumo.ID_TIP_INSUMO=tipo_insumo.ID_TIP_INSUMO and insumo.ID_MARCA=marca.ID_MARCA and insumo.ID_COLOR=color.ID_COLOR";

        $consulta_insumos = mysqli_query($connection,$consulta);

        foreach ($consulta_insumos as $insumos){
    ?>
        <div class="contentdocumentosotras">
           
            <div class="documentosotras" >
                <div>ID :<p> <?=$insumos["ID_INSUMO"]?> </p></div>
                                
                <div>NOMBRE  :<p> <?=$insumos["NOM_INSUMO"]?></p></div>
                
                <div>TIPO DE INSUMO :<p> <?=$insumos["NOM_TIP_INSUMO"]?> </p></div>
                
                <div>MARCA :<p> <?=$insumos["NOM_MARCA"]?></p></div>
                
                <div>COLOR :<p> <?=$insumos["NOM_COLOR"]?></p></div>

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