<?php
session_start();
require_once('../php/conections/conexion.php');

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
    <link rel="stylesheet" href="../css/inventarios/maquinaria.css">
    <title>INVENTARIO MAQUINARIA</title>
</head>

<body>
    <header>
        <div class="titulohea">
            <h1>INVENTARIO DE MAQUINARIA</h1>
        </div>
        <div class="contenedorbotonesCrear">
            <div class="btn-m-users">

                <form action="" method="post" id="">
                    <input type="hidden" name="" value="1">
                    <button id="">CANTIDADES</button>
                </form>

                <form action="" method="post">
                    <button id="todo">TODAS LAS MAQUINAS</button>
                </form>
                <form action="" method="post">
                    <button id="todo">BUEN ESTADO</button>
                </form>
                <form action="" method="post">
                    <button id="todo">REPARACION</button>
                </form>
                <form action="" method="post">
                    <button id="todo">MAL ESTADO</button>
                </form>

                <form action="" method="POST" id="" class="buscarmaquinaria">
                    <input type="number" name="docu" id="buscador-user" placeholder="Buscar">
                </form>

            </div>
            <div class="iconouserr">
                <a href="../users/admin/admin.php">
                    <div>x </div>
                </a>

            </div>
        </div>

    </header>
    <main>
        <div class="contenedorCajaInventario">


            <?php
        $consulta = "SELECT SERIAL_MAQUINARIA,PLACA_SENA,NOM_MAQUINARIA,tipo_maquina.NOM_TIP_MAQUINARIA,marca.NOM_MARCA,color.NOM_COLOR,estado.NOM_ESTADO,OBSERVACIONES FROM maquinaria,tipo_maquina,marca,color,estado where maquinaria.ID_TIP_MAQUINARIA=tipo_maquina.ID_TIP_MAQUINARIA and maquinaria.ID_MARCA=marca.ID_MARCA and maquinaria.ID_COLOR=color.ID_COLOR and maquinaria.ID_ESTADO=estado.ID_ESTADO";

        $consulta_inve = mysqli_query($connection,$consulta);

        foreach ($consulta_inve as $maquinaria){
    ?>
            <div class="contentdocumentosotras">

                <div class="documentosotras">
                    <div>SERIAL :<p>
                            <?=$maquinaria["SERIAL_MAQUINARIA"]?>
                        </p>
                    </div>

                    <div>PLACA SENA :<p>
                            <?=$maquinaria["PLACA_SENA"]?>
                        </p>
                    </div>

                    <div>NOMBRE :<p>
                            <?=$maquinaria["NOM_MAQUINARIA"]?>
                        </p>
                    </div>

                    <div>TIPO DE MAQUINA :<p>
                            <?=$maquinaria["NOM_TIP_MAQUINARIA"]?>
                        </p>
                    </div>

                    <div>MARCA :<p>
                            <?=$maquinaria["NOM_MARCA"]?>
                        </p>
                    </div>

                    <div>COLOR :<p>
                            <?=$maquinaria["NOM_COLOR"]?>
                        </p>
                    </div>
                    <div>ESTADO :<p>
                            <?=$maquinaria["NOM_ESTADO"]?>
                        </p>
                    </div>
                    <div class="observacioneste">OBSERVACIONES :<p>
                            <?=$maquinaria["OBSERVACIONES"]?>
                        </p>
                    </div>
                </div>

                <div class="contentGeneralBtns">
                    <div>
                        <form action="" method="post" id="">
                            <input type="hidden" name="" value="1">
                            <button id="">EDITAR</button>
                        </form>
                    </div>
                    <div>
                        <form action="" method="post" id="">
                            <input type="hidden" name="" value="1">
                            <button id="">ELIMINAR</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
    }
    ?>
        </div>
    </main>


</body>

</html>