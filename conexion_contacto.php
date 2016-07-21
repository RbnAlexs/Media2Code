<?php
	$nombre = $_POST['name'];
	$correo = $_POST['email'];
	$telefono = $_POST['phone'];
//------------------------CONEXION A BASE DE DATOS
	if (isset ($_POST['name']) && !empty ($_POST['name'])) //que exista, y si esta vacia o no tiene ningun valor(empty)//!negacion
	{
	$conexion = mysql_connect("mysql51-065.wc1", "920381_custom", "a1s2d3f45G") or die(mysql_error("error de conexion"));
	mysql_select_db('920381_clientes', $conexion) or die (mysql_error("no se ha podido seleccionar la base de datos"));
	$cadena = "INSERT INTO registros_nuevos (nombre, correo, telefono) 
			values ('$nombre', '$correo', '$telefono')";
	$resultado = mysql_query($cadena,$conexion);

	echo='<a href="http://www.developserver.mi.php54-2.ord1-1.websitetestlink.com/metrics/">regresar</a>';
	}
?>