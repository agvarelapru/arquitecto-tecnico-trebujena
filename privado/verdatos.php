


<br><br>

<?php

require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");



?>

<!-- Section Contact
================================================== -->





    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Datos cuenta usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
          <hr class="primary">
      		<p>
      			Desde esta pagina puedes consultar tus datos de registros y acceder para modificarlos o darte de baja de la cuenta.
      		</p>
      </div>
</div>


<div class="col-md-8 registro">


<?php

$consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_usuario='".$_SESSION["usuario"]."'") or
die("Problemas en el select:".mysqli_error($conexion));


while($reg=mysqli_fetch_array($consulta_mysql)){

 ?>



    <form method="post" action="?p=bajacuenta" id="contactform" >

      <div class="form-group">
        <label for="nick">Usuario</label>
        <input  class="form-control" readonly type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required autofocus value="<?php echo $reg['usuarios_usuario'];?>"/>
        <input  class="form-control" readonly type="hidden" name="id" id="id" placeholder="id" value="<?php echo $reg['usuarios_id'];?>"/>

      </div>
      <div class="row">
          <div class="col-md-6">
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input  class="form-control" readonly type="password"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required value="<?php echo $reg['usuarios_pass'];?>"/>
    </div>
      </div>
      <div class="col-md-6">

    <input  class="contact submit btn btn-primary btn-xl" type="submit" id="enviar" name="modpass" formaction="pagina.php?p=modpass" value="Modificar contraseña" style="margin-top:6%;float:right;"/>


    </div>
    </div>

<br><br>

<fieldset>
<legend>Datos personales</legend>
        <div class="row">
            <div class="col-md-6">



                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input  class="form-control" disabled type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  required value="<?php echo $reg['usuarios_nombre'];?>"/>
                </div>
                <div class="form-group">
                  <label for="apellido1">Apellido 1</label>
                  <input class="form-control" disabled type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1"   required value="<?php echo $reg['usuarios_apellido1'];?>"/>
                </div>
                <div class="form-group">
                  <label for="apellido2">Apellido 2</label>
                  <input class="form-control" disabled type="text" name="apellido2" id="apellido2" placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2"  required value="<?php echo $reg['usuarios_apellido2'];?>"/>
                </div>
                <div class="form-group">
                  <label for="nif">NIF</label>
                  <input class="form-control" disabled type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF 00000000A"  required value="<?php echo $reg['usuarios_nif'];?>"/>
                </div>
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input class="form-control" disabled type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required value="<?php echo $reg['usuarios_direccion'];?>"/>
                </div>




            </div>
            <div class="col-md-6">



                <div class="form-group">
                  <label for="cp">Codigo postal</label>
                  <input class="form-control" disabled type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required value="<?php echo $reg['usuarios_cp'];?>"/>
                </div>
                <div class="form-group">
                  <label for="provincia" id="provi">Provincia</label>


                  <?php

                  $consulta_mysql=mysqli_query($conexion,"select * from provincias") or
                  die("Problemas en el select:".mysqli_error($conexion));


                  while($reg3=mysqli_fetch_array($consulta_mysql)){

if($reg3["id"]==$reg['usuarios_provincia']){
?>

<input class="form-control" disabled type="text" name="provincia" id="provincia" placeholder="Provincia" pattern="[0-9]{5}"  title="Introduzca su provincia"  required value="<?php echo $reg3['provincia'];?>"/>
<?php

}


                  }
                  ?>
                            </select>



                </div>

                <div class="form-group">
                  <label for="poblacion" id="pobla" >Poblacion</label>



										<?php

										$consulta_mysql2=mysqli_query($conexion,"select * from municipios") or
										die("Problemas en el select:".mysqli_error($conexion));


										while($reg2=mysqli_fetch_array($consulta_mysql2)){

											if($reg2["id"]==$reg['usuarios_poblacion']){

                        ?>

                        <input class="form-control" disabled type="text" name="poblacion" id="poblacion" placeholder="Poblacion" pattern="[0-9]{5}"  title="Introduzca su poblacion"  required value="<?php echo $reg2['municipio'];?>"/>
                        <?php

											}



										}
										?>


                            </select>



                </div>
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input class="form-control" disabled type="text" name="telefono" id="telefono" placeholder="Telefono" pattern="[0-9]{9}"  title="Introduzca su numero de telefono"  required value="<?php echo $reg['usuarios_telefono'];?>"/>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" disabled type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $reg['usuarios_email'];?>"/>
                </div>




            </div>
        </div>
  </fieldset>
  <br>
  <div class="text-right">
<button   class="contact submit btn btn-primary btn-xl"   style="float:left" type="button" id="baja" data-toggle="modal" data-target="#myModal" name="baja"  value="Darse de baja"/>Darse de baja</button>

    <input class="contact submit btn btn-primary btn-xl"  formaction="?p=moddatos" type="submit" id="modificar" name="modificar"  value="Modificar datos"/>
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
                <p style="color:black;">¿Esta seguro desea dar de baja a la cuenta del usuario <spam style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]; ?></spam>?</p>
              </div>
              <div class="modal-footer" >


                <button type="submit" class="btn btn-primary" style="float:left;">Darse de baja</button>
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
}



 mysqli_close($conexion);

?>
