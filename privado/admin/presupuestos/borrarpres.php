


  <br><br>
  <br><br>
  <div class="container">
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Borrado  de <b style="color: #f05f40;">presupuesto</b></h2>
    <hr class="primary">
    <p>


    </p>

  <?php




             require_once('biblioteca/conexion.php');
             $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
               mysqli_set_charset($conexion,"utf8");



               mysqli_query($conexion,"delete from presupuestos where presupuestos_id='".$_REQUEST["presupuestos_id"]."'")
               or die("Problemas en el select".mysqli_error($conexion));


?>

<br><br><br>







<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> El presupuesto  ha sido eliminado correctamente
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
