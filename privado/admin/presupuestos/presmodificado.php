<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


$nombre=$nif=$trabajo=$superficie=$pem=$honorarios=$observaciones=$email="";
$nombreErr=$nifErr=$trabajoErr=$superficieErr=$pemErr=$honorariosErr=$observacionesErr=$emailErr="";
$nombre="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $nombre = test_input($_POST["nombre"]);
  if (!preg_match("/^[a-zñA-ZÑ0-9 -.,]*$/",$nombre)) {
    $nombreErr = "Solo letras, numeros y espacio en blanco";
  }

  $nif = test_input($_POST["nif"]);
  if (!preg_match("/^[a-zñA-ZÑ0-9 -]*$/",$nif)) {
    $nifErr = "Solo letras, numeros y espacio en blanco";
  }




     if (empty($_POST["trabajos"])) {
         $trabajoErr = "Tipo de trabajo obligatorio";
       } else {
         $trabajo = test_input($_POST["trabajos"]);
         if (!preg_match("/^[a-zñA-ZÑ0-9 -\/(),.]*$/",$trabajo)) {
           $trabajoErr = "Solo letras y espacio en blanco";
         }
       }
       if (empty($_POST["superficie"])) {
           $superficieErr = "Superficie obligatoria";
         } else {
           $superficie = test_input($_POST["superficie"]);
           if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$superficie)) {
             $superficieErr = "Solo letras y espacio en blanco";
           }
         }

         if (empty($_POST["pem"])) {
             $pemErr = "PEM obligatorio";
           } else {
             $pem = test_input($_POST["pem"]);
             if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$pem)) {
               $pemErr = "Solo letras y espacio en blanco";
             }
           }

           if (empty($_POST["honorarios"])) {
               $honorariosErr = "Honorarios obligatorio";
             } else {
               $honorarios = test_input($_POST["honorarios"]);
               if (!preg_match("/^[0-9]*$/",$honorarios)) {
                 $honorariosErr = "Solo numeros";
               }
             }



                 $observaciones = test_input($_POST["observaciones"]);
                 if (!preg_match("/^[a-zñA-ZÑ0-9 -\/,.]*$/",$observaciones)) {
                   $observacionesErr = "Solo letras y espacio en blanco";
                 }





      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato invalido de email";
      }
     }


     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }



     	?>

<?php

/*
if($nombreErr=="" & $nifErr=="" & $trabajoErr=="" & $superficieErr=="" & $pemErr=="" & $honorariosErr=="" & $observacionesErr=="" & $emailErr==""){



echo $_REQUEST["usuario"];
$consulta_mysql2=mysqli_query($conexion,"select *  from usuarios where usuarios_id='".$_REQUEST["usuario"]."'") or
die("Problemas en el select:".mysqli_error($conexion));
$nombreUsuario=""

while($reg2=mysqli_fetch_array($consulta_mysql2)){
$nombreUsuario=$reg2["usuarios_nombre"]." ".$reg2["usuarios_apellido1"]." ".$reg2["usuarios_apellido2"];
}

if($_REQUEST['aceptado']==1){
$aceptado="SI";
}else if($_REQUEST['aceptado']==0){
$aceptado="NO";
}



  mysqli_query($conexion, "update presupuestos set presupuestos_nombre='$_REQUEST[nombre]',presupuestos_nif='$_REQUEST[nif]',presupuestos_encargo='$_REQUEST[trabajos]', presupuestos_superficie='$_REQUEST[superficie]',presupuestos_pem='$_REQUEST[pem]',presupuestos_honorarios='$_REQUEST[honorarios]',presupuestos_email='$_REQUEST[email]', presupuestos_observaciones='$_REQUEST[observaciones]',presupuestos_usuario='$_REQUEST[usuario]', presupuestos_aceptado='$_REQUEST[aceptado]'
                          where presupuestos_id='$_REQUEST[presupuestos_id]'") or die("Problemas en el select:".mysqli_error($conexion));

}
*/


