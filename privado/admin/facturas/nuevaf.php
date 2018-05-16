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


  <?php

  $consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_id='".$_SESSION["id"]."'") or
  die("Problemas en el select:".mysqli_error($conexion));

  while($reg=mysqli_fetch_array($consulta_mysql)){

  ?>



  <fieldset>
  <legend>Datos del tecnico</legend>
<div class="form-group">
  <label for="Nombre">Nombre:</label>
  <input  class="form-control" readonly  type="text" name="nombreT" id="nombreT" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del tecnico" value="<?php echo $reg["usuarios_nombre"]; ?>"/>
</div>
<div class="form-group">
  <label for="Apellido1">Apellido 1:</label>
  <input  class="form-control"  readonly type="text" name="apellido1T" id="apellido1T" placeholder="Apellido1" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Primer apellido del tecnico" value="<?php echo $reg["usuarios_apellido1"]; ?>"/>
</div>
<div class="form-group">
  <label for="Apellido2">Apellido 2:</label>
  <input  class="form-control"  readonly type="text" name="apellido2T" id="apellido2T" placeholder="Apellido2" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Segundoapellido del tecnico" value="<?php echo $reg["usuarios_apellido2"]; ?>"/>
</div>
<div class="form-group">
  <label for="nif">NIF</label>
  <input class="form-control"  readonly type="text" name="nifT" id="nifT" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF o CIF" value="<?php echo $reg["usuarios_nif"]; ?>"/>
</div>

</fieldset>
<?php } ?>
</div>




<div class="col-md-6">

  <div class="form-group">
    <label for="encargo" id="encar" >Encargo</label>
    <select class="form-control" name="encargo" id="getencargo" title="Indique el encargo" required onchange="muestraDatos()"/>


       <option value="">--Selecione un encargo--</option>

              </select>

</div>
<fieldset>
<legend>Datos del cliente</legend>
<div class="form-group">
  <label for="Nombre">Nombre:</label>
  <input  class="form-control"  readonly type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Nombre del cliente"/>
</div>
<div class="form-group">
  <label for="Apellido1">Apellido 1:</label>
  <input  class="form-control"  readonly type="text" name="apellido1" id="apellido1" placeholder="Apellido1" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Primer apellido del cliente"/>
</div>
<div class="form-group">
  <label for="Apellido2">Apellido 2:</label>
  <input  class="form-control" readonly  type="text" name="apellido2" id="apellido2" placeholder="Apellido2" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Segundoapellido del cliente"/>
</div>
<div class="form-group">
  <label for="nif">NIF</label>
  <input class="form-control"  readonly type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF o CIF"/>
</div>


</fieldset>
</div>

    </div>
<br>

<?php $yearfac=date('y');

$yearf=date('m');

if($yearf=="01" || $yearf=="02" || $yearf=="03"){
$trimestre="01";
}else if($yearf=="04" || $yearf=="05" || $yearf=="06"){
$trimestre="02";
}else if($yearf=="07" || $yearf=="08" || $yearf=="09"){
$trimestre="03";
}else if($yearf=="10" || $yearf=="11" || $yearf=="12"){
$trimestre="04";
}



$consulta_mysql2=mysqli_query($conexion,"select * from facturas where facturas_year=".$yearfac." and facturas_trimestre=".$trimestre) or
die("Problemas en el select:".mysqli_error($conexion));
$num_total_registros = mysqli_num_rows($consulta_mysql2);

if($num_total_registros>0){

    if($num_total_registros<9){

      $numero="0";
        $numero.=$num_total_registros+1;
    }else{
        $numero=$num_total_registros+1;
    }
}else{
  $numero="01";
}
?>


    <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="numerofactura">Numero factura:</label>
        <input  class="form-control"  type="text" name="numfac" id="numfac" placeholder="Numero factura" pattern="[0-9 /-.,]{1,10}"  title="Numero de la factura" value="<?php echo $yearfac."_".$trimestre ."-".$numero;?>"/>
<input  class="form-control"  type="hidden" name="year" id="year"  value="<?php echo $yearfac;?>"/>
        <input  class="form-control"  type="hidden" name="trimestre" id="trimestre"  value="<?php echo $trimestre;?>"/>
<input  class="form-control"  type="hidden" name="num" id="num"  value="<?php echo $numero;?>"/>
      </div>


</div>
<?php $fechaFactura=date('Y-m-d'); ?>
<div class="col-md-6">
  <div class="form-group">
    <label for="fecha">Fecha factura:</label>
    <input  class="form-control"   type="date" name="fecha" id="fecha" placeholder="Fecha factura"   title="Fecha de la factura" value="<?php echo $fechaFactura; ?>"/>
  </div>


</div>
</div>

      <fieldset>
      <legend>Datos del trabajo</legend>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
    <label for="tipo">Descripcion del trabajo</label>
        <textarea class="form-control" rows="4" placeholder="Tipo de trabajo" id="tipo" name="trabajos" pattern="[.-\/_()A-Za-z0-9 ñÑ'áéíóúüÁÉÍÓÚÜçÇàèìòùÀÈÌÒÙ]{5,500}" required></textarea>
      </div>
        </div>



        <div class="col-md-3">
        <div class="form-group">
          <label for="honorarios">IMPORTE:</label>
          <input  class="form-control"  type="text" name="honorarios" id="honorarios" placeholder="Honorarios" pattern="[,.0-9]{1,6}"   title="Honorarios" required />

        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
          <label for="honorarios">21%  IVA:</label>
          <input  class="form-control"  type="text" name="iva" id="iva" placeholder="IVA" pattern="[,.0-9]{1,10}"   title="IVA" required />

        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
          <label for="honorarios">19%  IRPF:</label>
          <input  class="form-control"  type="text" name="irpf" id="irpf" placeholder="IRPF" pattern="[,.0-9]{1,10}"   title="IRPF" value="0"/>

        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
          <label for="honorarios">TOTAL:</label>
          <input  class="form-control"  type="text" name="total" id="total" placeholder="TOTAL" pattern="[,.0-9]{1,10}"   title="TOTAL" required />

        </div>
        </div>
  </div>
  </fieldset>
  <br>
  <div class="row">


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

    <input class="contact submit btn btn-primary btn-xl"   type="submit" id="enviar" name="enviar"  value="Generar factura"/>
  </div>


    </form>
    <br><br>
</div>
<script src="js/muestraencargos.js"></script>
