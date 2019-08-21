<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulario de Registro</title>
	<link rel="stylesheet" href="index_style.css">
</head>
<body>
	<section id="formulario">
		<p id="titulo">Registro Administrador</p>
		<form method="POST" action="register.php" >
			<input type="text" id="nombre" name="nombre" placeholder="Nombre Completo" required>
			<input type="text" id="direccion" name="direccion" placeholder="Direccion" required>
			<input type="text" id="carro" name="carro" placeholder="Carro">
			<input type="mail" id="correo" name="correo" placeholder="Correo" required>
			<input type="text" id="login" name="login" placeholder="Login" required>
			<input type="password" id="password" name="password" placeholder="Contraseña" required>
			
			<input type="submit" value="Registrar">
		</form>
	</section>

</body>
</html>
 