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
                    <button id="" >GENERAL</button>
                </form>

                <form action="" method="post">
                    <input type="date" class="fecha_ini">
                </form>
                <form action="" method="post">
                    <input type="date" class="fecha_fin">
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
                    ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN detalle_ingreso ON
                    ingreso_material.ID_INGRE_MATERIAL = detalle_ingreso.ID_INGRE_MATERIAL 
                    INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                    INNER JOIN maquinaria ON detalle_ingreso.SERIAL_MAQUINARIA = maquinaria.SERIAL_MAQUINARIA
                    INNER JOIN bodega ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA
                    WHERE detalle_ingreso.ID_TIP_INGRESO = 3";

        $consulta_repo_maq = mysqli_query($connection,$consulta);
            foreach($consulta_repo_maq as $rep_maq){
                $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 3 
                        ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                $consul = mysqli_query($connection, $cons);
                $dato = mysqli_fetch_array($consul);
                $cant_maq = $dato["CANTIDAD_TOTAL"]; 
        ?>
            <div class="contentdocumentosotras" id="contentdocumentosotras">
            
                <div class="documentosotras" id="documentosotras">
                    <div>NUM. RECIBO :<p id="ingre_mat"> <?=$rep_maq["ID_INGRE_MATERIAL"]?> </p></div>
                                    
                    <div>NOMBRE RESPONSABLE:<p> <?=$rep_maq["NOMBRE"]?></p></div>
                    
                    <div>PROVEEDOR :<p> <?=$rep_maq["NOM_EMPRESA"]?> </p></div>
                    
                    <div>FECHA :<p> <?=$rep_maq["FECHA"]?></p></div>
                    
                    <div>HORA :<p> <?=$rep_maq["HORA"]?></p></div>

                    <div>TIPO DE INGRESO :<p> <?=$rep_maq["NOM_TIP_INGRESO"]?></p></div>

                    <div>NOMBRE DE MAQUINARIA :<p> <?=$rep_maq["NOM_MAQUINARIA"]?></p></div>

                    <div>CANTIDAD :<p> <?=$rep_maq["CANTIDAD"]?></p></div>

                    <div>BODEGA :<p> <?=$rep_maq["NOM_BODEGA"]?></p></div>

                    <div>CANTIDAD TOTAL :<p> <?=$cant_maq?></p></div>
                </div>  
                <div class="contentGeneralBtns">
                    <div>
                        <form action="" method="post" id="" >
                            <!-- <input type="hidden" name="" value="1"> -->
                            <button id="ver_mas" class="ver_mas" data-id="<?php echo $rep_maq["ID_INGRE_MATERIAL"]?>">VER MAS INFO</button>
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
<script src="../js/reportes/reportes_maquinaria.js"></script>
</html>