<?php
$name = $_POST["nombre"];
$direccion = $_POST["direccion"];
$carro = $_POST["carro"];
$correo = $_POST["correo"];
$login = $_POST["login"];
$password = $_POST["password"];
$passwd_comp = md5($password);
include ("datos/conexion.php");
$mysqli = new mysqli($host, $user, $pw, $db);
$sql = "UPDATE usuarios SET nombre_completo='$name',direccion='$direccion',carro='$carro',login='$login',password='$passwd_comp' WHERE (nombre_completo='$name')";
$result1 = $mysqli->query($sql);
header('Location: Login.php?mensaje=5');
?>
