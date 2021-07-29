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
            <div class="btn-m-users">

                <form action="" method="post">
                    <button id="mal_estado">TODOS</button>
                </form>
                <form action="" method="post" id="">
                    <input type="hidden" name="" value="1">
                    <button id="cantidad" >PENDIENTES</button>
                </form>

                <form action="" method="post">
                    <button id="todo">DENEGADOS</button>
                </form>
                <form action="" method="post">
                    <button id="buen_estado">ACEPTADOS</button>
                </form>
                <form action="" method="post">
                    <button id="reparacion">FINALIZADOS</button>
                </form>
                

                <form action="" method="POST" id="buscador_serial" class="buscarmaquinaria">
                    <input type="number" name="serialb" id="serial" placeholder="Buscar Nombre Instructor">
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


                $consulta = "SELECT * FROM accion_realizada INNER JOIN estado on accion_realizada.ID_ESTADO=estado.ID_ESTADO INNER JOIN usuario ON accion_realizada.DOCU_INSTRUCTOR=usuario.DOCUMENTO INNER JOIN detalle_accion ON detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA INNER JOIN ficha ON ficha.DOCUMENTO=accion_realizada.DOCU_INSTRUCTOR INNER JOIN formacion ON ficha.ID_FORMACION=formacion.ID_FORMACION INNER JOIN jornada ON ficha.ID_JORNADA=jornada.ID_JORNADA WHERE detalle_accion.ID_ACCION=1   ";

                $consulta_inve = mysqli_query($connection,$consulta);
                

                foreach ($consulta_inve as $maquinaria){
                $id_Dev=$maquinaria["ID_ACCION_REALIZADA"]
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
                                    <th>C_DEVUELTA</th>
                                    <th>C_PRESTADA</th>
                                    <th>OBSERVACIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM detalle_accion INNER JOIN accion_realizada on detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA INNER JOIN insumo ON detalle_accion.ID_INSUMO=insumo.ID_INSUMO INNER JOIN accion ON detalle_accion.ID_ACCION=accion.ID_ACCION WHERE detalle_accion.ID_ACCION_REALIZADA=$id_Dev";
                                $consultaN = mysqli_query($connection,$sql);
                                foreach ($consultaN as $datoapre){
                                
                                    ?> <tr>
                                        <td><?=$datoapre["NOM_INSUMO"]?></td>
                                        <td><?=$datoapre["CANTIDAD"]?></td>
                                        <td><?=$datoapre["CANTIDAD_TOTAL"]?></td>
                                        <td><?=$datoapre["OBSERVACIONES"]?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            
                        </div>
                       
                    </div>  

                <div class="contentGeneralBtns">
                    <?php
                    $consull = "SELECT * FROM accion_realizada WHERE ID_ACCION_REALIZADA=$id_Dev ";
                    $consulta_boto = mysqli_query($connection,$consull);
                    $dato_SQLL = mysqli_fetch_assoc($consulta_boto);

                    if($dato_SQLL){
                        $_SESSION['ID_ESTADO'] = $dato_SQLL['ID_ESTADO'];

                        if($_SESSION['ID_ESTADO'] == 8){

                        ?>
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
                        <?php

                        }
                        elseif ($_SESSION['ID_ESTADO'] == 3) {

                            ?>
                            <form action="" method="post" id="" >
                                <button id="" >DEVOLUCION ACEPTADA</button>
                            </form>
                            <?php  
                        }
                        elseif($_SESSION['ID_ESTADO'] == 4){

                            ?>
                            <form action="" method="post" id="" >
                                <button id="" >DEVOLUCION DENEGADA</button>
                            </form>
                            <?php  
                        }
                        elseif($_SESSION['ID_ESTADO'] == 9){

                            ?>
                            <form action="" method="post" id="" >
                                <button id="" >DEVOLUCION FINALIZADA</button>
                            </form>
                            <?php  
                        }
                        
                        ?>
                       
                       <?php
                    }
                    ?>

                        
                    </div>
                </div>
                <?php
                }
                ?> 

      </div>

    </main>
  


    
<!--     
    <script src="devoluciones.js"></script> -->
</body>
</html>