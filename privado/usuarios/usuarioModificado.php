<?php


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
<!-- CSS de Bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
<!-- Custom Fonts -->
<link href='https://fonts.googleapis.com/css?family=Mrs+Sheppards%7CDosis:300,400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800;' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css" type="text/css">
<!-- Plugin CSS -->
<link rel="stylesheet" href="../../css/animate.min.css" type="text/css">
<!-- Custom CSS -->
<link rel="stylesheet" href="../../css/style.css" type="text/css">
<link rel="stylesheet" href="../../css/style2.css" type="text/css">
</head>


<body>

  <?php





   ?>

   <?php
   $usuarioErr =$passErr = $perfilErr="";
   $usuario = $pass = $perfil="";


   if(empty($_SESSION["pass"]) & empty($_SESSION["usuario"]) & empty($_SESSION["perfil"])){

?>

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
       		<a class="navbar-brand page-scroll" href="index.html"><img src="../../img/logo3.jpg"  alt="arquitecto tecnico-Trebujena"></a>
       	</div>
       	<!-- Collect the nav links, forms, and other content for toggling -->
       	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav navbar-left">
             <li>
             <a class="page-scroll" href="../../index.html" id="ini">Inicio</a>
             </li>

             <li>
             <a class="page-scroll" href="../../nosotros.html" id="ini">Quien soy</a>
             </li>
             <li>
             <a class="page-scroll" href="../../servicios.html" id="ini">Servicios</a>
             </li>
             <li>
             <a class="page-scroll" href="../../trabajos.html" id="ini">Trabajos</a>
             </li>

             <li>
             <a class="page-scroll" href="../../contacto.html" id="ini">Contacto</a>
             </li>
           </ul>
       		<ul class="nav navbar-nav navbar-right">

       			<li>
       	<a class="page-scroll" href="../../login.html" id="ini" style="margin-left:5px;">Entrar <span class="glyphicon glyphicon-log-in"></spam></a>
       			</li>

       		</ul>
       	</div>
       	<!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
       </nav>

     <div class="container" id="privadaErr">

       <br><br>
     <h2 class="bottombrand wow flipInX">Acceso a <b style="color:#f05f40">zona privada</b></h2><br>

     <br><br><br>

          <div class="alert alert-danger alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>¡Atencion!</strong> Inserte usuario y contraseña para acceder a su zona privada.
            </div>

     <br><br><br><br>

     </div>




<?php

   }else{



         require_once('../../biblioteca/conexion.php');
         $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
           mysqli_set_charset($conexion,"utf8");


         $nick=$nombre=$pass=$pass2=$apellido1=$apellido2=$nif=$direccion=$cp=$poblacion=$provincia=$telefono=$email=$perfil=$bloqueado=$titulacion=$numcolegiado=$colegio=$nacimiento="";
         $nickErr=$nombreErr=$passErr=$passErr2=$apellido1Err=$apellido2Err=$nifErr=$direccionErr=$cpErr=$poblacionErr=$provinciaErr=$telefonoErr=$emailErr=$perfilErr=$bloqueadoErr=$titulacionErr=$numcolegiadoErr=$colegioErr=$nacimientoErr="";




         if ($_SERVER["REQUEST_METHOD"] == "POST") {

           $consulta_mysql2=mysqli_query($conexion,"select usuarios_id, usuarios_usuario from usuarios") or
           die("Problemas en el select:".mysqli_error($conexion));

           if (empty($_POST["nick"])) {
             $nickErr = "Nick obligatorio";
           } else {
             /*
             $nick = test_input($_POST["nick"]);
             if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$nick)) {
               $nickErr = "Solo letras numeros y .-_";

             }*/
             while($reg2=mysqli_fetch_array($consulta_mysql2)){
               if($reg2["usuarios_usuario"]==$_POST["nick"] & $_POST["id"]!=$reg2["usuarios_id"]){
           $nickErr = "El nick ".$_POST["nick"]." ya esta en uso pruebe con otro";
           }
           }
           }

         if (empty($_POST["nombre"])) {
           $nombreErr = "Nombre obligatorio";
         } else {
           /*
           $nombre = test_input($_POST["nombre"]);
           if (!preg_match("/^[a-zñA-ZÑ -]*$/",$nombre)) {
             $nombreErr = "Solo letras y espacio en blanco";
           }*/
         }

          if (empty($_POST["apellido1"])) {
              $apellido1Err = "Apellido 1 obligatorio";
            } else {
           /*   $apellido1 = test_input($_POST["apellido1"]);
              if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido1)) {
                $apellido1Err = "Solo letras y espacio en blanco";
              }*/
            }
            if (empty($_POST["apellido2"])) {
                $apellido2Err = "Apellido 2 obligatorio";
              } else {
             /*   $apellido2 = test_input($_POST["apellido2"]);
                if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido2)) {
                  $apellido2Err = "Solo letras y espacio en blanco";
                }*/
              }


              if (empty($_POST["nif"])) {
                $nifErr = "Nif obligatorio";
              } else {
             //   $nif = test_input($_POST["nif"]);
     $nif=$_POST["nif"];

             $num=substr($nif,0,8);
            $d=$num%23;
            $letra=strtoupper(substr($nif,8,9));
            $leta=array ("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
            if ($leta[$d]==$letra) {

             }else{
                    $nifErr = "Nif incorrecto";
             }
             $consulta_mysql3=mysqli_query($conexion,"select usuarios_usuario, usuarios_nif from usuarios") or
             die("Problemas en el select:".mysqli_error($conexion));
             while($reg3=mysqli_fetch_array($consulta_mysql3)){
               if($reg3["usuarios_nif"]==$_POST["nif"] & $_POST["nick"]!=$reg3["usuarios_usuario"]){

           $nifErr = "El usuario con el nif, ".$_POST["nif"]." ya esta registrado ".$reg3["usuarios_nif"]." ".$_POST["nick"]." ".$_SESSION["usuario"];
           }
           }

              }


              if (empty($_POST["direccion"])) {
                  $direccionErr = "Direccion obligatoria";
                } else {
               /*   $direccion = test_input($_POST["direccion"]);
                  if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$direccion)) {
                    $direccionErr = "Solo letras y espacio en blanco";
                  }*/
                }

                if (empty($_POST["cp"])) {
                    $cpErr = "Codigo postal obligatorio";
                  } else {
               /*     $cp = test_input($_POST["cp"]);
                      if (!preg_match("/^[0-9]{5,5}$/",$cp)) {
                      $cpErr = "Solo 5 numeros";
                    }*/
                  }

                  if (empty($_POST["provincia"])) {
                      $provinciaErr = "Provincia obligatoria";
                    } else {
                   /*   $provincia = test_input($_POST["provincia"]);
                      if (!preg_match("/^[0-9]*$/",$provincia)) {
                        $provinciaErr = "Solo numeros";
                      }*/
                    }

                    if (empty($_POST["poblacion"])) {
                        $poblacionErr = "Poblacion obligatoria";
                      } else {
                   /*     $poblacion = test_input($_POST["poblacion"]);
                        if (!preg_match("/^[0-9]*$/",$poblacion)) {
                          $poblacionErr = "Solo numeros";
                        }*/
                      }

                      if (empty($_POST["telefono"])) {
                     $telefonoErr = "Telefono obligatorio";
                   } else {
                 /*    $telefono= test_input($_POST["telefono"]);
                     if (!preg_match("/^[0-9]{9,9}$/",$telefono)) {
                       $telefonoErr = "Solo 9 numeros";
                     }*/
                   }


              if (empty($_POST["email"])) {
               $emailErr = "Email obligatorio";
              } else {
         /*      $email = test_input($_POST["email"]);
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 $emailErr = "Formato invalido de email";
               }*/
              }
         }

              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }





























         $_SESSION["usuario"];
         $_SESSION["pass"];
         $_SESSION["perfil"];

         ?>


         <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
         <div class="container">
         	<!-- Brand and toggle get grouped for better mobile display -->
         	<div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Desplegar navegación</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
         		<a class="navbar-brand page-scroll" href="index.html"><img src="../../img/logo3.jpg"  alt="arquitecto tecnico-Trebujena"></a>
         	</div>
         	<!-- Collect the nav links, forms, and other content for toggling -->
         	<div class="collapse navbar-collapse navbar-ex1-collapse" >
             <ul class="nav navbar-nav navbar-left">
               <li class="dropdown"><a class="dropdown-scroll" href="menu.php" id="ini">Inicio </a></li>
       <?php if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){ ?>
               <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Encargos <span class="caret"></span></a>

               <ul class="dropdown-menu">
                   <li>
                     <a class="page-scroll" href="../encargos/buscarencargo.php" id="ini">Buscar encargo</a>
                   </li>
                 <li>
                 <a class="page-scroll" href="../encargos/nuevoencargo.php" id="ini">Nuevo encargo</a>
                 </li>

               </ul>

               </li>
             <?php
            }else{
               ?>
       <li class="dropdown"><a class="dropdown-scroll" href="../buscarencargo.php" id="ini">Encargos </a></li>
               <?php
             }
             ?>
               <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Administracion <span class="caret"></span></a>

               <ul class="dropdown-menu">
                 <li ><a class="page-scroll"  href="../admin/presupuestos" id="ini">Presupuestos</a></li>
                 <li>
                 <a class="page-scroll" href="../admin/facturas.php" id="ini">Facturas</a>
                 </li>
                 <li ><a class="page-scroll"  href="../admin/pagos" id="ini">Pagos</a></li>
               </ul>
               </li>

             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Mensajes <span class="caret"></span></a>

             <ul class="dropdown-menu">
                 <li>
                   <a class="page-scroll" href="../mensajes/buscarmensajes.php" id="ini">Buscar mensajes</a>
                 </li>
               <li>
               <a class="page-scroll" href="../mensajes/nuevomensaje.php" id="ini">Nuevo mensaje</a>
               </li>

             </ul>
             </li>
             <?php if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){ ?>
             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Clientes <span class="caret"></span></a>

             <ul class="dropdown-menu">
                 <li>
                   <a class="page-scroll" href="buscarusuario.php" id="ini">Buscar cliente</a>
                 </li>
               <li>
               <a class="page-scroll" href="nuevousuario.php" id="ini">Nuevo cliente</a>
               </li>

             </ul>
             </li>
           <?php } ?>
               </ul>
         		<ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" href="" id="ini" style="margin-left:5px;">Mi cuenta <span class="glyphicon glyphicon-user"></spam><span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li>
                 <a class="page-scroll" href="../verdatos.php" id="ini" ><span class="glyphicon glyphicon-user" ></spam><em style="font-family:Century Gothic;"><?php echo " Usuario: ".$_SESSION["usuario"]." "; ?></em></a>
               </li>
               <li>
                 <a class="page-scroll" href="../verdatos.php" id="ini"><span class="glyphicon glyphicon-list-alt" ></spam><em style="font-family:Century Gothic;"><?php echo " Perfil: ".$_SESSION["perfil"]; ?></em></a>
               </li>
               <hr>
                 <li>
                   <a class="page-scroll" href="../verdatos.php" id="ini">Consultar datos</a>
                 </li>
               <li>
               <a class="page-scroll" href="../moddatos.php" id="ini">Modificar datos</a>
               </li>
               <li>
               <a class="page-scroll" href="../modpass.php" id="ini">Modificar contraseña</a>
             </li>

             </ul>


               </li>
         			<li>
         	<a class="page-scroll" href="../../salir.php" id="ini" style="margin-left:5px;">Salir <span class="glyphicon glyphicon-log-out"></spam></a>
         			</li>

         		</ul>
         	</div>
         	<!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
         </nav>



  <br><br>


  <?php

  if($nickErr=="" &  $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $nifErr=="" & $direccionErr=="" & $cpErr=="" & $poblacionErr=="" & $provinciaErr=="" & $telefonoErr=="" & $emailErr==""){

    $bloqueado;

    if(isset($_REQUEST['bloqueado'])){
      $bloqueado=1;
    }else if(empty($_REQUEST['bloqueado'])){
      $bloqueado=0;
    }


    mysqli_query($conexion, "update usuarios set usuarios_usuario='$_REQUEST[nick]',usuarios_nombre='$_REQUEST[nombre]', usuarios_apellido1='$_REQUEST[apellido1]', usuarios_apellido2='$_REQUEST[apellido2]',usuarios_nif='$_REQUEST[nif]',usuarios_direccion='$_REQUEST[direccion]',usuarios_cp='$_REQUEST[cp]', usuarios_poblacion='$_REQUEST[poblacion]',usuarios_provincia='$_REQUEST[provincia]', usuarios_telefono='$_REQUEST[telefono]', usuarios_email='$_REQUEST[email]', usuarios_perfil='$_REQUEST[perfil]', usuarios_bloqueado='$bloqueado', usuarios_titulacion='$_REQUEST[titulacion]', usuarios_fecha_nacimiento='$_REQUEST[nacimiento]', usuarios_num_colegiado='$_REQUEST[numCol]', usuarios_colegio='$_REQUEST[colegio]'
                            where usuarios_id='$_REQUEST[id]'") or die("Problemas en el select:".mysqli_error($conexion));




    include '../../biblioteca/qr-code/phpqrcode/qrlib.php';
   // El nombre del fichero que se generará (una imagen PNG).
   $file ='../../img/qr/qr_'.$_REQUEST['nick'].'.png';
   // La data que llevará.
   $data = 'https://www.arquitecto-tecnico-trebujena.es/logeo.php?usuario='.$_REQUEST['nick'].'&pass='.$_REQUEST["pass2"];

   // Y generamos la imagen.
   QRcode::png($data, $file);




  $para = $_REQUEST["email"];
  $titulo = 'Modificacion de datos arquitecto tecnico - Trebujena '.$_REQUEST['nick'];
  $mensaje=

  '<html>

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title>Modificacion de datos</title>

  </head>


  <body Style="background-color: #282f35; font-family:Century Gothic;">

          <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                  <h2 style="text-align: center;font-weight: BOLD;">Modificacion de datos</h2>
                  <hr Style="border: 2px solid #f05f40;  width:7%;">
                  <h4 Style="text-align:center">Hola, acaba de modificar los datos de su cuenta.</h4>

                          <h4 Style="text-align:center">Si ha modificado usuario y/o contraseña este es el nuevo codigo QR:</h4>
                        <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                             <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="https://www.arquitecto-tecnico-trebujena.es/" ><spam style="color:#f05f40;">a</spam>rquitecto tecnico-Trebujena</a></div><br>
                                 <div Style="width:80%;margin-left:10%;"><img src="https://www.arquitecto-tecnico-trebujena.es/img/qr'.$file.'" alt="Codigo QR"></div>
                                 <h4><u>Usuario</u></h4>
                                 <h4>'.$_REQUEST["nick"].'</h4>
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

<div class="container">
<div class="section-title text-center">
  <h2 class="bottombrand wow flipInX">Datos modificados de usuario: <b style="color: #f05f40;"><?php echo " ".$_REQUEST["nick"]." "; ?></b></h2>
  <hr class="primary">
  <p>
    Estos son los datos de su cuenta.

  </p>

  <div class="alert alert-success alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>¡Bien!</strong> Los datos del usuario han sido modificados
    </div>

</div>
</div>

<?php

}else{
?>
<br><br>
<div class="container">
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Datos modificados de usuario: <b style="color: #f05f40;"><?php echo " ".$_REQUEST["nick"]." "; ?></b></h2>
    <hr class="primary">
    <p>
      Estos son los datos de su cuenta.
    </p>

    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Upss!</strong> Los datos del usuario no se han modificados
      </div>

</div>
</div>

<?php
}
   ?>





  <!-- Section Contact
  ================================================== -->


<?php

$usr="";
$usuario=mysqli_query($conexion,"select usuarios_usuario from usuarios where usuarios_id='".$_REQUEST["id"]."'") or
die("Problemas en el select:".mysqli_error($conexion));

while($reg5=mysqli_fetch_array($usuario)){
  $usr=$reg5['usuarios_usuario'];
}
 ?>



  <div class="col-md-8 registro">


  <?php

  $consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_id='".$_REQUEST["id"]."'") or
  die("Problemas en el select:".mysqli_error($conexion));


  while($reg=mysqli_fetch_array($consulta_mysql)){

   ?>



      <form method="post" action="modificarU.php" id="contactform" >

        <div class="form-group">

          <input  class="form-control" hidden type="hidden" name="usuarios_id" id="id" value="<?php echo $reg['usuarios_id'];?>"/>
        </div>



        <div class="form-group">
          <label for="nick">Usuario</label><span class="error"><?php echo "  ".$nickErr;?></span>
          <input  class="form-control" disabled type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required autofocus value="<?php echo $reg['usuarios_usuario'];?>"/>
        </div>
        <div class="row">
            <div class="col-md-6">
        <div class="form-group">

          <input  class="form-control" disabled type="hidden"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required value="<?php echo $reg['usuarios_pass'];?>"/>
      </div>
        </div>

      </div>

  <br>

  <fieldset>
  <legend>Datos personales</legend>
          <div class="row">
              <div class="col-md-6">



                  <div class="form-group">
                    <label for="nombre">Nombre</label><span class="error"><?php echo "  ".$nombreErr;?></span>
                    <input  class="form-control" disabled type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  required value="<?php echo $reg['usuarios_nombre'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="apellido1">Apellido 1</label><span class="error"><?php echo "  ".$apellido1Err;?></span>
                    <input class="form-control" disabled type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1"   required value="<?php echo $reg['usuarios_apellido1'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="apellido2">Apellido 2</label><span class="error"><?php echo "  ".$apellido2Err;?></span>
                    <input class="form-control" disabled type="text" name="apellido2" id="apellido2" placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2"  required value="<?php echo $reg['usuarios_apellido2'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="nif">NIF</label><span class="error"><?php echo "  ".$nifErr;?></span>
                    <input class="form-control" disabled type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF 00000000A"  required value="<?php echo $reg['usuarios_nif'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="direccion">Direccion</label><span class="error"><?php echo "  ".$direccionErr;?></span>
                    <input class="form-control" disabled type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required value="<?php echo $reg['usuarios_direccion'];?>"/>
                  </div>
                  <div class="form-group"><span class="error"><?php echo "  ".$perfilErr;?></span>
                    <label for="perfil">Perfil</label>
                    <input class="form-control" disabled type="text" name="perfil" id="perfil" placeholder="Perfil" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Perfil de cuenta"  required value="<?php echo $reg['usuarios_perfil'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="alta">Fecha alta</label>
                    <input class="form-control" disabled type="text" name="alta" id="alta" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"  required value="<?php echo $reg['usuarios_fecha_alta'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="profesion">Titulacion</label><span class="error"><?php echo "  ".$titulacionErr;?></span>
                    <input class="form-control" disabled type="text" name="titulacion" id="titulacion" placeholder="Titulacion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Titulacion"   value="<?php echo $reg['usuarios_titulacion'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="numCol">Numero colegiado</label><span class="error"><?php echo "  ".$numcolegiadoErr;?></span>
                    <input class="form-control" disabled type="text" name="numCol" id="numCol" placeholder="Numero colegiado" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Numero de colegiado"   value="<?php echo $reg['usuarios_num_colegiado'];?>"/>
                  </div>


              </div>
              <div class="col-md-6">



                  <div class="form-group">
                    <label for="cp">Codigo postal</label><span class="error"><?php echo "  ".$cpErr;?></span>
                    <input class="form-control" disabled type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required value="<?php echo $reg['usuarios_cp'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="provincia" id="provi">Provincia</label><span class="error"><?php echo "  ".$provinciaErr;?></span>


                    <?php

                    $consulta_mysql=mysqli_query($conexion,"select * from provincias") or
                    die("Problemas en el select:".mysqli_error($conexion));


                    while($reg3=mysqli_fetch_array($consulta_mysql)){

  if($reg3["id"]==$reg['usuarios_provincia']){
  ?>

  <input class="form-control" disabled type="text" name="provincia" id="provincia" placeholder="Provincia" pattern="[0-9]{5}"  title="Introduzca su provincia"  required value="<?php echo $reg3['provincia'];?>"/>
  <?php

  }


                    }
                    ?>
                              </select>



                  </div>

                  <div class="form-group">
                    <label for="poblacion" id="pobla" >Poblacion</label><span class="error"><?php echo "  ".$poblacionErr;?></span>



  										<?php

  										$consulta_mysql2=mysqli_query($conexion,"select * from municipios") or
  										die("Problemas en el select:".mysqli_error($conexion));


  										while($reg2=mysqli_fetch_array($consulta_mysql2)){

  											if($reg2["id"]==$reg['usuarios_poblacion']){

                          ?>

                          <input class="form-control" disabled type="text" name="poblacion" id="poblacion" placeholder="Poblacion" pattern="[0-9]{5}"  title="Introduzca su poblacion"  required value="<?php echo $reg2['municipio'];?>"/>
                          <?php

  											}



  										}
  										?>


                              </select>



                  </div>
                  <div class="form-group">
                    <label for="telefono">Telefono</label><span class="error"><?php echo "  ".$telefonoErr;?></span>
                    <input class="form-control" disabled type="text" name="telefono" id="telefono" placeholder="Telefono" pattern="[0-9]{9}"  title="Introduzca su numero de telefono"  required value="<?php echo $reg['usuarios_telefono'];?>"/>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label><span class="error"><?php echo "  ".$emailErr;?></span>
                    <input class="form-control" disabled type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $reg['usuarios_email'];?>"/>
                  </div>
                    <div class="form-group">
                  <label for="bloqueado">Bloqueado</label><span class="error"><?php echo "  ".$bloqueadoErr;?></span>
                  <?php if($reg["usuarios_bloqueado"]==1){
                    ?>
                    <input class="form-control" type="checkbox" name="bloqueado" id="bloqueado"  title="Si esta marcado esta bloquado"  checked disabled/>
                    <?php
                  } else{
                    ?>
                    <input class="form-control" type="checkbox" name="bloqueado" id="bloqueado"  title="Si esta marcado esta bloquado" disabled/>
                    <?php
                  }?>
                </div>
                <div class="form-group">
                  <label for="nacimiento">Fecha nacimiento</label><span class="error"><?php echo "  ".$nacimientoErr;?></span>
                  <input class="form-control"  type="date" name="nacimiento" id="nacimiento" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"  value="<?php echo $reg['usuarios_fecha_nacimiento'];?>"/>
                </div>

                  <div class="form-group">
                    <label for="colegio">Colegio profesional</label><span class="error"><?php echo "  ".$colegioErr;?></span>
                    <input class="form-control" disabled type="text" name="colegio" id="colegio" placeholder="Colegio"  title="Colegio Profesional"  value="<?php echo $reg['usuarios_colegio'];?>"/>
                  </div>

              </div>
          </div>
    </fieldset>
    <br>
          <div class="text-right">
            <?php if($_SESSION["perfil"]=="Administrador") {
              ?>
        <button  class="contact submit btn btn-primary btn-xl" style="float:left;" data-toggle="modal" data-target="#myModal"  type="button" id="eliminart" name="eliminar"  value="Eliminar usuario"/>Eliminar usuario</button>
          <?php } ?>
            <input  class="contact submit btn btn-primary btn-xl" type="submit" id="enviar" name="registrar" value="Modificar datos"/>
          </div>

          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="background-color: #282f35;">
                  <button type="button" class="close" data-dismiss="modal" style="color:white;font-weight:bold;">&times;</button>
                  <h3 class="modal-title" style="color:white;font-weight:bold;">¡Atencion!</h3>
                </div>
                <div class="modal-body" >
                  <p style="color:black;">¿Esta seguro de eliminar al usuario <spam style="color: #f05f40;"><?php echo " ".$reg["usuarios_usuario"]; ?></spam>?</p>
                
                </div>
                <div class="modal-footer" >


                  <button type="submit" class="btn btn-primary" style="float:left;">Eliminar</button>
                  </form>


                  <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


                </div>
              </div>

            </div>
          </div>

      </form>
  </div>

  <br><br>







  <?php
}
  mysqli_close($conexion);

  }
  ?>












</div>





<br><br><br>


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
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<script src="../../privado/js/parallax.js"></script>
<script src="../../js/contact.js"></script>
<script src="../../js/countto.js"></script>
<script src="../../js/jquery.easing.min.js"></script>
<script src="../../js/wow.min.js"></script>
<script src="../../js/common.js"></script>






<script src="../js/localizacion.js"></script>
</body>
</html>
