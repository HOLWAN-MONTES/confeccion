<?php
session_start();
include('../../php/conections/conexion.php');

$usario = $_SESSION["DOCUMENTO"];
if ($usario == "" || $usario == null) {
    header("location: ../../php/exit/salir.php");
}
$consu = "SELECT * FROM usuario WHERE DOCUMENTO = '$usario' AND ID_TIPO_USU = 2";
$query = mysqli_query($connection , $consu);
$file = mysqli_fetch_assoc($query);
$nom = $file['NOMBRE'];
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
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
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
                <h4>NOMBRE : <?php echo $_SESSION['NOMBRE'] ;?> <?php echo $_SESSION['APELLIDO']; ?></H3>
                <h4> TELEFONO :<?php echo $_SESSION['TELEFONO'] ; ?></h4>
                <h4> CORREO :<?php echo $_SESSION['CORREO'] ; ?></h4>
                <h4> EDAD :<?php echo $_SESSION['EDAD'] ; ?></h4>                  
            </div>
        </div>
         <!-------------------opciones del instructor---------------------- -->
        <div class="acciones">
            <button class="editar"><a href="">EDITAR PERFIL</a></button>
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
        <form action="" method="post" class="formu_presta">
            <div class="primeraSeccionFechas">
                <div>
                    <b>RESPONSABLE = <?php echo $nom; ?></b>
                </div>      
                <div>
                    <b>FECHA = <?php echo $fecha; ?></b>
                </div>
                <div>
                    <b>HORA = <?php echo $hora; ?></b>
                </div>

            </div>
            <div class="categorias" id="cate">

                <div class="categoriass">
                    <label for="">CATEGORIA</label>    
                        <select class="input6 tip_mat" name="categorias" id="ti_pres" required>
                            <option>SELECCIONAR</option>
                            <?php
                            $tipo2 = "SELECT * FROM tipo_material";
                            $inser2 = mysqli_query($connection ,$tipo2);
                            while($tip2 = mysqli_fetch_array($inser2)){
                            ?>
                            <option name="tip_material" id="op_mat" value="<?php echo $tip2[0]; ?>">
                                <?php echo $tip2[1]; ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
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
                    <input type="button" class="btn_agre" id="agregar" value="AGREGAR"> <!-- agregar a la lista -->
                </div>

            
            
            </div>
                <div class="agregarTodosLosListados">
                    <!-- ACA VAN TODOS LOS LISTADOS DE LO QUE SEA AGREGUE -->
                    <table class="tabla_info" id="tab_info">
                        <thead class="tab">
                            <tr class="tab-ml">
                                <td class="tab_ml">CATEGORIA</td>
                                <td class="tab_ml">NOMBRE</td>
                                <td class="tab_ml">CANTIDAD</td>
                                <td class="tab_ml">ACCION</td>
                            </tr>
                        </thead>
                        <tbody class="agregado" id="agregado">
                        </tbody>
                    </table>
                    <!-- CA VAN TODOS LOS LISTADOS DE LO QUE SE AGREGUE -->
                </div>

                <div>
                    <input type="button" value="ENVIAR"> <!-- enviar a la db -->
                </div>      
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
        <form action="" method="post" class="formu_dev">
            <div class="primeraSeccionFechasDev">
                <div>
                    <b>RESPONSABLE = <?php echo $nom; ?></b>
                </div>      
                <div>
                    <b>FECHA = <?php echo $fecha; ?></b>
                </div>
                <div>
                    <b>HORA = <?php echo $hora; ?></b>
                </div>

            </div>
            <div class="categorias_dev" id="cate">

                <div class="categoriass">
                    <label for="">CATEGORIA</label>    
                        <select class="input6 tip_mat" name="categorias" id="ti_dev" required>
                            <option>SELECCIONAR</option>
                            <?php
                            $tipo2 = "SELECT * FROM tipo_material WHERE ID_TIP_MATE = 2";
                            $inser2 = mysqli_query($connection ,$tipo2);
                            while($tip2 = mysqli_fetch_array($inser2)){
                            ?>
                            <option name="tip_material" id="op_mat" value="<?php echo $tip2[0]; ?>">
                                <?php echo $tip2[1]; ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                </div>
                <div class="NombreCate">
                    <label for="" class="nome_dev">NOMBRE</label> 
                        <select class="input_nam" name="pres" id="dev_insu" required>
                            <option>SELECCIONAR</option>
                            <?php
                            $tipo3 = "SELECT * FROM insumos";
                            $inser3 = mysqli_query($connection ,$tipo3);
                            while($tip3 = mysqli_fetch_array($inser3)){
                            ?>
                            <option name="tip_material" id="op_insu" value="<?php echo $tip3[0]; ?>">
                                <?php echo $tip3[1]; ?>
                            </option>
                            <?php
                            }
                            ?>  
                        </select>
                </div>

                <div class="cantidadSe">
                    <label for="">CANTIDAD</label>
                    <input type="number" id="cant_dev" class="canti" placeholder="CANTIDAD">
                </div>

                <div class="bnt">
                    <input type="button" class="btn_dev" id="agregar_dev" value="AGREGAR"> <!-- agregar a la lista -->
                </div>

            
            
            </div>
                <div class="agregarTodosLosListadosDev">
                    <!-- ACA VAN TODOS LOS LISTADOS DE LO QUE SEA AGREGUE -->
                    <table class="tabla_dev" id="tab_dev">
                        <thead class="tab">
                            <tr class="tab-ml">
                                <td class="tab_ml">CATEGORIA</td>
                                <td class="tab_ml">NOMBRE</td>
                                <td class="tab_ml">CANTIDAD</td>
                                <td class="tab_ml">ACCION</td>
                            </tr>
                        </thead>
                        <tbody class="agregado" id="agregado">
                        </tbody>
                    </table>
                    <!-- CA VAN TODOS LOS LISTADOS DE LO QUE SE AGREGUE -->
                </div>

                <div>
                    <input type="button" value="ENVIAR"> <!-- enviar a la db -->
                </div>      
        </form>
    </div>
</div>
<!------------- ventana de prestamo pendiente de material------------------ -->
<div class="ventana_tres" id="ventana_tres">
      
</div>
<!------------- ventana de devolucion pendiente  de material------------------ -->
<div class="ventana_cuatro" id="ventana_cuatro">
      
</div>


</body>
<script src="../../js/users/instru/instru.js"></script>
<script src="../../js/users/instru/valida_insu_mat.js"></script>
</html>