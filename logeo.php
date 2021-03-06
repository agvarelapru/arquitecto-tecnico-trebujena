<?php
ob_start();

// Start the session
session_start();

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="Description" content="Estudio arquitectura arquitecto tecnico trebujena Angel varela Pruaño">
<meta name="author" content="Angel Varela Pruaño;">
<meta name="keywords" content="Arquitecto, arquitecto tecnico, aparejador, perito, estudio, arquitectura, proyectos, Obras, certificados energeticos, certificados, seguridad y salud">
<title>Arquitecto tecnico - Trebujena</title>
<link rel="shortcut icon" href="img/logoFavicon.ico">
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
  		<a class="navbar-brand page-scroll" href="index.html"><img src="img/logo3.jpg"  alt="arquitecto tecnico-Trebujena"></a>
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
  <h2 class="bottombrand wow flipInX">Acceso a <b style="color:#f05f40">zona privada</b></h2><br>
  <p>Acceda a su zona privada para la gestion de sus encargos, subida y descarga de documentacion, informacion del encargo y si aun no es usuario registrese para consultar la informacion de sus encargos.</p>
  <hr/>


  <?php
  $usuarioErr =$passErr = "";
  $usuario = $pass = "";
  require_once('biblioteca/conexion.php');
  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");



  if(!empty($_GET['usuario']) & !empty($_GET['pass'])){

    mysqli_set_charset($conexion,"utf8");
    $registros=mysqli_query($conexion,"select usuarios_usuario,usuarios_pass,usuarios_bloqueado,usuarios_perfil
                          from usuarios where (usuarios_usuario like '$_GET[usuario]' or usuarios_email like '$_GET[usuario]')") or die("Problemas en el select:".mysqli_error($conexion));
    $numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array

    $_SESSION["usuario"] = $_GET['usuario'];


      $contra=$_GET["pass"];

  }else if(!empty($_REQUEST['usuario']) & !empty($_REQUEST['pass'])){

    $_SESSION["usuario"] = $_REQUEST['usuario'];


  mysqli_set_charset($conexion,"utf8");
  $registros=mysqli_query($conexion,"select * from usuarios where (usuarios_usuario like '$_REQUEST[usuario]' or usuarios_email like '$_REQUEST[usuario]')") or
  die("Problemas en el select:".mysqli_error($conexion));
  $numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array


  $contra=md5($_REQUEST["pass"]);


  }else {


?>
<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Atencion!</strong> Inserte usuario y contraseña.
  </div>
<?php





    session_unset();
    session_destroy();//Literalmente la destruimos

  }



if((!empty($_REQUEST['usuario']) & !empty($_REQUEST['pass'])) || (!empty($_GET['usuario']) & !empty($_GET['pass']))){
  while ($reg = mysqli_fetch_array($registros))
  {

  if($reg['usuarios_pass']==$contra & $reg['usuarios_bloqueado']==0){

$_SESSION["id"] = $reg['usuarios_id'];
  $_SESSION["perfil"] = $reg['usuarios_perfil'];
    $_SESSION["pass"] = $reg['usuarios_pass'];
    $_SESSION["email"] = $reg['usuarios_email'];
      header('Location: pagina.php');

  }else if ($reg['usuarios_bloqueado']==1){
    ?>
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Atencion!</strong> Usuario bloqueado. Pongase en contacto para desbloquearlo
      </div>
    <?php
          session_unset();
          session_destroy();//Literalmente la destruimos
  }else{
    ?>
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Atencion!</strong> La contraseña no es correcta.
      </div>
    <?php

                  session_unset();
                  session_destroy();//Literalmente la destruimos

                }

      }

      if($numero==0){

        ?>
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>¡Atencion!</strong> El usuaruio introducido no exixte.
          </div>
        <?php

        session_unset();
        session_destroy();//Literalmente la destruimos

      }

}
  ?>










<form class="form-horizontal" role="form" id="form1" name="form1" method="post" action="logeo.php">

<h4>Identifiquese:</h4>
  <div class="input-group">
   <label class="sr-only" for="usuario">Usuario</label>
   <span class="input-group-addon" style="background-color:#f05f40"><i class="glyphicon glyphicon-user" ></i></span>
    <input  class="form-control"  type="text" name="usuario" id="usuario" placeholder="Usuario o Email"   title="Introduzca solo caracteres A-Z , a-z y numeros de 0 a 9" />
  </div>
  <div class="input-group">
      <label class="sr-only" for="password">Contraseña</label>
     <span class="input-group-addon" style="background-color:#f05f40"><i class="glyphicon glyphicon-lock"></i></span>
    <input class="form-control" type="password" name="pass" id="pass" placeholder="Contraseña" pattern="[- A-Za-z0-9]{1,20}"  title="Introduzca solo caracteres A-Z , a-z y numeros de 0 a 9" />
  </div>

  <div class="botones">
    <div class="izquierda"><a href="recuperarpass.php">Recuperar contraseña</a></div>
    <div class="derecha"><a href="registro/registro.php">Alta nueva</a></div>
</div>

  <input class="btn btn-ghost down-btn page-scroll btn-lg"   data-animation="animated fadeInLeft" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" style="background-color:" id="enviar" value="Entrar" />


</form>
<hr>
<p>Acceso mediante redes sociales</p>
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
<?php
ob_end_flush();
?>
