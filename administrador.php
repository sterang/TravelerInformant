
<?php
$var=1;
include ("datos/conexion.php");
session_start();
$mysqli = new mysqli($host, $user, $pw, $db); 
$sql = "SELECT * FROM `usuarios` WHERE (tipo_usuario='2')";
$result1 = $mysqli->query($sql);			

			 
if ($_SESSION["autenticado"] != "SI"){
  header('Location: Login.php?mensaje=3');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>Administrador Informante Viajero</title> 

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    
  </head>

  <body id="pagina-arriba" data-spy="scroll" data-target=".navbar-personalizada">

    <nav class="navbar navbar-personalizada navbar-fixed-top">
      <div class="container">
        <div class="navbar-header pagina-scroll">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">INFORMANTE VIAJERO ADMINISTRADOR</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="pagina-scroll">
              <a href="index.html">Inicio</a>
            </li>
            <li class="pagina-scroll">
              <a href="#usuarios">Usuarios</a>
            </li>
            <li class="pagina-scroll">
              <a href="#servicios">Graficas</a>
            </li>
            <li class="pagina-scroll">
              <a href="#clientes">Informes</a>
            </li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section class="intro">
      <div class="intro-cuerpo">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
            	<h1 class="texto-bienvenidos">Bienvenido</h1>
                <p class="intro-texto"><strong><span class="color-verde"></span></strong> <?php echo $_SESSION["nombre_usuario"];  ?></p>
                <p>Aqui podra tener acceso a casi todo, acerca de los usuarios, informes y graficas, recuerde somos una empresa que quiere lo mejor para su vida</p>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section id="usuarios" class="container contenido-seccion">
      <h2 class="text-center">Usuarios</h2>
      <table border="2">
     <tr bgcolor="	#008080">
      <td width="2%"><strong>Usuario </strong></td>
  	  <td width="1%"><strong>Habilitacion </strong></td>
  	  <td width="1%"><strong>Habilitar </strong></td>
    </tr>
		<?php 	
			while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
				echo '<tr bgcolor="#bfd7ae"><td>'."$row1[1]".'</td>';
				if($row1[8]==0){
					echo '<td >Habilitado</td>';	
					echo '<td><a href="datos/deshabilitar.php?usuario='.$row1[1].'".>Deshabilitar</a></td></tr>';	
				}
				else{
					echo '<td>Deshabilitado</td>';	
					echo '<td><a href="datos/habilitar.php?usuario='.$row1[1].'">Habilitar</a></td></tr>';	
				}
				
			}
		?>

    </table>
    <a href="registrarAdmin.php">Crear User Admin</a>
    </section>


    <section id="servicios" class="contenido-seccion text-center">
      <div class="seccion-servicios">
        
          <h2>Graficas</h2>
          <ul>
			<li class="pagina-scroll">
              <a href="graficahumedad.php">Graficas Humedad</a>
            </li>          	
            <li class="pagina-scroll">
              <a href="graficatemperatura.php">Graficas Temperatura</a>
            </li>
          </ul>
          <h2>Informes</h2>
          <ul>
			<li class="pagina-scroll">
              <a href="reporte_humedad.php">Informes Humedad</a>
            </li>          	
            <li class="pagina-scroll">
              <a href="reporte_temperatura.php">Informes Temperatura</a>
            </li>
            <li class="pagina-scroll">
              <a href="reporte_lluvia.php">Informes Lluvia</a>
            </li>
            
          </ul>
      </div>
    </section>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="hhttps://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3.2/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>
    
  </body>
</html>
