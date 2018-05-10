<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


$pagado=$pago=$observaciones="";
$pagadoErr=$pagoErr=$observacionesErr="";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["pago"])) {
    $pagoErr = "Pago obligatorio";
  } else {
$pago = test_input($_POST["pago"]);
if (!preg_match("/^[0-9,.]*$/",$pago)) {
  $pagoErr = "Solo numeros y ,. ";
}
}


                 $observaciones = test_input($_POST["observaciones"]);
                 if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$observaciones)) {
                   $observacionesErr = "Solo letras y espacio en blanco";
                 }

     }



     $consulta_mysql2=mysqli_query($conexion,"select * from encargos where encargos_id='".$_POST["encargo"]."'") or
     die("Problemas en el select:".mysqli_error($conexion));

     while($reg2=mysqli_fetch_array($consulta_mysql2)){
$encargoPagado=$reg2["encargos_pagos"];
$encargoHonorarios=$reg2["encargos_honorarios"];
$falta=$encargoHonorarios-$encargoPagado;
       if($_POST["pago"]>$falta){
     $pagadoErr="La cantidad a pagar no puede superar el total de honorarios";
   }
}


     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }


     if($pagadoErr=="" & $pagoErr=="" & $observacionesErr==""){



     	mysqli_query($conexion,"insert into pagos(pagos_usuario,pagos_encargo,pagos_observaciones,pagos_cantidad) values
                            ('$_POST[usuarios]','$_POST[encargo]','$_POST[observaciones]','$_POST[pago]')")
       or die("Problemas en el select".mysqli_error($conexion));

$pagado=$_POST["pagado"];
$pago=$_POST["pago"];
$totalpagado=$pagado+$pago;
                mysqli_query($conexion, "update encargos set encargos_pagos='$totalpagado' where encargos_id='$_REQUEST[encargo]'") or die("Problemas en el select:".mysqli_error($conexion));


}
     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Registro de <b style="color: #f05f40;">pago</b></h2>
          <hr>
      </div>
      <div class="col-md-8 registro">



<ul class="registrado">

<li><label for="cliente" >Cliente:</label><?php echo " ". $_POST['nombre']?></li>
<li><label for="trabajo" >Tipo de encargo:</label><?php echo " ".$_POST['trabajos'];?> </li>
<li><label for="honorarios" >Honorarios:</label><?php echo " ".$_POST['honorarios']." €";?></li>
<li><label for="pagodo" >Pagado:</label><?php echo " ".$_POST['pagado']." €";?><span class="error"><?php echo "  ".$pagadoErr;?></span></li>
<li><label for="pago" >Pago realizado:</label><?php echo " ".$_POST['pago']." €";?><span class="error"><?php echo "  ".$pagoErr;?></span></li>
<li><label for="observaciones" >Observaciones:</label><?php echo " ".$observaciones = $_POST['observaciones'];?><span class="error"><?php echo "  ".$observacionesErr;?></span></li>



    </ul>
    </div>
</div>


      <br>

  <div class="container text-center">
            <?php



            if($pagadoErr=="" & $pagoErr=="" & $observacionesErr==""){
?>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> El pago se a registrado correctamente.
  </div>
<?php
}else if($pagadoErr!=""){

?>
<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> El pago no se a registrado. Ha sobrepasado los honorarios.
  </div>
<?php

          }else{
?>


<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> El pago no se registro.
  </div>

            <?php
            }
             mysqli_close($conexion);
            ?>
      <br>
</div>


<br>
