<?php

$error = '';

//VALIDANDO NOMBRE
if(empty($_POST["nombre"])){
    $error = 'Ingresa un nombre </br>';
}else{
    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $nombre = trim($nombre);
    if($nombre==''){
        $error .= 'Name required</br>';
    }
}
//VALIDANDO E-MAIL
if(empty($_POST["email"])){
    $error .= 'E-mail required</br>';
}else{
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= 'Ingresa un E-mail verdadero</br>';
    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}
//VALIDANDO MENSAJE
if(empty($_POST["mensaje"])){
    $error .= 'Comment required </br>';
}else{
    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $mensaje = trim($mensaje);
    if($mensaje==''){
        $error .= 'Comment is empty</br>';
    }
}

//CUERPO DEL MENSAJE
$cuerpo .= "Nombre: ";
$cuerpo .= $nombre;
$cuerpo .= "<br>";
 
$cuerpo .= "Email: ";
$cuerpo .= $email;
$cuerpo .= "<br>";
 
$cuerpo .= "Mensaje: ";
$cuerpo .= $mensaje;
$cuerpo .= "<br>";

//DIRECCIÓN
$enviarA = 'isaryaime19@gmail.com'; //REEMPLAZAR CON TU CORREO ELECTRÓNICO
$asunto = 'Nuevo mensaje de mi sitio web';

//ENVIAR CORREO
if($error == ''){
    
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@weavewigsbraids.com';                 // SMTP username
        $mail->Password = '17338418i';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom($email, $nombre);
        $mail->addAddress($enviarA);     // Add a recipient
    
        //Attachments
        $mail->addAttachment($destino);         // Add attachments
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;

        // Activo condificacción utf-8
        $mail->CharSet = 'UTF-8';
    
        $mail->send();
        echo 'exito';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }


}else{
    echo $error;
}

unlink($destino); //borra el archivo temporal del servidor

//ENVIAR CORREO
/*if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
}else{
    echo $error;
}*/

?>