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
<script src="../../js/localizacion.js"></script>
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


  <?php

  require_once('../../biblioteca/conexion.php');

  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
    mysqli_set_charset($conexion,"utf8");



  ?>

  <!-- Section Contact
  ================================================== -->


<?php

$usr="";
$usuario=mysqli_query($conexion,"select usuarios_usuario from usuarios where usuarios_id='".$_REQUEST["usuarios_id"]."'") or
die("Problemas en el select:".mysqli_error($conexion));

while($reg5=mysqli_fetch_array($usuario)){
  $usr=$reg5['usuarios_usuario'];
}
 ?>


      <div class="container">
          <div class="section-title text-center">
            <h2 class="bottombrand wow flipInX">Datos cuenta usuario: <b style="color: #f05f40;"><?php echo " ".$usr." "; ?></b></h2>
            <hr class="primary">
        		<p>
        			Desde esta pagina puedes consultar tus datos de registros y acceder para modificarlos o darte de baja de la cuenta.
        		</p>
        </div>
  </div>


  <div class="col-md-8 registro">


  <?php

  $consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_id='".$_REQUEST["usuarios_id"]."'") or
  die("Problemas en el select:".mysqli_error($conexion));


  while($reg=mysqli_fetch_array($consulta_mysql)){

   ?>



      <form method="post" action="usuarioModificado.php" id="contactform" >

        <div class="form-group">
          <label for="nick">Usuario</label>
          <input  class="form-control" type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required autofocus value="<?php echo $reg['usuarios_usuario'];?>"/>
        </div>
        <div class="row">
            <div class="col-md-6">
        <div class="form-group">

          <input  class="form-control" disabled type="hidden"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required value="<?php echo $reg['usuarios_pass'];?>"/>
  <input  class="form-control" readonly type="hidden"  name="pass2" id="pass2"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required value="<?php echo $reg['usuarios_pass'];?>"/>
      </div>
        </div>

      </div>

  <br>

  <fieldset>
  <legend>Datos personales</legend>
          <div class="row">
              <div class="col-md-6">


  <input  class="form-control" hidden type="hidden" name="id" id="id" required value="<?php echo $reg['usuarios_id'];?>"/>
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  required value="<?php echo $reg['usuarios_nombre'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="apellido1">Apellido 1</label>
                    <input class="form-control"  type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1"   required value="<?php echo $reg['usuarios_apellido1'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="apellido2">Apellido 2</label>
                    <input class="form-control"  type="text" name="apellido2" id="apellido2" placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2"  required value="<?php echo $reg['usuarios_apellido2'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="nif">NIF</label>
                    <input class="form-control" type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF 00000000A"  required value="<?php echo $reg['usuarios_nif'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input class="form-control"  type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required value="<?php echo $reg['usuarios_direccion'];?>"/>
                  </div>
                  <?php if($_SESSION["perfil"]=="Administrador"){ ?>
                  <div class="form-group">
                    <label for="perfil">Perfil</label>
                    <select class="form-control" name="perfil" id="perfil" title="Indique el perfil"/>
                    <?php

                    if($reg["usuarios_perfil"]=="Administrador"){

                      echo "<option selected>Administrador</option>";
                      echo "<option >Tecnico</option>";
                      echo "<option >Cliente</option>";
                    }else if($reg["perfil"]=="Tecnico"){
                      echo "<option >Administrador</option>";
                        echo "<option selected>Tecnico</option>";
                        echo "<option >Cliente</option>";
                    }else{
                      echo "<option>Administrador</option>";
                      echo "<option >Tecnico</option>";
                      echo "<option selected>Cliente</option>";
                    }
                     ?>
                  </select>

                  </div>

                  <div class="form-group">
                    <label for="profesion">Titulacion</label>
                    <input class="form-control" type="text" name="titulacion" id="titulacion" placeholder="Titulacion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Titulacion"   value="<?php echo $reg['usuarios_titulacion'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="numCol">Numero colegiado</label>
                    <input class="form-control"  type="text" name="numCol" id="numCol" placeholder="Numero colegiado" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Numero de colegiado"   value="<?php echo $reg['usuarios_num_colegiado'];?>"/>
                  </div>
  <?php } ?>

              </div>
              <div class="col-md-6">



                  <div class="form-group">
                    <label for="cp">Codigo postal</label>
                    <input class="form-control"  type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required value="<?php echo $reg['usuarios_cp'];?>"/>
                  </div>

                  <div class="form-group">
                    <label for="provincia" id="provi">Provincia</label>

                    <select class="form-control" name="provincia" id="provincia" title="Indique su provincia" required />
   <option value="">--Selecione una provincia--</option>
                    <?php

                    $consulta_mysql=mysqli_query($conexion,"select * from provincias") or
                    die("Problemas en el select:".mysqli_error($conexion));


                    while($reg3=mysqli_fetch_array($consulta_mysql)){

  if($reg3["id"]==$reg['usuarios_provincia']){

    echo "<option value='".$reg3["id"]."' selected>".$reg3["provincia"]."</option>";
  }else{
      echo "<option value='".$reg3["id"]."'>".$reg3["provincia"]."</option>";
  }



                    }
                    ?>
                              </select>



                  </div>
                  <div class="form-group">
                    <label for="poblacion" id="pobla" >Poblacion</label>

                    <select class="form-control" name="poblacion" id="poblaciones" title="Indique su poblacion" required/>

  										<?php

  										$consulta_mysql2=mysqli_query($conexion,"select * from municipios   where provincia_id='".$reg["usuarios_provincia"]."'") or
  										die("Problemas en el select:".mysqli_error($conexion));


  										while($reg2=mysqli_fetch_array($consulta_mysql2)){

  											if($reg2["id"]==$reg['usuarios_poblacion']){

  											echo "<option value='".$reg2["id"]."' selected>".$reg2["municipio"]."</option>";
  											}else{
  										echo "<option value='".$reg2["id"]."'>".$reg2["municipio"]."</option>";
  										}



  										}
  										?>


                              </select>



                  </div>

                  <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input class="form-control"  type="text" name="telefono" id="telefono" placeholder="Telefono" pattern="[0-9]{9}"  title="Introduzca su numero de telefono"  required value="<?php echo $reg['usuarios_telefono'];?>"/>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control"  type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $reg['usuarios_email'];?>"/>
                  </div>
                  <div class="form-group">
                    <label for="bloqueado">Bloqueado</label>
                    <?php if($reg["usuarios_bloqueado"]==1){
                      ?>
  <input class="form-control" type="checkbox" name="bloqueado" id="bloqueado"  title="Si esta marcado esta bloquado"  checked value="1"/>
                      <?php
                    } else{
                      ?>
  <input class="form-control" type="checkbox" name="bloqueado" id="bloqueado"  title="Si esta marcado esta bloquado" value="0"/>
                      <?php
                    }?>
                  </div>
                  <div class="form-group">
                    <label for="nacimiento">Fecha nacimiento</label>
                    <input class="form-control"  type="date" name="nacimiento" id="nacimiento" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"  value="<?php echo $reg['usuarios_fecha_nacimiento'];?>"/>
                  </div>
                  <?php
if($_SESSION["perfil"]=="Administrador"){
                   ?>
                  <div class="form-group">
                    <label for="colegio">Colegio profesional</label>
                    <input class="form-control"  type="text" name="colegio" id="colegio" placeholder="Colegio"  title="Colegio Profesional"  value="<?php echo $reg['usuarios_colegio'];?>"/>
                  </div>
<?php } ?>
              </div>
          </div>
    </fieldset>
    <br>
    <div class="text-right">

      <button  class="contact submit btn btn-primary btn-xl" data-toggle="modal" data-target="#myModal"  type="button" id="modificar" name="modificar"  value="Modificar datos"/>Modificar datos</button>
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
            <p style="color:black;">¿Esta seguro de modificar al usuario <spam style="color: #f05f40;"><?php echo " ".$reg["usuarios_usuario"]; ?></spam>?</p>
          </div>
          <div class="modal-footer" >


            <button type="submit" class="btn btn-primary" style="float:left;">Modificar</button>
            </form>


            <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


          </div>
        </div>

      </div>
    </div>




</form>
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

</body>
</html>
