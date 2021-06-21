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
    <link rel="stylesheet" href="../../css/instructor/index.css">
    <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
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
      
</div>
<!------------- ventana de devolucion de material------------------ -->
<div class="ventana_two" id="ventana_two">
      
</div>
<!------------- ventana de prestamo pendiente de material------------------ -->
<div class="ventana_tres" id="ventana_tres">
      
</div>
<!------------- ventana de devolucion pendiente  de material------------------ -->
<div class="ventana_cuatro" id="ventana_cuatro">
      
</div>


</body>
<script src="../../js/users/instru/instru.js"></script>

</html>