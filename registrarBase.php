<?php

	$usuario=$_POST['nombre'];
	$password= $_POST['password'];
	$passwd_comp = md5($password);
	$login=$_POST['login'];
	$email=$_POST['correo'];
	$carro=$_POST['carro'];
	$direccion=$_POST['direccion'];		
	

	include("datos/conexion.php");

    $mysqli = new mysqli($host, $user, $pw, $db);

    $sql = "INSERT INTO usuarios(nombre_completo,password,correo,carro,direccion,login,tipo_usuario) VALUES ('$usuario','$passwd_comp','$email','$carro','$direccion','$login','2')";
    
    $result1=$mysqli->query($sql); 

	header('location: index.html');
	
?>