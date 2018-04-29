
<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


$nick=$asunto=$mensaje=$respuesta="";
$nickErr=$asuntoErr=$mensajeErr=$respuestaErr="";
$nombre="";

$nick=$_SESSION['usuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {



     if (empty($_POST["respuesta"])) {
         $respuestaErr = "Mensaje obligatorio";
       } else {
         $respuesta = test_input($_POST["respuesta"]);
         if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$respuesta)) {
           $respuestaErr = "Solo letras y espacio en blanco";
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
$fecha_actual = date("Y-m-d");
     if($nickErr=="" & $asuntoErr=="" & $mensajeErr=="" & $respuestaErr==""){





       mysqli_query($conexion, "update preguntas set preguntas_respondida='1',preguntas_respuesta='$_REQUEST[respuesta]', preguntas_fecha_respuesta='$fecha_actual', preguntas_atendido='$_SESSION[usuario]'
                               where preguntas_id='$_REQUEST[preguntas_id]'") or die("Problemas en el select:".mysqli_error($conexion));







                                                              $para = $_REQUEST["email"];
                                                              $titulo = 'Gracias por contactar con arquitecto tecnico - Trebujena '.$_REQUEST['nombre'];
                                                              $mensaje=

                                                              '<html>

                                                              <head>
                                                                  <meta charset="UTF-8">
                                                                  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                                                                  <title>Respuesta pregunta</title>

                                                              </head>


                                                              <body Style="background-color: #282f35; font-family:Century Gothic;">

                                                                      <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                                                                              <h2 style="text-align: center;font-weight: BOLD;">Respuesta al mensaje</h2>
                                                                              <hr Style="border: 2px solid #f05f40;  width:7%;">
                                                                              <h4 Style="text-align:center">Hola gracias por contactar con nosotros, adjuntamos la respuesta al mensaje enviado.</h4>




                                                                                    <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                                                                                         <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="https://www.arquitecto-tecnico-trebujena.es" ><b style="color:#f05f40;">a</b>rquitecto tecnico-Trebujena</a></div><br>
                                                                                         <h4><u>Este es el asunto del mensaje enviado:</u></h4>
                                                                                           <p>'.$_REQUEST['asunto'].'</p>
                                                                                           <h4><u>Este es el mensaje enviado:</u></h4>
                                                                                             <p>'.$_REQUEST['mensaje'].'</p>
                                                                                             <h4<u>>Esta es su respuesta:</u></h4>
                                                                                               <p>'.$_REQUEST['respuesta'].'</p>
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













     }
     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Envio de <b style="color: #f05f40;">respuesta</b></h2>
          <hr>
      </div>
      <div class="col-md-8 registro">



<ul class="registrado">
      <li><label for="nick" >Usuario:</label><?php echo " ".$nick = $_POST['nick'];?><span class="error"><?php echo "  ".$nickErr;?></span></li>
      <li><label for="nombre" >Nombre:</label><?php echo " ".$_POST['nombre'];?></li>
      <li><label for="email" >E-mail:</label><?php echo " ".$email = $_POST['email'];?></li>
      <li><label for="asunto" >Asunto:</label><?php echo " ".$asunto = $_POST['asunto'];?> <span class="error"><?php echo "  ".$asuntoErr;?></span></li>
      <li><label for="mensaje" >Mensaje:</label><?php echo " ".$mensaje = $_POST['mensaje'];?><span class="error"><?php echo "  ".$mensajeErr;?></span></li>

      <li><label for="respuesta" >Respuesta:</label><?php echo " ".$respuesta = $_POST['respuesta'];?><span class="error"><?php echo "  ".$respuestaErr;?></span></li>
      <li><label for="asunto" >Fecha respuesta:</label><?php echo " ".$fecha_actual; ?></li>
      <li><label for="atendido" >Atendido por:</label><?php echo " ".$nombre;?></li>


    </ul>
    </div>
</div>


      <br>

  <div class="col-md-12 text-center">
            <?php



            if($nickErr=="" & $asuntoErr=="" & $mensajeErr=="" & $respuestaErr==""){

            echo "<img  src='img/enviado.png'>";
            echo "<h3 class='envio'> La respuesta ha sido enviada correctamente. </h3>";
            echo "<h4 class='envio'> Gracias por responder lo antes posible. </h4>";

            }else{
            echo "<h3 style=color:red> La respuesta no se envio. </h3>";
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
