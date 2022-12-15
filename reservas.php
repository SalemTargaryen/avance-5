<?php
    $Nombres=$_POST["nombre2"];
    $Apellidos=$_POST["apellido"];
    $Correo=$_POST["correo"];
    $Telefono=$_POST["telefono"];
    $Local=$_POST["local"];
    $Npersonas=$_POST["num-personas"];
    $Fecha=$_POST["fecha-reserva"];
    $Hora=$_POST["hora-reserva"];
    $Nivel=$_POST["nivel"];

    $body2="NOMBRES: ". $Nombres."<br> APELLIDOS: ". $Apellidos.
    "<br> CORREO: ". $Correo.
    "<br> TELEFONO: ". $Telefono.
    "<br> LOCAL: ". $Local.
    "<br> CANTIDAD DE COMENSALES: ".$Npersonas.
    "<br> FECHA DE RESERVA: ". $Fecha.
    "<br> HORA DE LA RESERVA: ". $Hora.
    "<br> NIVEL: ". $Nivel;

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
    $mail->Subject = 'RESERVACION';
    $mail->Body    =  "RESERVACION REGISTRADA <br> <br>" .$body2. "<br> <br>Powered by Grupo 1."; 
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