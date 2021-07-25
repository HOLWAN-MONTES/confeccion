<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../conection.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$email = $_POST['email'];

date_default_timezone_set("America/Bogota");
$fecha = date("o-m-d");
$hora = date("H:i:s"); 



if( $email !== "" ){

    $consul="SELECT * FROM usuario where CORREO ='$email'";
    $consultag = mysqli_query($connection,$consul);
    $dato = mysqli_fetch_assoc($consultag);

    $_SESSION['CLAVE'] = $dato['CLAVE'];
    
    if($dato){
        echo "funciono";
        echo $_SESSION['CLAVE'];

        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    try {
        //Server settings
        //Habilitar la salida de depuración detallada
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();           // Enviar usando SMTP                                 
        $mail->Host       = 'smtp.gmail.com';                     // Configurar el servidor SMTP para enviar
        $mail->SMTPAuth   = true;                                   // Habilita la autenticación SMTP
        $mail->Username   = 'cofeccion7@gmail.com';                     //SMTP username
        $mail->Password   = 'confeccion21_21';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //recibirdor de clave
        $mail->setFrom($email, 'RECORDATORIO DE CLAVE DE SEGURIDAD');
        $mail->addAddress($email, 'prueba');     
    
        //Content
        $mail->isHTML(true);                                
        $mail->Subject = 'RECORDATORIO CLAVE';
        $mail->Body    = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="barcode.php">
            <title> CONTRASEÑA </title>
        </head>
        <style>
            
            
            main div{
                border: 1px solid red;
                font-size: 25px;
                margin: 6px;
                text-align: left;
            }
            
        </style>
        <body>
        <main>
        <div>
        
        La contraseña de la cuenta de confeccion con '.$email.' fue recordada el dia '.$fecha.' ' .$hora.' (GMT).
        Si has sido tú, puedes ver tranquilamente este correo electrónico. <br>
        Información de seguridad recordada: <br> <br>
        
        <hr>
        </div>
        <b>USUARIO :</b> <br>
        '.$email.' <br> 
        <b>FECHA :</b> '.$fecha.' <br>
       
        Si no has sido tú, la seguridad de tu cuenta está en peligro. Sigue estos pasos: <br>
        1. Restablezca su contraseña. <br>
        2. Hay que revisar la información de seguridad. <br>
        3. Contactate con el administrador <br>
        Gracias,
        
          <hr>
          <div><label><b>CLAVE:</b></label><label>'.$_SESSION['CLAVE'].'</label><br></div><br><br>
         
           
          
        </main>
         
        
        
        </body>
        </html>';
    
        $mail->send();
        echo '<script>alert ("Tu mensaje se envio con exito");</script>';
        echo '<script>window.location="../seccionesIndex/contactenos.html"</script>'; 
    
    } catch (Exception $e) {
        echo "Error Presentado: {$mail->ErrorInfo}";
    }
        
    }else{
        echo '<script>alert ("Tu mensaje se envio con exito");</script>';
        echo '<script>window.location="../seccionesIndex/contactenos.html"</script>';
        
    }


    
}else{
    echo '<script>alert("LLENA LOS CAMPOS COMPLETAMENTE")</script>'; 
    echo '<script>window.location="../seccionesIndex/contactenos.html"</script>';
}

?>