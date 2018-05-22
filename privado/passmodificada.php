
<?php



    require_once('biblioteca/conexion.php');
    $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
      mysqli_set_charset($conexion,"utf8");


    $passvieja=$pass=$pass2="";
    $passviejaErr=$passErr=$passErr2="";

  $contra=md5($_POST["passvieja"]);
  $contranueva=md5($_POST["pass"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ( $contra == $_SESSION["pass"]) {
      if (empty($_POST["passvieja"]) || empty($_POST["pass"]) || empty($_POST["pass2"])) {
         $passviejaErr = "Contraseña obligatoria";

       } else if($_POST["pass"]!=$_POST["pass2"]){
         $passErr = "Las contraseña deben de ser iguales";

       }else {
         /*
         $pass = test_input($_POST["pass"]);
         if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$pass)) {
           $passErr = "Solo letras numeros y .-_";
         }
*/
       }
  }else{
    $passviejaErr = "La contraseña antigua no es correcta";
  }


         function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
         }


  }




    ?>





 <?php


      if($passviejaErr=="" & $passErr=="" & $passErr2=="" ){


        mysqli_query($conexion, "update usuarios set usuarios_pass='$contranueva' where usuarios_usuario='$_SESSION[usuario]'") or die("Problemas en el select:".mysqli_error($conexion));


$_SESSION["pass"]=$contranueva;

        include 'biblioteca/qr-code/phpqrcode/qrlib.php';
       // El nombre del fichero que se generará (una imagen PNG).
       $file ='registro/img/qr/qr_'.$_SESSION['usuario'].'.png';
       // La data que llevará.
       $data = 'https://www.arquitecto-tecnico-trebujena.es/logeo.php?usuario='.$_SESSION['usuario'].'&pass='.$_SESSION["pass"];

       // Y generamos la imagen.
       QRcode::png($data, $file);




      $para = $_SESSION["email"];
      $titulo = 'Modificacion de contraseña arquitecto tecnico - Trebujena '.$_SESSION['usuario'];
      $mensaje=

      '<html>

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
          <title>Modificacion de contraseña</title>

      </head>


      <body Style="background-color: #282f35; font-family:Century Gothic;">

              <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                      <h2 style="text-align: center;font-weight: BOLD;">Modificacion de contraseña</h2>
                      <hr Style="border: 2px solid #f05f40;  width:7%;">
                      <h4 Style="text-align:center">Hola, acaba de modificar la contraseña de su cuenta.</h4>

                              <h4 Style="text-align:center">Si ha modificado usuario y/o contraseña este es el nuevo codigo QR:</h4>
                            <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                                 <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="http://www.agvarelapru.esy.es/FORMULARIO-1" ><spam style="color:#f05f40;">a</spam>rquitecto tecnico-Trebujena</a></div><br>
                                     <div Style="width:80%;margin-left:10%;"><img src="https://www.arquitecto-tecnico-trebujena.es/'.$file.'" alt="Codigo QR"></div>
                                     <h4><u>Usuario</u></h4>
                                     <h4>'.$_SESSION["usuario"].'</h4>
                                  </div>



          </div>
          <div Style="width:90%; margin-left:5%">
          <hr Style="border: 2px solid #f05f40; border-radius: 0px /0px;">
          <p Style="text-align:justify; color:rgb(94, 91, 91); "> Este correo electrónico contiene información confidencial. Cualquier reproducción, distribución o divulgación de su contenido están estrictamente prohibidos.Si no eres el destinatario indicado en el mismo y recibes este correo electrónico, te ruego me lo notifiques de inmediato a la dirección agvarelapru@gmail.com y destruyas el mensaje recibido sin obtener copia del mismo, ni distribuirlo, ni revelar su contenido. Angel Varela Pruaño no se hace responsable del mal uso de esta información.
            </p>


          <p Style="text-align:justify; color:rgb(94, 91, 91);" >  Information in this message is confidential and may be legally privileged. It is intended solely for the person to whom it is addressed. If you are not the intended recipient, please notify the sender agvarelapru@gmail.com and please delete the message from your system immediately.
            </p>
          </div>

      </body>

      </html>';


      $cabeceras = 'MIME-Version: 1.0' . "\r\n";
      $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
      $cabeceras .= 'From: info@arquitecto-tecnico-trebujena.es';


      mail($para,$titulo,$mensaje,$cabeceras);


?>
<br><br>
<div class="container">
    <div class="section-title text-center">
      <h2 class="bottombrand wow flipInX">Modificar contraseña de usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
      <hr class="primary">
      <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Bien!</strong> La contraseña ha sido modificada satisfactoriamente
        </div>
  </div>
</div>


<?php


}else{


?>





<br><br>


    <div class="container">
        <div class="section-title text-center">
          <h2 class="bottombrand wow flipInX">Modificar contraseña de usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
          <hr class="primary">
          <div class="alert alert-danger alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>¡Upss!</strong> Lo sentimos pero la contraseña no se ha modificado. <br>
<?php echo $passviejaErr; ?>
<?php echo $passErr; ?>

            </div>
      </div>
</div>

<?php
}
 ?>


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
