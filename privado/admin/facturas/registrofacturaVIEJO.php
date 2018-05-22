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
         if (!preg_match("/^[0-9 -\/]*$/",$numfac)) {
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



     $consulta_mysql2=mysqli_query($conexion,"select * from facturas where facturas_numero_factura='".$_POST["numfac"]."'") or
     die("Problemas en el select:".mysqli_error($conexion));

     while($reg2=mysqli_fetch_array($consulta_mysql2)){
       $num_total_registros = mysqli_num_rows($consulta_mysql2);
       if($num_total_registros!=0){
     $numfacErr="El numero de factura ya existe";
   }
}


     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }


     if($yearErr=="" & $trimestreErr=="" & $numErr=="" & $totalErr=="" & $numfacErr=="" & $trabajosErr=="" & $observacionesErr==""){



     	mysqli_query($conexion,"insert into facturas(facturas_tecnico,facturas_cliente,facturas_encargo,facturas_fecha,facturas_observaciones,facturas_year,facturas_trimestre,facturas_num,facturas_honorarios,facturas_iva,facturas_irpf,facturas_total,facturas_numero_factura) values
                            ('$_SESSION[id]','$_POST[usuarios]','$_POST[encargo]','$_POST[fecha]','$_POST[observaciones]','$_POST[year]','$_POST[trimestre]','$_POST[num]','$_POST[honorarios]','$_POST[iva]','$_POST[irpf]','$_POST[total]','$_POST[numfac]')")
       or die("Problemas en el select".mysqli_error($conexion));


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
