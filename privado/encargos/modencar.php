<br><br>
<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");

  $consulta_mysql=mysqli_query($conexion,"select *  from encargos where encargos_id=".$_POST['encargos_id']) or
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


<br>
    <form method="post" action="?p=encargos/encarmodificado" id="contactform">
      <input  class="form-control" readonly type="hidden" name="encargos_id" id="encargos_id"  value="<?php echo $reg["encargos_id"]; ?>"/>
      <input  class="form-control" readonly type="hidden"  name="pass" id="pass"  />
        <input  class="form-control" readonly type="hidden"  name="pass" id="pass2" />



      <div class="row">

        <div class="col-md-2" style="float:right;">
          <label for="finalizado" style="font-size:1.4em">Finalizado:</label>
          <select class="form-control" name="finalizado">
            <?php if($reg['encargos_finalizado']==0) {?>
            <option value="0" selected>NO</option>
            <option value="1">SI</option>
          <?php }else{?>
            <option value="0" >NO</option>
              <option value="1" selected>SI</option>
            <?php } ?>

          </select>
          <br>
        </div>


                  <div class="col-md-12">
                    <?php
                    $consulta_mysql4=mysqli_query($conexion,"select *  from usuarios") or
                      die("Problemas en el select:".mysqli_error($conexion));
                    $nombreUsuario=""
                     ?>
                      <label for="usuario">Cliente:</label>
                      <select class="form-control" name="usuario" id="usuario" title="Indique el cliente" required />
            <option value="">--Selecione un cliente--</option>
                    <?php
                    while($reg4=mysqli_fetch_array($consulta_mysql4)){

                  $nombreUsuario=$reg4["usuarios_nombre"]." ".$reg4["usuarios_apellido1"]." ".$reg4["usuarios_apellido2"];

                    if($reg4["usuarios_id"]==$reg['encargos_usuario']){

                    echo "<option value='".$reg4["usuarios_id"]."' selected>".$nombreUsuario."</option>";
                    }else{
                    echo "<option value='".$reg3["usuarios_id"]."'>".$nombreUsuario."</option>";
                    }



                     }?>
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
                <input  class="form-control"  type="text" name="honorarios" id="honorarios" placeholder="Honorarios"  pattern="[,.0-9]{1,50}"  title="Honorarios" required  value="<?php echo $reg["encargos_honorarios"]; ?>"/>
              </div>
              </div>


              <div class="col-md-12">
                <div class="form-group">
          <label for="tipo">Tipo de encargo</label>
              <textarea class="form-control" rows="4" placeholder="Tipo de encargo" name="encargo" pattern="[.-_()A-Za-z0-9 ñÑ]{5,500}" required  ><?php echo $reg["encargos_tipo"]; ?></textarea>
            </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input  class="form-control"  type="text" name="superficie" id="superficie" placeholder="Superficie" pattern="[.,0-9]{1,50}"  title="Superficie construida" required  value="<?php echo $reg["encargos_superficie"]; ?>"/>

              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="pem">PEM:</label>
                <input  class="form-control"  type="text" name="pem" id="pem" placeholder="PEM" pattern="[,.0-9]{1,50}"  title="Presupuesto de ejecucion estimado" required  value="<?php echo $reg["encargos_pem"]; ?>"/>

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
                <input class="form-control" type="text" name="refCatastral" id="refCatastral" placeholder="Referencia catastral" pattern="[.-_A-Za-z0-9 ñÑ]{5,50}"  title="Introduzca la referenca catastral"  value="<?php echo $reg["encargos_ref_catastral"]; ?>"/>
              </div>
              </div>

      <div class="col-md-6">
              <div class="form-group">
                <label for="direccion">Direccion</label>
                <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required value="<?php echo $reg["encargos_direccion"]; ?>"/>
              </div>
              <div class="form-group">
                <label for="cp">Codigo postal</label>
                <input class="form-control" type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required  value="<?php echo $reg["encargos_cp"]; ?>"/>
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


                  while($reg3=mysqli_fetch_array($consulta_mysql)){

if($reg3["id"]==$reg['encargos_provincia']){

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

                    $consulta_mysql2=mysqli_query($conexion,"select * from municipios  where provincia_id='".$reg["encargos_provincia"]."'") or
                    die("Problemas en el select:".mysqli_error($conexion));


                    while($reg2=mysqli_fetch_array($consulta_mysql2)){

                      if($reg2["id"]==$reg['encargos_poblacion']){

                      echo "<option value='".$reg2["id"]."' selected>".$reg2["municipio"]."</option>";
                      }else{
                    echo "<option value='".$reg2["id"]."'>".$reg2["municipio"]."</option>";
                    }



                    }
                    ?>


                            </select>



                </div>



        </div>
        </fieldset>
        <br>




          <div class="form-group">
      <label for="observaciones">Observaciones</label>
        <textarea class="form-control" rows="4" placeholder="observaciones" name="observaciones" pattern="[.-_A-Za-z0-9 ñÑ]{5,500}" ><?php echo $reg["encargos_observaciones"]; ?></textarea>
      </div>

<div class="row">
      <div class="col-md-12">
        <?php
        $consulta_mysql4=mysqli_query($conexion,"select *  from usuarios where usuarios_perfil='Tecnico' || usuarios_perfil='Administrador'") or
          die("Problemas en el select:".mysqli_error($conexion));
        $nombreUsuario=""
         ?>
          <label for="tecnico">Tecnico:</label>
          <select class="form-control" name="tecnico" id="tecnico" title="Indique el tecnico" required />
<option value="">--Selecione un tecnico--</option>
        <?php
        while($reg4=mysqli_fetch_array($consulta_mysql4)){

      $nombreUsuario=$reg4["usuarios_nombre"]." ".$reg4["usuarios_apellido1"]." ".$reg4["usuarios_apellido2"];

        if($reg4["usuarios_id"]==$reg['encargos_tecnico']){

        echo "<option value='".$reg4["usuarios_id"]."' selected>".$nombreUsuario."</option>";
        }else{
        echo "<option value='".$reg3["usuarios_id"]."'>".$nombreUsuario."</option>";
        }
         }?>
</select>
          <br>
      </div>
</div>
        <br>



  <div class="text-right">
<button   class="contact submit btn btn-primary btn-xl"    data-toggle="modal" data-target="#myModal" type="button" id="enviar"  name="modificar"  value="Modificar"/>Modificar</button>
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
        <p style="color:black;">¿Esta seguro de modificar el encargo?</p>

      </div>
      <div class="modal-footer" >


        <button type="submit" class="btn btn-primary" style="float:left;">Modificar</button>
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
