<?php
header("Content-Type: text/html;charset=utf-8");
$codusu=  intval($_GET['q']);
//$codusu=1;
$option='{"clientes":[';

require_once('conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");




  $consulta_mysql=mysqli_query($conexion,"select * from usuarios where usuarios_id=".$codusu) or
  die("Problemas en el select:".mysqli_error($conexion));
$row_cnt = mysqli_num_rows($consulta_mysql);

  while($reg=mysqli_fetch_array($consulta_mysql)){

  $option.= '"'.$reg['usuarios_nombre'].'","'.$reg['usuarios_apellido1'].'","'.$reg['usuarios_apellido2'].'","'.$reg['usuarios_nif'].'","'.$reg['usuarios_direccion'].'","'.$reg['usuarios_cp'].'","'.$reg['usuarios_poblacion'].'","'.$reg['usuarios_provincia'].'",';

  }
  $option = trim($option, ',');
  $option.=']}';
  echo $option;
?>
