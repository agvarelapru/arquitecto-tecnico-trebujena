<div class="container">
  <br><br>
<?php
if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){
?>
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Nueva <b style="color: #f05f40;">factura</b></h2>
    <hr class="primary">
    <p>
      Aqui puede crear nuevas facturas.
    </p>

<a href="?p=admin/facturas/nuevaf" class="btn btn-primary">Nueva factura</a>

  <?php
}
 ?>


</div>




  <br><br>





    <div class="section-title text-center">
      <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">facturas</b></h2>
      <hr class="primary">
      <p>
        Aqui puede consultar todas sus facturas.
      </p>



  </div>


<div class="col-md-8 " id="buscar">





  <form class="form-horizontal"  action="?p=admin/facturas/pasof" method="post">


  <div class="form-group">
  <label for="usuario" >Ingrese el numero de la factura:</label>
  <input  class="form-control" type="text" name="numero" placeholder="Numero factura 18/01-01" pattern="[0-9-/]{1,50}"  title="Introduzca el numero de la factura año/trimestre-numero"/>
      </div>


    <div class="form-group">
  <label for="email" >Ingrese el año de la factura:</label>
  <input  class="form-control" type="text" name="year" placeholder="Año factura"  pattern= "[0-9]{1,2}" title="Introduzca el año de la factura, dos ultimas cifras"/>
  </div>

  <div class="form-group">
  <label for="fechaPregunta" >Ingrese la fecha de la factura:</label>
  <input  class="form-control" type="date" name="fechaFactura" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
  </div>
<!--
    <div class="form-group">
    <label for="resuelta" >Indique si esta pagada:</label>
    <input  class="form-control" type="checkbox" name="pagada" id="pagada"/>
    </div>
-->



  <br>


  <input class="btn btn-primary" type="submit" name="buscar" id="buscar" value="Buscar">

  </form>

</div>



</div>





<br><br><br>
