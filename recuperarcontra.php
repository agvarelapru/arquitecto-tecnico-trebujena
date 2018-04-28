
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="Description" content="Estudio arquitectura arquitecto tecnico trebujena Angel varela Pruaño">
<meta name="author" content="Angel Varela Pruaño;">
<meta name="keywords" content="Arquitecto, arquitecto tecnico, aparejador, perito, estudio, arquitectura, proyectos, Obras, certificados energeticos, certificados, seguridad y salud">
<title>Arquitecto tecnico - Trebujena</title>
<!-- CSS de Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<!-- Custom Fonts -->
<link href='https://fonts.googleapis.com/css?family=Mrs+Sheppards%7CDosis:300,400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800;' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
<!-- Plugin CSS -->
<link rel="stylesheet" href="css/animate.min.css" type="text/css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/style2.css" type="text/css">
</head>


<body>

  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  	<!-- Brand and toggle get grouped for better mobile display -->
  	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  		<a class="navbar-brand page-scroll" href="index.html"><img src="img/logo.jpg"  alt="arquitecto tecnico-Trebujena"></a>
  	</div>
  	<!-- Collect the nav links, forms, and other content for toggling -->
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li>
        <a class="page-scroll" href="index.html" id="ini">Inicio</a>
        </li>

        <li>
        <a class="page-scroll" href="nosotros.html" id="ini">Quien soy</a>
        </li>
        <li>
        <a class="page-scroll" href="servicios.html" id="ini">Servicios</a>
        </li>
        <li>
        <a class="page-scroll" href="trabajos.html" id="ini">Trabajos</a>
        </li>

        <li>
        <a class="page-scroll" href="contacto.html" id="ini">Contacto</a>
        </li>
      </ul>
  		<ul class="nav navbar-nav navbar-right">
  			<li class="active">
  	<a class="page-scroll" href="login.html" id="ini" style="margin-left:5px;">Entrar <span class="glyphicon glyphicon-log-in"></spam></a>
  			</li>

  		</ul>
  	</div>
  	<!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
  </nav>


  <div class="container" id="home">
    <br><br>
        <div class="container">
            <div class="section-title text-center">
              <h2 class="bottombrand wow flipInX">Recuperar contraseña de <b style="color: #f05f40;">usuario</b></h2>
              <hr class="primary">
          		<p>
          			Indique su usuario y su email registrado y le enviaremos a su correo el link para restablecer la contraseña.
          		</p>
          </div>
    </div>
  <?php
  $usuarioErr =$emailErr = "";
  $usuario = $email = "";
  $bloqueado=0;



  if(!empty($_REQUEST['nick']) & !empty($_REQUEST['email'])){


    require_once('biblioteca/conexion.php');
    $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");


  mysqli_set_charset($conexion,"utf8");
  $registros=mysqli_query($conexion,"select * from usuarios where (usuarios_usuario like '$_REQUEST[nick]' and usuarios_email like '$_REQUEST[email]')") or
  die("Problemas en el select:".mysqli_error($conexion));
  $numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array



  }else {


?>
<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Atencion!</strong> Inserte usuario y contraseña.
  </div>

<?php

  }



