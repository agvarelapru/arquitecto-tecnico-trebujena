

<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");



?>

<!-- Section Contact
================================================== -->
<br><br>



<!-- Section Contact
================================================== -->
<br><br>


    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Modificar contraseña usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
          <hr class="primary">
      		<p>
      			Desde esta pagina puedes modificar tu contraseña.
      		</p>
      </div>
</div>
<br>

<div class="col-md-8 registro">






    <form method="post" action="?p=passmodificada" id="contactform" >







<fieldset>
<legend>Nueva contraseña</legend>

<div class="row">
    <div class="col-md-12">
<div class="form-group">
  <label for="pass">Contraseña actual</label>

<input  class="form-control"  type="password"  name="passvieja" id="passvieja"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required />
<input  class="form-control"  type="hidden"  name="provincia" id="provincia" value="oo"/>
<input  class="form-control"  type="hidden"  name="poblaciones" id="poblaciones" value="oo"/>
<br>
  <label for="pass">Contraseña nueva</label>
  <input  class="form-control" type="password"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required />
<label for="pass2" id="error">Repita Contraseña nueva</label>
  <input  class="form-control" type="password"  name="pass2" id="pass2"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required />
  <h5 id="error"></h5>
</div>
</div>

</div>



  </fieldset>
  <br>
        <div class="text-right">

          <button  class="contact submit btn btn-primary btn-xl" data-toggle="modal" data-target="#myModal"  type="button" id="enviar" name="modificar"  value="Modificar datos"/>Modificar contraseña</button>
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
                <p style="color:black;">¿Esta seguro de modificar su contraseña <spam style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]; ?></spam>?</p>
              </div>
              <div class="modal-footer" >


                <button type="submit" class="btn btn-primary" style="float:left;">Modificar</button>
                </form>


                <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


              </div>
            </div>

          </div>
        </div>




    </form>
</div>

<br><br>









<?php
 mysqli_close($conexion);





?>























<br>
