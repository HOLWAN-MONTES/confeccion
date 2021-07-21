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
            <h1>REPORTE DE INGRESOS DE MAQUINARIA</h1>
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
        <div class="contenedorCajaInventario">

      
        <?php
        $consulta = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
                    ON detalle_ingreso.ID_INGRE_MATERIAL = detalle_ingreso.ID_INGRE_MATERIAL 
                    INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO
                    INNER JOIN empresa ON ingreso_material.NIT_DOC = empresa.NIT_DOC
                    INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO 
                    INNER JOIN bodega ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA";

        $consulta_repo_maq = mysqli_query($connection,$consulta);
            while ($tip = mysqli_fetch_array($consulta_repo_maq)){
        ?>
            <div class="contentdocumentosotras">
            
                <div class="documentosotras" >
                    <div>NUM. RECIBO :<p> <?=$tip["ID_INGRE_MATERIAL"]?> </p></div>
                                    
                    <div>NOMBRE RESPONSABLE:<p> <?=$tip["NOMBRE"]?></p></div>
                    
                    <div>PROVEEDOR :<p> <?=$tip["NOM_EMPRESA"]?> </p></div>
                    
                    <div>FECHA :<p> <?=$tip["FECHA"]?></p></div>
                    
                    <div>HORA :<p> <?=$tip["HORA"]?></p></div>
    
                    <div>TIPO DE INGRESO :<p> <?=$tip["NOM_TIP_INGRESO"]?></p></div>
    
                    <div>BODEGA :<p> <?=$tip["NOM_BODEGA"]?></p></div>
    
                    
    
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
        // }
        ?> 

        
    
      </div>
    </main>
</body>
</html>