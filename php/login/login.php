<?php
    session_start();
    require_once('../conections/conexion.php');
 
            $documento = $_POST["docuaprendiz"];
            $clave = $_POST["claveaprendiz"];
            $tipo = $_POST["tipodocu"];

            
            if($documento != "" && $clave != "" && $tipo != ""){
                $sql = "SELECT * from usuario where DOCUMENTO = '$documento' and CLAVE = '$clave' and ID_TIP_USU = '$tipo'";
                $consulta = mysqli_query($connection,$sql);
                $dato_SQL = mysqli_fetch_assoc($consulta);

                if($dato_SQL){
                   
                    $_SESSION['DOCUMENTO'] = $dato_SQL['DOCUMENTO'];
                    $_SESSION['TIPO_USUARIO']= $dato_SQL['ID_TIP_USU'];
                    $_SESSION['NOMBRE']= $dato_SQL['NOMBRE'];
                    $_SESSION['APELLIDO']= $dato_SQL['APELLIDO'];
                    $_SESSION['EDAD']= $dato_SQL['FECHA_NACIMIENTO'];
                    $_SESSION['CORREO']= $dato_SQL['CORREO'];
                    $_SESSION['TELEFONO']= $dato_SQL['CELULAR'];
                    $_SESSION['FOTO']= $dato_SQL['FOTO'];


                    if($_SESSION['TIPO_USUARIO'] == 1){
                        //tipo admin
                        echo 1;
                        
                    }
                    elseif($_SESSION['TIPO_USUARIO'] == 2){
                        //tipo instruc
                        echo 2;
                        
                    }
                    elseif($_SESSION['TIPO_USUARIO'] == 3){
                        //tipo aprendiz
                        echo 3;
                        
                    }
                    else{
                        // datos equivocados 
                        echo 4;
                    }
                }else{
                    echo 4;
                   
                }

            }else{
                echo 6;
              
            }

        


                        
?>     