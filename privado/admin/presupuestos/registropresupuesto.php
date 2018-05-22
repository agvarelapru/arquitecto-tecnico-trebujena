<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


$nombre=$nif=$trabajo=$superficie=$pem=$honorarios=$observaciones=$email="";
$nombreErr=$nifErr=$trabajoErr=$superficieErr=$pemErr=$honorariosErr=$observacionesErr=$emailErr="";
$nombre="";

$nombre=$_REQUEST['nombre'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $nombre = test_input($_POST["nombre"]);
  if (!preg_match("/^[a-zñA-ZÑ0-9 -.,]*$/",$nombre)) {
    $nombreErr = "Solo letras, numeros y espacio en blanco";
  }

  $nif = test_input($_POST["nif"]);
  if (!preg_match("/^[a-zñA-ZÑ0-9 -]*$/",$nif)) {
    $nifErr = "Solo letras, numeros y espacio en blanco";
  }




     if (empty($_POST["trabajos"])) {
         $trabajoErr = "Tipo de trabajo obligatorio";
       } else {
         $trabajo = test_input($_POST["trabajos"]);
         if (!preg_match("/^[a-zñA-ZÑ0-9 -\/(),.]*$/",$trabajo)) {
           $trabajoErr = "Solo letras y espacio en blanco";
         }
       }
       if (empty($_POST["superficie"])) {
           $superficieErr = "Superficie obligatoria";
         } else {
           $superficie = test_input($_POST["superficie"]);
           if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$superficie)) {
             $superficieErr = "Solo letras y espacio en blanco";
           }
         }

         if (empty($_POST["pem"])) {
             $pemErr = "PEM obligatorio";
           } else {
             $pem = test_input($_POST["pem"]);
             if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$pem)) {
               $pemErr = "Solo letras y espacio en blanco";
             }
           }

           if (empty($_POST["honorarios"])) {
               $honorariosErr = "Honorarios obligatorio";
             } else {
               $honorarios = test_input($_POST["honorarios"]);
               if (!preg_match("/^[0-9]*$/",$honorarios)) {
                 $honorariosErr = "Solo numeros";
               }
             }




                 $observaciones = test_input($_POST["observaciones"]);
                 if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$observaciones)) {
                   $observacionesErr = "Solo letras y espacio en blanco";
                 }





      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato invalido de email";
      }
     }




$aleatorio=rand();
     $fecha=date("d-m-Y");