if(!empty($_REQUEST['nick']) & !empty($_REQUEST['email'])){
  while ($reg = mysqli_fetch_array($registros)){
$contra=$reg["usuarios_pass"];
$nick=$reg["usuarios_usuario"];
if ($reg['usuarios_bloqueado']==1){
  $bloqueado=1;
    ?>
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Atencion!</strong> Usuario bloqueado. Pongase en contacto para desbloquearlo
      </div>
    <?php

  }else if($numero==1){

    ?>
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Bien!</strong> Compruebe su email para reestablecer su contraseña.
      </div>
    <?php




      $para = $_REQUEST["email"];
      $titulo = 'Recuperar contraseña  arquitecto tecnico - Trebujena '.$_REQUEST['nick'];
      $mensaje=

      '<html>

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
          <title>Recuperar contraseña</title>

      </head>


      <body Style="background-color: #282f35; font-family:Century Gothic;">

              <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                      <h2 style="text-align: center;font-weight: BOLD;">Recuperar contraseña</h2>
                      <hr Style="border: 2px solid #f05f40;  width:7%;">
                      <h4 Style="text-align:center">Hola, pulsando sobre el enlace podra volver a introducir una nueva contraseña.</h4>

                              <a Style="background-color: #f05f40; border: none;  color: white; text-align: center;  text-decoration: none;  display: inline-block; font-size: 16px; margin-left: 35%; cursor: pointer;  width: 30%;  padding-top: 5px; padding-bottom: 5px;  margin-right: 35%; "  href="https://www.arquitecto-tecnico-trebujena.es/pasonuevopass.php?nick='.$nick.'&pass='.$contra.'" >Nueva contraseña</a>
                            <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                                 <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="https://www.arquitecto-tecnico-trebujena.es/" ><spam style="color:#f05f40;">a</spam>rquitecto tecnico-Trebujena</a></div><br>

                                     <h4><u>Usuario</u></h4>
                                     <h4>'.$nick.'</h4>
                                  </div>



          </div>
          <div Style="width:90%; margin-left:5%">
          <hr Style="border: 2px solid #f05f40; border-radius: 0px /0px;">
          <p Style="text-align:justify; color:rgb(94, 91, 91); "> Este correo electrónico contiene información confidencial. Cualquier reproducción, distribución o divulgación de su contenido están estrictamente prohibidos.Si no eres el destinatario indicado en el mismo y recibes este correo electrónico, te ruego me lo notifiques de inmediato a la dirección agvarelapru@gmail.com y destruyas el mensaje recibido sin obtener copia del mismo, ni distribuirlo, ni revelar su contenido. Angel Varela Pruaño no se hace responsable del mal uso de esta información.
            </p>


          <p Style="text-align:justify; color:rgb(94, 91, 91);" >  Information in this message is confidential and may be legally privileged. It is intended solely for the person to whom it is addressed. If you are not the intended recipient, please notify the sender agvarelapru@gmail.com and please delete the message from your system immediately.
            </p>
          </div>

      </body>

      </html>';


      $cabeceras = 'MIME-Version: 1.0' . "\r\n";
      $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
      $cabeceras .= 'From: info@arquitecto-tecnico-trebujena.es';


      mail($para,$titulo,$mensaje,$cabeceras);


}
      }



}
if($numero==0){
    ?>
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Atencion!</strong> El usuario o el email introducido no exixte.
      </div>
    <?php



  }
  ?>





  <div class="col-md-8 registro">

      <form method="post" action="recuperarContra.php" id="contactform" >


  <fieldset>
  <legend>Recuperar contraseña</legend>
  <br>
  <div class="row">
      <div class="col-md-12">
  <div class="input-group">


    <span class="input-group-addon" style="background-color:#f05f40"><i class="glyphicon glyphicon-user" ></i></span>
  <input  class="form-control" type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required autofocus />
  </div>
  <br><br>
  <div class="input-group">

  <span class="input-group-addon" style="background-color:#f05f40"><i class="glyphicon glyphicon-envelope" ></i></span>
  <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" />
  </div>
  </div>
  </div>
  <br>


    </fieldset>
    <br>
          <div class="text-right">

            <input  class="contact submit btn btn-primary btn-xl"   type="submit" id="modificar" name="modificar"  value="Recuperar contraseña"/>
          </div>


      </form>
      <br><br><br>
  </div>




<br><br><br><br><br><br><br><br><br>
</div>

<!-- Section Footer
================================================== -->

<div class="bg-dark">
<div class="container">
<div class="row">
	<div class="col-md-12 text-center">
    <hr>
		<h1 class="bottombrand wow flipInX">arquitecto tecnico - Trebujena</h1>

    <div  style="text-align:left;" >
        <address>
    <span class="glyphicon glyphicon-map-marker" id="social-left"></span><strong>Direccion</strong><br>
            <br>
            <div class="direccion">

            <b>  Angel Varela Pruaño</b> <br>
              Calle Ramon y Cajal nº 1. <br>
              Trebujena, CP. 11560. Cadiz, España.<br>
              Telefono: (+34) 605884603<br>
              Email: info@arquitecto-tecnico-trebujena.es

              <div class="social" >

                  <a href="https://www.linkedin.com/in/angel-varela-prua%C3%B1o-a6922073/"><span class="fa fa-linkedin" id="social"></span></a>
                  <a href="https://twitter.com/arquitectrebu"><span class="fa fa-twitter" id="social"></span></a>
                      <a href="https://plus.google.com/+AngelVarelaPrua%C3%B1o?hl=es-419"><span class="fa fa-google-plus" id="social"></span></a>
                  <a href="https://www.facebook.com/Angel-Varela-Prua%C3%B1o-Arquitecto-Tecnico-Trebujena-126221484146945/"><span class="fa fa-facebook" id="social"></span></a>
                </div>

            </div>



          </address>
      </div>
<br>

		 <p style="float:left;">2018 © Angel Varela Pruaño. All Rights Reserved. Coded & Designed by <a href="http://www.agvarelapru.esy.es">Angel Varela</a></p>

     <div class="pull-right">
         <a href="#home" class="back">Volver arriba <span class="fa fa-angle-up" id="social-right"></span></a>
     </div>
	</div>
</div>
</div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/contact.js"></script>
<script src="js/countto.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/common.js"></script>

</body>
</html>
