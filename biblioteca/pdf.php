
<?php
/*require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,( file_get_contents( 'http://localhost/pruebapdf/prueba.php' ));

$pdf->Output();



# Cargamos la librería dompdf.
require_once 'dompdf/autoload.inc.php';
*/
# Contenido HTML del documento que queremos generar en PDF.
$nombre="Angel Varela";
$html='
<html>
<style>
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
    height:50mm;
}

</style>
<body style="font-family:Helvetica; margin:0;">

<div style="width:100%;">

  <div style="color:blue;">
    <h2 style="text-align:right;margin-top:-3%;">FACTURA</h2>
  </div>

  <div style="width:100%; border:2px solid red;margin:-5% 0% 0% 0%;height:3mm;background-color:red;"></div>


<!--Datos tecnico -->
<div style=" width:45%; margin:3% 0% 0% 0%; float:left;background-color:rgb(217, 227, 252);">
<div style="height:5mm;background-color:rgb(14, 34, 215);"></div>
<div style="padding-left:4%;">
<p><b>Angel Varela Pruaño</b></p>
<p>C/ Ramon y Cajal, 1</p>
<p>Trebujena (Cadiz)</p>
<p>44049151-B</p>
</div>
</div>








<!--Datos cliente -->
<div style=" width:45%; margin:0% 0% 0% 10%; float:left;background-color:rgb(217, 227, 252);">
<div style="height:5mm;background-color:rgb(14, 34, 215);padding-left:1%;"><spam style="color:white; font-size:0.9em; margin:10% 0 0 4%;"><b>DATOS CLIENTE</b></spam></div>
<div style="padding-left:4%;">
<p><b>Angel Varela Pruaño</b></p>
<p>C/ Ramon y Cajal, 1</p>
<p>Trebujena (Cadiz)</p>
<p>44049151-B</p>
</div>
</div>

<!--Datos factura -->

<div style="width:25%;height:5mm;background-color:rgb(14, 34, 215); margin-top:17%;padding-left:1%;"><spam style="color:white; font-size:0.9em;"><b>FECHA FACTURA</b></spam></div>
<div style="width:20%;height:5mm;background-color:rgb(217, 227, 252);margin-top:-1.95%;margin-left:25%;"><spam style="font-size:0.9em; margin:10% 0 0 4%;">16/06/2018</spam></div>

<div style="width:25%;height:5mm;background-color:rgb(14, 34, 215); margin-top:-2.4%;margin-left:55%;padding-left:1%;"><spam style="color:white; font-size:0.9em;"><b>Nº FACTURA</b></spam></div>
<div style="width:20%;height:5mm;background-color:rgb(217, 227, 252);margin-top:-2.4%;margin-left:80%;"><spam style="font-size:0.9em; margin:10% 0 0 4%;">2018/02-01</spam></div>




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
<td style="width:50%;">Proyecto de ejecucion de local comercial mas direccion de obras sita en Calle Palomares, 3 de Trebujena, (Cadiz)</td>
<td style="width:15%;">1</td>
<td style="width:15%;">1550 €</td>
<td style="width:20%;">1550 €</td>

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
<td style="width:50%; padding:0%; height:5mm;">1550 €</td>
<td style="width:15%; padding:0%; height:5mm;">310 €</td>
<td style="width:15%; padding:0%; height:5mm;">0 €</td>
<td style="width:15%; padding:0%; height:5mm;">1860 €</td>

</tr>


</table>

<br><br>
<div style="padding-left:50%;">
<table style="border: 2px solid red;width:100%;">
  <tr>
  <th style="border-right:2px solid red;width:25%;">TOTAL</th>
  <th style="width:25%;">1860 €.</th>
</tr>

</table>
</div>
<br>
<table>
<tr>
<th style="width:100%;background-color:rgb(14, 34, 215);text-align:left;color:white;">OBSERVACIONES</th>
</tr>
<tr>
<td style="width:100%; height:15mm; padding:2%;text-align:left;"></td>

</tr>

</table>

<div style="width:100%; border:2px solid red;margin:3% 0% 0% 0%;height:3mm;background-color:red;"></div>


<div style="text-align:center;width:100%;font-size:0.8em;margin-top:1%;">
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
//$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();



?>
