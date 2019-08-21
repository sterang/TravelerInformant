<?php
$usuario = $_GET["usuario"];
include ("conexion.php");
$mysqli = new mysqli($host, $user, $pw, $db);
$sql = "SELECT * FROM `usuarios` WHERE (nombre_completo='$usuario')";
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
?>