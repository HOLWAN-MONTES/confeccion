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
        $consulta = "SELECT * FROM ingreso_material INNER JOIN usuario 
                    ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO INNER JOIN empresa 
                    ON ingreso_material.NIT_DOC = empresa.NIT_DOC";

        $consulta_repo_maq = mysqli_query($connection,$consulta);
            foreach($consulta_repo_maq as $rep_maq){
        ?>
            <div class="contentdocumentosotras" id="contentdocumentosotras">
            
                <div class="documentosotras" id="documentosotras">
                    <div>NUM. RECIBO :<p id="ingre_mat"> <?=$rep_maq["ID_INGRE_MATERIAL"]?> </p></div>
                                    
                    <div>NOMBRE RESPONSABLE:<p> <?=$rep_maq["NOMBRE"]?></p></div>
                    
                    <div>PROVEEDOR :<p> <?=$rep_maq["NOM_EMPRESA"]?> </p></div>
                    
                    <div>FECHA :<p> <?=$rep_maq["FECHA"]?></p></div>
                    
                    <div>HORA :<p> <?=$rep_maq["HORA"]?></p></div>

    
                    <!-- <div>TIPO DE INGRESO :<p> <$rep_maq["NOM_TIP_INGRESO"]?></p></div> -->
    
                   <!-- <div>BODEGA :<p> $rep_maq["NOM_BODEGA"]</p></div> -->
    
                    

                </div>  
                <div id="deta_ingre_mat"></div>
                <div class="contentGeneralBtns">
                    <div>
                        <form action="" method="post" id="" >
                            <!-- <input type="hidden" name="" value="1"> -->
                            <button id="ver_mas" >VER MAS INFO</button>
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
<script src="../js/reportes/reportes_maquinaria.js"></script>
</html>