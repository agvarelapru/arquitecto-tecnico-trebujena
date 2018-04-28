<?php





    require_once('biblioteca/conexion.php');
    $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
      mysqli_set_charset($conexion,"utf8");


    $nick=$nombre=$pass=$pass2=$apellido1=$apellido2=$nif=$direccion=$cp=$poblacion=$provincia=$telefono=$email="";
    $nickErr=$nombreErr=$passErr=$passErr2=$apellido1Err=$apellido2Err=$nifErr=$direccionErr=$cpErr=$poblacionErr=$provinciaErr=$telefonoErr=$emailErr="";




    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $consulta_mysql2=mysqli_query($conexion,"select usuarios_usuario from usuarios") or
      die("Problemas en el select:".mysqli_error($conexion));

      if (empty($_POST["nick"])) {
        $nickErr = "Nick obligatorio";
      } else {
        /*
        $nick = test_input($_POST["nick"]);
        if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$nick)) {
          $nickErr = "Solo letras numeros y .-_";

        }*/
        while($reg2=mysqli_fetch_array($consulta_mysql2)){
          if($reg2["usuarios_usuario"]==$_POST["nick"] & $_POST["nick"]!=$_SESSION["usuario"]){
      $nickErr = "El nick ".$_POST["nick"]." ya esta en uso pruebe con otro";
      }
      }
      }

    if (empty($_POST["nombre"])) {
      $nombreErr = "Nombre obligatorio";
    } else {
      /*
      $nombre = test_input($_POST["nombre"]);
      if (!preg_match("/^[a-zñA-ZÑ -]*$/",$nombre)) {
        $nombreErr = "Solo letras y espacio en blanco";
      }*/
    }

     if (empty($_POST["apellido1"])) {
         $apellido1Err = "Apellido 1 obligatorio";
       } else {
      /*   $apellido1 = test_input($_POST["apellido1"]);
         if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido1)) {
           $apellido1Err = "Solo letras y espacio en blanco";
         }*/
       }
       if (empty($_POST["apellido2"])) {
           $apellido2Err = "Apellido 2 obligatorio";
         } else {
        /*   $apellido2 = test_input($_POST["apellido2"]);
           if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido2)) {
             $apellido2Err = "Solo letras y espacio en blanco";
           }*/
         }


         if (empty($_POST["nif"])) {
           $nifErr = "Nif obligatorio";
         } else {
        //   $nif = test_input($_POST["nif"]);
$nif=$_POST["nif"];

        $num=substr($nif,0,8);
       $d=$num%23;
       $letra=strtoupper(substr($nif,8,9));
       $leta=array ("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
       if ($leta[$d]==$letra) {

        }else{
               $nifErr = "Nif incorrecto";
        }
        $consulta_mysql3=mysqli_query($conexion,"select usuarios_nif from usuarios") or
        die("Problemas en el select:".mysqli_error($conexion));
        while($reg3=mysqli_fetch_array($consulta_mysql3)){
          if($reg3["usuarios_nif"]==$_POST["nif"] & $_POST["nick"]!=$_SESSION["usuario"]){
      $nifErr = "El usuario con el nif, ".$_POST["nif"]." ya esta registrado";
      }
      }

         }


         if (empty($_POST["direccion"])) {
             $direccionErr = "Direccion obligatoria";
           } else {
          /*   $direccion = test_input($_POST["direccion"]);
             if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$direccion)) {
               $direccionErr = "Solo letras y espacio en blanco";
             }*/
           }

           if (empty($_POST["cp"])) {
               $cpErr = "Codigo postal obligatorio";
             } else {
          /*     $cp = test_input($_POST["cp"]);
                 if (!preg_match("/^[0-9]{5,5}$/",$cp)) {
                 $cpErr = "Solo 5 numeros";
               }*/
             }

             if (empty($_POST["provincia"])) {
                 $provinciaErr = "Provincia obligatoria";
               } else {
              /*   $provincia = test_input($_POST["provincia"]);
                 if (!preg_match("/^[0-9]*$/",$provincia)) {
                   $provinciaErr = "Solo numeros";
                 }*/
               }

               if (empty($_POST["poblacion"])) {
                   $poblacionErr = "Poblacion obligatoria";
                 } else {
              /*     $poblacion = test_input($_POST["poblacion"]);
                   if (!preg_match("/^[0-9]*$/",$poblacion)) {
                     $poblacionErr = "Solo numeros";
                   }*/
                 }

                 if (empty($_POST["telefono"])) {
                $telefonoErr = "Telefono obligatorio";
              } else {
            /*    $telefono= test_input($_POST["telefono"]);
                if (!preg_match("/^[0-9]{9,9}$/",$telefono)) {
                  $telefonoErr = "Solo 9 numeros";
                }*/
              }


         if (empty($_POST["email"])) {
          $emailErr = "Email obligatorio";
         } else {
    /*      $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato invalido de email";
          }*/
         }
    }

         function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
         }















      if($nickErr=="" &  $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $nifErr=="" & $direccionErr=="" & $cpErr=="" & $poblacionErr=="" & $provinciaErr=="" & $telefonoErr=="" & $emailErr==""){


        mysqli_query($conexion, "update usuarios set usuarios_usuario='$_REQUEST[nick]',usuarios_nombre='$_REQUEST[nombre]', usuarios_apellido1='$_REQUEST[apellido1]', usuarios_apellido2='$_REQUEST[apellido2]',usuarios_nif='$_REQUEST[nif]',usuarios_direccion='$_REQUEST[direccion]',usuarios_cp='$_REQUEST[cp]', usuarios_poblacion='$_REQUEST[poblacion]',usuarios_provincia='$_REQUEST[provincia]', usuarios_telefono='$_REQUEST[telefono]', usuarios_email='$_REQUEST[email]'
                                where usuarios_id='$_REQUEST[id]'") or die("Problemas en el select:".mysqli_error($conexion));

  $_SESSION["usuario"]=$_REQUEST["nick"];


        include 'biblioteca/qr-code/phpqrcode/qrlib.php';
       // El nombre del fichero que se generará (una imagen PNG).
       $file ='registro/img/qr/qr_'.$_REQUEST['nick'].'.png';
       // La data que llevará.
       $data = 'https://www.arquitecto-tecnico-trebujena.es/logeo.php?usuario='.$_REQUEST['nick'].'&pass='.$_SESSION["pass"];

       // Y generamos la imagen.
       QRcode::png($data, $file);




      $para = $_REQUEST["email"];
      $titulo = 'Modificacion de datos arquitecto tecnico - Trebujena '.$_REQUEST['nick'];
      $mensaje=

      '<html>

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
          <title>Modificacion de datos</title>

      </head>


      <body Style="background-color: #282f35; font-family:Century Gothic;">

              <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                      <h2 style="text-align: center;font-weight: BOLD;">Modificacion de datos</h2>
                      <hr Style="border: 2px solid #f05f40;  width:7%;">
                      <h4 Style="text-align:center">Hola, acaba de modificar los datos de su cuenta.</h4>

                              <h4 Style="text-align:center">Si ha modificado usuario y/o contraseña este es el nuevo codigo QR:</h4>
                            <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                                 <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="https://www.arquitecto-tecnico-trebujena.es" ><b style="color:#f05f40;">a</b>rquitecto tecnico-Trebujena</a></div><br>
                                     <div Style="width:80%;margin-left:10%;"><img src="https://www.arquitecto-tecnico-trebujena.es/'.$file.'" alt="Codigo QR"></div>
                                     <h4><u>Usuario</u></h4>
                                     <h4>'.$_REQUEST['nick'].'</h4>
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
      <h2 class="bottombrand wow flipInX">Datos modificados de usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
      <hr class="primary">
      <p>
        Estos son los datos de su cuenta.
      </p>

      <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Bien!</strong> Los datos del usuario han sido modificados
        </div>

  </div>
</div>

<?php

}else{
?>
<br><br>
  <div class="container">
      <div class="section-title text-center">
        <h2 class="bottombrand wow flipInX">Datos modificados de usuario: <b style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]." "; ?></b></h2>
        <hr class="primary">
        <p>
          Estos son los datos de su cuenta.
        </p>

        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>¡Upss!</strong> Los datos del usuario no se han modificados
          </div>

    </div>
</div>

  <?php
}
       ?>



