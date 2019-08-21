<?php
error_reporting(0);
$var=1;
session_start();

if ($_SESSION["autenticado"] != "SI"){
  $var=0;
}

?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <link rel="stylesheet" type="text/css" href="estilo1.css"> 
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Informante Viajero</title> 

    <style>
       #map {
        height: 700px;
        width: 100%;
       }
    </style>
  </head>
  <body>
  <header>

  <script>
      function leerGET(){
      var cadGET = location.search.substr(1,location.search.length);
      var arrGET = cadGET.split("&");
      var asocGET = new Array();
      var variable = "";
      var valor = "";
    for(i=0; i< arrGET.length;i++){
      var aux = arrGET[i].split("=");
      variable = aux[0];
      valor = aux[1];
      asocGET[variable] = valor;
    }
    return asocGET;
    }
    </script>
   <nav class="header header-main" role="banner">

    <ul>
      <li><a href="../index.html">INFORMANTES VIAJEROS</a></li>
      <li><a href="obtenerTemperatura.php">           Actualizar</a></li>
      <li><a href="../index.html#contacto">Contactos</a></li>
      <?php
        if ($var==0){
          echo '<li><a href="../Login.php">Iniciar Sesion</a></li>';
        }
        else{
          if ($_SESSION["tipo_usuario"]=="Administrador") {
            echo '<li><a href="../administrador.php">Admistrar</a></li>';
          }
            
          $vari="../modificarF.php?usuario=".$_SESSION["nombre_usuario"];
          echo '<li><a href="'.$vari.'">Favoritos</a></li>';    
          echo '<li><a href="'.$vari.'">Modificar Cuenta</a></li>';
          echo '<li><a href="../cerrar_sesion.php">Cerrar Sesion</a></li>';
          echo '<li style="
            color: yellow;
            text-decoration: none;"><p name="text">Usuario: '.$_SESSION["nombre_usuario"].' Tipo Usuario'.'</p></li>';
          echo '<li style=" 
            color: yellow;
            text-decoration: none;"><p name="text">'.':  '.$_SESSION["tipo_usuario"].'</p></li>'; 

          
        }

      ?>  
      
    </ul>
    
  </nav>
  </header>
    
    <div id="map"></div>
    <script>
    var paresVarValor = leerGET();  
        var i=1;
        var valor=new Array();
        for (obj in paresVarValor){
        
        valor[i]=paresVarValor[obj];
        i=i+1;
        }


      function initMap() {
        var uluru = {lat: 2.458938, lng: -76.643790};
        var avenida = {lat: 2.4594442, lng: -76.5862969};
        var centere = {lat: 2.461134, lng: -76.563806};
        var map = new google.maps.Map(document.getElementById('map'), {
        center: centere,
        zoom: 14


        });
        
        if(valor[3]==0){
          var lluv = "No"
        }
        if(valor[3]==1){
          var lluv = "Si"
        }
        if(valor[6]==0){
          var lluv1 = "No"
        }
        if(valor[6]==1){
          var lluv1 = "Si"
        }  
        ///var infoWindow = new google.maps.InfoWindow({map: map});
        
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Lomas de Granada</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Temperatura actual: </b> '+valor[1]+'</p>'+'<p> <b> Humedad: </b>  ' +valor[2] + '<b>  </b>'+
            'Lluvia: '+lluv+' </p>'+'<a href="reporte_datos.php?id_mod=1">Datos precisos</a> '+
            '</div>'+
            '</div>';
        var contentString2 = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Alicante</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Temperatura actual: </b> '+ valor[4] +'</p>'+'<p><b> Humedad: </b> ' + valor[5] + '<b>  </b>'+
            'Lluvia: '+ lluv1 +' </p>'+'<a href="reporte_datos.php?id_mod=2">Datos precisos</a> '+
            '</div>'+
            '</div>';
        
           var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';  
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          icon:image
        });
        var marker2 = new google.maps.Marker({
          position: avenida,
          map: map, 
          icon:image
        });
        
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        var infowindow = new google.maps.InfoWindow({
           content: contentString
        });
        marker2.addListener('click', function() {
          infowindow2.open(map, marker2);
        });

        var infowindow2 = new google.maps.InfoWindow({
           content: contentString2
        });
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
           var marker = new google.maps.Marker({
           position: pos,
           map: map,
           ///title: "¡¡¡Tu localización!!!"
           }); 
            ///infoWindow.setPosition(pos);
            ///infoWindow.setContent('Here');
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD10adyRiqTONRg8-nPn2j2iqD7xW0aoUA&callback=initMap">
    </script>
  </body>
</html>