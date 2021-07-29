<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php
    require_once("../php/conections/conexion.php");
    session_start();

        $id = $_POST['id_deta'];

        $actualizar="UPDATE accion_realizada SET ID_ESTADO =3 WHERE ID_ACCION_REALIZADA=$id";
        $consultaRR = mysqli_query($connection,$actualizar);

        if($consultaRR){
            echo  "<script> 
            Cambiar();
            function Cambiar(){
                Swal.fire({
                    icon: 'success',
                    title: 'PRESTAMO ACEPTADO',
                    html:`
                        <p class='parrafoPass'>Se ha registrado correctamente el prestamo aceptado.</p><br>
                        <a href='prestamos.php'><button>Volver</button></a>
                        `,
                    showConfirmButton: false,
                })
            }
            </script>";
        }else{
        echo  "<script> 
            Cambiar();
            function Cambiar(){
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    html:`
                        <p class='parrafoPass'>Lo sentimos, no fue posible realizar esta acción.</p><br>
                        <a href='prestamos.php'><button>Volver</button></a>
                        `,
                    showConfirmButton: false,
                })
            }
            </script>";
            
        }


?>