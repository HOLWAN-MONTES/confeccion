<?php
session_start();
include('../../php/conections/conexion.php');
$_POST=json_decode(file_get_contents('php://input'),true);
/* $numFactura = (isset($_POST['trayendo_fact']))?$_POST['trayendo_fact']:null; */
$numFactura = $_GET['trayendo_fact'];
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
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>  
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
                $consul="SELECT * FROM detalle_accion INNER JOIN accion_realizada on detalle_accion.ID_ACCION_REALIZADA=accion_realizada.ID_ACCION_REALIZADA 
                INNER JOIN insumo ON detalle_accion.ID_INSUMO=insumo.ID_INSUMO
                INNER JOIN estado ON accion_realizada.ID_ESTADO=estado.ID_ESTADO
                WHERE detalle_accion.ID_ACCION_REALIZADA = '$numFactura'";
                $resultado=mysqli_query($connection,$consul);
            ?>
            <thead>
                <tr>
                    <td>ID FACTURA PRESTAMO</td>
                    <td>INSUMO PRESTADO</td>
                    <td>CANTIDAD DE INSUMOS PRESTADOS</td>
                    <td>CANTIDAD A DEVOLVER</td>
                    <td>DEVOLVER</td>
                    
                </tr>
            </thead>
            <?php
                while($mostrar1=mysqli_fetch_assoc($resultado)){
            ?>
            <tbody>
                <tr>
                   <td id="num_fac" style="text-transform: uppercase;"><?php echo $numFactura; ?></td>
                   <td style="text-transform: uppercase;"><?php echo $mostrar1['NOM_INSUMO']; ?></td>
                   <td id="canti" style="text-transform: uppercase;"><?php echo $mostrar1['CANTIDAD']; ?></td>
                   <td>
                        <form action="validar_devol.php" id="form_dev" method ="POST">
                            <input type="number"  id ="cantidad_devolver" name = "cantidad_devolver">
                            <input type="submit" name="enivar_devol" value="DEVOLVER">
                        </form>
                    </td>
                   <td>
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
        </form>             
    </div>
      
</div>
<script src="traer_fact.js"></script>  
</body>
</html>
