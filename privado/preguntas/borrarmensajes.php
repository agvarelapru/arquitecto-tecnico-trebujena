


  <br><br>
  <br><br>
  <div class="container">
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Borrado masivo de <b style="color: #f05f40;">mensajes</b></h2>
    <hr class="primary">
    <p>


    </p>

  <?php

  require_once('biblioteca/conexion.php');
  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
    mysqli_set_charset($conexion,"utf8");

  if(!empty($_REQUEST["tic"])){








               $checkbox=$_REQUEST['tic'];
               $numero = sizeof($checkbox);
               for($i=0;$i<$numero;$i++){
               $del_id = $checkbox[$i];

               mysqli_query($conexion,"delete from preguntas where preguntas_id='$del_id'")
               or die("Problemas en el select".mysqli_error($conexion));

}
?>

<br><br><br>







<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> Los mensajes  han sido eliminados correctamente
  </div>
  <?php
}else{
?>
<br><br>


    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Upss!</strong> Los mensajes no han sido eliminados.
      </div>



<?php
}

   ?>
 </div>
 </div>




  <!-- Section Contact
  ================================================== -->



  <?php

  mysqli_close($conexion);


  ?>












</div>





<br><br><br><br><br><br><br><br><br>
