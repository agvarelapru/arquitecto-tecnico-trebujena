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
  <br><br>
  <div class="container">
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Bloqueo masivo <b style="color: #f05f40;">usuarios</b></h2>
    <hr class="primary">
    <p>


    </p>

  <?php

  if(!empty($_REQUEST["tic"]) & ($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico")){


             require_once('../../biblioteca/conexion.php');
             $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
               mysqli_set_charset($conexion,"utf8");





               $checkbox=$_REQUEST['tic'];
               $numero = sizeof($checkbox);
               for($i=0;$i<$numero;$i++){
               $del_id = $checkbox[$i];

               mysqli_query($conexion,"update usuarios set usuarios_bloqueado='1' where usuarios_id='$del_id'")
               or die("Problemas en el select".mysqli_error($conexion));


               $consulta_mysql=mysqli_query($conexion,"select usuarios_usuario from usuarios where usuarios_id='$del_id'") or
               die("Problemas en el select:".mysqli_error($conexion));


 while($reg=mysqli_fetch_array($consulta_mysql)){
?>

<br><br><br>
  <div class="alert alert-success alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>¡Bien!</strong> El usuario <?php echo $reg["usuarios_usuario"]; ?> ha sido bloqueado correctamente
    </div>



<?php
}
}
}else{
?>
<br><br>


    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Upss!</strong> Los usuarios no han sido bloqueados
      </div>



<?php
}

   ?>
 </div>
 </div>




  <!-- Section Contact
  ================================================== -->



  <?php

  mysqli_close($conexion);

  }
  ?>












</div>





<br><br><br><br><br><br><br><br><br>




















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
