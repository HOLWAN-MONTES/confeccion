<?php
session_start();
require_once('../../php/conections/conexion.php');

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
    <title>PRESTAMOS </title>
    <link rel="stylesheet" href="../../css/instructor/pendiente.css">
</head>
<body>
    <header>
        <div class="titulo">
            <h1>PRESTAMOS PENDIENTES</h1>
        </div>
        <div class="contenedorCerrar">
            <div class="icono">
                <a href="../../users/instructor/instructor.php"><div>x </div></a>
            </div>
        </div>
       
    </header>
    <main>

        <div class="contenedorPendientes">
            <?php 
            $consul = "SELECT DISTINCT detalle_accion.ID_ACCION_REALIZADA FROM detalle_accion";
            $comprobar = mysqli_query($connection, $consul);
                foreach($comprobar as $prueba){
                    $dato1 = $prueba['ID_ACCION_REALIZADA'];
                    $nueva = "SELECT * FROM detalle_accion INNER JOIN accion_realizada
                    ON detalle_accion.ID_ACCION_REALIZADA = accion_realizada.ID_ACCION_REALIZADA
                    INNER JOIN estado on accion_realizada.ID_ESTADO=estado.ID_ESTADO
                    INNER JOIN usuario ON accion_realizada.DOCU_INSTRUCTOR=usuario.DOCUMENTO  
                    INNER JOIN material_textil ON detalle_accion.ID_MATERIAL_TEXTIL=material_textil.ID_MATERIAL_TEXTIL 
                    INNER JOIN insumo ON detalle_accion.ID_INSUMO=insumo.ID_INSUMO 
                    WHERE detalle_accion.ID_ACCION=2 AND DOCU_INSTRUCTOR = '$usario' AND accion_realizada.ID_ESTADO = 8 
                    AND detalle_accion.ID_ACCION_REALIZADA = '$dato1' LIMIT 1";
                
                    $nuv = mysqli_query($connection,$nueva);
                    foreach ($nuv as $dat2){
                        
            ?>
            <div class="conteMostrar">

                <div class="documentos">
                    <div>N° FACTURA : <p><?=$dat2["ID_ACCION_REALIZADA"]?></p></div>
                    <div>DOCUMENTO : <p><?=$dat2["DOCUMENTO"]?></p></div>
                    <div>FECHA :<p><?=$dat2["FECHA"]?></p></div>
                    <div>HORA : <p><?=$dat2["HORA"]?></p></div>
                    <div class="vent"><b> DETALLE PRESTAMO</b> </div>

                    <div>
                        <table class="tabla">
                            <thead class="tab">
                                <tr class="tab-ml">
                                    <th class="tab_ml">MATERIALES</th>
                                    <th class="tab_ml">CANTIDAD</th>
                                </tr>
                            </thead>
                            <tbody class="pendie">
                                <?php
                                    $sql = "SELECT * FROM detalle_accion 
                                    INNER JOIN accion_realizada on detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA 
                                    INNER JOIN material_textil ON detalle_accion.ID_MATERIAL_TEXTIL=material_textil.ID_MATERIAL_TEXTIL 
                                    WHERE detalle_accion.ID_ACCION_REALIZADA='$dato1' AND detalle_accion.ID_MATERIAL_TEXTIL != 7 ";
                                    $consultaN = mysqli_query($connection,$sql);
                                foreach ($consultaN as $datoapre){
                                ?> <tr>
                                        <td><?=$datoapre["NOM_MATERIAL_TEXTIL"]?></td>
                                        <td><?=$datoapre["CANTIDAD"]?></td>  
                                    </tr>
                                            
                                <?php
                                }
                                ?>
                                <?php
                                    $sql = "SELECT * FROM detalle_accion 
                                    INNER JOIN accion_realizada on detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA 
                                    INNER JOIN insumo ON detalle_accion.ID_INSUMO=insumo.ID_INSUMO 
                                    WHERE detalle_accion.ID_ACCION_REALIZADA='$dato1' AND detalle_accion.ID_INSUMO != 7 ";
                                    $consultaN = mysqli_query($connection,$sql);
                                    foreach ($consultaN as $datoapre){
                                    ?> <tr>
                                            <td><?=$datoapre["NOM_INSUMO"]?></td>
                                            <td><?=$datoapre["CANTIDAD"]?></td>   
                                        </tr>
                                            
                                    <?php
                                    }
                                    ?>

                            </tbody>

                        </table>
                    </div>

                </div>
            
            </div>

            <?php
                }

            }
            ?>

        </div>
            
    </main>
   
    
</body>
</html>