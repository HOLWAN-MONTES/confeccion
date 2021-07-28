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
            $consulta = "SELECT * FROM accion_realizada INNER JOIN usuario ON accion_realizada.DOCU_INSTRUCTOR=usuario.DOCUMENTO INNER JOIN detalle_accion ON detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA WHERE detalle_accion.ID_ACCION=2 AND DOCU_INSTRUCTOR = '$usario'";
            $consulta_inve = mysqli_query($connection,$consulta);
                    

            foreach ($consulta_inve as $pendiente){
            $id_Dev=$pendiente["ID_ACCION_REALIZADA"]
                    
            ?>
            <div class="conteMostrar">

                <div class="documentos">
                    <div>N° FACTURA : <p> <?=$pendiente["ID_ACCION_REALIZADA"]?> </p></div>
                    <div>DOCUMENTO INSTRUCTOR : <p> <?=$pendiente["DOCUMENTO"]?> </p></div>
                    <div>FECHA : <p> <?=$pendiente["FECHA"]?> </p></div>
                    <div>HORA : <p> <?=$pendiente["HORA"]?> </p></div>
                    <div>DETALLE PRESTAMO : <p> </p></div>
                    
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>INSUMO</th>
                                    <th>CANTIDAD</th>
                                    <th>MATERIAL</th>
                                    <th>CANTIDAD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM detalle_accion INNER JOIN accion_realizada on detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA INNER JOIN insumo ON detalle_accion.ID_INSUMO=insumo.ID_INSUMO INNER JOIN material_textil ON detalle_accion.ID_MATERIAL_TEXTIL=material_textil.ID_MATERIAL_TEXTIL WHERE detalle_accion.ID_ACCION_REALIZADA=$id_Dev";
                                $consultaN = mysqli_query($connection,$sql);
                                foreach ($consultaN as $datoapre){
                                ?> <tr>
                                        <td><?=$datoapre["NOM_INSUMO"]?></td>
                                        <td><?=$datoapre["CANTIDAD"]?></td>
                                        <td><?=$datoapre["NOM_MATERIAL_TEXTIL"]?></td>
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
            ?> 

        </div>
            
    </main>
   
    
</body>
</html>