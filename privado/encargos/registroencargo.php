<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


$refCatastral=$direccion=$trabajo=$superficie=$pem=$honorarios=$observaciones=$cp="";
$refCatastralErr=$direccionErr=$trabajoErr=$superficieErr=$pemErr=$honorariosErr=$observacionesErr=$cpErr="";
$nombre="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $refCatastral = test_input($_POST["refCatastral"]);
  if (!preg_match("/^[a-zñA-ZÑ0-9 -.,]*$/",$nombre)) {
    $refCatastralErr = "Solo letras, numeros y espacio en blanco";
  }

  if (empty($_POST["cp"])) {
      $cpErr = "Codigo postal obligatorio";
    } else {
  $cp = test_input($_POST["cp"]);
  if (!preg_match("/^[0-9]*$/",$cp)) {
    $cpErr = "Solo numeros ";
  }
}
if (empty($_POST["direccion"])) {
    $direccionErr = "Direccion obligatoria";
  } else {
$direccion = test_input($_POST["direccion"]);
if (!preg_match("/^[a-zñA-ZÑ0-9 -\/(),.]*$/",$direccion)) {
  $direccionErr = "Solo letras, numeros y -/(,.) ";
}
}


     if (empty($_POST["encargo"])) {
         $trabajoErr = "Tipo de trabajo obligatorio";
       } else {
         $trabajo = test_input($_POST["encargo"]);
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

     }


     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }


     if($refCatastralErr=="" & $direccionErr=="" & $trabajoErr=="" & $superficieErr=="" & $pemErr=="" & $honorariosErr=="" & $observacionesErr=="" & $cpErr==""){



     	mysqli_query($conexion,"insert into encargos(encargos_ref_catastral,encargos_direccion,encargos_tipo,encargos_superficie,encargos_pem,encargos_honorarios,encargos_cp,encargos_provincia,encargos_poblacion,encargos_observaciones,encargos_usuario,encargos_tecnico) values
                            ('$_POST[refCatastral]','$_POST[direccion]','$_POST[encargo]','$_POST[superficie]','$_POST[pem]','$_POST[honorarios]','$_POST[cp]','$_POST[provincia]','$_POST[poblacion]','$_POST[observaciones]','$_POST[usuario]','$_SESSION[id]')")
       or die("Problemas en el select".mysqli_error($conexion));




$registros=mysqli_query($conexion,"select *  from usuarios where usuarios_id='".$_POST["usuario"]."'") or
  die("Problemas en el select:".mysqli_error($conexion));
$nombreUsuario="";

while ($reg2 = mysqli_fetch_array($registros)){
  $nombreUsuario=$reg2["usuarios_nombre"]." ".$reg2["usuarios_apellido1"]." ".$reg2["usuarios_apellido2"];
}

$consulta_mysql3=mysqli_query($conexion,"select *  from provincias where id='".$_POST["provincia"]."'") or
  die("Problemas en el select:".mysqli_error($conexion));
$provincia="";

while($reg3=mysqli_fetch_array($consulta_mysql3)){
$provincia=$reg3["provincia"];
 }

 $consulta_mysql4=mysqli_query($conexion,"select *  from municipios where id='".$_POST["poblacion"]."'") or
   die("Problemas en el select:".mysqli_error($conexion));
 $poblacion="";

 while($reg4=mysqli_fetch_array($consulta_mysql4)){
 $poblacion=$reg4["municipio"];
  }


     }




     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Registro de <b style="color: #f05f40;">encargo</b></h2>
          <hr>
      </div>
      <div class="col-md-8 registro">


<?php




 ?>



<ul class="registrado">
    <li><label for="cliente" >Cliente:</label><?php echo " ". $nombreUsuario;?></li>
    <li><label for="honorarios" >Honorarios:</label><?php echo " ".$honorarios = $_POST['honorarios'];?> <span class="error"><?php echo "  ".$honorariosErr;?></span></li>
<li><label for="trabajo" >Tipo de encargo:</label><?php echo " ".$trabajo = $_POST['encargo'];?> <span class="error"><?php echo "  ".$trabajoErr;?></span></li>
<li><label for="superficie" >Superficie:</label><?php echo " ".$superficie= $_POST['superficie'];?> <span class="error"><?php echo "  ".$superficieErr;?></span></li>
<li><label for="pem" >PEM:</label><?php echo " ".$pem = $_POST['pem'];?> <span class="error"><?php echo "  ".$pemErr;?></span></li>
<li><label for="refCatastral" >Referencia Catastral:</label><?php echo " ".$refCatastral = $_POST['refCatastral'];?> <span class="error"><?php echo "  ".$refCatastralErr;?></span></li>
<li><label for="direccion" >Direccion:</label><?php echo " ".$direccion = $_POST['direccion'];?><span class="error"><?php echo "  ".$direccionErr;?></span></li>
<li><label for="cp" >CP:</label><?php echo " ".$cp = $_POST['cp'];?><span class="error"><?php echo "  ".$cpErr;?></span></li>
<li><label for="provincia" >Provincia:</label><?php echo " ".$provincia ?></li>
<li><label for="poblacion" >Municipio:</label><?php echo " ".$poblacion ?></li>
<li><label for="observaciones" >Observaciones:</label><?php echo " ".$observaciones = $_POST['observaciones'];?><span class="error"><?php echo "  ".$observacionesErr;?></span></li>
<li><label for="tecnico" >Tecnico:</label><?php echo " ".$_SESSION['usuario'];?></li>


    </ul>
    </div>
</div>


      <br>

  <div class="container text-center">
            <?php



            if($refCatastralErr=="" & $direccionErr=="" & $trabajoErr=="" & $superficieErr=="" & $pemErr=="" & $honorariosErr=="" & $observacionesErr=="" & $cpErr==""){
?>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> El encargo se registro correctamente.
  </div>
<?php
            }else{
?>


<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> El encargo no se ha registrado.
  </div>

            <?php
            }
             mysqli_close($conexion);
            ?>
      <br>
</div>


<br>
