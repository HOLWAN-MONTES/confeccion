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
                    <button id="" >GENERAL</button>
                </form>

                <form action="" id="form_repo_maq" method="post">
                    <input type="date" class="fecha_ini">
                    <input type="date" class="fecha_fin">
                    <input type="submit" name="">
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
        $consulta = "SELECT DISTINCT detalle_ingreso.ID_INGRE_MATERIAL FROM detalle_ingreso 
                        WHERE detalle_ingreso.ID_TIP_INGRESO = 2    ";

        $consulta_repo_maq = mysqli_query($connection,$consulta);
            foreach($consulta_repo_maq as $rep_maq){
                $data2 = $rep_maq['ID_INGRE_MATERIAL'];
                $cons2 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
                        ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                        INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                        INNER JOIN insumo ON detalle_ingreso.ID_INSUMO = insumo.ID_INSUMO INNER JOIN usuario 
                        ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO INNER JOIN empresa 
                        ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
                        ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 2
                        AND detalle_ingreso.ID_INGRE_MATERIAL = '$data2'";

                $consul2 = mysqli_query($connection, $cons2);
                $dato2 = mysqli_fetch_array($consul2);

                $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 2 
                        ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                $consul = mysqli_query($connection, $cons);
                $dato = mysqli_fetch_array($consul);
                $cant_maq = $dato["CANTIDAD_TOTAL"]; 
        ?>
            <div class="contentdocumentosotras" id="contentdocumentosotras">
            
                <div class="documentosotras" id="documentosotras">
                    <div>NUM. RECIBO :<p id="ingre_mat"> <?=$rep_maq["ID_INGRE_MATERIAL"]?> </p></div>
                                    
                    <div>NOMBRE RESPONSABLE:<p> <?=$dato2["NOMBRE"]?></p></div>
                    
                    <div>PROVEEDOR :<p style="text-transform: uppercase;"> <?=$dato2["NOM_EMPLEADO"]?> </p></div>
                    
                    <div>FECHA :<p> <?=$dato2["FECHA"]?></p></div>
                    
                    <div>HORA :<p> <?=$dato2["HORA"]?></p></div>

                    <div>TIPO DE INGRESO :<p style="text-transform: uppercase;"> <?=$dato2["NOM_TIP_INGRESO"]?></p></div>
                    <?php
                        $consultica2 = "SELECT insumo.NOM_INSUMO, CANTIDAD FROM insumo, detalle_ingreso
                        WHERE detalle_ingreso.ID_INSUMO = insumo.ID_INSUMO AND 
                        detalle_ingreso.ID_INGRE_MATERIAL = '$data2'";
                        $consu_can2 = mysqli_query($connection, $consultica2);

                        foreach($consu_can2 as $con2){
                            // print_r($con);
                        
                    ?>

                    <div>NOMBRE DE INSUMO :<p style="text-transform: uppercase;"> <?=$con2["NOM_INSUMO"]?></p></div>

                    <div>CANTIDAD :<p> <?=$con2["CANTIDAD"]?></p></div>
                    <?php
                        }
                    ?>

                    <div>BODEGA :<p style="text-transform: uppercase;"> <?=$dato2["NOM_BODEGA"]?></p></div>

                    <div>CANTIDAD TOTAL :<p> <?=$cant_maq?></p></div>
                </div>  
                <div class="contentGeneralBtns">
                    <div>
                        <form action="" method="post" id="" >
                            <!-- <input type="hidden" name="" value="1"> -->
                            <button id="ver_mas" class="imprimir" data-id="<?php echo $rep_maq["ID_INGRE_MATERIAL"]?>">IMPRIMIR REPORTES</button>
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