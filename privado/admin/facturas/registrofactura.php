<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


$year=$trimestre=$num=$total=$numfac=$trabajos=$observaciones="";
$yearErr=$trimestreErr=$numErr=$totalErr=$numfacErr=$trabajosErr=$observacionesErr="";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["year"])) {
      $yearErr = "year obligatorio";
    } else {
  $year = test_input($_POST["year"]);
  if (!preg_match("/^[0-9]*$/",$year)) {
    $yearErr = "Solo numeros ";
  }
}
  if (empty($_POST["trimestre"])) {
      $trimestreErr = "Trimestre obligatorio";
    } else {
  $trimestre= test_input($_POST["trimestre"]);
  if (!preg_match("/^[0-9]*$/",$trimestre)) {
    $trimestreErr = "Solo numeros ";
  }
}
if (empty($_POST["total"])) {
    $totalErr = "Total obligatorio";
  } else {
$total = test_input($_POST["total"]);
if (!preg_match("/^[0-9,.]*$/",$total)) {
  $totalErr = "Solo numeros y ,. ";
}
}


     if (empty($_POST["numfac"])) {
         $numfacErr = "Numero factura obligatorio";
       } else {
         $numfac= test_input($_POST["numfac"]);
         if (!preg_match("/^[0-9 -\/_]*$/",$numfac)) {
           $numfacErr = "Solo numeros y espacio en blanco";
         }
       }

       if (empty($_POST["trabajos"])) {
           $trabjosErr = "Tipo de trabajo obligatorio";
         } else {
           $trabajos= test_input($_POST["trabajos"]);
           if (!preg_match("/^[a-zñA-ZÑ0-9 -,.()\/'áéíóúüÁÉÍÓÚÜçÇàèìòùÀÈÌÒÙ]*$/",$trabajos)) {
             $trabajosErr = "Solo letras numeros y espacio en blanco";
           }
         }



                 $observaciones = test_input($_POST["observaciones"]);
                 if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$observaciones)) {
                   $observacionesErr = "Solo letras y espacio en blanco";
                 }

     }

$numerofac=$_POST["numfac"];

     $consulta_mysql2=mysqli_query($conexion,"select * from facturas where facturas_numero_factura='".$_POST["numfac"]."'") or
     die("Problemas en el select:".mysqli_error($conexion));

     while($reg2=mysqli_fetch_array($consulta_mysql2)){
       $num_total_registros = mysqli_num_rows($consulta_mysql2);
       if($num_total_registros!=0){
     $numfacErr="El numero de factura ya existe";
   }
}
$consulta_mysql3=mysqli_query($conexion,"select * from usuarios where usuarios_id='".$_POST["usuarios"]."'") or
die("Problemas en el select:".mysqli_error($conexion));

    while($reg3=mysqli_fetch_array($consulta_mysql3)){
      $direccion=$reg3["usuarios_direccion"];

$email=$reg3["usuarios_email"];
          $consulta_mysql5=mysqli_query($conexion,"select * from municipios where id='".$reg3["usuarios_poblacion"]."'") or
          die("Problemas en el select:".mysqli_error($conexion));

              while($reg5=mysqli_fetch_array($consulta_mysql5)){
                  $municipio=$reg5["municipio"];
              }
          $consulta_mysql6=mysqli_query($conexion,"select * from provincias where id='".$reg3["usuarios_provincia"]."'") or
          die("Problemas en el select:".mysqli_error($conexion));

              while($reg6=mysqli_fetch_array($consulta_mysql6)){
                  $provincia=$reg6["provincia"];
              }
    }
$consulta_mysql4=mysqli_query($conexion,"select * from usuarios where usuarios_id='".$_SESSION["id"]."'") or
die("Problemas en el select:".mysqli_error($conexion));

while($reg4=mysqli_fetch_array($consulta_mysql4)){

$direccionT=$reg4["usuarios_direccion"];

        $consulta_mysql7=mysqli_query($conexion,"select * from municipios where id='".$reg4["usuarios_poblacion"]."'") or
        die("Problemas en el select:".mysqli_error($conexion));

              while($reg7=mysqli_fetch_array($consulta_mysql7)){
                  $municipioT=$reg7["municipio"];
              }
        $consulta_mysql8=mysqli_query($conexion,"select * from provincias where id='".$reg4["usuarios_provincia"]."'") or
        die("Problemas en el select:".mysqli_error($conexion));

              while($reg8=mysqli_fetch_array($consulta_mysql8)){
                  $provinciaT=$reg8["provincia"];
                }
}
$aleatorio=rand();
$numeroFactura=$_POST['numfac'];
$file ='documentos/facturas/factura_'.$_POST['numfac'].'.pdf';
$nombre=$_POST["nombre"]." ".$_POST["apellido1"]." ".$_POST["apellido2"];


$html='
<html>
<style>
html {
margin: 0;
}
body {

margin: 10mm 10mm -15mm 10mm;
}
p{
  LINE-HEIGHT:10px;
}
table {

border-collapse: collapse;
width:100%;
 margin-top:-0.2%;
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
    padding:1% 1%;
    height:60mm;
}

