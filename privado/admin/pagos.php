<?php
require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");
 ?>
<div class="container">
  <br><br>

  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Nuevo <b style="color: #f05f40;">pago</b></h2>
    <hr class="primary">
    <p>
      Aqui puede pagar los honorarios de los trabajos realizados.
    </p>

<a href="?p=admin/pagos/nuevapago" class="btn btn-primary">Nuevo pago</a>



</div>




  <br><br>





    <div class="section-title text-center">
      <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">pagos</b></h2>
      <hr class="primary">
      <p>
        Aqui puede consultar todos los pagos realizados.
      </p>



  </div>


<div class="col-md-8 " id="buscar">





  <form class="form-horizontal"  action="?p=admin/pagos/pasopago" method="post">


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
      <input  class="form-control"  type="hidden" name="pass" id="tipo"/>
      <input  class="form-control"  type="hidden" name="pass" id="honorarios"/>
<input  class="form-control"  type="hidden" name="pass" id="nombre"/>
<input  class="form-control"  type="hidden" name="pass" id="pagado"/>

      <div class="form-group">
        <label for="encargo" id="encar" >Encargo</label>
        <select class="form-control" name="encargo" id="getencargo" title="Indique el encargo" required onchange="muestraDatos()"/>


           <option value="#">--Selecione un encargo--</option>

                  </select>

    </div>


  <div class="form-group">
  <label for="fechaPago" >Ingrese la fecha del pago:</label>
  <input  class="form-control" type="date" name="fechaPago" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
  </div>


  <br>

  <input class="btn btn-primary" type="submit" name="buscar" id="buscar" value="Buscar">
  </form>

</div>



</div>





<br><br><br>
<script src="js/muestrapagos.js"></script>
