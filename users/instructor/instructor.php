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
            <img id="one" class="logo_pre" src="../../images/Prestamo.jpg" alt="">
        </div>
         <!------------------- devoluciones---------------------- -->
        <div class="dos">
            <img id="two" class="logo_de" src="../../images/devolucion.jpeg" alt="">
        </div>
         <!------------------- devoluciones y prestamos pendientes---------------------- -->
        <div class="tres">
            <img id="tres" class="cuatro" src="../../images/devolucion_pe.PNG" alt="">
            <img id="cuatro" class="cinco" src="../../images/prestamo_pe.PNG" alt="">
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
                <div>
                    <p>FECHA:</p><p id="fecha" name="fecha"><?= $fecha; ?></p>
                </div>
                <div>
                    <p>HORA:</p><p id="hora" name="hora"><?= $hora; ?></p>
                </div>

            </div>

            <div class="categoria" id="categoria">
                <div class="categoriass">
                    <label for="">CATEGORIA</label>    
                    <select class="categ" name="categ" id="categ"  style="text-transform: uppercase;" required>
                        <option value="0">SELECCIONAR</option>
                        <?php
                        $tipoPres = "SELECT * FROM tipo_ingreso";
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
                <!-- ACA VAN TODOS LOS LISTADOS DE LO QUE SEA AGREGUE -->
                <table class="tablaInfo" id="tablaInfo">
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
        <form method="POST" class="formu_dev">
            <div class="primeraSeccionFechasDev">
                <div>
                    <p>RESPONSABLE</p><p id="reponsable_dev"><?php echo $nom; ?></p>
                </div>      
                <div>
                    <p>FECHA</p><p id="fecha_dev"><?php echo $fecha; ?></p>
                </div>
                <div>
                    <p>HORA</p><p id="hora_dev"><?php echo $hora; ?></p>
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

                <div class="bnt">
                    <input type="button" class="btn_dev" id="agregar_dev" value="AGREGAR"> <!-- agregar a la lista -->
                </div>

            
            
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
                    <input type="submit" id="envia_dev" value="ENVIAR DEVOLUCION"> <!-- enviar a la db -->
                <!--</div>-->
        </form>
    </div>
</div>
<!------------- ventana de prestamo pendiente de material------------------ -->
<div class="ventana_tres" id="ventana_tres">
      
</div>
<!------------- ventana de devolucion pendiente  de material------------------ -->
<div class="ventana_cuatro" id="ventana_cuatro">
      
</div>

    <script src="../../js/users/instru/instru.js"></script>
    <script src="../../js/users/instru/valida_prestamo.js"></script>
    <!--libreria para utilizar las alertas-->
    <script src="./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>
</html>