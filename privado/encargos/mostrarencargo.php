<br><br>
<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");

  $consulta_mysql=mysqli_query($conexion,"select *  from encargos where encargos_id=".$_GET['encargos_id']) or
    die("Problemas en el select:".mysqli_error($conexion));
  $num_total_registros = mysqli_num_rows($consulta_mysql);
if($num_total_registros==0){
?>
  <div class="container">
      <div class="section-title text-center">
        <h2 class="bottombrand wow flipInX">No existe el <b style="color: #f05f40;"> encargo</b></h2>
        <hr class="primary">
        <p>

        </p>
    </div>

<br><br><br>
    <div class="alert alert-warning alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Vaya!</strong> El encargo  que busca no existe puede que haya sido eliminado.
      </div>
</div>

<br><br><br><br><br><br><br><br><br>




  <?php
}else{


while($reg=mysqli_fetch_array($consulta_mysql)){

  $finalizado="";
  if($reg['encargos_finalizado']==1){
  $finalizado=" SI ";
  }else{
    $finalizado=" NO ";

  }
  $codigo=$reg['encargos_id'];



?>

<!-- Section Contact
================================================== -->





    <div class="container">
        <div class="section-title text-center">

<h2 class="bottombrand wow flipInX">Encargos de <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>

          <hr class="primary">
      		<p>

      		</p>
      </div>
</div>


<div class="col-md-8 registro">
  <h3 style="float:left;color:white;">Codigo: <?php echo $_GET["encargos_id"] ?></h3>
  <h3 style="float:right;color:white;">Finalizado: <?php echo $finalizado ?></h3><br><br>


<br>
    <form method="post" action="?p=encargos/borrarencar" id="contactform">
      <input  class="form-control" readonly type="hidden" name="encargos_id" id="encargos_id"  value="<?php echo " ".$reg["encargos_id"]; ?>"/>



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

<?php if($_SESSION["perfil"]=="Administrador"){?>

  <div class="text-right">
<button   class="contact submit btn btn-primary btn-xl"   style="float:left" data-toggle="modal" data-target="#myModal" type="button" id="borrar"  name="borrar"  value="Borrar "/>Borrar</button>

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar" formaction="?p=encargos/modencar" value="Modificar"/>
  </div>
<?php }else if($_SESSION["perfil"]=="Tecnico"){?>
  <div class="text-right">


    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar" formaction="?p=encargos/modencar" value="Modificar"/>
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
        <p style="color:black;">¿Esta seguro de eliminar el encargo?</p>

      </div>
      <div class="modal-footer" >


        <button type="submit" class="btn btn-primary" style="float:left;">Eliminar</button>
        </form>


        <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


      </div>
    </div>

  </div>
</div>


<?php }
}
?>


    </form>
    <br><br>
</div>




<?php
}



 mysqli_close($conexion);

?>
