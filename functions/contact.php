<?php
# Contact form system

function mail_send_contact() {  
global $emailSent, $post;if(isset($_POST['submitted'])) 

{ 

if(trim($_POST['contactName']) === '') {    
$nameError = 'Ingresa tu nombre.';    
$hasError = true; } else {    
$name = trim($_POST['contactName']);  
} 

if(trim($_POST['email']) === '')  {   
$emailError = 'Ingresa tu dirección de e-mail.';    
$hasError = true; 
} 

else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {    
$emailError = '¡Email incorrecto!';   
$hasError = true; 
} 

else {    
$email = trim($_POST['email']); 
} 

if(trim($_POST['comments']) === '') {   
$commentError = 'Escribe tu mensaje';   
$hasError = true; 
}

 else {   
if(function_exists('stripslashes')) 
{     

$comments = stripslashes(trim($_POST['comments']));   
} 

else {      
$comments = trim($_POST['comments']);   
} 
} 

if(!isset($hasError)) {   
$emailTo = get_option('tz_email');    
if (!isset($emailTo) || ($emailTo == '') ){     
$emailTo = 'contacto@monitornacional.com';    
}   

$subject = 'CONTACTO - '.$name;   
$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";    
$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;   
wp_mail($emailTo, $subject, $body, $headers);   
$emailSent = true;  
}
}
}
?>