</style>
<body style="font-family:Helvetica;">

<div style="width:100%;">

  <div style="color:blue;">
    <h3 style="text-align:right;margin-top:-2%;">FACTURA</h3>
  </div>

  <div style="width:100%; border:2px solid red;margin:-5% 0% 0% 0%;height:3mm;background-color:red;"></div>


<!--Datos tecnico -->
<div style=" width:45%; margin:3% 0% 0% 0%; float:left;background-color:rgb(217, 227, 252);">
<div style="height:5mm;background-color:rgb(14, 34, 215);"></div>
<div style="padding-left:4%;">
<p><b>'.$_POST['nombreT'].' '.$_POST['apellido1T'].' '.$_POST['apellido2T'].'</b></p>
<p>'.$direccionT.'</p>
<p>'.$municipioT.' ('.$provinciaT.')</p>
<p>'.$_POST['nifT'].'</p>
</div>
</div>


<!--Datos cliente -->
<div style=" width:45%; margin:0% 0% 0% 10%; float:left;background-color:rgb(217, 227, 252);">
<div style="height:5mm;background-color:rgb(14, 34, 215);padding-left:1%;"><spam style="color:white; font-size:0.9em; margin:10% 0 0 4%;"><b>DATOS CLIENTE</b></spam></div>
<div style="padding-left:4%;">
<p><b>'.$_POST['nombre'].' '.$_POST['apellido1'].' '.$_POST['apellido2'].'</b></p>
<p>'.$direccion.'</p>
<p>'.$municipio.' ('.$provincia.')</p>
<p>'.$_POST['nif'].'</p>
</div>
</div>

<!--Datos factura -->

<div style="width:25%;height:5mm;background-color:rgb(14, 34, 215); margin-top:15%;padding-left:1%;"><spam style="color:white; font-size:0.9em;"><b>FECHA FACTURA</b></spam></div>
<div style="width:20%;height:5mm;background-color:rgb(217, 227, 252);margin-top:-1.65%;margin-left:25%;"><spam style="font-size:0.9em; margin:10% 0 0 4%;">'.$_POST['fecha'].'</spam></div>

<div style="width:25%;height:5mm;background-color:rgb(14, 34, 215); margin-top:-2.4%;margin-left:55%;padding-left:1%;"><spam style="color:white; font-size:0.9em;"><b>Nº FACTURA</b></spam></div>
<div style="width:20%;height:5mm;background-color:rgb(217, 227, 252);margin-top:-2.4%;margin-left:80%;"><spam style="font-size:0.9em; margin:10% 0 0 4%;">'.$_POST['numfac'].'</spam></div>




<div style="width:100%; border:2px solid red;margin:3.5% 0% 0% 0%;height:3mm;background-color:red;"></div>

<div style="width:100%;margin:3% 0% 0% 0%;height:3mm;background-color:rgb(14, 34, 215)"></div>
<table>

  <tr>
  <th style="width:50%;">CONCEPTO</th>
  <th style="width:15%;">CANTIDAD</th>
  <th style="width:15%;">PRECIO UD.</th>
  <th style="width:20%;">TOTAL</th>
</tr>

</table>
<br>
<table>
<tr>
<td style="width:50%;">'.$_POST['trabajos'].'</td>
<td style="width:15%;">1</td>
<td style="width:15%;">'.$_POST['honorarios'].' €</td>
<td style="width:20%;">'.$_POST['honorarios'].' €</td>

</tr>

</table>
  <br>
<table>
<tr>
<th style="width:50%;">IMPORTE</th>
<th style="width:15%;">21% IVA</th>
<th style="width:15%;">19% IRPF</th>
<th style="width:20%;">SUBTOTAL</th>
</tr>

<tr>
<td style="width:50%; padding:0%; height:5mm;">'.$_POST['honorarios'].' €</td>
<td style="width:15%; padding:0%; height:5mm;">'.$_POST['iva'].' €</td>
<td style="width:15%; padding:0%; height:5mm;">'.$_POST['irpf'].' €</td>
<td style="width:15%; padding:0%; height:5mm;">'.$_POST['total'].' €</td>

</tr>


</table>

<br><br>
<div style="padding-left:50%;">
<table style="border: 2px solid red;width:100%;">
  <tr>
  <th style="border-right:2px solid red;width:25%;">TOTAL</th>
  <th style="width:25%;">'.$_POST['total'].' €.</th>
</tr>

</table>
</div>
<br>
<table>
<tr>
<th style="width:100%;background-color:rgb(14, 34, 215);text-align:left;color:white;">OBSERVACIONES</th>
</tr>
<tr>
<td style="width:100%; height:12mm; padding:1%;text-align:left;">'.$_POST['observaciones'].'</td>

</tr>

</table>
<br>
<div style="width:100%; border:2px solid red;margin:7% 0% 0% 0%;height:3mm;background-color:red;"></div>


