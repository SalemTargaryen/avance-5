<?php
    $Nombres=$_POST["nombre"];
    $Apellidos=$_POST["apellido"];
    $Telefono=$_POST["telefono"];
    $Correo=$_POST["correo"];
    $Edad=$_POST["edad"];
    $Sexo=$_POST["sexo"];
    $Ciudad=$_POST["ciudad"];
    $Sugerencia=$_POST["sugerencia"];

    $body="Nombres: ". $Nombres."<br> Apellidos: ". $Apellidos.
          "<br> Telefono: ". $Telefono.
          "<br> Correo: ". $Correo.
          "<br> Edad: ".$Edad.
          "<br> Sexo: ". $Sexo.
          "<br> Ciudad: ". $Ciudad.
          "<br> Sugerencia: ". $Sugerencia;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings   
    $mail->SMTPDebug = 0;                      // AQUI CAMBIE Enable verbose debug output
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // AQUI CAMBIE Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // AQUI CAMBIE Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alumnosutepe2@gmail.com';                     //SMTP username
    $mail->Password   = 'wsskdvkkcskuesvd';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('alumnosutepe2@gmail.com', 'Cliente');
    $mail->addAddress('alumnosutepe@gmail.com');     //Add a recipient
    $mail->addAddress('batutero.31@gmail.com');               //Name is optional
    $mail->addAddress('u28092000@gmail.com');               //Name is optional


    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Sugerencias';
    $mail->Body    = $body; 
    ;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>
    alert("El mensaje se envió correctamente");
    windows.history.go(-1);
    </script>';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}