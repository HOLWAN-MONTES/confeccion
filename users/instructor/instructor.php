<?php
session_start();
include('../../php/conections/conexion.php');

$usario = $_SESSION["DOCUMENTO"];
if ($usario == "" || $usario == null) {
    header("location: ../../php/exit/salir.php");
}
$consu = "SELECT * FROM usuario WHERE DOCUMENTO = '$usario' AND ID_TIP_USU = 2";
$query = mysqli_query($connection, $consu);
$file = mysqli_fetch_assoc($query);
$nom = $file['NOMBRE'];
$identificacion = $file['DOCUMENTO'];
date_default_timezone_set("America/Bogota");
$fecha = date("o-m-d");
$hora = date("H:i:s");

$fecha_de = date("o-m-d");
$hora_de = date("H:i:s");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/instructor/index.css">
    <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
    <!--api de Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>INSTRUCTOR</title>
</head>

<body>
    <!------------------- div general---------------------- -->
<div class="general">
    <div class="informacion">
         <!------------------- logos---------------------- -->
        <div class="logos">
            <img class="logo_em" src="../../images/LOGO_EM.png" alt="">
            <img class="logo_se" src="../../images/logo_sena.png" alt="">
        </div>
         <!------------------- informaciono del instructor---------------------- -->
        <div class="instru">
            <div class="foto">
                <img src="../../imagesUsers/<?=$_SESSION['FOTO']?>"><!-- echo $_SESSION['FOTO'];  -->
            </div>
            <div class="inf">
                <H1>INSTRUCTOR@</H1>
                <h4>NOMBRE: <?php echo $_SESSION['NOMBRE'] ;?> <?php echo $_SESSION['APELLIDO']; ?></h4>
                <h4>TELEFONO: <?php echo $_SESSION['TELEFONO'] ; ?></h4>
                <h4>CORREO: <?php echo $_SESSION['CORREO'] ; ?></h4>
                <h4>FEC. NAC: <?php echo $_SESSION['EDAD'] ; ?></h4>                  
            </div>
        </div>
         <!-------------------opciones del instructor---------------------- -->
        <div class="acciones">
            <button class="editar"><a>EDITAR PERFIL</a></button>
            <button class="Cerrar"><a href="../../php/exit/salir.php">CERRAR SESIÓN</a></button>
        </div>
    </div>
     <!------------------- acciones que puede hacer le instructor ---------------------- -->
    <div class="opciones">
         <!------------------- prestamos---------------------- -->
        <div class="uno">
            <img id="one" class="logo_pre" src="../../images/Prestamo.jpeg" alt="">
        </div>
         <!------------------- devoluciones---------------------- -->
        <div class="dos">
            <img id="two" class="logo_de" src="../../images/devolucion1.jpeg" alt="">
        </div>
         <!------------------- devoluciones y prestamos pendientes---------------------- -->
        <div class="tres">

            <img  id="tres" class="cuatro" src="../../images/devolucion_pe.jpeg" alt="">
            <a href="../../php/instructor/prestamos_pendi.php"><img id="cuatro" class="cinco" src="../../images/prestamo_pe.jpeg" alt=""></a>

        </div>
    </div>
