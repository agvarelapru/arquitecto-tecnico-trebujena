<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");




     $consulta_mysql=mysqli_query($conexion,"select * from pagos as p, encargos as e, usuarios as u, municipios as m, provincias as pr where e.encargos_id=p.pagos_encargo and p.pagos_usuario=u.usuarios_id and e.encargos_poblacion=m.id and e.encargos_provincia=pr.id and p.pagos_id='".$_POST["pagos_id"]."'") or
     die("Problemas en el select:".mysqli_error($conexion));

     while($reg=mysqli_fetch_array($consulta_mysql)){
$encargoPagado=$reg["encargos_pagos"];
$encargoHonorarios=$reg["encargos_honorarios"];
$falta=$encargoHonorarios-$encargoPagado;
$nombre=$reg["usuarios_nombre"]." ".$reg["usuarios_apellido1"]." ".$reg["usuarios_apellido2"];
$encargo=$reg["encargos_tipo"]." sito en ".$reg["encargos_direccion"]." de ".$reg["municipio"]." (".$reg["provincia"].")";










     	?>

      <br><br>

      <!-- Section Contact
      ================================================== -->





          <div class="container">
              <div class="section-title text-center">
                <h2 class="bottombrand wow flipInX">Consulta de <b style="color: #f05f40;">pago</b></h2>
                <hr class="primary">
            		<p>
            			A continuacion puede consultar los datos del pago realizado.
            		</p>
            </div>
      </div>


      <div class="col-md-8 registro">





          <form method="post" action="?p=admin/pagos/pagosmodificado" id="contactform">

            <input  class="form-control"  readonly type="hidden" name="pago_id" id="pago_id" value="<?php echo $reg["pagos_id"]; ?>"/>
<input  class="form-control"  readonly type="hidden" name="encargo" id="encargo" value="<?php echo $reg["encargos_id"]; ?>"/>
      <div class="row">

        <fieldset>
        <legend>Cliente</legend>

          <div class="row">
      <div class="col-md-12">
      <div class="form-group">
        <label for="cliente">Cliente:</label>
        <input  class="form-control"  readonly type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del cliente" value="<?php echo $nombre; ?>"/>

      </div>
      </div>

      </div>
      </fieldset>






      <br>




            <fieldset>
            <legend>Datos del trabajo</legend>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
          <label for="tipo">Descripcion del trabajo</label>
              <textarea class="form-control" readonly rows="4" placeholder="Tipo de trabajo" id="tipo" name="trabajos" pattern="[.-\/_()A-Za-z0-9 ñÑ'áéíóúüÁÉÍÓÚÜçÇàèìòùÀÈÌÒÙ]{5,500}" required ><?php echo $encargo; ?></textarea>
            </div>
              </div>



              <div class="col-md-6">
              <div class="form-group">
                <label for="honorarios">Honorarios:</label>
                <input  class="form-control" readonly type="text" name="honorarios" id="honorarios" placeholder="Honorarios" pattern="[,.0-9]{1,6}"   title="Honorarios" required value="<?php echo $encargoHonorarios." €" ;?>"/>

              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                <label for="pagado">Pagado:</label>
                <input  class="form-control" readonly type="text" name="pagado" id="pagado" placeholder="Cantidad pagada" pattern="[,.0-9]{1,10}"   title="Cantidad pagada" required value="<?php echo $encargoPagado." €"; ?>"/>

              </div>
              </div>



        </div>
        </fieldset>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
        <label for="cantidad">Cantidad pagada</label>
        <input  class="form-control"  type="text" name="pago" id="pago" placeholder="Cantidad pagada" pattern="[,.0-9]{1,10}"   title="Cantidad pagada" required value="<?php echo $reg["pagos_cantidad"];?>"/>

        </div>
          </div>

        <div class="col-md-12">
          <div class="form-group">
      <label for="observaciones">Observaciones</label>
        <textarea class="form-control"  rows="4" placeholder="observaciones" name="observaciones" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}"></textarea>
      </div>
        </div>
        </div>
        <br>



          <div class="text-right">
        <button   class="contact submit btn btn-primary btn-xl"   data-toggle="modal" data-target="#myModal" type="button" id="modificar"  name="modificar"  />Modificar</button>

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
                <p style="color:black;">¿Esta seguro de modificar el pago?</p>

              </div>
              <div class="modal-footer" >


                <button type="submit" class="btn btn-primary" style="float:left;">Modificar</button>
                </form>


                <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


              </div>
            </div>

          </div>
        </div>



          </div>
          </form>
        <?php } ?>
          <br><br>
      </div>
