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
          <h2 class="bottombrand wow flipInX">Nuevo encargo de <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
          <hr class="primary">
      		<p>
      			Desde esta pagina puedes realizar un nuevos encargos.
      		</p>
      </div>
</div>


<div class="col-md-8 registro">

  <input  class="form-control" type="hidden"  name="pass" id="pass">
<input  class="form-control" type="hidden"  name="pass2" id="pass2">



    <form method="post" action="?p=encargos/registroencargo" id="contactform">


<div class="row">
<div class="col-md-12">
  <?php
  $consulta_mysql2=mysqli_query($conexion,"select *  from usuarios") or
    die("Problemas en el select:".mysqli_error($conexion));
  $nombreUsuario=""
   ?>

    <label for="usuario">Cliente:</label>
    <select class="form-control" name="usuario" id="usuario" required>
      <option value="">--Seleccione el cliente--</option>
  <?php
  while($reg2=mysqli_fetch_array($consulta_mysql2)){
  $nombreUsuario=$reg2["usuarios_nombre"]." ".$reg2["usuarios_apellido1"]." ".$reg2["usuarios_apellido2"];
    echo "<option value='".$reg2["usuarios_id"]."'>".$nombreUsuario."</option>";
   } ?>
    </select>
    <br>
</div>


    </div>



      <fieldset>
      <legend>Datos del encargo</legend>
      <div class="row">
<div class="col-md-12">
        <div class="form-group">
          <label for="honorarios">Honorarios:</label>
          <input  class="form-control"  type="number" name="honorarios" id="honorarios" placeholder="Honorarios"   title="Honorarios" required />
        </div>
        </div>


        <div class="col-md-12">
          <div class="form-group">
    <label for="tipo">Tipo de encargo</label>
        <textarea class="form-control" rows="4" placeholder="Tipo de encargo" name="encargo" pattern="[.-_()A-Za-z0-9 ñÑ]{5,500}" required></textarea>
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
      </div>
      </fieldset>
      <br>
      <fieldset>
      <legend>Situacion del encargo</legend>
      <div class="row">

        <div class="col-md-12">
        <div class="form-group">
          <label for="refCatastral">Referencia catastral</label>
          <input class="form-control" type="text" name="refCatastral" id="refCatastral" placeholder="Referencia catastral" pattern="[.-_A-Za-z0-9 ñÑ]{5,50}"  title="Introduzca la referenca catastral"/>
        </div>
        </div>

<div class="col-md-6">
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required/>
        </div>
        <div class="form-group">
          <label for="cp">Codigo postal</label>
          <input class="form-control" type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required/>
        </div>

</div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="provincia" id="provi">Provincia</label>

            <select class="form-control" name="provincia" id="provincia" title="Indique su provincia" required />
        <option value="">--Selecione una provincia--</option>
            <?php

            $consulta_mysql=mysqli_query($conexion,"select * from provincias") or
            die("Problemas en el select:".mysqli_error($conexion));

            while($reg=mysqli_fetch_array($consulta_mysql)){

            echo "<option value='".$reg["id"]."'>".$reg["provincia"]."</option>";

            }
            ?>
                      </select>



          </div>

          <div class="form-group">
            <label for="poblacion" id="pobla" >Poblacion</label>

            <select class="form-control" name="poblacion" id="poblaciones" title="Indique su poblacion" required/>


               <option value="">--Selecione una localidad--</option>

                      </select>




        </div>



  </div>
  </fieldset>
  <br>




    <div class="form-group">
<label for="observaciones">Observaciones</label>
  <textarea class="form-control" rows="4" placeholder="observaciones" name="observaciones" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}"></textarea>
</div>

  <br>
  <div class="text-right">
<input   class="contact submit btn btn-primary btn-xl"   style="float:left" type="reset" id="baja"  name="borrar"  value="Limpiar"/>

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar"  value="Enviar"/>
  </div>


    </form>
    <br><br>
</div>
