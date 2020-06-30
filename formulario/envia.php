<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) ||
     !isset($_POST["direccion"]) ||
     !isset($_POST["email"]) ||
     !isset($_POST["preciofinal"]) || 
     !isset($_POST["telefono"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$preciofinal = $_POST['preciofinal'];
$telefono = $_POST['telefono'];


$mensaje = $nombre + $direccion + $email + $telefono + $preciofinal;

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1800635.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "no-reply@c1800635.ferozo.com";  // Mi cuenta de correo
$smtpClave = "7*qwvrXV6C";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "lhrpadel@hotmail.com";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = 'Un cliente ha comprado desde tu sitio web'; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Compra desde su sitio web<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Comunicate con este numero para coordinar entrega del producto"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$total = $_POST['total'];

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo 
    "
    <!DOCTYPE HTML>
    <html lang='es'>
    <head>
    <meta charset='utf-8'/>
    <title>Formulario</title>
    <link href='styles.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <form action='../mercadopago/index.php' method='post' class='form-consulta' >
            <img src='../assets/img/lhrpadel.png' style='width: 70px;'>

            <br><br>
            
            <input type='hidden' name='preciofinal' id='preciofinal'
                value='". $total ."' class='campo-form'>

            <h4> Mensaje enviado al vendedor </h4>    

            <h1>Total a pagar: $ ". $total ." .-</h1>
            
            
            <input type='submit' value='Ir a Mercado Pagos' class='btn-form'>
            
            </form>
             
        </body>
    </html>
    ";
} else {
    echo 
    "
    <!DOCTYPE HTML>
    <html lang='es'>
    <head>
    <meta charset='utf-8'/>
    <title>Formulario</title>
    <link href='styles.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <form action='../mercadopago/index.php' method='post' class='form-consulta' >
            <img src='../assets/img/lhrpadel.png' style='width: 70px;'>

            <br><br>
            
            <input type='hidden' name='preciofinal' id='preciofinal'
                value='". $total ."' class='campo-form'>

            <h4> Mensaje no enviado </h4>    

            <h1>Total a pagar: $ ". $total ." .- </h1>
            
            
            <input type='submit' value='Ir a Mercado Pagos' class='btn-form'>
            
            </form>
             
        </body>
    </html>
    "
    ;
}