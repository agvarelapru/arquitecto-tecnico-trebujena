<?php
require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");
 ?>


<br><br>

<!-- Section Contact
================================================== -->





    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Nuevo <b style="color: #f05f40;">pago</b></h2>
          <hr class="primary">
      		<p>
      			Desde esta pagina puedes anotar los pagos realizados.
      		</p>
      </div>
</div>


<div class="col-md-8 registro">





    <form method="post" action="?p=admin/pagos/registropagos" id="contactform">


<div class="row">


<div class="col-md-6">

  <div class="form-group">
    <label for="usuario" id="us">Cliente</label>

    <select class="form-control" name="usuarios" id="getuser" title="Indique un cliente" required onchange="muestraEncargos()"/>
<option value="#">--Selecione un cliente--</option>
    <?php

    $consulta_mysql=mysqli_query($conexion,"select * from usuarios") or
    die("Problemas en el select:".mysqli_error($conexion));

    while($reg=mysqli_fetch_array($consulta_mysql)){
  $nombreUsuario=$reg["usuarios_nombre"]." ".$reg["usuarios_apellido1"]." ".$reg["usuarios_apellido2"];
    echo "<option value='".$reg["usuarios_id"]."'>".$nombreUsuario."</option>";

    }
    ?>
              </select>



  </div>
  <input  class="form-control"  type="hidden" name="pass" id="pass"/>
  <input  class="form-control"  type="hidden" name="pass" id="pass2"/>
  <input  class="form-control"  type="hidden" name="pass" id="provincia"/>


</div>




<div class="col-md-6">

  <div class="form-group">
    <label for="encargo" id="encar" >Encargo</label>
    <select class="form-control" name="encargo" id="getencargo" title="Indique el encargo" required onchange="muestraDatos()"/>


       <option value="">--Selecione un encargo--</option>

              </select>

</div>
</div>


  <fieldset>
  <legend>Cliente</legend>

    <div class="row">
<div class="col-md-12">
<div class="form-group">
  <label for="cliente">Cliente:</label>
  <input  class="form-control"  readonly type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del cliente"/>
</div>
</div>



  <input class="form-control"  readonly type="hidden" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF o CIF"/>
</div>
</fieldset>






<br>




      <fieldset>
      <legend>Datos del trabajo</legend>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
    <label for="tipo">Descripcion del trabajo</label>
        <textarea class="form-control" readonly  rows="4" placeholder="Tipo de trabajo" id="tipo" name="trabajos" pattern="[.-\/_()A-Za-z0-9 ñÑ'áéíóúüÁÉÍÓÚÜçÇàèìòùÀÈÌÒÙ]{5,500}" required></textarea>
      </div>
        </div>



        <div class="col-md-6">
        <div class="form-group">
          <label for="honorarios">Honorarios:</label>
          <input  class="form-control" readonly type="text" name="honorarios" id="honorarios" placeholder="Honorarios" pattern="[,.0-9]{1,6}"   title="Honorarios" required />

        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
          <label for="pagado">Pagado:</label>
          <input  class="form-control" readonly type="text" name="pagado" id="pagado" placeholder="Cantidad pagada" pattern="[,.0-9]{1,10}"   title="Cantidad pagada" required />

        </div>
        </div>



  </div>
  </fieldset>
  <br>
  <div class="row">
    <div class="col-md-12" >
      <hr>
    <div class="form-group">
      <label for="pago">Indique la cantidad a pagar:</label>
      <input  class="form-control"  type="text" name="pago" id="pago" placeholder="cantidad a pagar" pattern="[,.0-9]{1,10}"   title="Cantidad a pagar" required />
  <br>
    </div>
    </div>

  <div class="col-md-12">
    <div class="form-group">
<label for="observaciones">Observaciones</label>
  <textarea class="form-control" rows="4" placeholder="observaciones" name="observaciones" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}"></textarea>
</div>
  </div>
  </div>
  <br>
  <div class="text-right">
<input   class="contact submit btn btn-primary btn-xl"   style="float:left" type="reset" id="baja"  name="borrar"  value="Limpiar campos"/>

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar"  value="Registrar pago"/>
  </div>

    </div>
    </form>
    <br><br>
</div>
<script src="js/muestrapagos.js"></script>
