<?php
require_once('../php/conections/conexion.php');
session_start();

?>
<?php
    $sql_re = "SELECT * FROM tipo_usu";
    $query_re = mysqli_query($connection, $sql_re);
    $fila_re = mysqli_fetch_assoc($query_re);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- api de Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/login.css">
    <title>LOGIN</title>
</head>

<body>
    <div class="atras">
    <a href="../index.html"><i class="fas fa-times-circle"></i></a>
    </div>
    <div class="aaaaaaaaaaa">
        <div class="infor">
         <div class="tet">
            <h1 >S.I PARA LA ENTRADA, SALIDA Y ALMACENAMIENTO DE MATERIAL TEXTIL</h1>
         </div>
           
            <div class="content">
                <h2>INICIO DE SESION</h2>
                <div class="dddd">
                    <div class="contentLogo">
                        <img class="iamgenCos" src="../images/COSTUD.png" alt="">
                    </div>
                   
                </div>
                    
                <form method="POST" id="formularioenviar" autocomplete="off">
                    <div class="agregoF" id="agregoF"></div>

                        <input type="number" name="docuaprendiz" id="usuario" placeholder="DOCUMENTO" maxlength="12"  style="text-transform:uppercase">
                    
                        <input type="password" name="claveaprendiz" id="password" placeholder="Ingrese Clave" maxlength="20"  style="text-transform:uppercase">
                        <select class="seleccionTipo" id="tipodocu" name="tipodocu">
                            <option value="0">SELECCIONE SU CARGO</option>
                            <?php
                            foreach ($query_re as $tipo) : ?>
        
                            <option value="<?php echo $tipo['ID_TIPO_USU'] ?>">
                                
                                <?php echo $tipo['NOM_TIPO_USU'] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select><br> 
                    
                        <button class="btnEnviar" id="crear">INGRESAR</button>
                    
                </form>
            
        </div>
    </div>
</body>
<script src="../js/users/login/validacion.js"></script>
</html>

