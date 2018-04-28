


  <br><br>
  <br><br>
  <div class="container">
  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Bloqueo masivo de <b style="color: #f05f40;">usuarios</b></h2>
    <hr class="primary">
    <p>


    </p>

  <?php

  if(!empty($_REQUEST["tic"]) & ($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico")){


             require_once('biblioteca/conexion.php');
             $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
               mysqli_set_charset($conexion,"utf8");





               $checkbox=$_REQUEST['tic'];
               $numero = sizeof($checkbox);
               for($i=0;$i<$numero;$i++){
               $del_id = $checkbox[$i];

               mysqli_query($conexion,"update usuarios set usuarios_bloqueado='1' where usuarios_id='$del_id'")
               or die("Problemas en el select".mysqli_error($conexion));


               $consulta_mysql=mysqli_query($conexion,"select usuarios_usuario from usuarios where usuarios_id='$del_id'") or
               die("Problemas en el select:".mysqli_error($conexion));


 while($reg=mysqli_fetch_array($consulta_mysql)){
?>

<br><br><br>
  <div class="alert alert-success alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>¡Bien!</strong> El usuario <?php echo $reg["usuarios_usuario"]; ?> ha sido bloqueado correctamente
    </div>



<?php
}
}
}else{
?>
<br><br>


    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>¡Upss!</strong> Los usuarios no han sido bloqueados
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
