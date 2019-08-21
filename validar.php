<?php

// PROGRAMA DE VALIDACION DE USUARIOS
                   
                                                       
$login = $_POST["login1"];
$passwd = $_POST["passwd1"];

$passwd_comp = md5($passwd);
session_start();

//echo "login es...".$login;
//echo "password es...".$passwd;

include ("datos/conexion.php");

$mysqli = new mysqli($host, $user, $pw, $db);
       
$sql = "SELECT * from usuarios where login = '$login'";
//echo "sql es...".$sql;
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
$numero_filas = $result1->num_rows;

if ($numero_filas > 0)
  {
    if ($row1[8]=='0'){
    $passwdc = $row1[5];

    if ($passwdc == $passwd_comp)
      {
        $_SESSION["autenticado"]= "SI";
        $tipo_usuario = $row1[6];
        $nombre_usuario = $row1[1];
        if ($tipo_usuario == 1)
          $_SESSION["tipo_usuario"]= "Administrador";
        if ($tipo_usuario == 2)
          $_SESSION["tipo_usuario"]= "Usuario Premium";
        $_SESSION["nombre_usuario"]= $nombre_usuario;  
        
        header("Location: datos/obtenerTemperatura.php?usuario='$login'");
      }
    else 
     {
      header('Location: Login.php?mensaje=1');
     }
   }
   else{
    header('Location: Login.php?mensaje=4');
   }  
  }
else
  {
    header('Location: Login.php?mensaje=2');
 }  
?>