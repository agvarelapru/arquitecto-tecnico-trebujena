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
<link rel="shortcut icon" href="img/logoFavicon.ico">
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<!-- Custom Fonts -->
<link href='https://fonts.googleapis.com/css?family=Mrs+Sheppards%7CDosis:300,400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800;' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
<!-- Plugin CSS -->
<link rel="stylesheet" href="css/animate.min.css" type="text/css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/style2.css" type="text/css">

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



      <?php

      if(empty($_SESSION["pass"]) & empty($_SESSION["nick"])){
   ?>
        <div class="container" id="privadaErr">

          <br><br>
        <h2 class="bottombrand wow flipInX">Recuperar <b style="color:#f05f40">contraseña</b></h2><br>

        <br><br><br>

             <div class="alert alert-danger alert-dismissible fade in">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>¡Atencion!</strong> Atencion no ha sido posible acceder a la pagina.
               </div>

        <br><br><br><br>

        </div>

        <?php
      }else{




    require_once('biblioteca/conexion.php');
    $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
      mysqli_set_charset($conexion,"utf8");


    $passvieja=$pass=$pass2="";
    $passviejaErr=$passErr=$passErr2="";

  $contra=$_SESSION["pass"];
  $contranueva=md5($_POST["pass"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


      if (empty($_SESSION["pass"]) || empty($_POST["pass"]) || empty($_POST["pass2"])) {
         $passviejaErr = "Contraseña obligatoria";

       } else if($_POST["pass"]!=$_POST["pass2"]){
         $passErr = "Las contraseña deben de ser iguales";

       }else {
         /*
         $pass = test_input($_POST["pass"]);
         if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$pass)) {
           $passErr = "Solo letras numeros y .-_";
         }
         */
       }



         function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
         }


  }



      if($passviejaErr=="" & $passErr=="" & $passErr2=="" ){


        mysqli_query($conexion, "update usuarios set usuarios_pass='$contranueva' where usuarios_usuario='$_SESSION[nick]'") or die("Problemas en el select:".mysqli_error($conexion));

        $consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_usuario='$_SESSION[nick]'") or
        die("Problemas en el select:".mysqli_error($conexion));


       while($reg=mysqli_fetch_array($consulta_mysql)){
$email=$reg["usuarios_email"];
$nick=$reg["usuarios_usuario"];
$pass=$reg["usuarios_pass"];
       }


        include 'biblioteca/qr-code/phpqrcode/qrlib.php';
       // El nombre del fichero que se generará (una imagen PNG).
       $file ='registro/img/qr/qr_'.$_SESSION['nick'].'.png';
       // La data que llevará.
       $data = 'https://www.arquitecto-tecnico-trebujena.es/logeo.php?usuario='.$_SESSION['nick'].'&pass='.$contranueva;

       // Y generamos la imagen.
       QRcode::png($data, $file);




      $para = $email;
      $titulo = 'Modificacion de contraseña arquitecto tecnico - Trebujena '.$_SESSION['nick'];
      $mensaje=

      '<html>

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
          <title>Modificacion de contraseña</title>

      </head>


      <body Style="background-color: #282f35; font-family:Century Gothic;">

              <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                      <h2 style="text-align: center;font-weight: BOLD;">Modificacion de contraseña</h2>
                      <hr Style="border: 2px solid #f05f40;  width:7%;">
                      <h4 Style="text-align:center">Hola, acaba de modificar la contraseña de su cuenta.</h4>

                              <h4 Style="text-align:center">Si ha modificado usuario y/o contraseña este es el nuevo codigo QR:</h4>
                            <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                                 <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="https://www.arquitecto-tecnico-trebujena.es" ><b style="color:#f05f40;">a</b>rquitecto tecnico-Trebujena</a></div><br>
                                     <div Style="width:80%;margin-left:10%;"><img src="https://www.arquitecto-tecnico-trebujena.es/'.$file.'" alt="Codigo QR"></div>
                                     <h4><u>Usuario</u></h4>
                                     <h4>'.$_SESSION["nick"].'</h4>
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


?>
<br><br>
<div class="container">
    <div class="section-title text-center">
      <h2 class="bottombrand wow flipInX">Modificar contraseña de usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["nick"]." "; ?></b></h2>
      <hr class="primary">
      <br><br>
      <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Bien!</strong> La contraseña ha sido modificada satisfactoriamente
        </div>
  </div>
</div>

<br><br><br><br>
<?php

    session_unset();
    session_destroy();//Literalmente la destruimos

}else{


?>





<br><br>


    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Modificar contraseña de usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["nick"]." "; ?></b></h2>
          <hr class="primary">
          <div class="alert alert-danger alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>¡Upss!</strong> Lo sentimos pero la contraseña no se ha modificado. <br>
<?php echo $passviejaErr; ?>
<?php echo $passErr; ?>

            </div>
      </div>
</div>


<div class="col-md-8 registro">
  <form method="post" action="nuevopassmodificado.php" id="contactform" >







<fieldset>
<legend>Nueva contraseña</legend>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">


      <input  class="form-control"  type="hidden"  name="nick" id="nick"   required value="<?php echo $_SESSION["nick"]; ?>"/>

    <input  class="form-control"  type="hidden"  name="passvieja" id="passvieja"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required value="<?php echo $_SESSION["nick"]; ?>"/>
<input  class="form-control"  type="hidden"  name="provincia" id="provincia" value="ooo"/>
<input  class="form-control"  type="hidden"  name="poblaciones" id="poblaciones" value="ooo"/>
      <label for="pass">Contraseña nueva</label>
      <input  class="form-control" type="password"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required />
    <br>
    <label for="pass2" id="error">Repita Contraseña nueva</label>
      <input  class="form-control" type="password"  name="pass2" id="pass2"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required />
      <h5 id="error"></h5>
    </div>
</div>

</div>



</fieldset>
<br>
      <div class="text-right">

        <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="modificar"  value="Modificar contraseña"/>
      </div>







  </form>
</div>

<?php
}
 ?>




<br><br>









<?php




mysqli_close($conexion);

}


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

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/contact.js"></script>
<script src="js/countto.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/common.js"></script>
<script src="js/localizacion.js"></script>

</body>
</html>
