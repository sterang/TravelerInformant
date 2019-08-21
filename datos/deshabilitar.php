<?php
	$usuario = $_GET["usuario"];
	include ("conexion.php");
	$mysqli = new mysqli($host, $user, $pw, $db);
	$sql = "UPDATE usuarios SET bloqueo='1'  WHERE (nombre_completo='$usuario')";
	
	$result1 = $mysqli->query($sql);
	header('Location: ../administrador.php');

?>