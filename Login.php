<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inicio Sesion</title>
<script src="js/jquery.min.js" type="text/javascript"></script>
<link href="bootstrap/bootstrap.min.css" rel="stylesheet"/>    
<link href="bootstrap/bootstrap-theme.css" rel="stylesheet"/>
<link href="fonts/OleoScript-Regular.ttf" rel="stylesheet"/>
</head>
    
    <style>
        @font-face{
            font-family:fuentechida;
            src: url(fonts/OleoScript-Regular.ttf);
        }
        body{
            background-image: url(imagenes/abstract-1780273_1920.png);
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        fieldset{
            transition: 2s;
            margin-bottom: 50px;
            border-color: rgba(166,138,195);
            border-style: groove;
            border-width: 5px;
            border-radius: 20px;
        }
        .formulario{
            width: 30%;
            transition: 2s;
            margin-top: 100px;
            box-shadow: 0px 0px 40px grey, 0px 0px 80px white;
        }
        .logo{
            height: 100px;
            margin-top: 65px;
        }
        .espaciado{
            margin-top: 40px;
        }
        h3,h4{
            color: white;
            text-align: center;
        }
        legend{
            border: none;
        }
        h1{
            color: white;
            font-size: 17px;
            text-align: center;
        }
        .Input{
            transition: .8s;
            background-color: rgba(0,0,0,.5);
            color: white;
            border-color: #68696B;
            border-bottom-color:white;
            border-bottom-style: groove;
            border-right: none;
            border-left: none;
            border-top: none;
            border-width: 6px;

        }
        .Input:hover{
            transition: .8s;
            background-color: rgba(55,71,79,.5);
            box-shadow: inset;
            border-bottom-color: grey;
        }
        .Input:focus{
            transition: .8s;
            border-bottom-color: green;
        }
        @media screen and (max-width: 750px ){
            .formulaio{
                width: 95%
                margin-top: 10px;
            }
            .logo{
                height: 50px;

            }
        }
    </style>
    
<body>

        <div class="container formulario">
            <div class="row">
                <div class="col-xs-3 col-xs-offset-3">
                <a href="index.html"> <img src="imagenes/logo.jpg" class="logo center-block" ></a>
                </div>
            </div>
            <div class="espaciado"></div>
            <div class="row">
            <fieldset class="col-xs-10 col-xs-offset-1">
                <legend class="hidden-xs">
                    <h3>Inicio de Sesion</h3>
                </legend>
                <form class="form-horizontal" method="POST" action = "validar.php">
                    <div class="form-group">
                        <label class="col-xs-12" for="usuario"><h4>Usuario</h4></label>
                        <div class="col-xs-10 col-xs-offset-1">
                            <input type="text" id="login1" name="login1" class="form-control Input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12" for="password"><h4>Password</h4></label>
                        <div class="col-xs-10 col-xs-offset-1">
                            <input type="password" id="passwd1" name="passwd1" class="form-control Input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-primary center-block">
                        Acceder
                        </button>
                        
                    </div>
                </form>

            </fieldset>
            <a href="registrar.php"><h1>Crear Cuenta</h1></a>
            <?php
                if (isset($_GET["mensaje"]))
                 {
                 $mensaje = $_GET["mensaje"];
                    if ($_GET["mensaje"]!=""){?>


                    <?php 
                       if ($mensaje == 1)
                         echo '<script type="text/javascript">
                                alert("Datos Incorrectos")
                            </script>';
                       if ($mensaje == 2)
                         echo '<script type="text/javascript">
                                alert("Datos Incorrectos")
                            </script>';
                       if ($mensaje == 3)
                         echo '<script type="text/javascript">
                                alert("No se a logeado para tener el permiso")
                            </script>';
                       if ($mensaje == 4)
                         echo '<script type="text/javascript">
                                alert("El usuario se encuentra bloqueado")
                            </script>';
                        if ($mensaje == 5)
                         echo '<script type="text/javascript">
                                alert("Datos modificados inicie sesion nuevamente")
                            </script>';
                    ?>                         


               <?php 
                   }
                 }
                ?>

            </div>

        </div>
         
</body>
</html>
