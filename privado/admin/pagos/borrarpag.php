


  <br><br>
  <br><br>
  <div class="container">
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Borrado  de <b style="color: #f05f40;">pago</b></h2>
    <hr class="primary">
    <p>


    </p>

  <?php




             require_once('biblioteca/conexion.php');
             $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
               mysqli_set_charset($conexion,"utf8");


               $consulta_mysql=mysqli_query($conexion,"select * from pagos as p, encargos as e where e.encargos_id=p.pagos_encargo and p.pagos_id=".$_REQUEST["pago_id"]) or
               die("Problemas en el select:".mysqli_error($conexion));

               while($reg=mysqli_fetch_array($consulta_mysql)){
              $encargoPagado=$reg["encargos_pagos"];
  $cantidad=$reg["pagos_cantidad"];
$nuevaPagado=$encargoPagado-$cantidad;

mysqli_query($conexion, "update encargos set encargos_pagos='$nuevaPagado'
 where encargos_id='$reg[encargos_id]'") or die("Problemas en el select:".mysqli_error($conexion));


}





               mysqli_query($conexion,"delete from pagos where pagos_id='".$_REQUEST["pago_id"]."'")
               or die("Problemas en el select".mysqli_error($conexion));


?>

<br><br><br>







<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> El pago ha sido eliminado correctamente
  </div>


 </div>
 </div>




  <!-- Section Contact
  ================================================== -->



  <?php

  mysqli_close($conexion);


  ?>












</div>





<br><br><br><br><br><br><br><br><br>
