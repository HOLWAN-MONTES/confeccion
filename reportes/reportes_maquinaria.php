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
    <link rel="stylesheet" href="../css/reportes/reportes_gen.css">
    <link rel="stylesheet" type="text/css" media="print" href="../css/impresion/print_maq.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    <button id="">GENERAL</button>
                </form>

                <form  id="form_repo_maq" method="post">
                    <input type="date" id="fecha_ini" class="fecha_ini" required>
                    <input type="date" id="fecha_fin" class="fecha_fin" required>
                    <input type="submit" id="buscar" value="Buscar" name="buscar">
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
                        WHERE detalle_ingreso.ID_TIP_INGRESO = 3";

        $consulta_repo_maq = mysqli_query($connection,$consulta);
            foreach($consulta_repo_maq as $rep_maq){
                $data3 = $rep_maq['ID_INGRE_MATERIAL'];
                $cons3 = "SELECT * FROM detalle_ingreso INNER JOIN ingreso_material 
                        ON detalle_ingreso.ID_INGRE_MATERIAL = ingreso_material.ID_INGRE_MATERIAL 
                        INNER JOIN tipo_ingreso ON detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO
                        INNER JOIN maquinaria ON detalle_ingreso.SERIAL_MAQUINARIA = MAQUINARIA.SERIAL_MAQUINARIA 
                        INNER JOIN usuario ON ingreso_material.DOCUMENTO = usuario.DOCUMENTO INNER JOIN empresa 
                        ON ingreso_material.NIT_DOC = empresa.NIT_DOC INNER JOIN bodega 
                        ON detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA WHERE detalle_ingreso.ID_TIP_INGRESO = 3
                        AND detalle_ingreso.ID_INGRE_MATERIAL = '$data3'";

                $consul3 = mysqli_query($connection, $cons3);
                $dato3 = mysqli_fetch_array($consul3);
        
                $cons = "SELECT CANTIDAD_TOTAL FROM detalle_ingreso WHERE ID_TIP_INGRESO = 3
                        ORDER BY CANTIDAD_TOTAL DESC LIMIT 1";
                $consul = mysqli_query($connection, $cons);
                $dato = mysqli_fetch_array($consul);
                $cant_maq = $dato["CANTIDAD_TOTAL"];
                
        ?>
            <div class="contentdocumentosotras" id="contentdocumentosotras">
            
                <div class="documentosotras" id="documentosotras">
                    <div>NUM. RECIBO :<p id="ingre_mat"> <?=$rep_maq["ID_INGRE_MATERIAL"]?> </p></div>
                                    
                    <div>NOMBRE RESPONSABLE:<p> <?=$dato3["NOMBRE"]?></p></div>
                    
                    <div>PROVEEDOR :<p style="text-transform: uppercase;"> <?=$dato3["NOM_EMPLEADO"]?> </p></div>
                    
                    <div>FECHA :<p> <?=$dato3["FECHA"]?></p></div>
                    
                    <div>HORA :<p> <?=$dato3["HORA"]?></p></div>

                    <table>
                        <thead>
                            <tr>
                                <td class="tab_rep">TIPO DE INGRESO</td>
                                <td class="tab_rep">NOMBRE DE MAQUINARIA</td>
                                <td class="tab_rep">CANTIDAD</td>
                                <td class="tab_rep">BODEGA</td>
                                <td class="tab_rep">CANTIDAD TOTAL</td>
                            </tr>
                        </thead>
                    <?php
                        $consultica3 = "SELECT maquinaria.NOM_MAQUINARIA, tipo_ingreso.NOM_TIP_INGRESO, CANTIDAD,
                        bodega.NOM_BODEGA FROM maquinaria, detalle_ingreso, tipo_ingreso, bodega
                        WHERE detalle_ingreso.SERIAL_MAQUINARIA = maquinaria.SERIAL_MAQUINARIA AND 
                        detalle_ingreso.ID_TIP_INGRESO = tipo_ingreso.ID_TIP_INGRESO AND 
                        detalle_ingreso.ID_BODEGA = bodega.ID_BODEGA AND detalle_ingreso.ID_TIP_INGRESO = 3
                        AND detalle_ingreso.ID_INGRE_MATERIAL = '$data3'";
                        $consu_can3 = mysqli_query($connection, $consultica3);

                        foreach($consu_can3 as $con3){
                            // print_r($con);
                        
                    ?>
                            <tbody>
                                <tr class="todo">
                                    <td class="tab_rep"> <?=$con3["NOM_TIP_INGRESO"]?></td>
                                    <td class="tab_rep"> <?=$con3["NOM_MAQUINARIA"]?></td>
                                    <td class="tab_rep"> <?=$con3["CANTIDAD"]?></td>
                                    <td class="tab_rep"> <?=$con3["NOM_BODEGA"]?></td>
                                    <td class="tab_rep"> <?=$cant_maq?></td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    ?>
                    </table>
                </div>   
                <div class="contentGeneralBtns">
                    <div>
                        <form action="" method="post" id="" >
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