


<br><br>

<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");



?>

<!-- Section Contact
================================================== -->





    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Preguntanos lo que quieras <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
          <hr class="primary">
      		<p>
      			Desde esta pagina puedes comunicarte con nosotros para resolverte cualquier duda que tengas y te contestaremos lo antes posible.
      		</p>
      </div>
</div>


<div class="col-md-8 registro">


<?php

$consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_usuario='".$_SESSION["usuario"]."'") or
die("Problemas en el select:".mysqli_error($conexion));


while($reg=mysqli_fetch_array($consulta_mysql)){

 ?>


<br>
    <form method="post" action="?p=preguntas/registropregunta" id="contactform">


<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="nick">Usuario</label>
  <input  class="form-control" readonly type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nick del usuario" required value="<?php echo $reg['usuarios_usuario'];?>"/>
  <input  class="form-control" readonly type="hidden" name="id" id="id" placeholder="id" value="<?php echo $reg['usuarios_id'];?>"/>
  <input  class="form-control" readonly type="hidden" name="id" id="pass" />
  <input  class="form-control" readonly type="hidden" name="id" id="pass2" />
  <input  class="form-control" readonly type="hidden" name="id" id="provincia" value="00"/>
</div>
</div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="email">Email</label>
        <input  class="form-control" readonly type="email"  name="email" id="email"  placeholder="correo@ejemplo.com" pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Email del usuario" required value="<?php echo $reg['usuarios_email'];?>"/>

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
          <input  class="form-control"  type="text"   name="asunto" id="asunto"  placeholder="Indique brevemente el asunto de su consulta" autofocus required pattern="[.-_A-Za-z0-9 ñÑ]{2,100}"  title="Indique brevemente el asunto de su consulta" required/>
      </div>
        </div>


<br>

    <div class="col-md-12">
      <div class="form-group">
<label for="mensaje">Mensaje</label>
    <textarea class="form-control" rows="4" placeholder="Mensaje" name="mensaje" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}"></textarea>
    <input type="hidden" name="latitud" id="latitud" />
    <input type="hidden" name="longitud" id="longitud"/>

  </div>
    </div>
  </div>



  </fieldset>
  <br>
  <div class="text-right">
<input   class="contact submit btn btn-primary btn-xl"   style="float:left" type="reset" id="baja"  name="borrar"  value="Borrar"/>

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar"  value="Enviar"/>
  </div>


    </form>
    <br><br>
</div>




<?php
}



 mysqli_close($conexion);

?>
<script type="text/javascript">

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocalizacion no soportada por su navegador.");
        document.getElementById("latitud").value=0;
        document.getElementById("longitud").value=0;
    }


function showPosition(position) {
document.getElementById("latitud").value=position.coords.latitude;
document.getElementById("longitud").value=position.coords.longitude;

}
</script>