$file="documentos/presupuestos/Presupuesto_".$aleatorio."_".$fecha.".pdf";

            $html='
            <html>
            <head>
              <meta charset="utf-8">
              <title>factura pdf</title>
              <style>
              html {
              margin: 0;
              }
              body {

              margin: 5mm 10mm -15mm 10mm;
              }
              p{
                LINE-HEIGHT:10px;
              }
            table {

              border-collapse: collapse;
            width:100%;
            margin-top:-0.2%;
            border:1px solid rgb(14, 34, 215);
            }

            th {
              border: 1px solid rgb(14, 34, 215);
              text-align: center;
              padding:2px;
              background-color: rgb(217, 227, 252);
            }
            td{
              border: 1px solid rgb(14, 34, 215);
              text-align: center;
              padding:2% 1%;
            }
            </style>
            </head>
            <body style="font-family:Helvetica;">

            <div style="width:100%;">

              <div style="color:blue;margin-top:-1%;">
                <h3 style="text-align:right;">PRESUPUESTO</h3>
              </div>

              <div style="width:100%;margin:-1.5% 0% 0% 0%;height:3mm;background-color:red;"></div>


              <div style="text-align:center;width:100%;margin-top:0%;letter-spacing: 2px;">
                <h4>ANGEL VARELA PRUAÑO - ARQUITECTO TECNICO - COAAT-SE 7279</h4>
              <h5>C/ Ramon y Cajal, nº 1. Trebujena (Cadiz).</h5>
              <h5> Tfno: 605884603 - Email: info@arquitecto-tecnico-trebujena.es</h5>
              </div>
            <div style="width:100%; margin:2% 0% 0% 0%;height:3mm;background-color:red;"></div>


            <h4><u>DATOS DE LA OBRA</u></h4>
            <div style="width:100%; margin:-1% 0% 0% 0%;border:1px solid rgb(14, 34, 215);">

            <p style="LINE-HEIGHT:20px;margin:1% 1% 0% 2%;">'.$_POST["trabajos"].'</p>
            <table style="border:0 solid white;text-align:left;margin:0% 1% 0% 1%;">
            <tr>
            <td style="width:50%;text-align:left;border:0 solid white;padding:0 0 0 3%"><p style="LINE-HEIGHT:20px;"><u>Promotor:</u> '.$_POST["nombre"].'</p></td>
            <td style="width:50%;text-align:left;border:0 solid white;padding:0 0 0 3%"><p style="LINE-HEIGHT:20px;"><u>Nif:</u> '.$_POST["nif"].'</p></td>
            </tr>

            </table>
            <p style="LINE-HEIGHT:20px;margin-left:2%;margin-top:0%;"><u>Superficie construida:</u> '.$_POST["superficie"].' m2</p>
            <p style="LINE-HEIGHT:20px;margin-left:2%;margin-top:-1%;"><u>Presupuesto de ejecucion:</u> '.$_POST["pem"].' €</p>



            </div>



            <h4><u>PRESUPUESTO</u></h4>
            <div style="width:100%; margin:-1% 0% 0% 0%;border:1px solid rgb(14, 34, 215);height:80mm;">

            <p style="LINE-HEIGHT:20px;margin-left:2%;"><u>Fecha: '.$fecha.'</u></p>
            <p style="LINE-HEIGHT:20px;margin-left:2%;"><u>Se redacta el presente presupuesto para los siguientes trabajos:</u></p>
            <p style="LINE-HEIGHT:20px;margin-left:2%;">'.$_POST["detallesTrabajos"].'</p>




            <h4 style="margin-left:2%;"><u>PRESUPUESTO TOTAL DE TRABAJOS TECNICOS: '.$_POST["honorarios"].' €</u></h4>
            <p style="LINE-HEIGHT:20px;margin-left:2%;">IVA no incluido.</p>

            <p style="LINE-HEIGHT:20px;margin-left:2%;font-size:0.8em;margin-top:-2.5%;text-align:justify;">* Estaran incluidos en el precio los visados, los honorarios profesionales, las certificaciones, certificado final de obras, etc.</p>
            <p style="LINE-HEIGHT:20px;margin-left:2%;font-size:0.8em;margin-top:-3%;margin-bottom:1%;">* Se realizara una entrega del 30 % a la aceptacion del presupuesto, hasta el 90% en la entrega de los documentos visados y el 10 % restante en la solicitud del final de obras.</p>

            </div>



            <br>

            <br>
            <table>
            <tr>
            <th style="width:100%;background-color:rgb(14, 34, 215);text-align:left;color:white;">OBSERVACIONES</th>
            </tr>
            <tr>
            <td style="width:100%; height:20mm; padding:2%;text-align:left;"> '.$_POST["observaciones"].'</td>

            </tr>

            </table>

            <div style="width:100%; border:2px solid red;margin:3% 0% 0% 0%;height:3mm;background-color:red;"></div>


            <div style="text-align:center;width:100%;font-size:0.8em;margin-top:0%;">
            <p>ANGEL VARELA PRUAÑO - ARQUITECTO TECNICO</p>
            <p>C/ Ramon y Cajal, nº 1. Trebujena (Cadiz). Tfno: 605884603 - Email: info@arquitecto-tecnico-trebujena.es</p>
            </div>


              </div>

            </body>

            </html>';


            require_once 'biblioteca/dompdf/autoload.inc.php';
            // reference the Dompdf namespace
            use Dompdf\Dompdf;

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html,'UTF-8');

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            //$dompdf->stream();
            $pdf = $dompdf->output();
            file_put_contents($file, $pdf);







     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }


     if($nombreErr=="" & $nifErr=="" & $trabajoErr=="" & $superficieErr=="" & $pemErr=="" & $honorariosErr=="" & $observacionesErr=="" & $emailErr==""){



     	mysqli_query($conexion,"insert into presupuestos(presupuestos_nombre,presupuestos_nif,presupuestos_encargo,presupuestos_superficie,presupuestos_pem,presupuestos_honorarios,presupuestos_email,presupuestos_observaciones,presupuestos_pdf) values
                            ('$_REQUEST[nombre]','$_REQUEST[nif]','$_REQUEST[trabajos]','$_REQUEST[superficie]','$_REQUEST[pem]','$_REQUEST[honorarios]','$_REQUEST[email]','$_REQUEST[observaciones]','$file')")
       or die("Problemas en el select".mysqli_error($conexion));



	include "biblioteca/PHPMailer/class.phpmailer.php";
	include "biblioteca/PHPMailer/class.smtp.php";
	$email_user = "info@arquitecto-tecnico-trebujena.es";
	$email_password = "16del6del81";
	$the_subject = "Envio presupuesto";
	$address_to = "$_POST[email]";
	$from_name = "arquitecto tecnico - Trebujena";
	$phpmailer = new PHPMailer();
	// ---------- datos de la cuenta de Gmail -------------------------------
	$phpmailer->Username = $email_user;
	$phpmailer->Password = $email_password;
	//-----------------------------------------------------------------------
	// $phpmailer->SMTPDebug = 1;
	$phpmailer->SMTPSecure = 'ssl';
	$phpmailer->Host = "send.one.com"; // GMail
	$phpmailer->Port = 465;
	$phpmailer->IsSMTP(); // use SMTP
	$phpmailer->SMTPAuth = true;
	$phpmailer->setFrom($phpmailer->Username,$from_name);
	$phpmailer->AddAddress($address_to); // recipients email
	$phpmailer->Subject = $the_subject;
  $body='<body Style="background-color: #282f35; font-family:Century Gothic;">

         <div Style=" background-color: #282f35; margin-top:20px;padding-top: 10px; padding-bottom: 3%; padding-right: 2.5%; padding-left: 2.5%; width: 90%;    margin-left:2.5%; margin-right:2.5%; color:white">

                 <h2 style="text-align: center;font-weight: BOLD;">Envio de presupuesto</h2>
                 <hr Style="border: 2px solid #f05f40;  width:7%;">
                 <h4 Style="text-align:center">Hola gracias por confiar en nosotros, adjunto esta el presupuesto solicitado, si no puede verlo pongase en contacto con nosotros.</h4>




                       <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                            <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="https://www.arquitecto-tecnico-trebujena.es" ><b style="color:#f05f40;">a</b>rquitecto tecnico-Trebujena</a></div><br>

                                <h4><u>Presupuesto para:</u></h4>
                                <h4>'.$_POST['nombre'].'</h4>
                             </div>



     </div>
     <div Style="width:90%; margin-left:5%">
     <hr Style="border: 2px solid #f05f40; border-radius: 0px /0px;">
     <p Style="text-align:justify; color:rgb(94, 91, 91); "> Este correo electrónico contiene información confidencial. Cualquier reproducción, distribución o divulgación de su contenido están estrictamente prohibidos.Si no eres el destinatario indicado en el mismo y recibes este correo electrónico, te ruego me lo notifiques de inmediato a la dirección agvarelapru@gmail.com y destruyas el mensaje recibido sin obtener copia del mismo, ni distribuirlo, ni revelar su contenido. Angel Varela Pruaño no se hace responsable del mal uso de esta información.
       </p>


     <p Style="text-align:justify; color:rgb(94, 91, 91);" >  Information in this message is confidential and may be legally privileged. It is intended solely for the person to whom it is addressed. If you are not the intended recipient, please notify the sender agvarelapru@gmail.com and please delete the message from your system immediately.
       </p>
     </div></body>';



	$phpmailer->Body =$body;
	$phpmailer->IsHTML(true);
<<<<<<< HEAD
  $phpmailer->AddAttachment($file,"Presupuesto.pdf");
=======
  $phpmailer->AddAttachment($file,"Presupuesto");
>>>>>>> 38d4c6892f79d6bfacc164e9e0e80915f72ceebc
	$phpmailer->Send();

     }
     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Registro de <b style="color: #f05f40;">presupuestos</b></h2>
          <hr>
      </div>
      <div class="col-md-8 registro">



<ul class="registrado">
    <li><label for="nombre" >Nombre:</label><?php echo " ".$nombre= $_POST['nombre'];?><span class="error"><?php echo "  ".$nombreErr;?></span></li>
      <li><label for="nif" >NIF:</label><?php echo " ".$nif = $_POST['nif'];?><span class="error"><?php echo "  ".$nifErr;?></span></li>
<li><label for="trabajo" >Tipo de trabajo:</label><?php echo " ".$trabajo = $_POST['trabajos'];?> <span class="error"><?php echo "  ".$trabajoErr;?></span></li>
<li><label for="superficie" >Superficie:</label><?php echo " ".$superficie= $_POST['superficie'];?> <span class="error"><?php echo "  ".$superficieErr;?></span></li>
<li><label for="pem" >PEM:</label><?php echo " ".$pem = $_POST['pem'];?> <span class="error"><?php echo "  ".$pemErr;?></span></li>
<li><label for="honorarios" >Honorarios:</label><?php echo " ".$honorarios = $_POST['honorarios'];?> <span class="error"><?php echo "  ".$honorariosErr;?></span></li>
<li><label for="email" >E-mail:</label><?php echo " ".$email = $_POST['email'];?><span class="error"><?php echo "  ".$emailErr;?></span></li>
<li><label for="observaciones" >Observaciones:</label><?php echo " ".$observaciones = $_POST['observaciones'];?><span class="error"><?php echo "  ".$observacionesErr;?></span></li>



    </ul>
    </div>
</div>


      <br>

  <div class="container text-center">
            <?php



            if($nombreErr=="" & $nifErr=="" & $trabajoErr=="" & $superficieErr=="" & $pemErr=="" & $honorariosErr=="" & $observacionesErr=="" & $emailErr==""){
?>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> El presupuesto se registro correctamente.
  </div>


  <a href="<?php echo $file; ?>" target="_blank"><button type="button" name="button" class="btn btn-contact submit btn btn-primary btn-xl" style="color:white"> Descargar presupuesto</button></a>




<?php
            }else{
?>


<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> El presupuesto no se ha registrado.
  </div>

            <?php
            }
             mysqli_close($conexion);
            ?>
      <br>
</div>


<br>
