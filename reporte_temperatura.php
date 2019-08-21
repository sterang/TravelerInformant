<?php                                                     
                                                  
include "conexion.php";


?> 
   <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01   Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
     <html>
       <head>
          <link rel="stylesheet" href="css/estilos_virtual.css"       type="text/css">
           <title> Reporte por Fechas - INFORMANTE-VIAJERO - Inclusive  
    </title>
        </head>
       <body>
        <table width="100%" align=center border=0>
       <tr>
          <td valign="top" align=center> 
            <img src="imagenes/logo.jpg" border=0
       USEMAP="#inicio" width="7%>
       <map name="inicio">
        <area shape=rect 
         coords="456,0,670,140" 
            href="menu.php"  alt="Menu">
         </map>        
          </td>
         </tr>
      <tr>
          <td valign="top" align=center> 
               
     <form action="reporte_temperatura.php" method=POST>
        <table align=center width=670 border=0 bgcolor="#009ED6">
           <tr>
             <td valign="top" align=left colspan=3>
               <br>    
          <?php
          echo '
               <br><br>
            </td>
           </tr>';
      
          
          
           if (!(isset($_POST["enviado"])))
               {
          ?>
          <tr>
           <td width="25%" height="20%" align="center" colspan=2 bgcolor="#DEEEF5" class="_espacio_celdas" style="color: #044062; 
      font-weight: bold">
              REPORTE DE EVENTOS POR RANGO DE FECHAS
           </td>
         </tr>
          
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; 
      font-weight: bold">
              FECHA INICIAL
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
              <input type=date value="" name="fecha_ini" required>               
           </td>
          </tr>  
         <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; 
      font-weight: bold">
              FECHA FINAL
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
              <input type=date value="" name="fecha fin" required>               
           </td>
          </tr>
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas" style="color: #044062; 
      font-weight: bold">
              &nbsp;&nbsp;&nbsp;
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
              <input type=hidden value="1" name="enviado">
              <input type=submit value="ENVIAR" name="ENVIAR">
           </td>
          
                                        
      <?php
          }
        else
          {
            $enviado = $_POST["enviado"];
            $fecha_ini = $_POST["fecha_ini"];
            $fecha_fin = $_POST["fecha_fin"];
            
            
            if ($enviado == 1)
             {
            // Se hace la conexion y posterior consulta en la base de datos
            $mysqli = new mysqli($host, $user, $pw, $db);
            $sql = "SELECT * from datos where fecha >='$fecha_ini' and fecha<= '$fecha_fin'";
            //echo "sql es...".$sql;
            $result1 = $mysqli->query($sql);

            // A continuación despliega el encabezado de la tabla resultante
           echo '
                  <tr>  
                    <td height="20%" align="center" bgcolor="#DEEEF5" colspan=5 class="_espacio_celdas_m" style="color: #044062; 
                    font-weight: bold">
                      EVENTOS EN EL RANGO DE FECHAS ... '.$fecha_ini.' - '.$fecha_fin.'
                    </td>
                  </tr>
                  <tr>
                  <td align="center" bgcolor="#CCEEFF"  class="_espacio_celdas_m">
                     <b>Localización Luz</b>
                  </td>
                  <td align="center" bgcolor="#CCEEFF"  class="_espacio_celdas_m">
                     <b>Temperatura</b>
                  </td><td align="center" bgcolor="#CCEEFF" class="_espacio_celdas_m">
                     <b>Fecha</b>
                  </td><td align="center" bgcolor="#CCEEFF" class="_espacio_celdas_m">
                     <b>Hora</b>
                  </td>
                 </tr>';
              // A continuación se despliegan todos los datos. 
              while($row1 = $result1->fetch_array(MYSQLI_NUM))
                  {
                    $id_mod=$row1[1];
                    $Temperatura=$row1[2];
                    $localizacion="";
                    if($id_mod=="1")
                          $localizacion="Lomas de granada";
                    if($id_mod=="2")
                          $localizacion="Alicante";
                    $fecha  = $row1[5];
                    $hora  = $row1[6];
               echo ' 
                      <tr>
                  <td align="center" bgcolor="#F2F7F9" class="_espacio_celdas_m">
                     '.$localizacion.'
                  </td>
                  <td align="center" bgcolor="#F2F7F9" class="_espacio_celdas_m">
                     '.$Temperatura.'
                  </td><td align="center" bgcolor="#F2F7F9" class="_espacio_celdas_m">
                     '.$fecha.'
                  </td><td align="center" bgcolor="#F2F7F9" class="_espacio_celdas_m">
                     '.$hora.'
                  </td>
                 </tr>';
                }
                 
                // Ahora se despliega el fin de la tabla 
                echo '                 
               </table>
                 
               <table width=670 border=0 bgcolor="#009ED6" align=center>
                 <tr>
                   <td align="center" bgcolor="#009ED6" class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;
                    </td>
                   <td align="center" bgcolor="#009ED6" class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;
                    </td>
                 </tr>
                 <tr>
                   <td align="center" bgcolor="#009ED6" class="_espacio_celdas_m">
                     <form action="reporte_temperatura.php" method=POST>
                       <input type=submit value="Otra Consulta" name="Enviar2">
                     </form>
                    </td>
                   <td align="center" bgcolor="#009ED6" class="_espacio_celdas_m">
                     <form action="menu.php" method=POST>
                       <input type=submit value="Volver al Menu" name="Enviar3">
                     </form>
                    </td>
                 </tr>
              </table>';
            }         // fin else enviado = 1
            
           }  // fin else (mostrar datos consultados)
     
     
        ?>
 
          
          </table>
         </form>
        </table><br><br>
        <br><br>
       </body>
      </html>