</div>
<!------------- ventana de prestamo de material------------------ -->
<div class="ventana_one" id="ventana_one">
    <div class="contentIngresoDeInsumos" id="contentIngresoDeInsumos">
        <h1 class="pet_pres">PETICIONES DE PRESTAMOS</h1>
        <div class="cerrar1" id="cerrar1">
            <a href=""><i class="fas fa-times-circle"></i></a>
        </div>
        <form id="formul_prest" method="POST" class="formu_presta" autocomplete="off">
            <div class="primeraSeccionFechas">
                <div>
                    <b>RESPONSABLE : <!-- nombre de la persona logeada --></b> <p><?=$_SESSION['NOMBRE'] ?></p>
                    <input type="hidden" name="responsable" id="responsable" value="<?=$_SESSION['DOCUMENTO'] ?>">
                </div>      
                <div class="unoo">
                    <p>FECHA:</p><p id="fecha" name="fecha"><?= $fecha; ?></p>
                </div>
                <div class="hours">
                    <p>HORA:</p><p id="hora" name="hora"><?= $hora; ?></p>
                </div>

            </div>

            <!--select para elegir la categoria y material a prestar-->
            <div class="categoria" id="categoria">
                <div class="categoriass">
                    <label for="">CATEGORIA</label>    
                    <select class="categ" name="categ" id="categ"  style="text-transform: uppercase;" required>
                        <option value="0">SELECCIONAR</option>
                        <?php
                        $tipoPres = "SELECT * FROM tipo_ingreso WHERE ID_TIP_INGRESO <= 2";
                        $inser = mysqli_query($connection ,$tipoPres);
                        while($tip = mysqli_fetch_array($inser)){
                        ?>
                        <option name="tipo_material" id="opcion_mate" value="<?php echo $tip[0]; ?>">
                            <?php echo $tip[1]; ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="nom_cant_categoria">
                    <div class="nom_categoria">
                        <label for="">NOMBRE</label>
                        <select class="prestamo" name="nom_categ" id="nom_categ" style="text-transform: uppercase;" required>
                            <option value="0">SELECCIONAR</option>
                        </select>
                    </div>

                    <div class="cant_prestamo">
                        <label for="">CANTIDAD</label>
                        <input type="number" class="cant_pres" id="cantid_pres" name="cantid_pres" placeholder="CANTIDAD" required>
                    </div>

                    <div class="boton">
                        <input type="button" class="btn_agregar" id="agregar_lista" value="AGREGAR"> <!--AGREGAR A LA LISTA-->
                    </div>

                </div>
    
            </div>

            <div class="agregarPrestamos_lista">
                <!-- listado donde va a ir los materiales a prestar -->
                <table class="tablaInfo" id="tablaInfo"  style="text-transform: uppercase;">
                    <thead class="tab">
                        <tr class="tab-ml">
                            <td class="tab_ml">CATEGORIA</td>
                            <td class="tab_ml">NOMBRE</td>
                            <td class="tab_ml">CANTIDAD</td>
                            <td class="tab_ml">ACCION</td>
                        </tr>
                    </thead>
                    <tbody class="agregado" id="agregado">  </tbody>
                </table>
            </div>

            <!--botones para agregar a la BD o cancelar todo-->
            <div class="enviar_solic">
                <div>
                    <input type="submit" name="solicitar_prest" id="solicitar_prest" value="ENVIAR">
                </div>
                <div>
                    <input type="button" id="btn_cancelar_material" value="CANCELAR">
                </div> 

            </div>

            <!-- <div class="categorias" id="cate">

                <div class="categoriass">
                    <label for="">CATEGORIA</label>    
                        
                </div>
                <div class="NombreCate">
                    <label for="" class="nome">NOMBRE</label> 
                        <select class="input_dev" name="pres" id="pres" required>
                            <option>SELECCIONAR</option>
                        </select>
                </div>

                <div class="cantidadSe">
                    <label for="">CANTIDAD</label>
                    <input type="number" id="cant" class="canti_dev" placeholder="CANTIDAD">
                </div>

                <div class="bnt">
                    <input type="button" class="btn_agre" id="agregar" value="AGREGAR"> agregar a la lista -->
                <!-- </div> -->

            
            
            <!-- </div> 
                <div class="agregarTodosLosListados"> --> 
                    <!-- ACA VAN TODOS LOS LISTADOS DE LO QUE SEA AGREGUE -->
                    <!-- <table class="tabla_info" id="tab_info">
                        <thead class="tab">
                            <tr class="tab-ml">
                                <td class="tab_ml">CATEGORIA</td>
                                <td class="tab_ml">NOMBRE</td>
                                <td class="tab_ml">CANTIDAD</td>
                                <td class="tab_ml">ACCION</td>
                            </tr>
                        </thead>
                        <tbody class="agregado" id="agregado">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table> -->
                    <!-- CA VAN TODOS LOS LISTADOS DE LO QUE SE AGREGUE -->
                <!-- </div>

                <div>
                    <input type="submit" id="envia_prest" value="ENVIAR"> enviar a la db -->
                <!-- </div> 
                <div id="estado" style="display:none;"></div>      -->
        </form>
    </div>
</div>
<!------------- ventana de devolucion de material------------------ -->
<div class="ventana_two" id="ventana_two">
    <div class="contentIngresoDeDevoluciones" id="contentIngresoDeDevoluciones">
        <h1 class="pet_dev">DEVOLUCIONES DE MATERIAL</h1>
        <div class="cerrar2" id="cerrar2">
            <a href=""><i class="fas fa-times-circle"></i></a>
        </div>
        <form method="POST" class="formulario_devol" id="formulario_devol">
            <div class="primeraSeccionFechasDev">
                <div>
                <b>RESPONSABLE : <!-- nombre de la persona logeada --></b> <p><?=$_SESSION['NOMBRE'] ?></p>
                    <input type="hidden" name="responsable_devol" id="responsable_devol" value="<?=$_SESSION['DOCUMENTO'] ?>">
                </div>      
                <div>
                    <p>FECHA:</p><p id="fecha_dev" name="fecha_dev"><?php echo $fecha_de; ?></p>
                </div>
                <div>
                    <p>HORA:</p><p id="hora_dev" name="hora_dev"><?php echo $hora_de; ?></p>
                </div>

            </div>

            <!-- select para elegir el insumo a devolver-->
            <div class="categ_devol" id="categ_devol">
                <div class="cate_de">
                    <label for="">CATEGORIA</label>
                    <select class="cate_dev" name="cate_dev" id="cate_dev" style="text-transform: uppercase;" required>
                        <option value="0">SELECCIONAR</option>
                        <?php
                        $tipoDevol = "SELECT * FROM tipo_ingreso WHERE ID_TIP_INGRESO >= 2";
                        $inserta = mysqli_query($connection ,$tipoDevol);
                        while($tipo = mysqli_fetch_array($inserta)){
                        ?>
                        <option name="op_cate" id="op_cate" value="<?php echo $tipo[0]; ?>">
                            <?php echo $tipo[1]; ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="nom_cate_dev">
                    <div class="nom_devol">
                        <label for="">NOMBRE</label>
                        <select class="devolucion" name="devolucion" id="devolucion" style="text-transform: uppercase;" required>
                            <option value="0">SELECCIONAR</option>
                        </select>
                    </div>

                    <div class="can_de">
                        <label for="">CANTIDAD</label>
                        <input type="number" class="cant_devol" name="cant_devol" id="cant_devol" placeholder="CANTIDAD" required>
                    </div>

                    <div class="boton_de">
                        <input type="button" class="agre_devo" id="agre_devo" value="AGREGAR">
                    </div>
                </div>

            </div>

            <div class="agregarDevolucion_lista">
                <!--lista donde van a ir los insumos agregado-->
                <table class="tabla_devol" id="tabla_devol" style="text-transform: uppercase;">
                    <thead class="tabl">
                        <tr class="tabl-ml">
                            <td class="tabl_ml">CATEGORIA</td>
                            <td class="tabl_ml">NOMBRE</td>
                            <td class="tabl_ml">CANTIDAD</td>
                            <td class="tabl_ml">ACCION</td>
                        </tr>
                    </thead> 
                    <tbody class="ver_devol" id="ver_devol">  </tbody>

                </table>
            </div>

            <div class="enviar_devolucion">
                <div>
                    <input type="button" name="devolver_insu" id="devolver_insu" value="ENVIAR">
                </div>

                <div>
                    <input type="button" id="cancelar_insumo" value="CANCELAR">
                </div>
            </div>



            <!-- <div class="categorias_dev" id="cate">

                <div class="categoriass">
                    <label for="">CATEGORIA</label>    
                        <select class="input6 tip_mat" name="categorias" id="ti_dev" required>
                            <option>SELECCIONAR</option>
                            
                        </select>
                </div>
                <div class="NombreCate">
                    <label for="" class="nome_dev">NOMBRE</label> 
                        <select class="input_nam" name="pres" id="dev_insu" required>
                            <option>SELECCIONAR</option>
                             
                        </select>
                </div>

                <div class="cantidadSe">
                    <label for="">CANTIDAD</label>
                    <input type="number" id="cant_dev" class="canti" placeholder="CANTIDAD">
                </div> -->

                <!-- <div class="bnt">
                    <input type="button" class="btn_dev" id="agregar_dev" value="AGREGAR"> <!-- agregar a la lista -->
                <!-- </div> --> 

            
            
            <!-- </div>
                <div class="agregarTodosLosListadosDev"> -->
                    <!-- ACA VAN TODOS LOS LISTADOS DE LO QUE SEA AGREGUE -->
                    <!-- <table class="tabla_dev" id="tab_dev">
                        <thead class="tab">
                            <tr class="tab-ml">
                                <td class="tab_ml">CATEGORIA</td>
                                <td class="tab_ml">NOMBRE</td>
                                <td class="tab_ml">CANTIDAD</td>
                                <td class="tab_ml">ACCION</td>
                            </tr>
                        </thead>
                        <tbody class="agregado" id="agregado_dev">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table> -->
                    <!-- CA VAN TODOS LOS LISTADOS DE LO QUE SE AGREGUE -->
                <!-- </div>

                <div>
                    <input type="submit" id="envia_dev" value="ENVIAR DEVOLUCION"> <!- enviar a la db -->
                <!--</div>-->
        </form>
    </div>
</div>
<!------------- ventana de prestamo pendiente de material------------------ -->
<!-- <div class="ventana_tres" id="ventana_tres">
    <div class="contentPrestamosPendientes" id="contentPrestamosPendientes">
        <h1>h</h1>
        <div class="cerrar3" id="cerrar3">
            <a href=""><i class="fas fa-times-circle"></i></a>
        </div>


    </div>
      
</div>
<------------- ventana de devolucion pendiente  de material------------------ -->
<div class="ventana_cuatro" id="ventana_cuatro">
    <div class="contentDevolucionesPendientes" id="contentDevolucionesPendientes">
        <h1>HISTORIAL</h1>
        <div class="cerrar4" id="cerrar4">
            <a href=""><i class="fas fa-times-circle"></i></a>
        </div>
        <form method="POST" class="formulario_devol" id="formulario_devol">
            <div class="primeraSeccionFechasDev">
                <div>
                <b>RESPONSABLE : <!-- nombre de la persona logeada --></b> <p style="text-transform: uppercase;"><?=$_SESSION['NOMBRE'] ?></p>
                    <input type="hidden" name="responsable_devol" id="responsable_devol"  value="<?=$_SESSION['DOCUMENTO'] ?>">
                </div>      
                <div>
                    <p>FECHA:</p><p id="fecha_dev" name="fecha_dev"><?php echo $fecha_de; ?></p>
                </div>
                <div>
                    <p>HORA:</p><p id="hora_dev" name="hora_dev"><?php echo $hora_de; ?></p>
                </div>

            </div>

            <!-- tabla devolucion -->
            <table>
            <?php
                $usuario = $_SESSION['DOCUMENTO'];
                $consul="SELECT * FROM accion_realizada
                INNER JOIN estado ON accion_realizada.ID_ESTADO=estado.ID_ESTADO
                WHERE accion_realizada.DOCU_INSTRUCTOR = '$usario' AND accion_realizada.ID_ESTADO = 3";
                $resultado=mysqli_query($connection,$consul);
            ?>
            <thead>
                <tr>
                    <td>ID FACTURA PRESTAMO</td>
                    <td>ESTADO</td>
                    <td>ACCION</td>
                    <!-- <td>DEVOLVER</td>
                    <td>CANCELAR</td> -->
                </tr>
            </thead>
            <?php
                while($mostrar1=mysqli_fetch_assoc($resultado)){
                    $numFactura = $mostrar1['ID_ACCION_REALIZADA'];
            ?>
            <tbody id="enviar_fact" class="enviar_fact">
                <tr>
                   <td style="text-transform: uppercase;" id="num_factura"><?php echo $numFactura; ?></td>
                   <td style="text-transform: uppercase;"><?php echo $mostrar1['ID_ESTADO']; ?></td>
                   <td>
                    
                   <a class="traer_fact" href="devoluciones.php" id="traer_fact" data-id="<?php echo $numFactura; ?>">DEVOLVER</a>
                   </td>
                   <!-- <td><input type="number" class="cant_devol" name="cant_devol" id="cant_devol" placeholder="CANTIDAD" required></td>
                   <td><input type="text" id="obser_devol" name="obser_devol"></td>
                   <td><input type="button" name="devolver_insu" id="devolver_insu" value="ENVIAR"></td>
                   <td><input type="button" id="cancelar_insumo" value="CANCELAR"></td> -->
                </tr>
            </tbody>
            <?php
            }
            ?>
            </table>           

    </div>
      
</div>
    <script src="traer_fact.js"></script>        
    <script src="../../js/users/instru/instru.js"></script>
    <script src="../../js/users/instru/validar_devol.js"></script>
    <script src="../../js/users/instru/valida_prestamo.js"></script>
    <!--libreria para utilizar las alertas-->
    <script src="./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>
</html>