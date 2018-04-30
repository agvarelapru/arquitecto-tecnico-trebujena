<div class="container">
  <br><br>
<?php
if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){
?>
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Nuevo <b style="color: #f05f40;">presupuesto</b></h2>
    <hr class="primary">
    <p>
      Aqui puede crear nuevos presupuestos.
    </p>

<a href="?p=admin/presupuestos/nuevop" class="btn btn-primary">Nuevo presupuesto</a>

  <?php
}
 ?>


</div>




  <br><br>





    <div class="section-title text-center">
      <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">presupuestos</b></h2>
      <hr class="primary">
      <p>
        Aqui puede consultar todos sus presupuestos.
      </p>



  </div>


<div class="col-md-8 " id="buscar">





  <form class="form-horizontal"  action="?p=admin/presupuestos/pasop" method="post">


  <div class="form-group">
  <label for="usuario" >Ingrese el nombre del cliente:</label>
  <input  class="form-control" type="text" name="nombre" placeholder="Nombre cliente" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre del cliente .-_A-Za-z0-9 ñÑ"/>
      </div>


    <div class="form-group">
  <label for="email" >Ingrese tipo de trabajo:</label>
  <input  class="form-control" type="text" name="trabajo" placeholder="Tipo trabajo"  pattern= "[.-_A-Za-z0-9 ñÑ]{1,200}" title="Introduzca el tipo de trabajo"/>
  </div>

  <div class="form-group">
  <label for="fechaPregunta" >Ingrese la fecha del presupuesto:</label>
  <input  class="form-control" type="date" name="fechaPresupuesto" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
  </div>

    <div class="form-group">
    <label for="resuelta" >Indique si esta aceptado:</label>
    <input  class="form-control" type="checkbox" name="aceptado" id="aceptado"/>
    </div>

  <br>


  <input class="btn btn-primary" type="submit" name="buscar" id="buscar" value="Buscar">

  </form>

</div>



</div>





<br><br><br>
