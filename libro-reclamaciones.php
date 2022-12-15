<?php
    // PARTE 1 
    $FechaIncidente=$_POST["fecha-incidente3"];
    $Nombres=$_POST["nombres3"];
    $Apellidos=$_POST["apellidos3"];
    $Correo=$_POST["correo3"];
    $Telefono=$_POST["telefono3"];
    $Edad=$_POST["edad3"];
    $TipodeDocumento=$_POST["tipo-documento3"];
    $NumDocumento=$_POST["num-documento3"];
    $Direccion=$_POST["direccion3"];
    $Departamento=$_POST["departamento3"];
    $Provincia=$_POST["provincia3"];
    $Distrito=$_POST["distrito3"];
    // PARTE 2
    $TipoReclamo=$_POST["tipo-reclamo3"];
    $MontoReclamo=$_POST["monto-reclamado3"];
    $DescripcionReclamo=$_POST["descripcion-reclamo3"];
    // PARTE 3
    $Reclamacion=$_POST["reclamacion3"];
    $NumPedido=$_POST["num-pedido3"];
    $FechaPedido=$_POST["fecha-pedido3"];
    $Detalle=$_POST["descripcion-reclamo3"];
    $Pedido=$_POST["pedido-en-concreto3"];
    // PARTE 4
    $FechaRespuesta=$_POST["fecha-respuesta3"];
    $Acciones=$_POST["acciones-reclamo3"];

    $body="IDENTIFICACION DEL CONSUMIDOR RECLAMANTE <br>".
          "Fecha del incidente: ". $FechaIncidente.  
          "<br>Nombres: ". $Nombres.
          "<br> Apellidos: ". $Apellidos.
          "<br> Correo: ". $Correo.
          "<br> Telefono: ". $Telefono.
          "<br> Edad: ".$Edad.
          "<br>Tipo de documento: ". $TipodeDocumento.
          "<br>Numero de documento:". $NumDocumento.
          "<br>Direccion: ". $Direccion.
          "<br>Departamento: ". $Departamento.
          "<br>Provincia: ". $Provincia.
          "<br>Distrito: ". $Distrito.
          "<br>IDENTIFICACION DEL BIEN CONTRATADO <br>".
          "Tipo de reclamo: ". $TipoReclamo.
          "<br>Monto reclamado: ". $MontoReclamo.
          "<br>Descripcion del reclamo: ". $DescripcionReclamo.
          "<br>DETALLE DE LA RECLAMACION Y PEDIDO DEL CONSUMIDOR <br>".
          "Reclamacion: ". $Reclamacion.
          "<br>Numero de pedido: ". $NumDocumento.
          "<br>Fecha del pedido: ". $FechaPedido.
          "<br>Detalle: ". $Detalle.
          "<br>Pedido en concreto". $Pedido.
          "<br>OBSERVACIONES Y ACCIONES ADOPTADAS POR EL PROVEEDOR <br>".
          "Fecha de la respuesta: ". $FechaRespuesta.
          "<br>Acciones tomadas: ". $Acciones;

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
    $mail->Subject = 'Resumen del reclamo realizado';
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