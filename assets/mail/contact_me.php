<?php

if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   


$to = 'contacto@i-com.atwebpages.com';
$email_subject = "Nombre:  $name";
$email_body = "MENSAJE RECIBIDO.\n\n"."Here are the details:\n\nNombre: $name\n\nEmail: $email_address\n\nTelefono: $phone\n\nMensaje:\n$message";
$headers = "De: noreply@yourdomain.com\n"; 
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>