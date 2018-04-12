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



$nick=$nombre=$pass=$pass2=$apellido1=$apellido2=$nif=$direccion=$cp=$poblacion=$provincia=$telefono=$email="";
$nickErr=$nombreErr=$passErr=$passErr2=$apellido1Err=$apellido2Err=$nifErr=$direccionErr=$cpErr=$poblacionErr=$provinciaErr=$telefonoErr=$emailErr="";

$contra=md5($_REQUEST["pass"]);
$nick=$_REQUEST['nick'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["nick"])) {
  $nickErr = "Nick obligatorio";
} else {
  $nick = test_input($_POST["nick"]);
  if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$nick)) {
    $nickErr = "Solo letras numeros y .-_";
  }
}
if (empty($_POST["nombre"])) {
  $nombreErr = "Nombre obligatorio";
} else {
  $nombre = test_input($_POST["nombre"]);
  if (!preg_match("/^[a-zñA-ZÑ -]*$/",$nombre)) {
    $nombreErr = "Solo letras y espacio en blanco";
  }
}
if (empty($_POST["pass"]) || empty($_POST["pass2"])) {
   $passErr = "Contraseña obligatoria";
   $passErr2 = "Contraseña obligatoria";
 } else if($_POST["pass"]!=$_POST["pass2"]){
   $passErr = "Las contraseña deben de ser iguales";
   $passErr2 = "Las contraseña deben de ser iguales";
 }else {
   $pass = test_input($_POST["pass"]);
   if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$pass)) {
     $passErr = "Solo letras numeros y .-_";
   }
 }
 if (empty($_POST["apellido1"])) {
     $apellido1Err = "Apellido 1 obligatorio";
   } else {
     $apellido1 = test_input($_POST["apellido1"]);
     if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido1)) {
       $apellido1Err = "Solo letras y espacio en blanco";
     }
   }
   if (empty($_POST["apellido2"])) {
       $apellido2Err = "Apellido 2 obligatorio";
     } else {
       $apellido2 = test_input($_POST["apellido2"]);
       if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido2)) {
         $apellido2Err = "Solo letras y espacio en blanco";
       }
     }


     if (empty($_POST["nif"])) {
       $nifErr = "Nif obligatorio";
     } else {
       $nif = test_input($_POST["nif"]);


   	$num=substr($nif,0,8);
   $d=$num%23;
   $letra=strtoupper(substr($nif,8,9));
   $leta=array ("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
   if ($leta[$d]==$letra) {

   	}else{
           $nifErr = "Nif incorrecto";
   	}
     }


     if (empty($_POST["direccion"])) {
         $direccionErr = "Direccion obligatoria";
       } else {
         $direccion = test_input($_POST["direccion"]);
         if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$direccion)) {
           $direccionErr = "Solo letras y espacio en blanco";
         }
       }

       if (empty($_POST["cp"])) {
           $cpErr = "Codigo postal obligatorio";
         } else {
           $cp = test_input($_POST["cp"]);
             if (!preg_match("/^[0-9]{5,5}$/",$cp)) {
             $cpErr = "Solo 5 numeros";
           }
         }

         if (empty($_POST["provincia"])) {
             $provinciaErr = "Provincia obligatoria";
           } else {
             $provincia = test_input($_POST["provincia"]);
             if (!preg_match("/^[0-9]*$/",$provincia)) {
               $provinciaErr = "Solo numeros";
             }
           }

           if (empty($_POST["poblacion"])) {
               $poblacionErr = "Poblacion obligatoria";
             } else {
               $poblacion = test_input($_POST["poblacion"]);
               if (!preg_match("/^[0-9]*$/",$poblacion)) {
                 $poblacionErr = "Solo numeros";
               }
             }

             if (empty($_POST["telefono"])) {
            $telefonoErr = "Telefono obligatorio";
          } else {
            $telefono= test_input($_POST["telefono"]);
            if (!preg_match("/^[0-9]{9,9}$/",$telefono)) {
              $telefonoErr = "Solo 9 numeros";
            }
          }


     if (empty($_POST["email"])) {
      $emailErr = "Email obligatorio";
     } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato invalido de email";
      }
     }
}

     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }


     $_SESSION["nick"] = $_REQUEST['nick'];
     $_SESSION["pass"] = $_REQUEST['pass'];
     $_SESSION["pass2"] = $_REQUEST['pass2'];
     $_SESSION["nombre"] = $_REQUEST['nombre'];
     $_SESSION["apellido1"] = $_REQUEST['apellido1'];
     $_SESSION["apellido2"] = $_REQUEST['apellido2'];
     $_SESSION["nif"] = $_REQUEST['nif'];
     $_SESSION["direccion"] = $_REQUEST['direccion'];
     $_SESSION["cp"] = $_REQUEST['cp'];
     $_SESSION["poblacion"] = $_REQUEST['poblacion'];
     $_SESSION["provincia"] = $_REQUEST['provincia'];
     $_SESSION["telefono"] = $_REQUEST['telefono'];
     $_SESSION["email"] = $_REQUEST['email'];


     $_SESSION["nickErr"] = $nickErr;
     $_SESSION["passErr"] =$passErr;
     $_SESSION["pass2Err"] = $passErr2;
     $_SESSION["nombreErr"] = $nombreErr;
     $_SESSION["apellido1Err"] = $apellido1Err;
     $_SESSION["apellido2Err"] = $apellido2Err;
     $_SESSION["nifErr"] = $nifErr;
     $_SESSION["direccionErr"] = $direccionErr;
     $_SESSION["cpErr"] = $cpErr;
     $_SESSION["poblacionErr"] = $poblacionErr;
     $_SESSION["provinciaErr"] = $provinciaErr;
     $_SESSION["telefonoErr"] = $telefonoErr;
     $_SESSION["emailErr"] = $emailErr;




     if($nickErr=="" & $passErr=="" & $passErr2=="" & $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $nifErr=="" & $direccionErr=="" & $cpErr=="" & $poblacionErr=="" & $provinciaErr=="" & $telefonoErr=="" & $emailErr==""){

       require_once('../biblioteca/conexion.php');
       $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
         mysqli_set_charset($conexion,"utf8");



     	mysqli_query($conexion,"insert into usuarios(usuarios_usuario,usuarios_pass,usuarios_nombre,usuarios_apellido1,usuarios_apellido2,usuarios_nif,usuarios_direccion,usuarios_cp,usuarios_poblacion,usuarios_provincia,usuarios_telefono,usuarios_email) values
                            ('$_REQUEST[nick]','$contra','$_REQUEST[nombre]','$_REQUEST[apellido1]','$_REQUEST[apellido2]','$_REQUEST[nif]','$_REQUEST[direccion]','$_REQUEST[cp]','$_REQUEST[poblacion]','$_REQUEST[provincia]','$_REQUEST[telefono]','$_REQUEST[email]')")
       or die("Problemas en el select".mysqli_error($conexion));


       include '../biblioteca/qr-code/phpqrcode/qrlib.php';
      // El nombre del fichero que se generará (una imagen PNG).
      $file ='../img/qr/qr_'.$_REQUEST['nick'].'.png';
      // La data que llevará.
      $data = 'https://www.arquitecto-tecnico-trebujena.es/logeo.php?usuario='.$nick.'&pass='.$contra;

      // Y generamos la imagen.
      QRcode::png($data, $file);




     $para = $_REQUEST["email"];
     $titulo = 'Bienvenido a arquitecto tecnico - Trebujena '.$_REQUEST['nick'];
     $mensaje=

     '<html>

     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
         <title>Confiramacion de registro</title>

     </head>


     <body Style="background-color: #282f35; font-family:Century Gothic;">

             <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                     <h2 style="text-align: center;font-weight: BOLD;">Confirmacion de registro</h2>
                     <hr Style="border: 2px solid #f05f40;  width:7%;">
                     <h4 Style="text-align:center">Hola gracias por acceder a nuestra pagina pulse el boton que esta a continuacion para confirmar el alta.</h4>

                            <a Style="background-color: #f05f40; border: none;  color: white; text-align: center;  text-decoration: none;  display: inline-block; font-size: 16px; margin-left: 35%; cursor: pointer;  width: 30%;  padding-top: 5px; padding-bottom: 5px;  margin-right: 35%; "  href="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra.'" >Confirmar registro</a>

                             <h4 Style="text-align:center">Una vez confirmada la cuenta puedes acceder con el siguiente codigo QR:</h4>
                           <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                                <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="http://www.agvarelapru.esy.es/FORMULARIO-1" ><spam style="color:#f05f40;">a</spam>rquitecto tecnico-Trebujena</a></div><br>
                                    <div Style="width:80%;margin-left:10%;"><img src="https://www.arquitecto-tecnico-trebujena.es/img/qr'.$file.'" alt="Codigo QR"></div>
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




     mysqli_close($conexion);
     }
     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">ALTA USUARIO</h2>
          <hr>
      </div>
      <div class="col-md-8 registro">






<ul class="registrado">
      <li><label for="nick" >Nick:</label><?php echo " ".$nick = $_POST['nick'];?><span class="error"><?php echo "  ".$nickErr;?></span></li>
      <li><label for="pass" >Contraseña:</label><?php echo " ".$pass = $contra;?> <span class="error"><?php echo "  ".$passErr;?></span></li>
      <li><label for="nombre" >Nombre:</label><?php echo " ".$nombre = $_POST['nombre'];?><span class="error"><?php echo "  ".$nombreErr;?></span></li>
      <li><label for="apellido1" >Apellido 1:</label><?php echo " ".$apellido1 = $_POST['apellido1'];?><span class="error"><?php echo "  ".$apellido1Err;?></span></li>
      <li><label for="apellido2" >Apellido 2:</label><?php echo " ".$apellido2 = $_POST['apellido2'];?><span class="error"><?php echo "  ".$apellido2Err;?></span></li>
<li><label for="nif" >NIF:</label><?php echo $nif = " ".$_POST['nif'];?><span class="error"><?php echo "  ".$nifErr;?></span></li>
<li><label for="direccion" >Direccion:</label><?php echo " ".$direccion = $_POST['direccion'];?><span class="error"><?php echo "  ".$direccionErr;?></span></li>
<li><label for="cp" >CP:</label><?php echo " ".$cp = $_POST['cp'];?><span class="error"><?php echo "  ".$cpErr;?></span></li>
<li><label for="poblacion" >Poblacion:</label><?php echo " ".$poblacion = $_POST['poblacion'];?><span class="error"><?php echo "  ".$poblacionErr;?></span></li>
<li><label for="Provincia" >Provincia:</label><?php echo " ".$provincia = $_POST['provincia'];?><span class="error"><?php echo "  ".$provinciaErr;?></span></li>
<li><label for="Telefono" >Telefono:</label><?php echo " ".$telefono = $_POST['telefono'];?><span class="error"><?php echo "  ".$telefonoErr;?></span></li>
      <li><label for="email" >E-mail:</label><?php echo " ".$email = $_POST['email'];?><span class="error"><?php echo "  ".$emailErr;?></span></li>



    </ul>
    </div>
</div>


      <br>

  <div class="col-md-12 text-center">
            <?php



            if($nickErr=="" & $passErr=="" & $passErr2=="" & $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $nifErr=="" & $direccionErr=="" & $cpErr=="" & $poblacionErr=="" & $provinciaErr=="" & $telefonoErr=="" & $emailErr==""){

            echo "<img  src='../img/qr/qr_".$_REQUEST['nick'].".png'>";
            echo "<h3 class='envio'> El usuario fue dado de alta correctamente. </h3>";
            echo "<h4 class='envio'> Compruebe su cuenta de correo para confirmar la cuenta. </h4>";
            session_unset();
            session_destroy();
            }else{
            echo "<h3 style=color:red> El Usuario NO se agrego. </h3>";
            ?>
            <script  type="text/javascript">

/*
              setTimeout("redirigir()", 2000);


            function redirigir(){
              window.location="registro.php";
            }*/
            </script>

            <?php
            }
            ?>
      <br>
</div>


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
