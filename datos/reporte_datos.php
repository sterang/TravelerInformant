<?php

session_start();
if ($_SESSION["autenticado"] != "SI")
    header('Location: ../Login.php?mensaje=3');

 include ("conexion.php");
 $mysqli = new mysqli($host, $user, $pw, $db); 
 $id_mod = $_GET['id_mod'];

 echo '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 	Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
     <html>
       <head>
       <link href="https://fonts.googleapis.com/css?family=Anton|Indie+Flower" rel="stylesheet"> 
        	<style type"text/css">
        		body {
        		background-image: url(../img/wall.jpg);
        		background-attachment: fixed;
        		background-size: 1366px 768px;
        		}

        		p{color: #0d5fa8; font-family: "Anton", sans-serif; font-size: 40px;text-align: center;letter-spacing: 2px;}
        	</style>
        </head>
       <body>
       <title> Reporte De Datos - Engineer Asociated 
		</title>
		<p>Reporte De Datos</p>
        <table width="100%" align=center>
	    <tr>
          <td valign="top" align=center> 
	      <table align=center width=670>
              <tr>
                <td width="50%" height="20%" align="center" 				bgcolor=" #55733d " class="_espacio_celdas" 					style="color: #fff; 
			font-weight: bold">
         		  Temperatura Actual
		      </td>
                <td width="50%" height="20" align="center" 				 	  bgcolor="#c1c8bc" 				
			  class="_espacio_celdas2">';
			
			
			$sql = "SELECT * FROM `datos` WHERE (id=(SELECT MAX(id) FROM datos WHERE id_mod = $id_mod) )";
			
			$result1 = $mysqli->query($sql);
			
			$row1 = $result1->fetch_array(MYSQLI_NUM);
			
			$estado_temp = $row1[2];
			
			   echo $estado_temp." C";
			echo'
		      </td>
		    </tr>  
       
		    <tr>
			<td width="50%" height="20%" align="center" 
			bgcolor=" #55733d " 
			class="_espacio_celdas" style="color: #fff; 
			font-weight: bold">
			     Humedad Actual
                </td>
			<td width="50%" height="20" align="center" 		
			bgcolor="#c1c8bc" 						
			class="_espacio_celdas1">';


			$sql = "SELECT * FROM `datos` WHERE (id=(SELECT MAX(id) FROM datos WHERE id_mod = $id_mod) )";
			
			$result1 = $mysqli->query($sql);
			
			$row1 = $result1->fetch_array(MYSQLI_NUM);
			
			$estado_temp = $row1[3];
			
			echo $estado_temp." C";

			
			$sql = "SELECT * FROM datos WHERE (id=(SELECT MAX(id) FROM datos WHERE id_mod = $id_mod) ) OR (id=(SELECT MAX(id)-1 FROM datos WHERE id_mod = $id_mod) ) OR (id=(SELECT MAX(id)-2 FROM datos WHERE id_mod = $id_mod) ) OR (id=(SELECT MAX(id)-3 FROM datos WHERE id_mod = $id_mod) ) OR (id=(SELECT MAX(id)-4 FROM datos WHERE id_mod = $id_mod) )";
			$sum=0;
			$result1 = $mysqli->query($sql);

			echo '<tr>
			<td width="50%" height="20%" align="center" 				bgcolor=" #859975 " class="_espacio_celdas" style="color: #fff; 
			font-weight: bold">Temperatura </td><td width="50%" height="20%" align="center" 				bgcolor="  #859975 " class="_espacio_celdas" style="color: #fff; 
			font-weight: bold"> Humedad</td><td width="50%" height="20%" align="center" 				bgcolor="  #859975 " class="_espacio_celdas" style="color: #fff; 
			font-weight: bold"> Fecha</br></td>
			</tr>';
			 
			
			while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
				echo '<tr><td width="50%" height="20%" align="center" 				bgcolor="#b2b09d" class="_espacio_celdas" style="color: #fff; 
			font-weight: bold">'."$row1[2]".'</td><td width="50%" height="20%" align="center" 				bgcolor="#b2b09d" class="_espacio_celdas" style="color: #fff; 
			font-weight: bold">'."$row1[3]".'</td><td width="50%" height="20%" align="center" 				bgcolor="#b2b09d" class="_espacio_celdas" style="color: #fff; 
			font-weight: bold">'. "$row1[5]".'</br></tr>';
				
				$sum=$row1[2]+$sum;
			} 

			$promedio=$sum/5;
			
			echo '<tr><td width="50%" height="20%" align="center" 				bgcolor=" #55733d " class="_espacio_celdas"	style="color: #fff; 
			font-weight: bold">'."Temperatura Promedio del Sitio: ".'</td><td width="50%" height="20" align="center" 		
			bgcolor="#c1c8bc" 						
			class="_espacio_celdas1">'."$promedio".'</br></td></tr>' ;

			echo'
          	      </td>
           	</tr>        
			<tr>
		       <td colspan=2 width="100%" height="20%" 
			  align="center" 
		       bgcolor="#55733d" 
		       class="_espacio_celdas" style="color: #fff; 
		       font-weight: bold">';
		        
				$mysqli = new mysqli($host, $user, $pw, $db);
				$sql = "SELECT * FROM `habilitar` WHERE id=(SELECT MAX(id) FROM habilitar)";
				$result2 = $mysqli->query($sql);
				$row2 = $result2->fetch_array(MYSQLI_NUM);
				$estado = $row2[1];
				
				echo'
                 </td>
                </tr>            	  
              </table>
	      </td>
          </tr>

	<section style=" text-align: center;">
      <div class="seccion-servicios">
        
          <h2 style="color:#fff;   text-align: center;">Graficas</h2>
          <ul>
			<li class="pagina-scroll">
              <a href="../AdminTemp.php" >Grafica Humedad</a>
            </li>          	
            <li class="pagina-scroll">
              <a href="../humedadmes.php">Grafica Temperatura</a>
            </li>
            
          </ul>
          <h2 style="color:#fff;  text-align: center;" >Informes</h2>
          <ul>
			<li class="pagina-scroll">
              <a href="../reporte_humedad.php">Informes Humedad</a>
            </li>          	
            <li class="pagina-scroll">
              <a href="../reporte_temperatura.php">Informes Temperatura</a>
            </li>
            <li class="pagina-scroll">
              <a href="../reporte_lluvia.php">Informes Lluvia</a>
            </li>
            
          </ul>
      </div>
    </section>


       </body>
      </html>';
?>