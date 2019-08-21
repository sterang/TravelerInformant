<?php
$usuario = $_GET["usuario"];
include ("datos/conexion.php");
$mysqli = new mysqli($host, $user, $pw, $db);
$sql = "SELECT * FROM `usuarios` WHERE (nombre_completo='$usuario')";
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulario de Registro</title>
	<link rel="stylesheet" href="index_style.css">
</head>
<body>
	<section id="formulario">
		<p id="titulo">Bienvenidos a City By Engineer</p>
		<form method="POST" action = "modificar.php">
			<p id="name">Nombre</p>
			<input type="text" id="nombre" name="nombre" value=<?php echo $row1[1]  ?> required>
			<p id="direction">Direccion</p>
			<input type="text" id="direccion" name="direccion" value=<?php echo $row1[2]?> required>
			<p id = "car">Carro</p>
			<input type="text" id="carro" name="carro" value=<?php echo $row1[3]  ?> >
			<p id="email">Correo</p>
			<input type="mail" id="correo" name="correo" value=<?php echo $row1[8]  ?> required>
			<p id="logar">Login</p>
			<input type="text" id="login" name="login" value=<?php echo $row1[5]  ?> required>
			<p id="contrasena">Contraseña</p>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Modificar" >
		</form>
	</section>

</body>
</html>
 