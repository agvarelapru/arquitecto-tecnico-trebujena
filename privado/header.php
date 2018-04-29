
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





<?php

$usuarioErr =$passErr = $perfilErr="";
$usuario = $pass = $perfil="";



?>
<body id=home>

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
   <a class="navbar-brand page-scroll" href="?=index.html"><img src="img/logo3.jpg"  alt="arquitecto tecnico-Trebujena"></a>
 </div>
 <!-- Collect the nav links, forms, and other content for toggling -->
 <div class="collapse navbar-collapse navbar-ex1-collapse" >
   <ul class="nav navbar-nav navbar-left">
     <li class="dropdown"><a class="dropdown-scroll" href="?p=menu" id="ini">Inicio </a></li>
<?php if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){ ?>
     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Encargos <span class="caret"></span></a>

     <ul class="dropdown-menu">
         <li>
           <a class="page-scroll" href="?p=encargos/buscarencargo" id="ini">Buscar encargo</a>
         </li>
       <li>
       <a class="page-scroll" href="?p=encargos/nuevoencargo" id="ini">Nuevo encargo</a>
       </li>

     </ul>

     </li>
   <?php }else{
     ?>
<li class="dropdown"><a class="dropdown-scroll" href="?p=buscarencargo" id="ini">Encargos </a></li>
     <?php
   } ?>
     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Administracion <span class="caret"></span></a>

     <ul class="dropdown-menu">
       <li ><a class="page-scroll"  href="?p=admin/presupuestos" id="ini">Presupuestos</a></li>
       <li>
       <a class="page-scroll" href="?p=admin/facturas" id="ini">Facturas</a>
       </li>
       <li ><a class="page-scroll"  href="?p=admin/pagos" id="ini">Pagos</a></li>
     </ul>
     </li>

   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Mensajes <span class="caret"></span></a>

   <ul class="dropdown-menu">
       <li>
         <a class="page-scroll" href="?p=preguntas/buscarpreguntas" id="ini">Buscar mensajes</a>
       </li>
     <li>
     <a class="page-scroll" href="?p=preguntas/nuevapregunta" id="ini">Nuevo mensaje</a>
     </li>

   </ul>
   </li>
   <?php if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){ ?>
   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ini">Clientes <span class="caret"></span></a>

   <ul class="dropdown-menu">
       <li>
         <a class="page-scroll" href="?p=usuarios/buscarusuario" id="ini">Buscar cliente</a>
       </li>
     <li>
     <a class="page-scroll" href="registro/registro.php" id="ini">Nuevo cliente</a>
     </li>

   </ul>
   </li>
 <?php }?>
     </ul>
   <ul class="nav navbar-nav navbar-right">
     <li class="dropdown">
 <a class="dropdown-toggle" data-toggle="dropdown" href="" id="ini" style="margin-left:5px;">Mi cuenta <span class="glyphicon glyphicon-user"></spam><span class="caret"></span></a>
   <ul class="dropdown-menu">
     <li>
       <a class="page-scroll" href="?p=verdatos" id="ini" ><span class="glyphicon glyphicon-user" ></spam><em style="font-family:Century Gothic;"><?php echo " Usuario: ".$_SESSION["usuario"]." "; ?></em></a>
     </li>
     <li>
       <a class="page-scroll" href="?p=verdatos" id="ini"><span class="glyphicon glyphicon-list-alt" ></spam><em style="font-family:Century Gothic;"><?php echo " Perfil: ".$_SESSION["perfil"]; ?></em></a>
     </li>
     <hr>
       <li>
         <a class="page-scroll" href="?p=verdatos" id="ini">Consultar datos</a>
       </li>
     <li>
     <a class="page-scroll" href="?p=moddatos" id="ini">Modificar datos</a>
     </li>
     <li>
     <a class="page-scroll" href="?p=modpass" id="ini">Modificar contraseña</a>
   </li>

   </ul>


     </li>
     <li>
 <a class="page-scroll" href="?p=salir" id="ini" style="margin-left:5px;">Salir <span class="glyphicon glyphicon-log-out"></spam></a>
     </li>

   </ul>
 </div>
 <!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>
