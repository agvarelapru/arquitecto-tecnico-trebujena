<?php


// Start the session
session_start();

?>
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

<?php

require_once('../biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


if(empty($_SESSION['nick']) || empty($_SESSION['nombre']) || empty($_SESSION['apellido1']) || empty($_SESSION['apellido2']) ||  empty($_SESSION['nif']) || empty($_SESSION['direccion']) || empty($_SESSION['cp']) || empty($_SESSION['poblacion']) || empty($_SESSION['provincia']) || empty($_SESSION['telefono']) || empty($_SESSION['email'])){
$_SESSION['nick']=$_SESSION['nombre']=$_SESSION['apellido1']=$_SESSION['apellido2']=$_SESSION['nif']=$_SESSION['direccion']=$_SESSION['cp']=$_SESSION['poblacion']=$_SESSION['provincia']=$_SESSION['telefono']=$_SESSION['email']="";


?>

<!-- Section Contact
================================================== -->
<br><br>


    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Registrate con <b style="color: #f05f40;">nosotros</b></h2>
          <hr class="primary">
      		<p>
      			¿Aun no estas registrado? Pues no tardes en hacerlo, para poder disfrutar de todo el contenido de nuestra web, egistrate con nosotros y podra consultar todos los datos de su encargo, asi como intercambiar documentacion ver fotografias del estado de la obra, descargar facturas, etc.
      		</p>
      </div>
</div>
<br><br>

<div class="col-md-8 registro">

    <form method="post" action="insertaRegistro.php" id="contactform" >

      <div class="form-group">
        <label for="nick">Usuario</label>
        <input  class="form-control" type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required autofocus/>
      </div>
      <div class="row">
          <div class="col-md-6">
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input  class="form-control" type="password"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required/>
    </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="pass2" id="error">Repetir Contraseña</label>
        <input  class="form-control" type="password" name="pass2" id="pass2"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ"   required/>
        <h5 id="error"></h5>
      </div>
      <h5 id="error"></h5>


    </div>
    </div>

<br><br>

<fieldset>
<legend>Datos personales</legend>
        <div class="row">
            <div class="col-md-6">



                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  required />
                </div>
                <div class="form-group">
                  <label for="apellido1">Apellido 1</label>
                  <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1"   required/>
                </div>
                <div class="form-group">
                  <label for="apellido2">Apellido 2</label>
                  <input class="form-control" type="text" name="apellido2" id="apellido2" placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2"  required/>
                </div>
                <div class="form-group">
                  <label for="nif">NIF</label>
                  <input class="form-control" type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF o CIF"  required/>
                </div>
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required/>
                </div>




            </div>
            <div class="col-md-6">



                <div class="form-group">
                  <label for="cp">Codigo postal</label>
                  <input class="form-control" type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required/>
                </div>
                <div class="form-group">
                  <label for="provincia" id="provi">Provincia</label>

                  <select class="form-control" name="provincia" id="provincia" title="Indique su provincia" required />
 <option value="">--Selecione una provincia--</option>
                  <?php

                  $consulta_mysql=mysqli_query($conexion,"select * from provincias") or
                  die("Problemas en el select:".mysqli_error($conexion));

                  while($reg=mysqli_fetch_array($consulta_mysql)){

                  echo "<option value='".$reg["id"]."'>".$reg["provincia"]."</option>";

                  }
                  ?>
                            </select>



                </div>

                <div class="form-group">
                  <label for="poblacion" id="pobla" >Poblacion</label>

                  <select class="form-control" name="poblacion" id="poblaciones" title="Indique su poblacion" required/>


                     <option value="">--Selecione una localidad--</option>

                            </select>



                </div>
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" pattern="[0-9]{9}"  title="Introduzca su numero de telefono"  required/>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com"  />
                </div>




            </div>
        </div>
  </fieldset>
  <br>
        <div class="text-right">
          <input class="contact submit btn btn-primary btn-xl" type="reset" name="limpiar" value="Borrar" />
          <input  class="contact submit btn btn-primary btn-xl" type="submit" id="enviar" name="registrar" value="Registrar usuario"/>
        </div>
    </form>
</div>

<br><br>



<?php


}else{






?>

<!-- Section Contact
================================================== -->
<br><br>


    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Registrate con <b style="color: #f05f40;">nosotros</b></h2>
          <hr class="primary">
      		<p>
      			¿Aun no estas registrado? Pues no tardes en hacerlo, para poder disfrutar de todo el contenido de nuestra web, egistrate con nosotros y podra consultar todos los datos de su encargo, asi como intercambiar documentacion ver fotografias del estado de la obra, descargar facturas, etc.
      		</p>
      </div>
</div>
<br><br>

<div class="col-md-8 registro">

    <form method="post" action="insertaRegistro.php" id="contactform" >

      <div class="form-group">
        <label for="nick">Usuario</label><span class="error"><?php echo " ".$_SESSION["nickErr"];?></span>
        <input  class="form-control" type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required autofocus value="<?php echo $_SESSION['nick'];?>"/>
      </div>
      <div class="row">
          <div class="col-md-6">
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input  class="form-control" type="password"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required />
    </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="pass2" id="error">Repetir Contraseña</label>
        <input  class="form-control" type="password" name="pass2" id="pass2"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ"   required />
        <h5 id="error"></h5>
      </div>
      <h5 id="error"></h5>


    </div>
    </div>

<br><br>

<fieldset>
<legend>Datos personales</legend>
        <div class="row">
            <div class="col-md-6">



                <div class="form-group">
                  <label for="nombre">Nombre</label><span class="error"><?php echo " ".$_SESSION["nombreErr"];?></span>
                  <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  required value="<?php echo $_SESSION['nombre'];?>"/>
                </div>
                <div class="form-group">
                  <label for="apellido1">Apellido 1</label><span class="error"><?php echo " ".$_SESSION["apellido1Err"];?></span>
                  <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1"   required value="<?php echo $_SESSION['apellido1'];?>"/>
                </div>
                <div class="form-group">
                  <label for="apellido2">Apellido 2</label><span class="error"><?php echo " ".$_SESSION["apellido2Err"];?></span>
                  <input class="form-control" type="text" name="apellido2" id="apellido2" placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2"  required value="<?php echo $_SESSION['apellido2'];?>"/>
                </div>
                <div class="form-group">
                  <label for="nif">NIF</label><span class="error"><?php echo "  ".$_SESSION["nifErr"];?></span>
                  <input class="form-control" type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF 00000000A"  required value="<?php echo $_SESSION['nif'];?>"/>
                </div>
                <div class="form-group">
                  <label for="direccion">Direccion</label><span class="error"><?php echo " ".$_SESSION["direccionErr"];?></span>
                  <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required value="<?php echo $_SESSION['direccion'];?>"/>
                </div>




            </div>
            <div class="col-md-6">



                <div class="form-group">
                  <label for="cp">Codigo postal</label><span class="error"><?php echo " ".$_SESSION["cpErr"];?></span>
                  <input class="form-control" type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required value="<?php echo $_SESSION['cp'];?>"/>
                </div>
                <div class="form-group">
                  <label for="provincia" id="provi">Provincia</label><span class="error"><?php echo " ".$_SESSION["provinciaErr"];?></span>

                  <select class="form-control" name="provincia" id="provincia" title="Indique su provincia" required />
 <option value="">--Selecione una provincia--</option>
                  <?php

                  $consulta_mysql=mysqli_query($conexion,"select * from provincias") or
                  die("Problemas en el select:".mysqli_error($conexion));


                  while($reg=mysqli_fetch_array($consulta_mysql)){

if($reg["id"]==$_SESSION['provincia']){

	echo "<option value='".$reg["id"]."' selected>".$reg["provincia"]."</option>";
}else{
	  echo "<option value='".$reg["id"]."'>".$reg["provincia"]."</option>";
}



                  }
                  ?>
                            </select>



                </div>

                <div class="form-group">
                  <label for="poblacion" id="pobla" >Poblacion</label> <span class="error"><?php echo " ".$_SESSION["poblacionErr"];?></span>

                  <select class="form-control" name="poblacion" id="poblaciones" title="Indique su poblacion" required value="<?php echo $_SESSION['poblacion'];?>"/>

										<?php

										$consulta_mysql2=mysqli_query($conexion,"select * from municipios") or
										die("Problemas en el select:".mysqli_error($conexion));


										while($reg2=mysqli_fetch_array($consulta_mysql2)){

											if($reg2["id"]==$_SESSION['poblacion']){

											echo "<option value='".$reg2["id"]."' selected>".$reg2["municipio"]."</option>";
											}else{
										echo "<option value='".$reg2["id"]."'>".$reg2["municipio"]."</option>";
										}



										}
										?>


                            </select>



                </div>
                <div class="form-group">
                  <label for="telefono">Telefono</label><span class="error"><?php echo " ".$_SESSION["telefonoErr"];?></span>
                  <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" pattern="[0-9]{9}"  title="Introduzca su numero de telefono"  required value="<?php echo $_SESSION['telefono'];?>"/>
                </div>

                <div class="form-group">
                  <label for="email">Email</label><span class="error"><?php echo " ".$_SESSION["emailErr"];?></span>
                  <input class="form-control" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $_SESSION['email'];?>"/>
                </div>




            </div>
        </div>
  </fieldset>
  <br>
        <div class="text-right">
          <input class="contact submit btn btn-primary btn-xl" type="reset" name="limpiar" value="Borrar" />
          <input  class="contact submit btn btn-primary btn-xl" type="submit" id="enviar" name="registrar" value="Registrar usuario"/>
        </div>
    </form>
</div>

<br><br>









<?php


}

 mysqli_close($conexion);
?>























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
<script src="../js/localizacion.js"></script>

</body>
</html>
