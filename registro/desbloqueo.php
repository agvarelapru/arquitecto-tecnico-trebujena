
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="Estudio arquitectura arquitecto tecnico trebujena Angel varela Pruaño">
<meta name="author" content="Angel Varela Pruaño;">
<meta name="keywords" content="Arquitecto, arquitecto tecnico, aparejador, perito, estudio, arquitectura, proyectos, Obras, certificados energeticos, certificados, seguridad y salud">
<title>Arquitecto tecnico - Trebujena</title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
<!-- Custom Fonts -->
<link href='https://fonts.googleapis.com/css?family=Mrs+Sheppards%7CDosis:300,400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800;' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">
<!-- Plugin CSS -->
<link rel="stylesheet" href="../css/animate.min.css" type="text/css">
<!-- Custom CSS -->
<link rel="stylesheet" href="../css/style.css" type="text/css">
<link rel="stylesheet" href="../css/style2.css" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

		<script  type="text/javascript">
		function tiempo(){

		  setTimeout("redirigir()", 5000);

		}
		function redirigir(){
		  window.location="../index.html";
		}
		</script>

</head>

<body id="home">
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand page-scroll" href="index.html"><img src="../img/logo3.jpg"  alt="arquitecto tecnico-Trebujena"></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-left">
			<li >
			<a class="page-scroll" href="../index.html" id="ini">Inicio</a>
			</li>

			<li>
			<a class="page-scroll" href="../nosotros.html" id="ini">Quien soy</a>
			</li>
			<li>
			<a class="page-scroll" href="../servicios.html" id="ini">Servicios</a>
			</li>
			<li>
			<a class="page-scroll" href="../trabajos.html" id="ini">Trabajos</a>
			</li>

			<li>
			<a class="page-scroll" href="../contacto.html" id="ini">Contacto</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li  class="active">
	<a class="page-scroll" href="../login.html" id="ini" style="margin-left:5px;">Entrar <span class="glyphicon glyphicon-log-in"></spam></a>
			</li>

		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>




<body onload="tiempo()">

  <?php

	require_once('../biblioteca/conexion.php');

	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
	  mysqli_set_charset($conexion,"utf8");



$nick= $_GET['nick'];
$pass= $_GET['pass'];


  mysqli_query($conexion, "update usuarios set usuarios_bloqueado = '0' where usuarios_usuario= '$nick' and  usuarios_pass = '$pass'") or
die("Problemas en el select:".mysqli_error($conexion));




mysqli_close($conexion);

	?>




	<br><br>


	    <div class="container">
	        <div class="section-title text-center">
	          <h2 class="bottombrand wow flipInX">La cuenta esta <b style="color: #f05f40;">desbloqueada</b></h2>
	          <hr class="primary">
	      		<p>
	      		Acaba de desbloquear su cuenta, en breve sera redirigido para que pueda introducir su usuario y contraseña para acceder a la pagina.
	      		</p>

<br><br>
						<div class="alert alert-success alert-dismissible fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>¡Bienvenido!</strong> Ya puedes acceder a nuestra pagina.
							</div>


	      </div>
	</div>
	<br><br>





<br>
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

              <div class="social2" >

                  <a href="https://www.linkedin.com/in/angel-varela-prua%C3%B1o-a6922073/"><span class="fa fa-linkedin" id="social2"></span></a>
                  <a href="https://twitter.com/arquitectrebu"><span class="fa fa-twitter" id="social2"></span></a>
                      <a href="https://plus.google.com/+AngelVarelaPrua%C3%B1o?hl=es-419"><span class="fa fa-google-plus" id="social2"></span></a>
                  <a href="https://www.facebook.com/Angel-Varela-Prua%C3%B1o-Arquitecto-Tecnico-Trebujena-126221484146945/"><span class="fa fa-facebook" id="social2"></span></a>

                </div>

            </div>



          </address>
      </div>
<br>

		 <p style="float:left;">2018 © Angel Varela Pruaño. All Rights Reserved. Coded & Designed by <a href="http://www.agvarelapru.esy.es">Angel Varela</a></p>

     <div class="pull-right">
         <a href="#home" class="back page-scroll" data-animation="animated bounceIn">Volver arriba <span class="fa fa-angle-up" id="social-right"></span></a>
     </div>
	</div>
</div>
</div>
</div>

<!-- jQuery -->

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/parallax.js"></script>
<script src="../js/contact.js"></script>
<script src="../js/countto.js"></script>
<script src="../js/jquery.easing.min.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/common.js"></script>


</body>
</html>
