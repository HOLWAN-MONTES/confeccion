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
            <h1>REPORTE DE INGRESOS DE MATERIAL TEXTIL</h1>
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
                        WHERE detalle_ingreso.ID_TIP_INGRESO = 1";

        $consulta_repo_maq = mysqli_query($connection,$consulta);
            foreach($consulta_repo_maq as $rep_maq){
                $data1 = $rep_maq['ID_INGRE_MATERIAL'];
                $cons1 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
                        ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                        INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                        INNER JOIN material_textil ON detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL 
                        INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO 
                        INNER JOIN empresa ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
                        ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 1
                        AND detalle_ingreso.ID_INGRE_MATERIAL = '$data1'";

                $consul1 = mysqli_query($connection, $cons1);
                $dato1 = mysqli_fetch_array($consul1);

                $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 1 
                        ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                $consul = mysqli_query($connection, $cons);
                $dato = mysqli_fetch_array($consul);
                $cant_maq = $dato["CANTIDAD_TOTAL"]; 
        ?>
            <div class="contentdocumentosotras" id="contentdocumentosotras">
            
                <div class="documentosotras" id="documentosotras">
                    <div>NUM. RECIBO :<p id="ingre_mat"> <?=$rep_maq["ID_INGRE_MATERIAL"]?> </p></div>
                                    
                    <div>NOMBRE RESPONSABLE:<p> <?=$dato1["NOMBRE"]?></p></div>
                    
                    <div>PROVEEDOR :<p style="text-transform: uppercase;"> <?=$dato1["NOM_EMPLEADO"]?> </p></div>
                    
                    <div>FECHA :<p> <?=$dato1["FECHA"]?></p></div>
                    
                    <div>HORA :<p> <?=$dato1["HORA"]?></p></div>

                    <div>TIPO DE INGRESO :<p style="text-transform: uppercase;"> <?=$dato1["NOM_TIP_INGRESO"]?></p></div>
                    <?php
                        $consultica1 = "SELECT material_textil.NOM_MATERIAL_TEXTIL, CANTIDAD 
                        FROM material_textil, detalle_ingreso 
                        WHERE detalle_ingreso.ID_MATERIAL_TEXTIL = material_textil.ID_MATERIAL_TEXTIL AND 
                        detalle_ingreso.ID_INGRE_MATERIAL = '$data1'";
                        $consu_can1 = mysqli_query($connection, $consultica1);

                        foreach($consu_can1 as $con1){
                            // print_r($con);
                        
                    ?>

                    <div>NOMBRE DE MATERIAL TEXTIL :<p style="text-transform: uppercase;"> <?=$con1["NOM_MATERIAL_TEXTIL"]?></p></div>

                    <div>CANTIDAD :<p> <?=$con1["CANTIDAD"]?></p></div>
                    <?php
                        }
                    ?>

                    <div>BODEGA :<p style="text-transform: uppercase;"> <?=$dato1["NOM_BODEGA"]?></p></div>

                    <div>CANTIDAD TOTAL :<p> <?=$cant_maq?></p></div>
                </div>  
                <div class="contentGeneralBtns">
                    <div>
                        <form action="" method="post" id="" >
                            <!-- <input type="hidden" name="" value="1"> -->
                            <button id="ver_mas" class="ver_mas" data-id="<?php echo $rep_maq["ID_INGRE_MATERIAL"]?>">IMPRIMIR REPORTES</button>
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