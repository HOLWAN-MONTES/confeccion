<?php
session_start();
include('../../php/conections/conexion.php');

$usario = $_SESSION["DOCUMENTO"];
if ($usario == "" || $usario == null) {
    header("location: ../../php/exit/salir.php");
}
/* 


$sql_marca= "SELECT * from marca";
$consulta_marca = mysqli_query($connection,$sql_marca);

$sql_color = "SELECT * from color";
$consulta_color = mysqli_query($connection,$sql_color);

*/

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
    <link rel="stylesheet" href="../../css/admin/principal.css">
    <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
    <!-- api de Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>ADMINISTRADOR</title>
</head>

<body>

<!-- header con las opciones corresponientes -->
    <header>
        <!-- header de la parte superrior  -->
        <div class="cabecera">
            <div class="superior1">
                <h5 class="title_int"><a class="menuaaa" href="admin.php">ADMINISTRADOR</a> </h5>
            </div>

            <div class="tituloMensaje">

            </div>
            <div class="cabecera1">
                <div class="info_per">
                    <div class="foto">
                        <img src="../../imagesUsers/<?=$_SESSION['FOTO']?>"><!-- echo $_SESSION['FOTO'];  -->
                    </div>
                    <div class="men">
                        <ul>
                            <li class="sub_nom">
                                <div class="mostrarAl">
                                    <?php echo $_SESSION['NOMBRE']; ?>
                                </div>
                                <ul class="mos_nom">
                                   
                                    <li class="tetxt"><a href="../../php/exit/salir.php"> CERRAR SESION</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </header>

    
 <!-- fomularios -->
    <main class="fomularios">
        <!-- PRIMER FORMULARIO DE USUARIO -->
        <div class="contentCrearUsuario" id="contentCrearUsuario">
            <h1>REGISTRO DE USUARIOS</h1>
            <div class="contenFprmularioCrearUsu" id="contenFprmularioCrearUsu">
        
                <form class="form1" method="POST" autocomplete="off"  enctype="multipart/form-data" id="crear_usuario">

                    <!-- caja de documento-nombres-apellidos -->
                    <div class="primeralinea">
                        
                        <div class="formulario__grupo" id="grupo__documento">
                            <label for="">DOCUMENTO</label>    
                            <input class="input1" type="number" name="docu" id="docu" placeholder="DOCUMENTO" maxlength="11" required > <!-- &nbsp;&nbsp;&nbsp; -->
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">El documento solo puede contener numeros y el maximo son 10 dígitos.</p>
                        </div>
                        
                        <div id="grupo__nombres">
                            <label for="">NOMBRES</label>    
                            <input class="input1" type="text" name="nom" id="nom" placeholder="NOMBRES" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y no puede contener numeros ni caracteres especiales.</p>
                        </div>
                        
                        <div id="grupo__apellidos">
                            <label for="">APELLIDOS</label>    
                            <input class="input1" type="text" name="apel" id="apel" placeholder="APELLIDOS" required style="text-transform:uppercase">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">El apellido tiene que ser de 4 a 16 dígitos y no puede contener numeros ni caracteres especiales.</p>
                        </div>
                    </div>


                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea">
                        <div>
                            <label for="">TIPO DE USUARIO</label>    
                            <select class="input1" name="tip_us_crea" id="tip_us_crea"  required style="text-transform:uppercase">
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_usuario";
                                    $inser = mysqli_query($connection,$tipo);
                                    while($tip = mysqli_fetch_array($inser)){
                                ?>
                                <option value="<?php echo $tip[0]; ?>" style="text-transform:uppercase">
                                    <?php echo $tip[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                           <!--  <h6 class="agregaradi" id="btn_tipo_usuario">CREAR TIPO DE USUARIO</h6> -->
                        </div>
                        <div>
                            <label for="">TIPO DE DOCUMENTO</label>    
                            <select class="input1" name="tip_docu" id="tip_docu" required>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_documento";
                                    $inser = mysqli_query($connection,$tipo);
                                    while($tip = mysqli_fetch_array($inser)){
                                ?>
                                <option value="<?php echo $tip[0]; ?>">
                                    <?php echo $tip[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            <h6 class="agregaradi" id="btn_tipo_documento">CREAR TIPO DE DOCUMENTO</h6>
                        </div>
                        <div  id="grupo__nacimiento">
                            <label for="">FECHA NACIMIENTO</label>    
                            <input class="input1" type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="EDAD"  required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                    </div>


                    <!-- caja de password-numerotel-email -->
                    <div class="terceralinea">
                        <div id="grupo__contra">
                            <label for="">CONTRASEÑA</label>    
                            <input class="input1" type="password" name="contra" id="contra" placeholder="CONTRASEÑA"  pattern="[A-Za-z0-9!?-]{2,12}" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.</p>
                        </div>
                        
                        <div id="grupo__telefono">
                            <label for="">TELEFONO</label>    
                            <input class="input1" type="number" name="tele" id="tele" placeholder="TELEFONO"  min="1" max="3999999999" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos.</p>
                        </div>
                        <div id="grupo__correo">
                            <label for="">CORREO</label>    
                            <input class="input1" type="email" name="cor" id="cor" placeholder="USER@MISENA.EDU.CO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                        </div>
                    </div>
                        
                    <!-- caja de foto-enviar -->
                    <div class="cuartalinea cuartalineaEnviar">
                        <div><input class="input1 file" title="Foto de Usuario" type="file" id="imagen" name="imagen" acept="image/" required></div>

                        <div><input class="input1 regis" type="submit" name="registro" id="reg" value="REGISTRAR" ></div>
                    </div>
                    
                </form>
            </div>
        </div>

     

        <!-- ---------------SEGUNDO FORMULARIO ==== contenido de editar usuario---------------------------------------- -->
        <div class="contentEditarUsuario" id="contentEditarUsuario">
            <h1>EDITAR USUARIO</h1>
            <div class="contenFprmularioEditarUsu" id="contenFprmularioEditarUsu">
                <form class="form-edi" id="form-edi" method="POST" autocomplete="off">
                    <div class="primeralinea2">

                        <div>
                            <label for="">DOCUMENTO</label>    
                            <input class="input2" type="number" name="docu" id="docu-edi" placeholder="DOCUMENTO" autocomplete="off" required> <!-- &nbsp;&nbsp;&nbsp; -->
                        </div>

                        <div>
                            <label for="">NOMBRES</label>    
                            <input class="input2" type="text" name="nom" id="nom-edi" placeholder="NOMBRES" autocomplete="off" required style="text-transform:uppercase" readonly><!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                        </div>
                        
                        <div>
                            <label for="">APELLIDOS</label>    
                            <input class="input2" type="text" name="apel" id="apel-edi" placeholder="APELLIDOS" autocomplete="off" required style="text-transform:uppercase" readonly>
                        </div>
                    </div>


                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea2">
                        <div>
                            <label for="">TIPO DE USUARIO</label>    
                            <select class="input2" name="tip_us" id="tip_usu_edi" required disabled>
                                <option >SELECCIONAR</option>
                                <?php
                                $tipo = "SELECT * FROM tipo_usuario";
                                $inser = mysqli_query($connection,$tipo);
                                while($tip = mysqli_fetch_array($inser)){
                                ?>
                                <option name="tip_user" value="<?php echo $tip[0]; ?>">
                                    <?php echo $tip[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="">TIPO DE DOCUMENTO</label>    
                            <select class="input2" name="tip_doc" id="tip_docu_edi" required disabled>
                                <option>SELECCIONAR</option>
                                <?php
                                $tipo2 = "SELECT * FROM tipo_documento";
                                $inser2 = mysqli_query($connection,$tipo2);
                                while($tip2 = mysqli_fetch_array($inser2)){
                                ?>
                                <option name="tip_user" value="<?php echo $tip2[0]; ?>">
                                    <?php echo $tip2[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="">EDAD</label>    
                            <input class="input2" required type="date" name="edad" id="edad-edi" placeholder="EDAD">
                        </div>
                    </div>


                    <!-- caja de password-numerotel-email -->
                    <div class="terceralinea2">
                        <div>
                            <label for="">CONTRASEÑA</label>    
                            <input class="input2" type="password" name="contra" id="contra-edi" placeholder="CONTRASEÑA"  pattern="[A-Za-z0-9!?-]{2,12}" autocomplete="off" required>
                        </div>
                        
                        <div>
                            <label for="">TELEFONO</label>    
                            <input class="input2" type="number" name="tele" id="tele-edi" placeholder="TELEFONO"  min="1" max="3999999999" autocomplete="off" required>
                        </div>

                        <div>
                            <label for="">CORREO</label>    
                            <input class="input2" type="email" name="cor" id="cor-edi" placeholder="CORREO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" autocomplete="off" required readonly>
                        </div>
                        
                        <input type="hidden" name="docume" id="docume-edi">
                    </div>

                    <!-- caja de foto-enviar -->
                    <div class="cuartalinea2 cuartalinea2Enviar">
                        <div><input class="input2 file" type="file" id="imagen" required name="imagen"/></div>
                        <div><input class="input2 actualizar" type="submit" name="actualiza" id="reg" value="ACTUALIZAR"></div>
                    </div>


                </form>
            </div>
        </div>

        <!-------------------TERECER FORMULARIO ===== contenido de eliminar usuario ----------------------------------->
        <div class="contentEliminarUsuario" id="contentEliminarUsuario">
            <h1>ELIMINAR USUARIO</h1>
            <div class="contenFprmularioEliminarUsu" id="contenFprmularioEliminarUsu">
                <form action="" class="form-elim" id="form-elim" method="POST">
                    <div class="primeralinea3">
                        <div>
                            <label for="">DOCUMENTO</label>
                            <input class="input3" type="number" name="docu-elim" id="docu-elim" placeholder="DOCUMENTO" autocomplete="off" required> <!-- &nbsp;&nbsp;&nbsp; -->
                        </div>
                        <div>
                            <label for="">NOMBRES</label>
                            <input class="input3" type="text" name="nom-elim" id="nom-elim" placeholder="NOMBRES" required style="text-transform:uppercase" readonly><!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                        </div>
                        <div>
                            <label for="">APELLIDOS</label>
                            <input class="input3" type="text" name="apel-elim" id="apel-elim" placeholder="APELLIDOS" required style="text-transform:uppercase" readonly> 
                        </div>
                    </div>

                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea3">
                        <div>
                            <label for="">TIPO DE USUARIO</label>
                            <select class="input3" name="tip_us_elim" id="tip_usu_elim" required disabled>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_usuario";
                                    $inser = mysqli_query($connection,$tipo);
                                    while($tip = mysqli_fetch_array($inser)){
                                ?>
                                <option name="tip_user_elim" value="<?php echo $tip[0]; ?>">
                                    <?php echo $tip[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="">TIPO DE DOCUMENTO</label>  
                            <select class="input3" name="tip_doc_elim" id="tip_docu_elim" required disabled>
                                <option>SELECCIONAR</option>
                                <?php
                                    $tipo2 = "SELECT * FROM tipo_documento";
                                    $inser2 = mysqli_query($connection,$tipo2);
                                    while($tip2 = mysqli_fetch_array($inser2)){
                                ?>
                                <option name="tip_user_elim" value="<?php echo $tip2[0]; ?>">
                                    <?php echo $tip2[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="">EDAD</label>
                            <input class="input3" required type="number" name="edad-elim" id="edad-elim" placeholder="EDAD" readonly>
                        </div>
                    </div>


                    <!-- caja de password-numerotel-email -->
                    <div class="terceralinea3">
                        <!-- <div> <input class="input3" type="password" name="contra" id="contra" placeholder="CONTRASEÑA"  pattern="[A-Za-z0-9!?-]{2,12}" required></div> -->
                        <div>
                            <label for="">TELEFONO</label>  
                            <input class="input3" type="number" name="tele-elim" id="tele-elim" placeholder="TELEFONO"  min="1" max="3999999999" required readonly>
                        </div>
                        <input type="hidden" name="docume-elim" id="docume-elim">
                        <div>
                            <label for="">CORREO</label>  
                            <input class="input3" type="email" name="cor-elim" id="cor-elim" placeholder="CORREO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required readonly>
                        </div>
                    </div>


                    <!-- caja de ENVIAR -->
                    <div class="cuartalinea3">
                        <div><input class="input3 eliminar" type="submit" name="eliminar-elim" id="elimi" value="ELIMINAR"></div>
                        <input class="input3 cancelar" type="submit" onclick="resetearFormulario()" id="cancelar" value="CANCELAR">
                    </div>


                </form>
            </div>
        </div>

        <!-- MENU DE DE MAS FORMULARIOS CREARINSUMO-CREAR_MATERIAL_TEXTIL-CREAR_MAQUINARIA -->
        <div class="menusañedidos" id="menusañedidos">
            <div class="crearInsumoa" id="crearInsumoa">
                CREAR INSUMO
            </div>
            <div class="crearmaterialtext" id="crearmaterialtext">
                CREAR MATERIAL TEXTIL
            </div>
            <div class="crearMaquinaria" id="crearMaquinaria">
                CREAR MAQUINARIA
            </div>
        </div>

        <!-- CUARTO FORMULARIO INGRESO DE INSUMOS -->
        <div class="contentIngresoDeInsumos" id="contentIngresoDeInsumos">
            <h1>REGISTRO DE INGRESO DE INSUMOS</h1>
            
            <div class="contengeneralbb">
                <form  action="" method="post" id="form_proveedor">
                    <div class="primeraSeccionFechas">
                        
                        <div>
                            <b>RESPONSABLE = <!-- echo nombre de la persona logueada "admin" --></b> <p><?=$_SESSION['NOMBRE']?></p>
                            <input type="hidden" name="responsable" id="" value="<?=$_SESSION['DOCUMENTO']?>">
                        </div>      
                        <div>
                            <b>PROVEEDOR = <!-- nombre de proveedor --></b> <select name="provedor" id="proveedor"> 
                            <option>Seleccione el proveedor</option>
                <!-- GUYS -->                 <?php
                            $sql_porveedor = "SELECT * from usuario";
                            $consulta_proveedor = mysqli_query($connection,$sql_porveedor);
                            foreach($consulta_proveedor as $proveedor) {
                                ?> <option value="<?=$proveedor['NIT']?>"><?=$proveedor['NOMBRE']?> </option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div>
                            <b>FECHA = <!-- fecha actual-today --></b><p><?=$fecha?></p>
                        </div>
                        <div>
                            <b>HORA = <!-- hora actual- --></b><p><?=$hora?></p>
                        </div>

                    </div>
                </form>
                
                    <div class="categorias">
                        <form method="POST" id="form_camilo">
                            <div class="categoriass">
                                <label for="">CATEGORIA</label>    
                                    <select class="input6" name="categorias" id="materialbdcamilo" required>
                                        <option>SELECCIONAR</option>
                                        <option value="material_textil">material textil</option>
                                        <option value="insumos">insumos</option>
                                        <option value="maquinaria">maquinaria</option>
                                    </select>
                            </div>
                        </form>
                        <form method="POST" autocomplete="off" id="productos">
                            <div class="fff">
                                <div id="factura"></div>    
                                <div class="NombreCate">
                                        <label for="">NOMBRE</label> 
                                        <select class="input6" name="categorias" id="tip_docu_edi" required>
                                            <option>SELECCIONAR</option>
                                            <div id="elementos"></div>
                                        </select>
                                </div>

                                <div class="cantidadSe">
                                    <label for="">CANTIDAD</label>
                                    <input type="number" placeholder="CANTIDAD">
                                </div>
                            
                           

                                <div class="bnt">
                                    <input type="button" value="AGREGAR" id="btn_productos"> <!-- agregar a la lista -->
                                </div>
                            </div>
                        </form>    
                       
                       
                    </div>
                        <div class="agregarTodosLosListados">
                                    <!-- ACA VAN TODOS LOS LISTADOS DE LO QUE SEA AGREGUE -->
                                    ACA VAN TODOS LOS LISTADOS DE LO QUE SE AGREGUE
                        </div>
                        
                        <div class="btnesEnv_can">
                            <div>
                                <input type="button" value="ENVIAR"> <!-- enviar a la db -->
                            </div>
                            <div>
                                <input type="button" value="CANCELAR">
                            </div> 
                        </div>
                      
                </form>
            </div>
          
        
        </div>

        <!-- -----------------------------------------INVENTARIOS---------------- -->
    <!-- inventario de maquinaria -->
    <div class="contenedorinventariomaquinariageneral">
            
            </div>
        
            <!-- inventario de material textil -->
            <div class="contenedorinventariomaterialtextgeneral">
        
            </div>
        
            <!-- inventario de insumos -->
            <div class="contenedorinventarioinsumos">
        
            </div>

    </main>




   <!----------------------- SUB FORMULARIOS USUARIO-------------- ---------------------- -->
            <!--crear usuario  -->
    <div class="containerCrearUsuario" id="containerCrearUsuario">
        <div class="containerFormularioUsuario">
            
                <i class="fas fa-times" id="btn_esconder_containerCrearUsuario"></i>
        
            <div >
                
                <h1>CREAR TIPO DE USUARIO</h1>
                <form   action="#" method="POST">
                    
                    <div><input class="inptnombre" type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>
        </div>
        
    </div>

        <!-- crear tipo de documento -->
    <div class="containerCrearTipDocumento" id="containerCrearTipDocumento">
        <div class="containerFormularioDocumento">
        
                <i class="fas fa-times" id="btn_esconder_containerCrearTipDocumento"></i>
            
        
            <div >
                <h1>CREAR TIPO DE DOCUMENTO</h1>
                <form method="POST" id="crear_tipo_documento">
                    <div><input class="inptnombre"  type="text" name="nom_tipo_docu" id="nom_tipo_docu" placeholder="NOMBRE" required style="text-transform:uppercase"></div>
                    <div><input class="btn_peque_form" id="reg_docu" type="submit" value="CREAR"></div>
                </form>
            </div>

        </div>
    </div>
 


    <!----------------------------------------- MOSTRAR TODOS LOS USUARIOS REGISTRADOS------------------------- -->
    <div class="todosLosusuarios" id="todosLosusuarios">
            <!-- boton de cerrar los usuarios -->
                <div>
                <i id="desaparecerTodosUsers" class="cerrarTodosUsers fas fa-times-circle"></i>
                </div>
        <div class="contentFormularioUsers">
            <table border="1" style="border-collapse: collapse;border:1px solid #ff6212;width: 1250px;">
                <caption class="TituloUsers">TABLA DE USUARIOS REGISTRADOS</caption>
                <thead>
                    <tr>
                        <th class="tit">DOCUMENTO</th>
                        <th class="tit">TIPO DOCUMENTO</th>
                        <th class="tit">TIPO USUARIO</th>
                        <th class="tit">NOMBRE</th>
                        <th class="tit">APELLIDO</th>
                        <th class="titEdad">EDAD</th>
                        <th class="tit">TELEFONO</th>
                        <th class="tit">CORREO</th>
                        <th class="tit">FOTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql= "SELECT  DOCUMENTO,NOM_TIP_DOCU,NOM_TIP_USU,NOMBRE,APELLIDO,FECHA_NACIMIENTO,CELULAR,CORREO,FOTO from tipo_usuario,tipo_documento,usuario where usuario.ID_TIP_DOCU=tipo_documento.ID_TIP_DOCU and usuario.ID_TIP_USU = tipo_usuario.ID_TIP_USU";
                        $result=mysqli_query($connection,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
                        
                            ?>
                            <tr>
                                <td class="filas"><?php echo $mostrar[0] ?></td>
                                <td class="filas"><?php echo $mostrar[1] ?></td>
                                <td class="filas"><?php echo $mostrar[2] ?></td>
                                <td class="filas"><?php echo $mostrar[3] ?></td>
                                <td class="filas"><?php echo $mostrar[4] ?></td>
                                <td class="filasEdad"><?php echo $mostrar[5] ?></td>
                                <td class="filas"><?php echo $mostrar[6] ?></td>
                                <td class="filas"><?php echo $mostrar[7] ?></td>
                                <td class="filas"><?php echo $mostrar[8] ?></td>
                                <!-- <td class="filas"><img style="width:50px;" alt="Sin foto" src="../../imagesUsers/<?= $mostrar[8]?>"></td> -->
                            

                            </tr>	  
                        <?php
                        }   
                    ?>
                
                </tbody>
            </table>
        </div>
            
    </div>

    <!-- ------------------------------------------------------------------------------------ -->


    <!----------------- SUB FORMULARIOS CREAR INSUMOS ----------------------------------- -->
    <!-- crear insumo -->
    <div class="containerCrearInsumo" id="containerCrearInsumo">
            <div class="content_general_form">
            <i id="insumo_cerrar" class="insumo_cerrar fas fa-times"></i>
                <h1>INGRESO DE INSUMO</h1>
                    <form  class="content_formulario_crearInsumo" action="" method="POST" id="CrearInsumoForm">
                        <div class="primeralinea5">
                            <div>
                                <label for="">TIPO DE INSUMO</label>    
                                <select class="input5" name="tip_insumo" required style="text-transform:uppercase">
                                    <option >SELECCIONAR</option>
                                    <?php
                                        $tipo = "SELECT * FROM tipo_insumo";
                                        $inser = mysqli_query($connection,$tipo);
                                        while($tip = mysqli_fetch_array($inser)){
                                    ?>
                                    <option value="<?php echo $tip[0]; ?>" style="text-transform:uppercase">
                                        <?php echo $tip[1]; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <h6 class="agregaradi agregaradi5" id="btn_tipo_insumo">CREAR TIPO DE INSUMO</h6>
                            </div>
                            <div>
                                <label for="">NOMBRE DEL INSUMO</label>
                                <input class="input5 NombreInsumo" type="text" name="NombreInsumo" id="NombreInsumo" placeholder="NOMBRE DEL INSUMO" required style="text-transform:uppercase">
                            </div>
                        </div>

                        <div class="segundalinea5">
                            <div>
                                <label for="">MARCA DEL INSUMO</label>    
                                <select class="input5" name="marca_insumo"  required style="text-transform:uppercase">
                                    <option >SELECCIONAR</option>
                                    <?php
                                        $tipo = "SELECT * FROM marca";
                                        $inser = mysqli_query($connection,$tipo);
                                        while($tip = mysqli_fetch_array($inser)){
                                    ?>
                                    <option value="<?php echo $tip[0]; ?>">
                                        <?php echo $tip[1]; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <h6 class="agregaradi agregaradi5" id="btn_marca_insumo">CREAR MARCA</h6>
                            </div>
                            <div>
                                <label for="">COLOR DEL INSUMO</label>    
                                <select class="input5" name="color_insumo"  required style="text-transform:uppercase">
                                    <option >SELECCIONAR</option>
                                    <?php
                                        $tipo = "SELECT * FROM color";
                                        $inser = mysqli_query($connection,$tipo);
                                        while($tip = mysqli_fetch_array($inser)){
                                    ?>
                                    <option value="<?php echo $tip[0]; ?>">
                                        <?php echo $tip[1]; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <h6 class="agregaradi agregaradi5" id="btn_crear_color">CREAR COLOR</h6>
                            </div>
                        </div>

                        <div class="terceralinea5">
                                <div>
                                <input  type="submit" name="BtnCrearInsumo" id="BtnCrearInsumo" value="CREAR" >
                                </div>
                        </div>
                       
                    </form>
            </div>
    </div>

    <!-- crear material textil -->
    <div class="containerCrearMaterialTextil" id="containerCrearMaterialTextil">
        <div class="contentFormMaterialG">
            <i id="cerrarmaterialTex" class="cerrarmaterialTex fas fa-times"></i>
            <div class="tituloMaterialTextil">
                <b>CREAR MATERIAL TEXTIL</b>
            </div>
            <div >
                <form action="" method="post" class="rojo" id="crear_tela">
                    <div class="primerafilaMaterialtext">
                        <div class="filasinter">
                            <label for="">NOMBRE MATERIAL TEXTIL</label>
                            <input class="input7" type="text" name="nombre_tela" style="text-transform:uppercase">
                        </div>
                        <div class="filasinter">
                            <label for="">TIPO DE TELA</label>
                            <select class="input7" name="tipo_tela" id="tip_usu_elim" required style="text-transform:uppercase">
                                    <option >SELECCIONAR</option>
                                    <?php
                                    $sql_tela = "SELECT * from tipo_material_textil";
                                    $consulta_tela = mysqli_query($connection,$sql_tela);
                                        foreach ($consulta_tela as $tipo_tela){
                                    ?>
                                    <option  value="<?=$tipo_tela['ID_TIP_MATE_TEXTIL']?>">
                                    <?=$tipo_tela['NOM_TIP_MATE_TEXTIL']?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                    
                            </select>
                            <h6 class="agregaradi" id="crartipodetela">CREAR TIPO DE TELA</h6>
                        </div>
                        <div class="filasinter">
                            <label for="">MARCA</label>
                            <select class="input7" name="marca" id="tip_usu_elim" required style="text-transform:uppercase">
                                    <option >SELECCIONAR</option>
                                    <?php
                                        foreach ( $consulta_marca as $marca){
                                    ?>
                                    <option value="<?=$marca['ID_MARCA']?>">
                                        <?=$marca['NOM_MARCA']?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                   
                            </select>
                            <h6 class="agregaradi" id="btncrearmarcatela">CREAR MARCA</h6>
                        </div>                

                    </div>
                    <div class="segundafilaMaterialtext">
                        <div class="filasinter">
                            <label for="">COLOR</label>
                                <select class="input7" name="color" id="" required style="text-transform:uppercase">
                                    <option >SELECCIONAR</option>
                                    <?php
                                        foreach($consulta_color as $color){
                                    ?>
                                    <option name="" value="<?=$color['ID_COLOR']?>">
                                        <?=$color['NOM_COLOR']?> 
                                    </option>
                                    <?php
                                    }
                                    ?>
                                    
                            </select>
                            <h6 class="agregaradi" id="crearcolormaterial">CREAR COLOR</h6>
                        </div>   
                        <div class="filasinter">
                            <label for="">METRAJE</label>
                            <input class="input7" placeholder="" type="number" required>
                        </div>
                     <!--    <div class="filasinter">
                            <label for="">CANTIDAD ROLLOS</label>
                            <input class="input7" placeholder="" type="number" required>
                        </div>   -->

                    </div>
                    <div class="tercerafilaMaterialtext">
                        <input class="input7"  type="button" value="CREAR" id="btn_crear_tela">
                    </div>
                </form>

            </div>
        </div>   
    </div>

    <!-- crear maquinaria -->
    <div class="containerCrearmaquinaria" id="containerCrearmaquinaria">
        
        <div class="contetFoMaquinaria">
            <div class="cerrarMaqui" id="cerrarMaquinaria">X</div>
            <div class="tituloMaqui">
                <b>INGRESO DE MAQUINARIA</b>
            </div>
            <div>
               
                <form  action="" class="formularioCrearMaqui">
                    
                    <div class="primeraLineaMa">
                        <div class="asd">
                            <label for="">SERIAL</label>
                            <div>
                            <input type="text" name="" id="">
                            </div>
                            
                        </div>
                        <div class="asd">
                            <label for="">PLACA SENA</label>
                            <input type="text" >
                        </div>
                    </div>
                    
                    <div class="segundaLineaMa">
                        <div>
                            <label for="">MARCA DE MAQUINARIA </label>    
                            <select class="input5" name="tip_insumo"  required>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_usuario";
                                    $inser = mysqli_query($connection,$tipo);
                                    while($tip = mysqli_fetch_array($inser)){
                                ?>
                                <option value="<?php echo $tip[0]; ?>">
                                    <?php echo $tip[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            <h6 class="agregaradi agregaradi5" id="bntcrearmarcamaqui">CREAR MARCA</h6>
                        </div>
                        <div>
                            <label for="">COLOR DE MAQUINARIA</label>    
                            <select class="input5" name="tip_insumo"  required>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM color";
                                    $inser = mysqli_query($connection,$tipo);
                                    while($tip = mysqli_fetch_array($inser)){
                                ?>
                                <option value="<?php echo $tip[0]; ?>">
                                    <?php echo $tip[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            <h6 class="agregaradi agregaradi5" id="crearcolormaqui">CREAR COLOR </h6>
                        </div>
                        <div>
                            <label for="">TIPO DE MAQUINARIA</label>    
                            <select class="input5 labeltipma" name="tip_insumo"  required>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_usuario";
                                    $inser = mysqli_query($connection,$tipo);
                                    while($tip = mysqli_fetch_array($inser)){
                                ?>
                                <option value="<?php echo $tip[0]; ?>">
                                    <?php echo $tip[1]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            <h6 class="agregaradi agregaradi5" id="creartipodemaquinarr">CREAR TIPO DE MAQUINARIA</h6>
                        </div>
                    </div>

                    <div class="terceraLineaMa">
                        <input type="button" value="ENVIAR">
                    </div>

                </form>

            </div>
        </div>
      
    </div>

    
    <!--FORMULARIOS PEQUEÑOS PARA CREAR TIPOS 'COLOR-MARCA-ETC...'  -->
    
   

    <div class="crearTipoDeInsumo" id="crearTipoDeInsumo">
        <div class="containerTip">
                
                <div class="btncrrarALl" id="cerrartipoinsumo">X</div>
            <div>
                
                <h1>CREAR TIPO DE INSUMO</h1>
                <form class="contentform"  action="#" method="POST">
                    
                    <div><input class="inptnombre" type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="CrearMarca" id="CrearMarca">
        <div class="containerTip">
                
                <div class="btncrrarALl" id="cerrarmarcac">X</div>
            <div>
                
                <h1>CREAR MARCA</h1>
                <form class="contentform"  action="#" method="POST">
                    
                    <div><input class="inptnombre" type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="CrearColor" id="CrearColor">
        <div class="containerTip">
                
                <div class="btncrrarALl" id="crearcolorb">X</div>
            <div>
                
                <h1>CREAR COLOR</h1>
                <form class="contentform"  action="#" method="POST">
                    
                    <div><input class="inptnombre" type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="crearTipoDeTele" id="crearTipoDeTele">
        <div class="containerTip">
                
                <div class="btncrrarALl" id="btncerrartipodetela">X</div>
            <div>
                
                <h1>CREAR TIPO DE TELA</h1>
                <form class="contentform"  action="#" method="POST">
                    
                    <div><input class="inptnombre" type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="crearMarcaMaterialTextil" id="crearMarcaMaterialTextilf">
        <div class="containerTip">
                
                <div class="btncrrarALl" id="btncerrarmaterialtext">X</div>
            <div>
                
                <h1>CREAR MARCA</h1>
                <form class="contentform"  action="#" method="POST">
                    
                    <div><input class="inptnombre" type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="crearTipoDeMaquinaria" id="crearTipoDeMaquinaria">
        <div class="containerTip">
                
                <div class="btncrrarALl" id="btncerrartipodemaqui">X</div>
            <div>
                
                <h1>CREAR TIPO DE MAQUINARIA</h1>
                <form class="contentform"  action="#" method="POST">
                    
                    <div><input class="inptnombre" type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>
        </div>
    </div>

    

    <!-- caja delado izquierdo de los menus --------------------------->
    <div class="lateral">

        <div class="img_logo caja1">
            <img class="img_lo" src="../../images/LOGO_EM.png" alt="">
        </div>

        <div class="menu caja2">
            <ul class="menu2">
                <!-- ADMINISTRADOR DE USUARIOS -->
                <li class="activado"><a>ADMIN.USUARIOS <i class="icono derecha fas fa-chevron-down"></i></a>
                    <ul>
                        <li id="registroUsu" class="uno registroUsuarios"><a >REGISTRO DE USUARIOS</a></li>
                        <li id="editarUsu" class="uno edita"><a >EDITAR USUARIOS</a></li>
                        <li id="eliminarUsu" class="uno eliminar"><a >ELIMINAR USUARIOS</a></li>
                        <li id="UsuariosRegistrados" class="uno usersRegis"><a >USUARIOS REGISTRADOS</a></li>
                    </ul>


                </li>
                
                <!-- INGRESO -->
                <li id="ingreso" class="activado"><a>INGRESO </a></li>
                    

                <li id="devoluciones"><a >DEVOLUCIONES </a></li>
               
                <!--  INVENTARIOS-->
                <li class="activado"><a>INVENTARIO <i class="icono derecha fas fa-chevron-down"></i></a>
                    <ul>
                        <li id="invMaquinaria" class="uno invMaquinaria"><a>INV DE MAQUINARIA</a></li>
                        <li id="invMaterialText" class="uno invMateralT"><a>INV DE MATERIAL TEXTIL</a></li>
                        <li id="invInsumo" class="uno invInsumos"><a>INV DE INSUMOS</a></li>
                    </ul>
                </li>
                <li id="reportes"><a>REPORTES</a></li>
            </ul>
        </div>

        <div class="logo_institu caja3">
            <img class="logo_inst" src="../../images/logo_sena.png" alt="">
        </div>

    </div>


    <script src="../../js/users/admin/main.js"></script>
    <script src="../../js/users/admin/editar_users.js"></script>
    <script src="../../js/users/admin/eliminar_usu.js"></script>
    <script src="../../js/users/admin/created_user.js"></script>
    <script src="../../js/users/admin/ingreso_insumo.js"></script>
    <script src="../../js/users/admin/created_insu.js"></script>
    <script src="./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>