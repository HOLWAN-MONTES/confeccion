<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['comentarios'];

if($nombre !== "" && $apellido !== "" && $email !== "" && $telefono !== "" && $mensaje !== ""){
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
    
        //Recipients
        $mail->setFrom('cofeccion7@gmail.com', 'Contactenos');
        $mail->addAddress('cofeccion7@gmail.com', 'prueba');     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'OPINIONES';
        $mail->Body    = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="barcode.php">
            <title> Contactenos </title>
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
            <div><label><b>NOMBRE:</b></label><label>'.$nombre.'</label><br></div><br><br>
            <div><label><b>APELLIDO:</b></label><label>'.$apellido.'</label><br></div><br><br>
            <div><label><b>EMAIL:</b></label><label> '.$email.'</label><br></div><br><br>
            <div><label><b>TELEFONO:</b></label><label>'.$telefono.'</label><br></div><br><br>
            <div><p><b>MENSAJE:</b>'.$mensaje.'</p></div>
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
    echo '<script>alert("LLENA LOS CAMPOS COMPLETAMENTE")</script>'; 
    echo '<script>window.location="../seccionesIndex/contactenos.html"</script>';
}

?>