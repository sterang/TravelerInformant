<?php

function conectarse()
{
$servidor="mysql.hostinger.co";
$usuario = "u115764162_city";
$password="080917AMNRT";
$bd = "u115764162_lab3";

$conectar = new mysqli($servidor,$usuario,$password,$bd) or die("No se pudo conectarse a la BD");
return $conectar;

}
$conexion = conectarse();
 


/*
$host = "mysql.hostinger.co";

$user = "u115764162_city";

$pw = "080917AMNRT";

$db = "u115764162_lab3";
*/

?>

