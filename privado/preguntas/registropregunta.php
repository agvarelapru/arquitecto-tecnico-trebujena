<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


$nick=$asunto=$mensaje=$email="";
$nickErr=$asuntoErr=$mensajeErr=$emailErr="";
$nombre="";

$nick=$_REQUEST['nick'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["asunto"])) {
  $asuntoErr = "Asunto obligatorio";
} else {
  $asunto = test_input($_POST["asunto"]);
  if (!preg_match("/^[a-zñA-ZÑ0-9 -.,]*$/",$asunto)) {
    $asuntoErr = "Solo letras, numeros y espacio en blanco";
  }
}

     if (empty($_POST["mensaje"])) {
         $mensajeErr = "Mensaje obligatorio";
       } else {
         $mensaje = test_input($_POST["mensaje"]);
         if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$mensaje)) {
           $mensajeErr = "Solo letras y espacio en blanco";
         }
       }


     if (empty($_POST["email"])) {
      $emailErr = "Email obligatorio";
     } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato invalido de email";
      }
     }
}

     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }
     $consulta_mysql2=mysqli_query($conexion,"select * from usuarios where usuarios_id=".$_SESSION["id"]) or
     die("Problemas en el select:".mysqli_error($conexion));

while($reg2=mysqli_fetch_array($consulta_mysql2)){
$nombre=$reg2["usuarios_nombre"]." ".$reg2["usuarios_apellido1"]." ".$reg2["usuarios_apellido2"];

}

     if($nickErr=="" & $asuntoErr=="" & $mensajeErr=="" & $emailErr==""){



     	mysqli_query($conexion,"insert into preguntas(preguntas_asunto,preguntas_pregunta,preguntas_usuario,preguntas_nombre,preguntas_email) values
                            ('$_REQUEST[asunto]','$_REQUEST[mensaje]','$_REQUEST[nick]','$nombre','$_REQUEST[email]')")
       or die("Problemas en el select".mysqli_error($conexion));




     }
     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Envio de <b style="color: #f05f40;">mensajes</b></h2>
          <hr>
      </div>
      <div class="col-md-8 registro">



<ul class="registrado">
      <li><label for="nick" >Usuario:</label><?php echo " ".$nick = $_POST['nick'];?><span class="error"><?php echo "  ".$nickErr;?></span></li>
      <li><label for="nombre" >Nombre:</label><?php echo " ".$nombre;?></li>
      <li><label for="email" >E-mail:</label><?php echo " ".$email = $_POST['email'];?><span class="error"><?php echo "  ".$emailErr;?></span></li>
      <li><label for="asunto" >Asunto:</label><?php echo " ".$asunto = $_POST['asunto'];?> <span class="error"><?php echo "  ".$asuntoErr;?></span></li>
      <li><label for="mensaje" >Mensaje:</label><?php echo " ".$mensaje = $_POST['mensaje'];?><span class="error"><?php echo "  ".$mensajeErr;?></span></li>



    </ul>
    </div>
</div>


      <br>

  <div class="col-md-12 text-center">
            <?php



            if($nickErr=="" & $asuntoErr=="" & $mensajeErr=="" & $emailErr==""){

            echo "<img  src='img/enviado.png'>";
            echo "<h3 class='envio'> El mensaje ha sido enviado correctamente. </h3>";
            echo "<h4 class='envio'> Le responderemos lo antes posible, muchas gracias. </h4>";

            }else{
            echo "<h3 style=color:red> El mensaje no se envio. </h3>";
            ?>
            <script  type="text/javascript">

/*
              setTimeout("redirigir()", 2000);


            function redirigir(){
              window.location="registro.php";
            }
            */
            </script>

            <?php
            }
             mysqli_close($conexion);
            ?>
      <br>
</div>


<br>
