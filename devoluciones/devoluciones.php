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
    <link rel="stylesheet" href="devoluciones.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>INVENTARIO MAQUINARIA</title>
</head>
<body>
    <header>
        <div class="titulohea">
            <h1>DEVOLUCIONES</h1>
        </div>
        <div class="contenedorbotonesCrear">
            <div class="iconouserr">
                <a href="../users/admin/admin.php"><div>x </div></a>
            </div>
        </div>
       
    </header>
    <main>
        <div class="contenedorCajaInventario">

      
                <?php
                $consulta = "SELECT * FROM accion_realizada INNER JOIN estado on accion_realizada.ID_ESTADO=estado.ID_ESTADO INNER JOIN usuario ON accion_realizada.DOCU_INSTRUCTOR=usuario.DOCUMENTO INNER JOIN detalle_accion ON detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA INNER JOIN ficha ON ficha.DOCUMENTO=accion_realizada.DOCU_INSTRUCTOR INNER JOIN formacion ON ficha.ID_FORMACION=formacion.ID_FORMACION INNER JOIN jornada ON ficha.ID_JORNADA=jornada.ID_JORNADA WHERE detalle_accion.ID_ACCION=1 ";

                $consulta_inve = mysqli_query($connection,$consulta);
                

                foreach ($consulta_inve as $maquinaria){
                    $id_Dev =$maquinaria['ID_ACCION_REALIZADA'];
                ?>
                <div class="contentdocumentosotras">
                
                    <div class="documentosotras" >
                        <div>INSTRUCTOR :<p> <?=$maquinaria["NOMBRE"]?>  </p></div>

                        <div>FICHA :<p> <?=$maquinaria["NUM_FICHA"]?>  </p></div>

                        <div>FORMACION :<p> <?=$maquinaria["NOM_FORMACION"]?>  </p></div>

                        <div>JORNADA :<p> <?=$maquinaria["NOM_JORNADA"]?>  </p></div>
                                        
                        <div>FECHA  :<p> <?=$maquinaria["FECHA"]?></p></div>
                        
                        <div>HORA :<p> <?=$maquinaria["HORA"]?> </p></div>
                        
                        <div>ESTADO :<p> <?=$maquinaria["NOM_ESTADO"]?> </p></div>
                        
                        <div>
                            <table>
                                <thead>
                                <tr>
                                    <th>MATERIAL</th>
                                    <th>CANTIDAD DEVUELTA</th>
                                    <th>CANTIDAD TOTAL</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM detalle_accion INNER JOIN accion_realizada on detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA INNER JOIN insumo ON detalle_accion.ID_MATERIAL=insumo.ID_INSUMO WHERE detalle_accion.ID_ACCION_REALIZADA=$id_Dev";
                                $consultaN = mysqli_query($connection,$sql);
                                foreach ($consultaN as $datoapre){
                                    ?> <tr>
                                        <td><?=$datoapre["NOM_INSUMO"]?></td>
                                        <td><?=$datoapre["CANTIDAD"]?></td>
                                        <td><?=$datoapre["CANTIDAD_TOTAL"]?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>  

                    <div class="contentGeneralBtns">


                        <div>
                            <form action="aceptar.php" method="POST" id="aceptar" >
                                <input type="hidden" name="id_deta" value="<?=$maquinaria["ID_ACCION_REALIZADA"]?>">
                                <button id="" >ACEPTAR</button>
                            </form>
                        </div>
                        <div>
                            <form action="denegar.php" method="post" id="" >
                                <input type="hidden" name="id_detalle" value="<?=$maquinaria["ID_ACCION_REALIZADA"]?>">
                                <button id="" >DENEGAR</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?> 

      </div>

    </main>
    <div class="fondo">
        <div  class="ventana_maquinaria">
            <h2>Maquinarias</h2>
            <div id="contenido"></div>
        </div>
    </div>


    
<!--     
    <script src="devoluciones.js"></script> -->
</body>
</html>