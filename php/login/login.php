<?php
    session_start();
    require_once('../conections/conexion.php');
 
            $documento = $_POST["docuaprendiz"];
            $clave = $_POST["claveaprendiz"];
            $tipo_usu = $_POST["tipoUSU"];

            
            if($documento != "" && $clave != "" && $tipo_usu != ""){
              
                $verificar_DOCUMENTO = mysqli_query($connection, "SELECT * FROM usuario WHERE DOCUMENTO='$documento'");

                if(mysqli_num_rows($verificar_DOCUMENTO) > 0){
                    
                   
                    $verficar_clave = mysqli_query($connection, "SELECT * FROM usuario WHERE CLAVE='$clave' AND DOCUMENTO='$documento'");
                    if(mysqli_num_rows($verficar_clave) > 0){
                        $verficar_tipusu = mysqli_query($connection, "SELECT * FROM usuario WHERE CLAVE='$clave' AND DOCUMENTO='$documento' and ID_TIP_USU='$tipo_usu'");
                        if(mysqli_num_rows($verficar_tipusu) > 0){

                            $sql = "SELECT * from usuario where DOCUMENTO = '$documento' and CLAVE = '$clave' and ID_TIP_USU = '$tipo_usu'";
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
                                else{
                                    // datos equivocados 
                                    echo 8;
                                }

                            }else{
                                echo 7;
                            }
                        }else{
                            echo 6 ;
                        }


                    }else{
                        echo 5;
                    }

                }else{
                    /* EL DOCUMENTO NO EXISTE */
                    echo 4;
                }
            
            }else{
                /* complete los campos  */
                echo 3;
            }                       
?>     