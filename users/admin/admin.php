<?php
session_start();
include('../../php/conections/conexion.php');

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
    <link rel="stylesheet" href="../../css/admin/principal.css">
    <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
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
                                    <li class="tetxt"><a href="#"> EDITAR PERFIL</a></li>
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
            <div class="contenFprmularioCrearUsu">
        
                <form class="form1" action="" method="POST" autocomplete="off"  enctype="multipart/form-data" id="crear_usuario">

                    <!-- caja de documento-nombres-apellidos -->
                    <div class="primeralinea">
                        
                        <div>
                            <label for="">NUMERO DE DOCUMENTO</label>    
                            <input class="input1" type="number" name="docu" id="docu" placeholder="DOCUMENTO" required> <!-- &nbsp;&nbsp;&nbsp; -->
                        </div>
                        
                        <div>
                            <label for="">NOMBRES</label>    
                            <input class="input1" type="text" name="nom" id="nom" placeholder="NOMBRES" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                        </div>
                        
                        <div>
                            <label for="">APELLIDOS</label>    
                            <input class="input1" type="text" name="apel" id="apel" placeholder="APELLIDOS" required style="text-transform:uppercase">
                        </div>
                    </div>


                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea">
                        <div>
                            <label for="">TIPO DE USUARIO</label>    
                            <select class="input1" name="tip_us_crea"  required>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_usu";
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
                           
                        </div>
                        <div>
                            <label for="">TIPO DE DOCUMENTO</label>    
                            <select class="input1" name="tip_docu" id="" required>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_docu";
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
                        <div>
                            <label for="">EDAD</label>    
                            <input class="input1" required type="number" name="EDAD" id="" placeholder="EDAD">
                        </div>
                    </div>


                    <!-- caja de password-numerotel-email -->
                    <div class="terceralinea">
                        <div>
                        <label for="">CONTRASEÑA</label>    
                            <input class="input1" type="password" name="contra" id="contra" placeholder="CONTRASEÑA"  pattern="[A-Za-z0-9!?-]{2,12}" required>
                        </div>
                        
                        <div>
                            <label for="">TELEFONO</label>    
                            <input class="input1" type="number" name="tele" id="tele" placeholder="TELEFONO"  min="1" max="3999999999" required>
                        </div>
                        <div>
                            <label for="">CORREO</label>    
                            <input class="input1" type="email" name="cor" id="cor" placeholder="USER@MISENA.EDU.CO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
                        </div>
                    </div>


                    <!-- caja de foto-enviar -->
                    <div class="cuartalinea cuartalineaEnviar">
                        <div><input class="input1 file" title="Foto de Usuario" type="file" required name="imagen" /></div>
                        <div><input class="input1 regis" type="submit" name="registro" id="reg" value="REGISTRAR" ></div>
                    </div>

                
                </form>
            </div>
        </div>

     

        <!-- ---------------SEGUNDO FORMULARIO ==== contenido de editar usuario---------------------------------------- -->
        <div class="contentEditarUsuario" id="contentEditarUsuario">
            <h1>EDITAR USUARIO</h1>
            <div class="contenFprmularioEditarUsu" id="contenFprmularioEditarUsu">
                <form class="form-edi" id="form-edi" method="POST">
                    <div class="primeralinea2">

                        <div>
                            <label for="">DOCUMENTO</label>    
                            <input class="input2" type="number" name="docu" id="docu-edi" placeholder="DOCUMENTO" autocomplete="off" required> <!-- &nbsp;&nbsp;&nbsp; -->
                        </div>

                        <div>
                            <label for="">NOMBRES</label>    
                            <input class="input2" type="text" name="nom" id="nom-edi" placeholder="NOMBRES" autocomplete="off" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                        </div>
                        
                        <div>
                            <label for="">APELLIDOS</label>    
                            <input class="input2" type="text" name="apel" id="apel-edi" placeholder="APELLIDOS" autocomplete="off" required style="text-transform:uppercase">
                        </div>
                    </div>


                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea2">
                        <div>
                            <label for="">TIPO DE USUARIO</label>    
                            <select class="input2" name="tip_us" id="tip_usu_edi" required>
                                <option >SELECCIONAR</option>
                                <?php
                                $tipo = "SELECT * FROM tipo_usu";
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
                            <select class="input2" name="tip_doc" id="tip_docu_edi" required>
                                <option>SELECCIONAR</option>
                                <?php
                                $tipo2 = "SELECT * FROM tipo_docu";
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
                            <input class="input2" required type="number" name="edad" id="edad-edi" placeholder="EDAD">
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
                            <input class="input2" type="email" name="cor" id="cor-edi" placeholder="CORREO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" autocomplete="off" required>
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
                            <input class="input3" type="text" name="nom-elim" id="nom-elim" placeholder="NOMBRES" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                        </div>
                        <div>
                            <label for="">APELLIDOS</label>
                            <input class="input3" type="text" name="apel-elim" id="apel-elim" placeholder="APELLIDOS" required style="text-transform:uppercase"> 
                        </div>
                    </div>

                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea3">
                        <div>
                            <label for="">TIPO DE USUARIO</label>
                            <select class="input3" name="tip_us_elim" id="tip_usu_elim" required>
                                <option >SELECCIONAR</option>
                                <?php
                                    $tipo = "SELECT * FROM tipo_usu";
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
                            <select class="input3" name="tip_doc_elim" id="tip_docu_elim" required>
                                <option>SELECCIONAR</option>
                                <?php
                                    $tipo2 = "SELECT * FROM tipo_docu";
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
                            <input class="input3" required type="number" name="edad-elim" id="edad-elim" placeholder="EDAD">
                        </div>
                    </div>


                    <!-- caja de password-numerotel-email -->
                    <div class="terceralinea3">
                        <!-- <div> <input class="input3" type="password" name="contra" id="contra" placeholder="CONTRASEÑA"  pattern="[A-Za-z0-9!?-]{2,12}" required></div> -->
                        <div>
                            <label for="">TELEFONO</label>  
                            <input class="input3" type="number" name="tele-elim" id="tele-elim" placeholder="TELEFONO"  min="1" max="3999999999" required>
                        </div>
                        <input type="hidden" name="docume-elim" id="docume-elim">
                        <div>
                            <label for="">CORREO</label>  
                            <input class="input3" type="email" name="cor-elim" id="cor-elim" placeholder="CORREO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
                        </div>
                    </div>


                    <!-- caja de ENVIAR -->
                    <div class="cuartalinea3">
                        <div><input class="input3 eliminar" type="submit" name="eliminar-elim" id="elimi" value="ELIMINAR"></div>
                    </div>


                </form>
            </div>
        </div>



        <!-- CUARTO FORMULARIO INGRESO DE INSUMOS -->
        <div class="contentIngresoDeInsumos" id="contentIngresoDeInsumos">
            <h1>REGISTRO DE INGRESO DE INSUMOS</h1>
                <div class="contentFormularioCrearInsumos">
                    <form action="" method="POST">
                    <div class="primeralinea4">
                        <div>
                            <label for="">INSUMO</label>
                            <select class="input4 label4 " name="" id=""  required>
                                <option>SELECCIONAR </option>
                                <option value="">aa</option>
                                <option value="">aa</option>
                            </select>
                            <h6 class="agregaradi">CREAR INSUMO</h6>
                        </div>
                        <div>
                        <label for="">CANTIDAD DE INSUMOS</label>    
                        <input class="input4" type="text" name="nom" id="nom" placeholder="CANTIDAD" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; --></div>
                       
                    </div>
                    <div class="segundalinea4">
                        <div>
                            <label for="">MATERIAL TEXTIL</label>
                            <select class="input4 label4" name="" id=""  required>
                                <option>SELECCIONAR</option>
                                <option value="">aa</option>
                                <option value="">aa</option>
                            </select>
                            <h6 class="agregaradi">CREAR MATERIAL TEXTIL</h6>
                        </div>
                        <div>
                        <label for="">CANTIDAD MATERIAL TEXTIL</label>
                            <input class="input4" type="text" name="nom" id="nom" placeholder="CANTIDAD" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; --></div>
                       
                    </div>
                    <div class="terceralinea4">
                        <div>
                            <label for="">MAQUINARIA</label>
                            <select class="input4 label4" name="" id=""  required>
                                <option>SELECCIONAR</option>
                                <option value="">aa</option>
                                <option value="">aa</option>
                            </select>
                            <h6 class="agregaradi">CREAR MAQUINARIA</h6>
                        </div>
                        <div>
                            <label for="">CANTIDAD MAQUINARIA</label>
                            <input class="input4" type="text" name="nom" id="nom" placeholder="CANTIDAD" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; --></div>
                       
                    </div>

                    <div class="cuartalinea4 cuartalinea4Enviar4">
                        <div><input class="input4 registrarInsumo" type="submit" name="registro" id="reg" value="REGISTRAR"></div>
                    </div>

                    </form>
                </div>
        </div>
    </main>


   <!----------------------- SUB FORMULARIOS USUARIO-------------- ---------------------- -->
            <!--crear usuario  -->


        <!-- crear tipo de documento -->
    <div class="containerCrearTipDocumento" id="containerCrearTipDocumento">
        <div class="containerFormularioDocumento">
        
                <i class="fas fa-times" id="btn_esconder_containerCrearTipDocumento"></i>
            
        
            <div >
                <h1>CREAR TIPO DE DOCUMENTO</h1>
                <form action="#" method="POST">
                    <div><input class="inptnombre"  type="text" placeholder="NOMBRE" required ></div>
                    <div><input class="btn_peque_form" type="button" value="CREAR"></div>
                </form>
            </div>

        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------ -->


    <!----------------- SUB FORMULARIOS CREAR INSUMOS----------------------------------- -->
    <!-- crear insumo -->
    <div class="containerCrearInsumo" id="containerCrearInsumo">
            <div class="content_general_form">
                <h1>INGRESO DE INSUMO</h1>
                    <form  class="content_formulario_crearInsumo" action="" method="POST">
                        <div class="primeralinea5">
                            <div>
                                <label for="">TIPO DE INSUMO</label>    
                                <select class="input5" name="tip_insumo"  required>
                                    <option >SELECCIONAR</option>
                                    <?php
                                        $tipo = "SELECT * FROM tipo_usu";
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
                                <h6 class="agregaradi agregaradi5" id="btn_tipo_insumo">CREAR TIPO DE INSUMO</h6>
                            </div>
                            <div>
                                <label for="">NOMBRE DEL INSUMO</label>
                                <input class="input5 NombreInsumo" type="text" placeholder="NOMBRE DEL INSUMO" required>
                            </div>
                        </div>

                        <div class="segundalinea5">
                            <div>
                                <label for="">MARCA DEL INSUMO</label>    
                                <select class="input5" name="marca_insumo"  required>
                                    <option >SELECCIONAR</option>
                                    <?php
                                        $tipo = "SELECT * FROM tipo_usu";
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
                                <select class="input5" name="color_insumo"  required>
                                    <option >SELECCIONAR</option>
                                    <?php
                                        $tipo = "SELECT * FROM tipo_usu";
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
                                    <input type="button" value="CONTINUAR">
                                </div>
                        </div>
                       
                    </form>
            </div>
    </div>

    <!-- crear material textil -->
    <div class="containerCrearMaterialTextil" id="containerCrearMaterialTextil">
        CONTAINER CREAR MATERIAL TEXTIL
    </div>

    <div class="containerCrearmaquinaria" id="containerCrearmaquinaria">
        CONTAINER CREAR MAQUINARIA
    </div>





    <!-- caja delado izquierdo de los menus -->
    <div class="lateral">

        <div class="img_logo caja1">
            <img class="img_lo" src="../../images/COSTUD.png" alt="">
        </div>

        <div class="menu caja2">
            <ul class="menu2">
                <!-- ADMINISTRADOR DE USUARIOS -->
                <li class="activado"><a>ADMIN.USUARIOS <i class="icono derecha fas fa-chevron-down"></i></a>
                    <ul>
                        <li id="registroUsu" class="uno registroUsuarios"><a >REGISTRO DE USUARIOS</a></li>
                        <li id="editarUsu" class="uno edita"><a >EDITAR USUARIOS</a></li>
                        <li id="eliminarUsu" class="uno eliminar"><a >ELIMINAR USUARIOS</a></li>
                    </ul>


                </li>
                
                <!-- INGRESO -->
                <li id="ingreso"><a>INGRESO</a></li>

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
</body>

</html>