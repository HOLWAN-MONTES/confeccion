<?php
    require_once("../conections/conexion.php");

        $celularEdi = $_POST['celularEdi'];
        $correoEdi = $_POST['correoEdi'];
        $claveEdi = $_POST['claveEdi'];
        $documentoEdi = $_POST['documentoEdi'];

    if($celularEdi !== "" && $correoEdi !== "" && $claveEdi !== "" &&  $documentoEdi !==""){
        copy($ruta,$destino);
        $consul = "UPDATE usuario SET CELULAR = '$celularEdi', CORREO = '$correoEdi', CLAVE = '$claveEdi' WHERE DOCUMENTO = '$documentoEdi'";
        $query = mysqli_query($connection,$consul);
        if($query){
            echo "<script>alert('Actualizo');</script>";
        }
    }
    elseif ($celularEdi !== "") {
        $cons_cel = "UPDATE usuario SET CELULAR = '$celularEdi' WHERE DOCUMENTO = '$documentoEdi'";
        $con_cel = mysqli_query($connection, $cons_cel);
        if($con_cel){
            echo "<script>alert('Actualizo El telefono');</script>";
        }
    }
    elseif ($correoEdi !== "") {
        $cons_cel = "UPDATE usuario SET CORREO = '$correoEdi' WHERE DOCUMENTO = '$documentoEdi'";
        $con_cel = mysqli_query($connection, $cons_cel);
        if($con_cel){
            echo "<script>alert('Actualizo El Correo');</script>";
        }
    }
    elseif ($claveEdi !== "") {
        $cons_cel = "UPDATE usuario SET CLAVE = '$claveEdi' WHERE DOCUMENTO = '$documentoEdi'";
        $con_cel = mysqli_query($connection, $cons_cel);
        if($con_cel){
            echo "<script>alert('Actualizo La clave');</script>";
        }
    }
    else{
        echo "<script>alert('paila pai');</script>";  
    }
