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
          <h2 class="bottombrand wow flipInX">Nueva factura de <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
          <hr class="primary">
      		<p>
      			Desde esta pagina puedes realizar una nueva factura.
      		</p>
      </div>
</div>


<div class="col-md-8 registro">





    <form method="post" action="?p=admin/facturas/registrofactura" id="contactform">


<div class="row">


<div class="col-md-6">

  <div class="form-group">
    <label for="usuario" id="us">Cliente</label>

    <select class="form-control" name="usuarios" id="getuser" title="Indique un cliente" required />
<option value="">--Selecione un cliente--</option>
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


<div class="form-group">
  <label for="Nombre">Nombre:</label>
  <input  class="form-control"  type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del cliente"/>

</div>
</div>
<div class="col-md-6">

  <div class="form-group">
    <label for="encargo" id="encar" >Encargo</label>

    <select class="form-control" name="encargo" id="getEncargo" title="Indique el encargo" required/>


       <option value="">--Selecione un encargo--</option>

              </select>

</div>


<div class="form-group">
  <label for="nif">NIF</label>
  <input class="form-control" type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF o CIF"/>
</div>
</div>

    </div>



      <fieldset>
      <legend>Datos del trabajo</legend>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
    <label for="tipo">Tipo de trabajo</label>
        <textarea class="form-control" rows="4" placeholder="Tipo de trabajo" name="trabajos" pattern="[.-_()A-Za-z0-9 ñÑ]{5,500}" required></textarea>
      </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
          <label for="superficie">Superficie:</label>
          <input  class="form-control"  type="text" name="superficie" id="superficie" placeholder="Superficie" pattern="[.,-_A-Za-z0-9 ñÑ]{1,50}"  title="Superficie construida" required />

        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
          <label for="pem">PEM:</label>
          <input  class="form-control"  type="number" name="pem" id="pem" placeholder="PEM" pattern="[,.-_€A-Za-z0-9 ñÑ]{1,50}"  title="Presupuesto de ejecucion estimado" required />

        </div>
        </div>


        <div class="col-md-6">
        <div class="form-group">
          <label for="honorarios">Honorarios:</label>
          <input  class="form-control"  type="number" name="honorarios" id="honorarios" placeholder="Honorarios"   title="Honorarios" required />

        </div>
        </div>


        <div class="col-md-6">
        <div class="form-group">
          <label for="email">Email</label>
          <input  class="form-control"  type="email"  name="email" id="email"  placeholder="correo@ejemplo.com" pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Email del usuario"/>

      </div>
        </div>


    <div class="col-md-12">
      <div class="form-group">
<label for="observaciones">Observaciones</label>
    <textarea class="form-control" rows="4" placeholder="observaciones" name="observaciones" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}"></textarea>
  </div>
    </div>
  </div>
  </fieldset>
  <br>
  <div class="text-right">
<input   class="contact submit btn btn-primary btn-xl"   style="float:left" type="reset" id="baja"  name="borrar"  value="Limpiar"/>

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar"  value="Enviar"/>
  </div>


    </form>
    <br><br>
</div>