if($nombreErr=="" & $nifErr=="" & $trabajoErr=="" & $superficieErr=="" & $pemErr=="" & $honorariosErr=="" & $observacionesErr=="" & $emailErr==""){



  if($_REQUEST['aceptado']==1){
  $aceptado="SI";
  }else if($_REQUEST['aceptado']==0){
  $aceptado="NO";
  }

  $consulta_mysql2=mysqli_query($conexion,"select *  from usuarios where usuarios_id='".$_REQUEST["usuario"]."'") or
  die("Problemas en el select:".mysqli_error($conexion));
  

  while($reg2=mysqli_fetch_array($consulta_mysql2)){
  $nombreUsuario=$reg2["usuarios_nombre"]." ".$reg2["usuarios_apellido1"]." ".$reg2["usuarios_apellido2"];
  }


  mysqli_query($conexion, "update presupuestos set presupuestos_nombre='$_REQUEST[nombre]',presupuestos_nif='$_REQUEST[nif]',presupuestos_encargo='$_REQUEST[trabajos]', presupuestos_superficie='$_REQUEST[superficie]',presupuestos_pem='$_REQUEST[pem]',presupuestos_honorarios='$_REQUEST[honorarios]',presupuestos_email='$_REQUEST[email]', presupuestos_observaciones='$_REQUEST[observaciones]',presupuestos_usuario='$_REQUEST[usuario]', presupuestos_aceptado='$_REQUEST[aceptado]'
                          where presupuestos_id='$_REQUEST[presupuestos_id]'") or die("Problemas en el select:".mysqli_error($conexion));




}

 ?>




      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Modificacion de <b style="color: #f05f40;">presupuestos</b></h2>
          <hr>
      </div>
      <div class="col-md-8 registro">



<ul class="registrado">
    <li><label for="nombre" >Nombre:</label><?php echo " ".$nombre= $_POST['nombre'];?><span class="error"><?php echo "  ".$nombreErr;?></span></li>
      <li><label for="nif" >NIF:</label><?php echo " ".$nif = $_POST['nif'];?><span class="error"><?php echo "  ".$nifErr;?></span></li>
<li><label for="trabajo" >Tipo de trabajo:</label><?php echo " ".$trabajo = $_POST['trabajos'];?> <span class="error"><?php echo "  ".$trabajoErr;?></span></li>
<li><label for="superficie" >Superficie:</label><?php echo " ".$superficie= $_POST['superficie'];?> <span class="error"><?php echo "  ".$superficieErr;?></span></li>
<li><label for="pem" >PEM:</label><?php echo " ".$pem = $_POST['pem'];?> <span class="error"><?php echo "  ".$pemErr;?></span></li>
<li><label for="honorarios" >Honorarios:</label><?php echo " ".$honorarios = $_POST['honorarios'];?> <span class="error"><?php echo "  ".$honorariosErr;?></span></li>
<li><label for="email" >E-mail:</label><?php echo " ".$email = $_POST['email'];?><span class="error"><?php echo "  ".$emailErr;?></span></li>
<li><label for="observaciones" >Observaciones:</label><?php echo " ".$observaciones = $_POST['observaciones'];?><span class="error"><?php echo "  ".$observacionesErr;?></span></li>
<li><label for="usuario" >Usuario:</label><?php echo " ".$nombreUsuario;?></li>
<li><label for="aceptado" >Aceptado:</label><?php echo " ".$aceptado;?></li>



    </ul>
    </div>
</div>


      <br>

  <div class="container text-center">
            <?php



            if($nombreErr=="" & $nifErr=="" & $trabajoErr=="" & $superficieErr=="" & $pemErr=="" & $honorariosErr=="" & $observacionesErr=="" & $emailErr==""){
?>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> El presupuesto se modifico correctamente.
  </div>
<?php
            }else{
?>


<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> El presupuesto no se ha modificado.
  </div>

            <?php
            }
             mysqli_close($conexion);
            ?>
      <br>
</div>


<br>
