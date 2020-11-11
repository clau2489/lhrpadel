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
     !isset($_POST["producto"]) ||
     !isset($_POST["preciofinal"]) || 
     !isset($_POST["telefono"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}



$producto = $_POST['producto'];
$tipoenvio = $_POST['metodo'];
$preciofinal = $_POST['preciofinal'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$provincia = $_POST['provincia'];
$cp = $_POST['cp'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

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
$mail->Body = "Se ha efectuado una compra a traves de tu sitio web.<br/>
Te pasamos los detalles de la compra para que puedas contactarte con el comprador:<br/> 

Nombre y Apellido:". $nombre ."<br/> 
Direccion:". $direccion ."<br/>
Ciudad:". $ciudad ."<br/>
Provincia:". $provincia ."<br/>
Codigo Postal:". $cp ."<br/>
Telefono del Cliente:". $telefono ."<br/>   
Producto:". $producto ."<br/>  
Importe: $". $preciofinal ."<br/> 
Metodo de Envio:". $tipoenvio ." <br/><br/>
Comunicate con este numero para coordinar entrega del producto"; // Texto del email en formato HTML

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