<div style="text-align:center;width:100%;font-size:0.8em;margin-top:0%;margin-bottom:0.5%;">
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
//$dompdf->stream('factura_'.$_POST["numfac"].'.pdf');
$pdf = $dompdf->output();
file_put_contents("documentos/facturas/factura_".$_POST["numfac"].".pdf", $pdf);


     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }


     if($yearErr=="" & $trimestreErr=="" & $numErr=="" & $totalErr=="" & $numfacErr=="" & $trabajosErr=="" & $observacionesErr==""){




     	mysqli_query($conexion,"insert into facturas(facturas_tecnico,facturas_cliente,facturas_encargo,facturas_fecha,facturas_observaciones,facturas_year,facturas_trimestre,facturas_num,facturas_honorarios,facturas_iva,facturas_irpf,facturas_total,facturas_numero_factura,facturas_pdf) values
                            ('$_SESSION[id]','$_POST[usuarios]','$_POST[encargo]','$_POST[fecha]','$_POST[observaciones]','$_POST[year]','$_POST[trimestre]','$_POST[num]','$_POST[honorarios]','$_POST[iva]','$_POST[irpf]','$_POST[total]','$_POST[numfac]','$file')")
       or die("Problemas en el select".mysqli_error($conexion));




       	include "biblioteca/PHPMailer/class.phpmailer.php";
       	include "biblioteca/PHPMailer/class.smtp.php";
       	$email_user = "info@arquitecto-tecnico-trebujena.es";
       	$email_password = "16del6del81";
       	$the_subject = "Envio factura";
       	$address_to = "$email";
       	$from_name = "$nombre";
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

                        <h2 style="text-align: center;font-weight: BOLD;">Envio de factura</h2>
                        <hr Style="border: 2px solid #f05f40;  width:7%;">
                        <h4 Style="text-align:center">Hola gracias por confiar en nosotros, adjunto esta la factura de los trabajos realizados, si no puede verlo pongase en contacto con nosotros.</h4>




                              <div Style="  height:320px;  border:2px solid #f05f40;  margin-left: auto; text-align: center;background-color: white;color:black;">

                                   <div Style=" background-color:#282f35; height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: #282f35; border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="https://www.arquitecto-tecnico-trebujena.es" ><b style="color:#f05f40;">a</b>rquitecto tecnico-Trebujena</a></div><br>

                                       <h4><u>Factura para:</u></h4>
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
         $phpmailer->AddAttachment($file,"Factura");
       	$phpmailer->Send();

       # Contenido HTML del documento que queremos generar en PDF.


}
     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Registro de <b style="color: #f05f40;">factura</b></h2>
          <hr>
      </div>
      <div class="col-md-8 registro">



<ul class="registrado">
<li><label for="tecnico" >Tecnico:</label><?php echo " ". $_POST['nombreT']." ".$_POST['apellido1T']." ".$_POST['apellido2T'];?></li>
<li><label for="cliente" >Cliente:</label><?php echo " ". $_POST['nombre']." ".$_POST['apellido1']." ".$_POST['apellido2'];?></li>
<li><label for="trabajo" >Tipo de encargo:</label><?php echo " ".$trabajos = $_POST['trabajos'];?> <span class="error"><?php echo "  ".$trabajosErr;?></span></li>
<li><label for="fecha" >Fecha:</label><?php echo " ".$_POST['fecha'];?></li>
<li><label for="numfac" >Numero de Factura:</label><?php echo " ".$numfac = $_POST['numfac'];?> <span class="error"><?php echo "  ".$numfacErr;?></span></li>
<li><label for="honorarios" >Honorarios:</label><?php echo " ".$_POST['honorarios']." €";?></li>
<li><label for="iva" >IVA:</label><?php echo " ".$_POST['iva']." €";?></li>
<li><label for="irpf" >IRPF:</label><?php echo " ".$_POST['irpf']." €";?></li>
<li><label for="total" >Total:</label><?php echo " ".$_POST['total']." €";?><span class="error"><?php echo "  ".$totalErr;?></span></li>
<li><label for="observaciones" >Observaciones:</label><?php echo " ".$observaciones = $_POST['observaciones'];?><span class="error"><?php echo "  ".$observacionesErr;?></span></li>



    </ul>
    </div>
</div>


      <br>

  <div class="container text-center">
            <?php



            if($yearErr=="" & $trimestreErr=="" & $numErr=="" & $totalErr=="" & $numfacErr=="" & $trabajosErr=="" & $observacionesErr==""){
?>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> La factura se genero correctamente.
  </div>




<a href="<?php echo $file; ?>" target="_blank"><button type="button" name="button" class="btn btn-contact submit btn btn-primary btn-xl" style="color:white"> Descargar factura</button></a>


<?php
}else if($numfacErr!=""){

?>
<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> La factura no se ha generado. El numero de factura ya existe
  </div>
<?php

          }else{
?>


<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> La factura no se ha generado.
  </div>

            <?php
            }
             mysqli_close($conexion);
            ?>
      <br>
</div>


<br>
