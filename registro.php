<?php
//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['enviar'])){
//Guardamos en variables los datos enviados

$email = $_POST['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$pais = $_POST['pais'];
$telefono = $_POST['telefono'];
$tema = $_POST['tema'];
 
///Validamos del lado del servidor que el nombre y el email no estén vacios
if($nombre == ''){
echo "Debe ingresar su nombre";
}
else if($email == ''){
echo "Debe ingresar su email";
}else{
$para = "ivan@metrics2index.com";//Email al que se enviará
$asunto = "Solicitud para publicar en Monitor Nacional";//Puedes cambiar el asunto del mensaje desde aqui
//Este sería el cuerpo del mensaje
$mensaje = "
<table border='0' cellspacing='3' cellpadding='2'>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
<td width='80%' align='left'>$nombre</td>
</tr>
<tr>
<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
<td align='left'>$email</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
<td width='70%' align='left'>$telefono</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Ciudad:</strong></td>
<td width='70%' align='left'>$ciudad</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>País:</strong></td>
<td width='70%' align='left'>$pais</td>
</tr>
</table>
";
 
//Cabeceras del correo
$headers = "From: $nombre <$email>\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 
	//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	if(mail($para, $asunto, $mensaje, $headers)){
	echo "Su mensaje se ha enviado correctamente";
	echo "<br />";
	echo '<a href="../formulario_contacto.html">Volver</a>';
	}else{
	echo "Hubo un error en el envío inténtelo más tarde";
	}
}
}
?>