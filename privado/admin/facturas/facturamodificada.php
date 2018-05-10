<?php
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");


  $total=$numfac=$trabajos=$observaciones=$honorarios="";
  $totalErr=$numfacErr=$trabajosErr=$observacionesErr=$honorariosErr="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {



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



       $consulta_mysql2=mysqli_query($conexion,"select * from facturas where facturas_id='".$_POST["facturas_id"]."'") or
       die("Problemas en el select:".mysqli_error($conexion));

       while($reg2=mysqli_fetch_array($consulta_mysql2)){

          if($reg2["facturas_numero_factura"]==$_POST["numfac"]){
            $numfacErr="";
          }else{
                $consulta_mysql3=mysqli_query($conexion,"select * from facturas where facturas_numero_factura='".$_POST["numfac"]."'") or
                die("Problemas en el select:".mysqli_error($conexion));

                while($reg3=mysqli_fetch_array($consulta_mysql3)){
                  $num_total_registros = mysqli_num_rows($consulta_mysql3);
                      if($num_total_registros!=0){
                        $numfacErr="La numero de factura ya existe";
                      }

                    }
                }
        }

     function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }


     if($totalErr=="" & $numfacErr=="" & $trabajosErr=="" & $observacionesErr==""){



         mysqli_query($conexion, "update facturas set facturas_numero_factura='$_POST[numfac]',facturas_total='$_POST[total]',facturas_honorarios='$_POST[honorarios]', facturas_iva='$_POST[iva]',facturas_irpf='$_POST[irpf]',facturas_fecha='$_POST[fecha]',facturas_observaciones='$_POST[observaciones]'
          where facturas_id='$_REQUEST[facturas_id]'") or die("Problemas en el select:".mysqli_error($conexion));


}

     	?>


      <div class="container">


        <div class="col-md-12 text-center">
          <br><br>
          <h2 class="bottombrand wow flipInX">Modificacion de <b style="color: #f05f40;">factura</b></h2>
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



            if($totalErr=="" & $numfacErr=="" & $trabajosErr=="" & $observacionesErr==""){
?>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Bien!</strong> La factura se modifico correctamente.
  </div>
<?php
            }else{
?>


<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Upsss!</strong> La factura no se a modificado.
  </div>

            <?php
            }
             mysqli_close($conexion);
            ?>
      <br>
</div>


<br>
