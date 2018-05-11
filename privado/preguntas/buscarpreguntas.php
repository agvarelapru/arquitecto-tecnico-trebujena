
<div class="container" id="home">

  <br><br>



    <div class="section-title text-center">
      <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">mensajes</b></h2>
      <hr class="primary">
      <p>
        Aqui puede consultar todos sus menssajes.
      </p>



  </div>


<div class="col-md-8 " id="buscar">





  <form class="form-horizontal"  action="?p=preguntas/paso" method="post">


  <div class="form-group">
  <label for="usuario" >Ingrese el nombre del usuario:</label>
  <input  class="form-control" type="text" name="nombre" placeholder="Nombre" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ"/>
      </div>


    <div class="form-group">
  <label for="email" >Ingrese Email del usuario:</label>
  <input  class="form-control" type="email" name="email" placeholder="correo@ejemplo.com"  pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com"/>
  </div>

  <div class="form-group">
  <label for="fechaPregunta" >Ingrese la fecha de la pregunta:</label>
  <input  class="form-control" type="date" name="fechaPregunta" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
  </div>

    <div class="form-group">
    <label for="resuelta" >Indique si esta resuelta:</label>
    <input  class="form-control" type="checkbox" name="resuelta" id="resuelta"/>
    </div>

  <br>


  <input class="btn btn-primary" type="submit" name="buscar" id="buscar" value="Buscar">

  </form>

</div>



</div>





<br><br><br>
