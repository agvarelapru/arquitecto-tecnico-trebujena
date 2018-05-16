
<?php
# Contenido HTML del documento que queremos generar en PDF.
$nombre="Angel Varela";
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

<p style="LINE-HEIGHT:20px;margin:1% 1% 0% 2%;">Presupuesto de redaccion de proyecto de ejecucion de de vivienda unifamiliar entre medianeras y estudio basico de suguridad y salud mas direccion de obras y coordinacion de suguridad y salud, sito en C/ Ramon y Cajal, 1 de Trebujena (Cadiz)</p>
<table style="border:0 solid white;text-align:left;margin:0% 1% 0% 1%;">
<tr>
<td style="width:50%;text-align:left;border:0 solid white;padding:0 0 0 3%"><p style="LINE-HEIGHT:20px;"><u>Promotor:</u></p></td>
<td style="width:50%;text-align:left;border:0 solid white;padding:0 0 0 3%"><p style="LINE-HEIGHT:20px;"><u>Nif:</u></p></td>
</tr>

</table>
<p style="LINE-HEIGHT:20px;margin-left:2%;margin-top:0%;"><u>Superficie construida:</u></p>
<p style="LINE-HEIGHT:20px;margin-left:2%;margin-top:-1%;"><u>Presupuesto de ejecucion:</u></p>



</div>



<h4><u>PRESUPUESTO</u></h4>
<div style="width:100%; margin:-1% 0% 0% 0%;border:1px solid rgb(14, 34, 215);height:80mm;">

<p style="LINE-HEIGHT:20px;margin-left:2%;"><u>Fecha:</u></p>
<p style="LINE-HEIGHT:20px;margin-left:2%;"><u>Se redacta el presente presupuesto para los siguientes trabajos:</u></p>
<p style="LINE-HEIGHT:20px;margin-left:2%;">- Direccion de ejecucion de obras</p>




<h4 style="margin-left:2%;"><u>PRESUPUESTO TOTAL DE TRABAJOS TECNICOS:</u></h4>
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
<td style="width:100%; height:20mm; padding:2%;text-align:left;"></td>

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


require_once 'dompdf/autoload.inc.php';
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
$dompdf->stream();



?>
