<?php
$contact_name = $_POST['name'];
$contact_email = $_POST['email'];
$contact_comentarios = $_POST['message'];
$sujeto = $_POST['subject'];


if( $contact_name == true )
{
	$sender = $contact_email;
	$receiver = "jonathan.fer.de@gmail.com";
	$client_ip = $_SERVER['REMOTE_ADDR'];
	$email_body = "
	Sujeto: $sujeto
	Nombre: $contact_name
	Email: $contact_email
	Mensaje: $contact_comentarios
	Direccion IP: $client_ip";		
	$extra = "De: $sender\r\n" . "Responder a: $sender \r\n" . phpversion();

	if( mail( $receiver, "Info Contacto - $contact_name", $email_body, $extra ) ) 
	{
		header('location:index.html?msj=send');
		/*echo "Sus datos han sido recibidos, gracias por visitar nuestro website, estaremos en contacto con usted a la brevedad posible.\n
		USTED SERA REDIRECCIONADO AUTOMATICAMENTE A LA PAGINA DE CONTACTOS";*/
		
	}
	else
	{
		header('location:index.html?msj=error');
	}
}
?>