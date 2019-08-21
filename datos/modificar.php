<?php

$name = $_POST["name"];
$direccion = $_POST["direccion"];
$carro = $_POST["carro"];
$correo = $_POST["correo"];
$login = $_POST["login"];
$password = $_POST["password"];
include ("conexion.php");
	
$mysqli = new mysqli($host, $user, $pw, $db);
$sql = "UPDATE usuarios SET nombre_completo='$name',direccion='$direccion',carro='$carro',login='$login',password='$password' WHERE (nombre_completo='$name')";
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
header('Location: Login.php?mensaje=5');		


?>
