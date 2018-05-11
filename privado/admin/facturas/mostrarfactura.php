<br><br>
<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");

  $consulta_mysql=mysqli_query($conexion,"select *  from facturas where facturas_id=".$_GET['facturas_id']) or
    die("Problemas en el select:".mysqli_error($conexion));
  $num_total_registros = mysqli_num_rows($consulta_mysql);
if($num_total_registros==0){
?>
  <div class="container">
      <div class="section-title text-center">
        <h2 class="bottombrand wow flipInX">No existe la <b style="color: #f05f40;"> factura</b></h2>
        <hr class="primary">
        <p>

        </p>
    </div>

<br><br><br>
    <div class="alert alert-warning alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Vaya!</strong> La factura  que busca no existe puede que haya sido eliminada.
      </div>
</div>

<br><br><br><br><br><br><br><br><br>




  <?php
}else{


while($reg=mysqli_fetch_array($consulta_mysql)){
/*
  $finalizado="";
  if($reg['encargos_finalizado']==1){
  $finalizado=" SI ";
  }else{
    $finalizado=" NO ";

  }*/
  $codigo=$reg['facturas_id'];



?>

<!-- Section Contact
================================================== -->





    <div class="container">
        <div class="section-title text-center">

<h2 class="bottombrand wow flipInX">Facturas de <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>

          <hr class="primary">
      		<p>

      		</p>
      </div>
</div>


<div class="col-md-8 registro">




<br>
    <form method="post" action="?p=admin/facturas/borrarfac" id="contactform">
      <input  class="form-control" type="hidden" name="facturas_id" id="facturas_id"  value="<?php echo " ".$reg["facturas_id"]; ?>"/>



      <div class="row">


          <?php

          $consulta_mysql2=mysqli_query($conexion,"select * from usuarios where usuarios_id='".$reg["facturas_tecnico"]."'") or
          die("Problemas en el select:".mysqli_error($conexion));

          while($reg2=mysqli_fetch_array($consulta_mysql2)){

          ?>

  <div class="col-md-6">

          <fieldset>
          <legend>Datos del tecnico</legend>
        <div class="form-group">
          <label for="Nombre">Nombre:</label>
          <input  class="form-control" disabled  type="text" name="nombreT" id="nombreT" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del tecnico" value="<?php echo $reg2["usuarios_nombre"]; ?>"/>
        </div>
        <div class="form-group">
          <label for="Apellido1">Apellido 1:</label>
          <input  class="form-control"  disabled type="text" name="apellido1T" id="apellido1T" placeholder="Apellido1" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Primer apellido del tecnico" value="<?php echo $reg2["usuarios_apellido1"]; ?>"/>
        </div>
        <div class="form-group">
          <label for="Apellido2">Apellido 2:</label>
          <input  class="form-control"  disabled type="text" name="apellido2T" id="apellido2T" placeholder="Apellido2" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Segundoapellido del tecnico" value="<?php echo $reg2["usuarios_apellido2"]; ?>"/>
        </div>
        <div class="form-group">
          <label for="nif">NIF</label>
          <input class="form-control"  disabled type="text" name="nif" id="nifT" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF o CIF" value="<?php echo $reg2["usuarios_nif"]; ?>"/>
        </div>

        </fieldset>
        <?php } ?>
        </div>

        <?php

        $consulta_mysql3=mysqli_query($conexion,"select * from usuarios where usuarios_id='".$reg["facturas_cliente"]."'") or
        die("Problemas en el select:".mysqli_error($conexion));

        while($reg3=mysqli_fetch_array($consulta_mysql3)){

        ?>


        <div class="col-md-6">


        <fieldset>
        <legend>Datos del cliente</legend>
        <div class="form-group">
          <label for="Nombre">Nombre:</label>
          <input  class="form-control"  disabled type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del cliente" value="<?php echo $reg3["usuarios_nombre"]; ?>"/>
        </div>
        <div class="form-group">
          <label for="Apellido1">Apellido 1:</label>
          <input  class="form-control"  disabled type="text" name="apellido1" id="apellido1" placeholder="Apellido1" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Primer apellido del cliente" value="<?php echo $reg3["usuarios_apellido1"]; ?>"/>
        </div>
        <div class="form-group">
          <label for="Apellido2">Apellido 2:</label>
          <input  class="form-control" disabled  type="text" name="apellido2" id="apellido2" placeholder="Apellido2" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Segundoapellido del cliente" value="<?php echo $reg3["usuarios_apellido2"]; ?>"/>
        </div>
        <div class="form-group">
          <label for="nif">NIF</label>
          <input class="form-control"  disabled type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF o CIF" value="<?php echo $reg3["usuarios_nif"]; ?>"/>
        </div>


        </fieldset>
        <?php } ?>
        </div>

            </div>
        <br>



            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="numerofactura">Numero factura:</label>
                <input  class="form-control" disabled type="text" name="numfac" id="umfac" placeholder="Numero factura" pattern="[0-9 /-.,]{1,10}"  title="Numero de la factura" value="<?php echo $reg["facturas_numero_factura"];?>"/>

              </div>


        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="fecha">Fecha factura:</label>
            <input  class="form-control" disabled  type="date" name="fecha" id="fecha" placeholder="Fecha factura"   title="Fecha de la factura" value="<?php echo $reg["facturas_fecha"];?>"/>
          </div>


        </div>
        </div>

<?php
$consulta_mysql4=mysqli_query($conexion,"select * from encargos e, provincias p, municipios m where e.encargos_id=".$reg['facturas_encargo']." and p.id=e.encargos_provincia and m.id=e.encargos_poblacion") or
die("Problemas en el select:".mysqli_error($conexion));
        while($reg4=mysqli_fetch_array($consulta_mysql4)){
 ?>


              <fieldset>
              <legend>Datos del trabajo</legend>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
            <label for="tipo">Descripcion del trabajo</label>
                <textarea class="form-control" disabled rows="4" placeholder="Tipo de trabajo" id="tipo" name="trabajos" pattern="[.-\/_()A-Za-z0-9 ñÑ'áéíóúüÁÉÍÓÚÜçÇàèìòùÀÈÌÒÙ]{5,500}" required ><?php echo $reg4["encargos_tipo"]." sito en ".$reg4["encargos_direccion"].", de ".$reg4["municipio"]." (".$reg4["provincia"].")";?></textarea>
              </div>
                </div>



                <div class="col-md-3">
                <div class="form-group">
                  <label for="honorarios">IMPORTE:</label>
                  <input  class="form-control" disabled type="text" name="honorarios" id="honorarios" placeholder="Honorarios" pattern="[,.0-9]{1,6}"   title="Honorarios" required value="<?php echo $reg4["encargos_honorarios"]." €";?>"/>

                </div>
                </div>
  <?php } ?>
                <div class="col-md-3">
                <div class="form-group">
                  <label for="honorarios">21%  IVA:</label>
                  <input  class="form-control" disabled  type="text" name="iva" id="iva" placeholder="IVA" pattern="[,.0-9]{1,10}"   title="IVA" required value="<?php echo $reg["facturas_iva"]." €" ;?>"/>

                </div>
                </div>

                <div class="col-md-3">
                <div class="form-group">
                  <label for="honorarios">19%  IRPF:</label>
                  <input  class="form-control" disabled type="text" name="irpf" id="irpf" placeholder="IRPF" pattern="[,.0-9]{1,10}"   title="IRPF" value="<?php echo $reg["facturas_irpf"]." €";?>"/>

                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label for="honorarios">TOTAL:</label>
                  <input  class="form-control" disabled type="text" name="total" id="total" placeholder="TOTAL" pattern="[,.0-9]{1,10}"   title="TOTAL" required value="<?php echo $reg["facturas_total"]." €" ;?>"/>

                </div>
                </div>
          </div>
          </fieldset>
          <br>
          <div class="row">


          <div class="col-md-12">
            <div class="form-group">
        <label for="observaciones">Observaciones</label>
          <textarea class="form-control" disabled rows="4" placeholder="observaciones" name="observaciones" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}"><?php echo $reg["facturas_observaciones"];?></textarea>
        </div>
          </div>
          </div>





        <br>

<?php if($_SESSION["perfil"]=="Administrador"){?>

  <div class="text-right">
<button   class="contact submit btn btn-primary btn-xl"   style="float:left" data-toggle="modal" data-target="#myModal" type="button" id="borrar"  name="borrar"  value="Borrar "/>Borrar</button>

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar" formaction="?p=admin/facturas/modfactura" value="Modificar"/>
  </div>





<?php }else if($_SESSION["perfil"]=="Tecnico"){?>
  <div class="text-right">


    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar" formaction="?p=admin/facturas/modfactura" value="Modificar"/>
  </div>
<?php } ?>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #282f35;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;font-weight:bold;">&times;</button>
        <h3 class="modal-title" style="color:white;font-weight:bold;">¡Atencion!</h3>
      </div>
      <div class="modal-body" >
        <p style="color:black;">¿Esta seguro de eliminar la factura?</p>

      </div>
      <div class="modal-footer" >


        <button type="submit" class="btn btn-primary" style="float:left;">Eliminar</button>
        </form>


        <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


      </div>
    </div>

  </div>
</div>


<?php
}
?>


    </form>
    <br><br>
</div>




<?php
}



 mysqli_close($conexion);

?>
