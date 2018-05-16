<?php


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
<p>'.$_POST["nifT"].'</p>
</div>
</div>


<!--Datos cliente -->
<div style=" width:45%; margin:0% 0% 0% 10%; float:left;background-color:rgb(217, 227, 252);">
<div style="height:5mm;background-color:rgb(14, 34, 215);padding-left:1%;"><spam style="color:white; font-size:0.9em; margin:10% 0 0 4%;"><b>DATOS CLIENTE</b></spam></div>
<div style="padding-left:4%;">
<p><b>'.$_POST['nombre'].' '.$_POST['apellido1'].' '.$_POST['apellido2'].'</b></p>
<p>'.$direccion.'</p>
<p>'.$municipio.' ('.$provincia.')</p>
<p>'.$_POST["nif"].'</p>
</div>
</div>

<!--Datos factura -->

<div style="width:25%;height:5mm;background-color:rgb(14, 34, 215); margin-top:15%;padding-left:1%;"><spam style="color:white; font-size:0.9em;"><b>FECHA FACTURA</b></spam></div>
<div style="width:20%;height:5mm;background-color:rgb(217, 227, 252);margin-top:-1.65%;margin-left:25%;"><spam style="font-size:0.9em; margin:10% 0 0 4%;">'.$_POST["fecha"].'</spam></div>

<div style="width:25%;height:5mm;background-color:rgb(14, 34, 215); margin-top:-2.4%;margin-left:55%;padding-left:1%;"><spam style="color:white; font-size:0.9em;"><b>Nº FACTURA</b></spam></div>
<div style="width:20%;height:5mm;background-color:rgb(217, 227, 252);margin-top:-2.4%;margin-left:80%;"><spam style="font-size:0.9em; margin:10% 0 0 4%;">'.$_POST["numfac"].'</spam></div>




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
<td style="width:50%;">'.$_POST["tipo"].'</td>
<td style="width:15%;">1</td>
<td style="width:15%;">'.$_POST["honorarios"].' €</td>
<td style="width:20%;">'.$_POST["honorarios"].' €</td>

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
<td style="width:50%; padding:0%; height:5mm;">'.$_POST["honorarios"].' €</td>
<td style="width:15%; padding:0%; height:5mm;">'.$_POST["iva"].' €</td>
<td style="width:15%; padding:0%; height:5mm;">'.$_POST["irpf"].' €</td>
<td style="width:15%; padding:0%; height:5mm;">'.$_POST["total"].' €</td>

</tr>


</table>

<br><br>
<div style="padding-left:50%;">
<table style="border: 2px solid red;width:100%;">
  <tr>
  <th style="border-right:2px solid red;width:25%;">TOTAL</th>
  <th style="width:25%;">'.$_POST["total"].' €.</th>
</tr>

</table>
</div>
<br>
<table>
<tr>
<th style="width:100%;background-color:rgb(14, 34, 215);text-align:left;color:white;">OBSERVACIONES</th>
</tr>
<tr>
<td style="width:100%; height:12mm; padding:2%;text-align:left;">'.$_POST["observaciones"].'</td>

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
$pdf = $dompdf->output();
file_put_contents('documento.pdf', $pdf);


?>
