<?php



         $nick=$pass="";
         $idErr=$nickErr=$passErr="";



echo $_POST["id"];
         if ($_SERVER["REQUEST_METHOD"] == "POST") {

           if (empty($_POST["id"])) {
             $idErr = "id obligatorio";
           } else {
             /*
             $nick = test_input($_POST["nick"]);
             if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$nick)) {
               $nickErr = "Solo letras numeros y .-_";

             }*/

           }


           if (empty($_POST["nick"])) {
             $nickErr = "Nick obligatorio";
           } else {
             /*
             $nick = test_input($_POST["nick"]);
             if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$nick)) {
               $nickErr = "Solo letras numeros y .-_";

             }*/

           }
           if (empty($_POST["pass"])) {
             $passErr = "Contraseña obligatoria";
           } else {
             /*
             $nick = test_input($_POST["nick"]);
             if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$nick)) {
               $nickErr = "Solo letras numeros y .-_";

             }*/

           }

         }

?>


  <br><br>


  <?php

  if($idErr=="" & $nickErr=="" &  $passErr=="" & $_SESSION["perfil"]=="Administrador"){


             require_once('biblioteca/conexion.php');
             $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
               mysqli_set_charset($conexion,"utf8");


               mysqli_query($conexion, "update usuarios set usuarios_bloqueado='1' where usuarios_id='$_REQUEST[id]'") or die("Problemas en el select:".mysqli_error($conexion));







?>
<br><br>
<div class="container">
<div class="section-title text-center">
  <h2 class="bottombrand wow flipInX">Ha sido dada de baja la cuenta del usuario: <b style="color: #f05f40;"><?php echo " ".$_REQUEST["nick"]." "; ?></b></h2>
  <hr class="primary">
  <p>


  </p>
<br><br><br>
  <div class="alert alert-success alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>¡Bien!</strong> El usuario ha sido dado de baja correctamente
    </div>

</div>
</div>

<?php

session_unset();
session_destroy();//Literalmente la destruimos

  mysqli_close($conexion);
}else{
?>
<br><br>
<div class="container">
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Baja del usuario: <b style="color: #f05f40;"><?php echo " ".$_REQUEST["nick"]." "; ?></b></h2>
    <hr class="primary">
    <p>

    </p>

    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Upss!</strong> El usuario no ha sido dado de baja
      </div>
<p><?php echo $idErr; ?></p>
<p><?php echo $nickErr; ?></p>
<p><?php echo $passErr; ?></p>

</div>
</div>

<?php
}
   ?>












</div>





<br><br><br><br><br><br><br><br><br>
