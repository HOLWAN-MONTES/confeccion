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
                        <img src="../../imagesUsers/maria.jpeg"><!-- echo $_SESSION['FOTO'];  -->
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
        
                <form class="form1" action="" method="POST" autocomplete="off"  enctype="multipart/form-data">

                    <!-- caja de documento-nombres-apellidos -->
                    <div class="primeralinea">
                        <div><input class="input1" type="number" name="docu" id="docu" placeholder="DOCUMENTO" required> <!-- &nbsp;&nbsp;&nbsp; --></div>
                        <div><input class="input1" type="text" name="nom" id="nom" placeholder="NOMBRES" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; --></div>
                        <div><input class="input1" type="text" name="apel" id="apel" placeholder="APELLIDOS" required style="text-transform:uppercase"> </div>
                    </div>


                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea">
                        <div>
                            <select class="input1" name="" id=""  required>
                                <option >TIPO DE USUARIO</option>
                                <option value="">aa</option>
                                <option value="">aa</option>
                            </select>
                            <h6 class="agregaradi">CREAR TIPO DE USUARIO</h6>
                        </div>
                        <div>
                            <select class="input1" name="" id=""  required>
                                <option>TIPO DE DOCUMENTO</option>
                                <option value="">aa</option>
                                <option value="">aa</option>
                            </select>
                            <h6 class="agregaradi">CREAR TIPO DE DOCUMENTO</h6>
                        </div>
                        <div><input class="input1" required type="number" name="EDAD" id="" placeholder="EDAD"></div>
                    </div>


                    <!-- caja de password-numerotel-email -->
                    <div class="terceralinea">
                        <div> <input class="input1" type="password" name="contra" id="contra" placeholder="CONTRASEÑA"  pattern="[A-Za-z0-9!?-]{2,12}" required></div>
                        <div><input class="input1" type="number" name="tele" id="tele" placeholder="TELEFONO"  min="1" max="3999999999" required></div>
                        <div><input class="input1" type="email" name="cor" id="cor" placeholder="CORREO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required></div>
                    </div>


                    <!-- caja de foto-enviar -->
                    <div class="cuartalinea">
                        <div><input class="input1 file" type="file" required name="imagen"/></div>
                        <div><input class="input1 regis" type="submit" name="registro" id="reg" value="REGISTRAR"></div>
                    </div>

                
                </form>
            </div>
        </div>

        <!-- SEGUNDO FORMULARIO ==== contenido de editar usuario -->
        <div class="contentEditarUsuario" id="contentEditarUsuario">
            <h1>EDITAR USUARIO</h1>
            <div class="contenFprmularioEditarUsu" id="contenFprmularioEditarUsu">
                <form action="" method="POST">
                <div class="primeralinea2">
                        <div><input class="input2" type="number" name="docu" id="docu" placeholder="DOCUMENTO" required> <!-- &nbsp;&nbsp;&nbsp; --></div>
                        <div><input class="input2" type="text" name="nom" id="nom" placeholder="NOMBRES" required style="text-transform:uppercase"><!-- &nbsp;&nbsp;&nbsp;&nbsp; --></div>
                        <div><input class="input2" type="text" name="apel" id="apel" placeholder="APELLIDOS" required style="text-transform:uppercase"> </div>
                    </div>


                    <!-- caja de tipoDeUsuario-tipoDeDocumento-EDAD -->
                    <div class="segundalinea2">
                        <div>
                            <select class="input2" name="" id=""  required>
                                <option >TIPO DE USUARIO</option>
                                <option value="">aa</option>
                                <option value="">aa</option>
                            </select>
                        </div>
                        <div>
                            <select class="input2" name="" id=""  required>
                                <option>TIPO DE DOCUMENTO</option>
                                <option value="">aa</option>
                                <option value="">aa</option>
                            </select>
                        </div>
                        <div><input class="input2" required type="number" name="EDAD" id="" placeholder="EDAD"></div>
                    </div>


                    <!-- caja de password-numerotel-email -->
                    <div class="terceralinea2">
                        <div> <input class="input2" type="password" name="contra" id="contra" placeholder="CONTRASEÑA"  pattern="[A-Za-z0-9!?-]{2,12}" required></div>
                        <div><input class="input2" type="number" name="tele" id="tele" placeholder="TELEFONO"  min="1" max="3999999999" required></div>
                        <div><input class="input2" type="email" name="cor" id="cor" placeholder="CORREO"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required></div>
                    </div>


                    <!-- caja de foto-enviar -->
                    <div class="cuartalinea2">
                        <div><input class="input2" type="file" required name="imagen"/></div>
                        <div><input class="input2 actualizar" type="submit" name="registro" id="reg" value="ACTUALIZAR"></div>
                    </div>


                </form>
            </div>
        </div>
        <!-- contenido de eliminar usuario -->
        <div class="contentEliminarUsuario" id="contentEliminarUsuario">
            eliminar USUARIOS
        </div>

    </main>




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
</body>

</html>