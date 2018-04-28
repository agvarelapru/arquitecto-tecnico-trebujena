
<div class="container" id="home">

  <br><br>



    <div class="section-title text-center">
      <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">clientes</b></h2>
      <hr class="primary">
      <p>
        Aqui puede buscar a todos sus clientes.
      </p>



  </div>


<div class="col-md-8 " id="buscar">

  <form class="form-horizontal"   action="?p=usuarios/paso2" method="post" style="width:100%">

    <div class="form-group">
   <label  for="busqueda" >Busqueda unica</label><br>

  <input  class="form-control" type="text" name="busqueda"  placeholder="Busqueda"   title="Indique el contenido a buscar"/>

  <button class="btn btn-primary" type="submit" name="buscar"   id="buscar2"><span class="glyphicon glyphicon-search" ></span></button>
  </div>


  </form>
  <hr>

  <form class="form-horizontal"  action="?p=usuarios/paso" method="post">


  <div class="form-group">
  <label for="usuario" >Ingrese el nick del usuario:</label>
  <input  class="form-control" type="text" name="usuario" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ"/>
      </div>


  <div class="form-group">
  <label for="localidad" >Ingrese la Localidad del usuario:</label>

    <?php
    require_once('biblioteca/conexion.php');
    $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
        die("Problemas con la conexión.");
      mysqli_set_charset($conexion,"utf8");

  $consulta_mysql=mysqli_query($conexion,"select DISTINCT m.municipio, m.id
               from municipios as m, usuarios as u where m.id=u.usuarios_poblacion order by usuarios_poblacion;") or
  die("Problemas en el select:".mysqli_error($conexion));

  ?>

  <select class="form-control" name="poblacion"/>
  <?php
echo "<option value='' selected>--Escoja un municipio--</option>";
  while($reg=mysqli_fetch_array($consulta_mysql)){

  echo "<option value='".$reg["id"]."'>".$reg["municipio"]." </option>";

  }
  ?>
   </select>
  </div>



    <div class="form-group">
  <label for="email" >Ingrese Email del usuario:</label>
  <input  class="form-control" type="email" name="email" placeholder="correo@ejemplo.com"  pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com"/>
  </div>

  <div class="form-group">
  <label for="fechaPregunta" >Ingrese la fecha de alta:</label>
  <input  class="form-control" type="date" name="fechaAlta" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
  </div>

    <div class="form-group">
    <label for="resuelta" >Indique si esta bloqueado:</label>
    <input  class="form-control" type="checkbox" name="bloqueado" id="bloqueado"/>
    </div>

  <br>


  <input class="btn btn-primary" type="submit" name="buscar" id="buscar2" value="Buscar">

  </form>

</div>



</div>





<br><br><br>
