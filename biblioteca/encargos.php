<?php
header("Content-Type: text/html;charset=utf-8");
$codusu=  intval($_GET['q']);
//$codusu="1";
$option='{"encargos":[';

require_once('conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");




  $consulta_mysql=mysqli_query($conexion,"select * from encargos where encargos_usuario=".$codusu) or
  die("Problemas en el select:".mysqli_error($conexion));
$row_cnt = mysqli_num_rows($consulta_mysql);

  while($reg=mysqli_fetch_array($consulta_mysql)){

  $option.= '"'.$reg['encargos_id'].'","'.$reg['encargos_tipo'].'",';

  }
  $option = trim($option, ',');
  $option.=']}';
  echo $option;
?>