<!-- Section Contact
================================================== -->






<div class="col-md-8 registro">


<?php

$consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_usuario='".$_SESSION["usuario"]."'") or
die("Problemas en el select:".mysqli_error($conexion));


while($reg=mysqli_fetch_array($consulta_mysql)){

 ?>



 <form method="post" action="?p=datosmodificados" id="contactform" >

   <div class="form-group">
     <label for="nick">Usuario</label>
     <input  class="form-control"  type="hidden" name="id" id="id" placeholder="id" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="id" required autofocus value="<?php echo $reg['usuarios_id'];?>"/>

     <input  class="form-control"  type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required autofocus value="<?php echo $reg['usuarios_usuario'];?>"/>

   </div>
   <div class="row">
       <div class="col-md-6">
   <div class="form-group">
     <label for="pass">Contraseña</label>
     <input  class="form-control" readonly type="password"  name="pass" id="pass"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required value="<?php echo $reg['usuarios_pass'];?>"/>
       <input  class="form-control" readonly type="hidden"  name="pass" id="pass2"  placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required value="<?php echo $reg['usuarios_pass'];?>"/>
 </div>
   </div>
   <div class="col-md-6">

 <input  class="contact submit btn btn-primary btn-xl" type="submit" id="enviar" name="modpass" formaction="modpass.php" value="Modificar contraseña" style="margin-top:6%;float:right;"/>


 </div>
 </div>

<br><br>

<fieldset>
<legend>Datos personales</legend>
     <div class="row">
         <div class="col-md-6">



             <div class="form-group">
               <label for="nombre">Nombre</label>
               <input  class="form-control"  type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  required value="<?php echo $reg['usuarios_nombre'];?>"/>
             </div>
             <div class="form-group">
               <label for="apellido1">Apellido 1</label>
               <input class="form-control"  type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1"   required value="<?php echo $reg['usuarios_apellido1'];?>"/>
             </div>
             <div class="form-group">
               <label for="apellido2">Apellido 2</label>
               <input class="form-control"  type="text" name="apellido2" id="apellido2" placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2"  required value="<?php echo $reg['usuarios_apellido2'];?>"/>
             </div>
             <div class="form-group">
               <label for="nif">NIF</label>
               <input class="form-control" type="text" name="nif" id="nif" placeholder="NIF" pattern="(([X-Zx-z]{1})([-]?)(\d{7})([-]?)([A-Za-z]{1}))|((\d{8})([-]?)([A-Za-z]{1}))|(([A-Za-z]{1})(\d{8}))"  title="Introduzca su NIF 00000000A"  required value="<?php echo $reg['usuarios_nif'];?>"/>
             </div>
             <div class="form-group">
               <label for="direccion">Direccion</label>
               <input class="form-control"  type="text" name="direccion" id="direccion" placeholder="Direccion" pattern="[ A-Za-zñÑ0-9,./-]{1,100}"  title="Introduzca la Direccion A-Z 0-9 ,.-/"  required value="<?php echo $reg['usuarios_direccion'];?>"/>
             </div>




         </div>
         <div class="col-md-6">



             <div class="form-group">
               <label for="cp">Codigo postal</label>
               <input class="form-control" type="text" name="cp" id="cp" placeholder="CP" pattern="[0-9]{5}"  title="Introduzca su codigo postal"  required value="<?php echo $reg['usuarios_cp'];?>"/>
             </div>


             <div class="form-group">
               <label for="provincia" id="provi">Provincia</label>

               <select class="form-control" name="provincia" id="provincia" title="Indique su provincia" required />
<option value="">--Selecione una provincia--</option>
               <?php

               $consulta_mysql=mysqli_query($conexion,"select * from provincias") or
               die("Problemas en el select:".mysqli_error($conexion));


               while($reg3=mysqli_fetch_array($consulta_mysql)){

if($reg3["id"]==$reg['usuarios_provincia']){

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

                 $consulta_mysql2=mysqli_query($conexion,"select * from municipios") or
                 die("Problemas en el select:".mysqli_error($conexion));


                 while($reg2=mysqli_fetch_array($consulta_mysql2)){

                   if($reg2["id"]==$reg['usuarios_poblacion']){

                   echo "<option value='".$reg2["id"]."' selected>".$reg2["municipio"]."</option>";
                   }else{
                 echo "<option value='".$reg2["id"]."'>".$reg2["municipio"]."</option>";
                 }



                 }
                 ?>


                         </select>



             </div>
             <div class="form-group">
               <label for="telefono">Telefono</label>
               <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" pattern="[0-9]{9}"  title="Introduzca su numero de telefono"  required value="<?php echo $reg['usuarios_telefono'];?>"/>
             </div>

             <div class="form-group">
               <label for="email">Email</label>
               <input class="form-control"  type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $reg['usuarios_email'];?>"/>
             </div>




         </div>
     </div>
</fieldset>
<br>
     <div class="text-right">
<input  class="contact submit btn btn-primary btn-xl"   style="float:left" type="submit" id="baja"  name="baja" formaction="/bajacuenta.php" value="Darse de baja"/>

       <button  class="contact submit btn btn-primary btn-xl" data-toggle="modal" data-target="#myModal"  type="button" id="modificar" name="modificar"  value="Modificar datos"/>Modificar datos</button>
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
             <p style="color:black;">¿Esta seguro de modificar sus datos <spam style="color: #f05f40;"><?php echo " ".$_SESSION["usuario"]; ?></spam>?</p>
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
}



mysqli_close($conexion);
?>



















<br>
