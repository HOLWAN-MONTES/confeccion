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
                        <li><a >REGISTRO DE USUARIOS</a></li>
                        <li><a >EDITAR USUARIOS</a></li>
                        <li><a >ELIMINAR USUARIOS</a></li>
                    </ul>


                </li>
                
                <!-- INGRESO -->
                <li><a>INGRESO</a></li>

                <li><a >DEVOLUCIONES </a></li>

                <!--  INVENTARIOS-->
                <li class="activado"><a>INVENTARIO <i class="icono derecha fas fa-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">wenas</a></li>
                        <li><a href="#">wenas</a></li>
                        <li><a href="#">wenas</a></li>
                        <li><a href="#">wenas</a></li>
                    </ul>
                </li>
                <li><a>REPORTES</a></li>
            </ul>
        </div>

        <div class="logo_institu caja3">
            <img class="logo_inst" src="../../images/logo_sena.png" alt="">
        </div>

    </div>



    <main>

    </main>


</body>

</html>