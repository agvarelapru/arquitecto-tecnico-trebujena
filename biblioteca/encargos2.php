<?php
header("Content-Type: text/html;charset=utf-8");
$codencar=  intval($_GET['q']);
//$codencar="1";
$option='{"encargos":[';

require_once('conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");




  $consulta_mysql=mysqli_query($conexion,"select * from encargos where encargos_id=".$codencar) or
  die("Problemas en el select:".mysqli_error($conexion));
$row_cnt = mysqli_num_rows($consulta_mysql);

  while($reg=mysqli_fetch_array($consulta_mysql)){

  $option.= '"'.$reg['encargos_tipo'].'","'.$reg['encargos_honorarios'].'",';

  }
  $option = trim($option, ',');
  $option.=']}';
  echo $option;
?>
