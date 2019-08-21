<?php
	include('conexion.php');
	
	$año = $_POST['año'];
	
   $enero = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=1 AND YEAR(fecha)='$año'";
   $ejecutar_enero  = $conexion->query($enero);
   $enero = $ejecutar_enero->fetch_assoc();

   $febrero = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=2 AND YEAR(fecha)='$año'";
   $ejecutar_febrero  = $conexion->query($febrero);
   $febrero = $ejecutar_febrero->fetch_assoc();

   $marzo = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=3 AND YEAR(fecha)='$año'";
   $ejecutar_marzo  = $conexion->query($marzo);
   $marzo = $ejecutar_marzo->fetch_assoc();

   $abril = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=4 AND YEAR(fecha)='$año'";
   $ejecutar_abril  = $conexion->query($abril);
   $abril = $ejecutar_abril->fetch_assoc();

   $mayo = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=5 AND YEAR(fecha)='$año'";
   $ejecutar_mayo  = $conexion->query($mayo);
   $mayo = $ejecutar_mayo->fetch_assoc();

   $junio = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=6 AND YEAR(fecha)='$año'";
   $ejecutar_junio  = $conexion->query($junio);
   $junio = $ejecutar_junio->fetch_assoc();
  
   $julio = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=7 AND YEAR(fecha)='$año'";
   $ejecutar_julio  = $conexion->query($julio);
   $julio = $ejecutar_julio->fetch_assoc();


   $agosto = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=8 AND YEAR(fecha)='$año'";
   $ejecutar_agosto  = $conexion->query($agosto);
   $agosto = $ejecutar_agosto->fetch_assoc();


   $septiembre = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=9 AND YEAR(fecha)='$año'";
   $ejecutar_septiembre  = $conexion->query($septiembre);
   $septiembre = $ejecutar_septiembre->fetch_assoc();
   
   $octubre = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=10 AND YEAR(fecha)='$año'";
   $ejecutar_octubre = $conexion->query($octubre);
   $octubre = $ejecutar_octubre->fetch_assoc();

   $noviembre = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=11 AND YEAR(fecha)='$año'";
   $ejecutar_noviembre  = $conexion->query($noviembre);
   $noviembre = $ejecutar_noviembre->fetch_assoc();


  $diciembre = "SELECT avg(humedad) AS r FROM datos WHERE MONTH(fecha)=12 AND YEAR(fecha)='$año'";
  $ejecutar_diciembre  = $conexion->query($diciembre);
  $diciembre = $ejecutar_diciembre->fetch_assoc();


 
	$data = array(0 => round($enero['r'],1),
				  1 => round($febrero['r'],1),
				  2 => round($marzo['r'],1),
				  3 => round($abril['r'],1),
				  4 => round($mayo['r'],1),
				  5 => round($junio['r'],1),
				  6 => round($julio['r'],1),
				  7 => round($agosto['r'],1),
				  8 => round($septiembre['r'],1),
				  9 => round($octubre['r'],1),
				  10 => round($noviembre['r'],1),
				  11 => round($diciembre['r'],1)
				  );			 

	echo json_encode($data);


?>