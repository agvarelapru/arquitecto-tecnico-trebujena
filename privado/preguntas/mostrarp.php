<br><br>
<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");

  $consulta_mysql=mysqli_query($conexion,"select *  from preguntas where preguntas_id=".$_GET['preguntas_id']) or
    die("Problemas en el select:".mysqli_error($conexion));
  $num_total_registros = mysqli_num_rows($consulta_mysql);
if($num_total_registros==0){
?>
  <div class="container">
      <div class="section-title text-center">
        <h2 class="bottombrand wow flipInX">No existe el <b style="color: #f05f40;"> mensaje</b></h2>
        <hr class="primary">
        <p>

        </p>
    </div>

<br><br><br>
    <div class="alert alert-warning alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Vaya!</strong> El mensaje  que busca no existe puede que haya sido eliminado.
      </div>
</div>

<br><br><br><br><br><br><br><br><br>




  <?php
}else{


while($reg=mysqli_fetch_array($consulta_mysql)){

  $resuelta="";
  if($reg['preguntas_respondida']==1){
  $resuelta=" SI ";
  }else{
    $resuelta=" NO ";

  }
  $codigo=$reg['preguntas_id'];




  $consulta_mysql2=mysqli_query($conexion,"select *  from usuarios where usuarios_id=".$reg['preguntas_usuario']) or
    die("Problemas en el select:".mysqli_error($conexion));
while($reg2=mysqli_fetch_array($consulta_mysql2)){

$usuario=$reg2["usuarios_usuario"];


}
?>

<!-- Section Contact
================================================== -->





    <div class="container">
        <div class="section-title text-center">
<?php
if($reg["preguntas_usuario"]!="" || $reg["preguntas_usuario"] != null){
 ?>

<h2 class="bottombrand wow flipInX">Pregunta del usuario <b style="color: #f05f40;"><?php echo " ".$reg["preguntas_nombre"]." "; ?></b></h2>
<?php }else{ ?>
<h2 class="bottombrand wow flipInX">Pregunta enviada desde  el <b style="color: #f05f40;"> area publica</b></h2>
<?php } ?>

          <hr class="primary">
      		<p>

      		</p>
      </div>
</div>


<div class="col-md-8 registro">
  <h3 style="float:left;color:white;">Codigo: <?php echo $_GET["preguntas_id"] ?></h3>
  <h3 style="float:right;color:white;">Respondida: <?php echo $resuelta ?></h3><br><br>


<br>
    <form method="post" action="?p=preguntas/borrarm" id="contactform">


<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="nick">Usuario</label>
  <input  class="form-control" readonly type="text" name="nick" id="nick" placeholder="La pregunta no es de un usuario registrado" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nick del usuario" required value="<?php echo $usuario;?>"/>
  <input  class="form-control" readonly type="hidden" name="preguntas_id" id="preguntas_id" placeholder="id" value="<?php echo $reg['preguntas_id'];?>"/>
  <input  class="form-control" readonly type="hidden" name="id" id="pass" />
  <input  class="form-control" readonly type="hidden" name="id" id="pass2" />
  <input  class="form-control" readonly type="hidden" name="id" id="provincia" value="00"/>
</div>
<div class="form-group">
  <label for="email">Email</label>
  <input  class="form-control" readonly type="email"  name="email" id="email"  placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Email del remitente" required value="<?php echo $reg['preguntas_email'];?>"/>
</div>
</div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input  class="form-control" readonly type="text"  name="nombre" id="nombre"  placeholder="Nombre" required title="Nombre del usuario" required value="<?php echo $reg['preguntas_nombre'];?>"/>
    </div>
    <div class="form-group">
      <label for="fecha">Fecha del mensaje</label>
      <input  class="form-control" readonly type="text"  name="fecha" id="fecha"  placeholder="Fecha del mensaje" required  title="Fecha del mensaje" required value="<?php echo $reg['preguntas_fecha'];?>"/>
  </div>
      </div>






    </div>


<br>
      <fieldset>
      <legend>Mensaje</legend>
      <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="asunto">Asunto</label>
          <input  class="form-control"  type="text"  name="asunto" id="asunto" readonly placeholder="Indique brevemente el asunto de su consulta" autofocus required pattern="[.-_A-Za-z0-9 ñÑ]{2,100}"  title="Indique brevemente el asunto de su consulta" required value="<?php echo $reg['preguntas_asunto'];?>"/>
      </div>
        </div>


<br>

    <div class="col-md-12">
      <div class="form-group">
<label for="mensaje">Mensaje</label>
    <textarea class="form-control" rows="4" placeholder="Mensaje" name="mensaje" readonly pattern="[.-_A-Za-z0-9 ñÑ]{5,500}" ><?php echo $reg['preguntas_pregunta'];?></textarea>
    <input type="hidden" name="latitud" id="latitud"/>
    <input type="hidden" name="longitud" id="longitud"/>

  </div>
    </div>
  </div>

  </fieldset>


  <br>
<?php if($_SESSION["perfil"]=="Cliente" & $reg['preguntas_respondida']==1){ ?>
  <fieldset>
  <legend>Respuesta</legend>

  <div class="col-md-12">
    <div class="form-group">
<label for="respuesta">Respuesta</label>

  <textarea class="form-control" rows="4" readonly placeholder="Respuesta" name="respuesta" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}" ><?php echo $reg['preguntas_respuesta'];?></textarea>

</div>


  <h5 style="color:white; font-size:1.25em">Atendido por: <?php echo $reg["preguntas_atendido"]; ?></h5>
  <h5 style="color:white;font-size:1.25em">Fecha respuesta: <?php echo $reg["preguntas_fecha_respuesta"]; ?></h5><br>
</div>

</fieldset>
<?php }else if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){?>

  <fieldset>
  <legend>Respuesta</legend>

  <div class="col-md-12">
    <div class="form-group">
<label for="respuesta">Respuesta</label>

  <textarea class="form-control" rows="4" placeholder="Respuesta" name="respuesta" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}" ><?php echo $reg['preguntas_respuesta'];?></textarea>

</div>


  <h5 style="color:white; font-size:1.25em">Atendido por: <?php echo $reg["preguntas_atendido"]; ?></h5>
  <h5 style="color:white;font-size:1.25em">Fecha respuesta: <?php echo $reg["preguntas_fecha_respuesta"]; ?></h5><br>
</div>

</fieldset>
<br>

<h4 style="color:white;">Situacion de usuario:</h4>
<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var latitud=<?php echo $reg['latitud']?>;
  var longitud=<?php echo $reg['longitud']?>;

  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng(latitud,longitud);
  var mapOptions = {center: myCenter, zoom: 16};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
  //  animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRVATQuo5Z7O4IL8tbjoOAzhdKAEpTM3g&callback=myMap"></script>
<br><br>




  <div class="text-right">
<button   class="contact submit btn btn-primary btn-xl"   style="float:left" data-toggle="modal" data-target="#myModal" type="button" id="borrar"  name="borrar"  value="Borrar "/>Borrar</button>

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar" formaction="?p=preguntas/respuesta" value="Responder"/>
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
        <p style="color:black;">¿Esta seguro de eliminar el mensaje?</p>

      </div>
      <div class="modal-footer" >


        <button type="submit" class="btn btn-primary" style="float:left;">Eliminar</button>
        </form>


        <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


      </div>
    </div>

  </div>
</div>


<?php } ?>


    </form>
    <br><br>
</div>




<?php
}


}
 mysqli_close($conexion);

?>
