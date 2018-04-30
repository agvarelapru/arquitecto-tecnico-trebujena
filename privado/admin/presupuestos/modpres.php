<br><br>
<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");

  $consulta_mysql=mysqli_query($conexion,"select *  from presupuestos where presupuestos_id=".$_REQUEST['presupuestos_id']) or
    die("Problemas en el select:".mysqli_error($conexion));
  $num_total_registros = mysqli_num_rows($consulta_mysql);
if($num_total_registros==0){
?>
  <div class="container">
      <div class="section-title text-center">
        <h2 class="bottombrand wow flipInX">No existe el <b style="color: #f05f40;"> presupuesto</b></h2>
        <hr class="primary">
        <p>

        </p>
    </div>

<br><br><br>
    <div class="alert alert-warning alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Vaya!</strong> El presupuesto  que busca no existe puede que haya sido eliminado.
      </div>
</div>

<br><br><br><br><br><br><br><br><br>




  <?php
}else{


while($reg=mysqli_fetch_array($consulta_mysql)){

  $aceptado="";
  if($reg['presupuestos_aceptado']==1){
  $aceptado=" SI ";
  }else{
    $aceptado=" NO ";

  }
  $codigo=$reg['presupuestos_id'];



?>

<!-- Section Contact
================================================== -->





    <div class="container">
        <div class="section-title text-center">

<h2 class="bottombrand wow flipInX">Modificar el presupuesto de <b style="color: #f05f40;"><?php echo " ".$reg["presupuestos_nombre"]." "; ?></b></h2>

          <hr class="primary">
      		<p>

      		</p>
      </div>
</div>


<div class="col-md-8 registro">
  <h3 style="float:left;color:white;">Codigo: <?php echo $_REQUEST["presupuestos_id"] ?></h3>

  <h3 style="float:right;color:white;">Aceptado: <?php echo $aceptado ?></h3><br><br>


<br>
    <form method="post" action="?p=admin/presupuestos/presmodificado" id="contactform">
      <input  class="form-control" type="hidden" name="presupuestos_id" id="presupuestos_id"  value="<?php echo " ".$reg["presupuestos_id"]; ?>"/>

      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del cliente" value="<?php echo " ".$reg["presupuestos_nombre"]; ?>"/>

      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="nif">NIF</label>
        <input class="form-control"  type="text" name="nif" id="nif" placeholder="NIF"   title="Introduzca su NIF o CIF" value="<?php echo " ".$reg["presupuestos_nif"]; ?>"/>
      </div>
      </div>

          </div>



            <fieldset>
            <legend>Datos del trabajo</legend>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
          <label for="tipo">Tipo de trabajo</label>
              <textarea class="form-control" rows="4"  placeholder="Tipo de trabajo" name="trabajos" pattern="[.-_()A-Za-z0-9 ñÑ]{5,500}" required ><?php echo " ".$reg["presupuestos_encargo"]; ?></textarea>
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input  class="form-control" type="text" name="superficie" id="superficie" placeholder="Superficie" pattern="[.,-_A-Za-z0-9 ñÑ]{1,50}"  title="Superficie construida" required value="<?php echo " ".$reg["presupuestos_superficie"]; ?>"/>

              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="pem">PEM:</label>
                <input  class="form-control"  type="text" name="pem" id="pem" placeholder="PEM" pattern="[,.-_€A-Za-z0-9 ñÑ]{1,50}"  title="Presupuesto de ejecucion estimado" required value="<?php echo " ".$reg["presupuestos_pem"]; ?>"/>

              </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                <label for="honorarios">Honorarios:</label>
                <input  class="form-control"  type="text" name="honorarios" id="honorarios" placeholder="Honorarios"   title="Honorarios" required value="<?php echo " ".$reg["presupuestos_honorarios"]; ?>"/>

              </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input  class="form-control"  type="text"  name="email" id="email"  placeholder="correo@ejemplo.com"  title="Email del usuario" value="<?php echo " ".$reg["presupuestos_email"]; ?>"/>

            </div>
              </div>


          <div class="col-md-12">
            <div class="form-group">
      <label for="observaciones">Observaciones</label>
          <textarea class="form-control" rows="4" placeholder="observaciones" name="observaciones" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}" ><?php echo " ".$reg["presupuestos_observaciones"]; ?></textarea>
        </div>
          </div>
        </div>
      </fieldset><br>
<div class="col-md-6">

<?php
$consulta_mysql2=mysqli_query($conexion,"select *  from usuarios") or
  die("Problemas en el select:".mysqli_error($conexion));
$nombreUsuario=""
 ?>

  <label for="usuario">Usuario:</label>
  <select class="form-control" name="usuario" id="usuario">
    <option value="">--Seleccione usuario--</option>
<?php
while($reg2=mysqli_fetch_array($consulta_mysql2)){
$nombreUsuario=$reg2["usuarios_nombre"]." ".$reg2["usuarios_apellido1"]." ".$reg2["usuarios_apellido2"];
  echo "<option value='".$reg2["usuarios_id"]."'>".$nombreUsuario."</option>";
 } ?>
  </select>

</div>

<div class="col-md-6">
  <label for="aceptado">Aceptado:</label>
  <select class="form-control" name="aceptado">
    <?php if($reg['presupuestos_aceptado']==0) {?>
    <option value="0" selected>NO</option>
    <option value="1">SI</option>
  <?php }else{?>
    <option value="0" >NO</option>
      <option value="1" selected>SI</option>
    <?php } ?>

  </select>
  <br>
</div>


        <br>



  <div class="text-right">
<button   class="contact submit btn btn-primary btn-xl"    data-toggle="modal" data-target="#myModal" type="button" id="modificar"  name="modificar"  value="Modificar "/>Modificar</button>

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
        <p style="color:black;">¿Esta seguro de modificar el presupuesto?</p>

      </div>
      <div class="modal-footer" >


        <button type="submit" class="btn btn-primary" style="float:left;">Modificar</button>
        </form>


        <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


      </div>
    </div>

  </div>
</div>


<?php }

?>


    </form>
    <br><br>
</div>




<?php
}



 mysqli_close($conexion);

?>
