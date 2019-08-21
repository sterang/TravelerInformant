<?php
		$usuario = $_GET["usuario"];
		include ("conexion.php");
	
		$mysqli = new mysqli($host, $user, $pw, $db);
		$sql = "SELECT * FROM `datos` WHERE (id=(SELECT MAX(id) FROM datos WHERE id_mod =1) )";
		$result1 = $mysqli->query($sql);
		$row1 = $result1->fetch_array(MYSQLI_NUM);
		$estado_temp = $row1[2];
		$estado_hum = $row1[3];
		$lluvia = $row1[4];
		//Si quieres enviar la información en un link
		$sql = "SELECT * FROM `datos` WHERE (id=(SELECT MAX(id) FROM datos WHERE id_mod=2) )";
		$result1 = $mysqli->query($sql);
		$row1 = $result1->fetch_array(MYSQLI_NUM);
		$estado_temp1 = $row1[2];
		$estado_hum1 = $row1[3];
		$lluvia1 = $row1[4];

		header('Location: geo.php?numerotem='.$estado_temp.'&numerohum='.$estado_hum.'&numerolluvia='.$lluvia.'&numerotem1='.$estado_temp1.'&numerohum1='.$estado_hum1.'&numerolluvia1='.$lluvia1.'&usuario='.$usuario);
		echo $estado_temp." C";
?>