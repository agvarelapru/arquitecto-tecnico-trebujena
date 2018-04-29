

<div class="container" id="home">

  <br><br>

  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">mensajes</b></h2>
    <hr class="primary">
    <p>
      Acontinuacion pude ver su busqueda.
    </p>

</div>

<?php


require_once('biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");



  $where="";


    if($_SESSION['user']!=""){
      $where.=" preguntas_usuario LIKE '%".$_SESSION['user']."%' ";

    }

    if($_SESSION['email']!=""){
      if($where==""){
          $where.=" preguntas_email LIKE '%".$_SESSION['email']."%' ";
      }else{
        $where.=" and preguntas_email LIKE '%".$_SESSION['email']."%' ";
      }

    }
    if($_SESSION['fechaPregunta']!=""){
      if($where==""){
          $where.="  preguntas_fecha_alta >= '".$_SESSION['fechaPregunta']." 00:00:00' ";
      }else{
        $where.="  and preguntas_fecha_alta >= '".$_SESSION['fechaPregunta']." 00:00:00' ";
      }

    }
  $respondida;

  if(isset($_SESSION['respondida'])){
    $respondida=1;
    if($where==""){
      $where.=" preguntas_respondida = 1 ";
    }else{
      $where.=" and preguntas_respondida = 1 ";
    }

  }else if(empty($_SESSION['respondida'])){
    $respondida=0;
    if($where==""){
      $where.=" preguntas_respondida = 0 ";
    }else{
        $where.=" and preguntas_respondida = 0 ";
    }

  }




  $rs_contactos = mysqli_query($conexion, "select * from preguntas where ".$where);
  $num_total_registros = mysqli_num_rows($rs_contactos);


if($num_total_registros>0){


  //Limito la busqueda
  if(isset($_REQUEST['numero'])){
    $_SESSION['numero']=$_REQUEST['numero'];
    $TAMANO_PAGINA = $_SESSION['numero'];
  }else{

      $TAMANO_PAGINA =$_SESSION['numero'];

    }

  //examino la página a mostrar y el inicio del registro a mostrar
  if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
  }else{
    $inicio = 0;
    $pagina = 1;
  }

  if (!$pagina) {
     $inicio = 0;
     $pagina = 1;
  }
  else {
     $inicio = ($pagina - 1) * $TAMANO_PAGINA;
  }
  //calculo el total de páginas
  $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);


  $registros=mysqli_query($conexion,"select preguntas_id, preguntas_usuario, preguntas_respondida, preguntas_fecha  from preguntas where".$where." order by preguntas_fecha  DESC LIMIT ".$inicio."," . $TAMANO_PAGINA) or
    die("Problemas en el select:".mysqli_error($conexion));


  $cant=0;
  while ($reg = mysqli_fetch_array($registros))
  {

  $respondida="";
  if($reg['preguntas_respondida']==1){
  $respondida=" SI ";
  }else{
    $respondida=" NO ";

  }
  $codigo=$reg['preguntas_id'];

  /*
  <div class="list-group">
    <a href="mostrarP.php?codigoDuda='<?php.$codigo ?>'" class="list-group-item active">"
      <h4 class="list-group-item-heading" style="float:left;"><?php echo "Codigo: ".$reg['codigoDuda']?> </h4>
  <h4 class="list-group-item-heading" style="float:right;"><?php echo "Resuelta: ".$resuelta?> </h4><br><br>
      <p class="list-group-item-text"><?php echo "Usuario: ".$reg['usuario'];?></p>
      <p class="list-group-item-text"><?php echo "Fecha Pregunta: ".$reg['fechaPregunta']?></p>

    </a>
  </div>
  */
  echo"<form class='form-horizontal'  action='bloquear.php' method='post'>";
  echo "<div style='float:left;margin-top:25px;margin-right:0%; z-index:1'>";
  echo "<input class='form-control' type='checkbox' name='tic[]' id='tic' value='".$reg['preguntas_id']."'>";
  echo "</div>";
  echo "<div class='list-group' style='width:88%; margin-left:6%;'>";

    echo "<a href='?p=preguntas/mostrarp&pregunta_id=".$codigo."' class='list-group-item'>";
    echo "<h4 class='list-group-item-heading' style='float:left;'>Cod. ".$reg['preguntas_id']."</h4>";
  echo "<h4 class='list-group-item-heading' style='float:right;'>Respondidaa: ".$respondida."</h4><br><br>";
  echo    "<p class='list-group-item-text'>Usuario: ".$reg['preguntas_usuario']."</p>";
    echo  "<p class='list-group-item-text'>Fecha pregunta: ".$reg['preguntas_fecha']."</p>";

    echo "</a>";

  echo "</div>";








  $cant++;
  }
  ?><input class="btn btn-primary" type="submit" name="buscar" id="buscar2" value="Bloquear" >
  </form>
  <?php
  $self="?p=preguntas/verpreguntas";
  if ($total_paginas > 1) {
    ?><ul class="pagination" ><?php
     if ($pagina != 1){
  ?><li class="previous"><?php   echo '<a href="'.$self.'&pagina=0">Inicio</a>'  ?> </li><?php
  ?><li class="previous"><?php   echo '<a href="'.$self.'&pagina='.($pagina-1).'"><span class="glyphicon glyphicon-arrow-left"></a>'  ?> </li><?php
  }




        for ($i=1;$i<=$total_paginas;$i++) {
           if ($pagina == $i){
              //si muestro el índice de la página actual, no coloco enlace
            ?>  <li class="active"><a href="#"><?php echo $pagina; ?></a></li><?php

          }else{
              //si el índice no corresponde con la página mostrada actualmente,
              //coloco el enlace para ir a esa página
            ?><li><?php  echo '  <a href="'.$self.'&pagina='.$i.'">'.$i.'</a>  ';?></li><?php
        }
      }

        if ($pagina != $total_paginas){
      ?><li class="next"><?php   echo '<a href="'.$self.'&pagina='.($pagina+1).'"><span class="glyphicon glyphicon-arrow-right"></a>'  ?> </li><?php
      ?><li class="previous"><?php   echo '<a href="'.$self.'&pagina='.$total_paginas.'">Final</a>'  ?> </li><?php
    }
  ?></ul><?php

  }
  //<img src="../../biblioteca/anterior.png" border="0" style="max-width: 100%;">
  //<img src="../../biblioteca/siguiente.png" border="0" style="max-width: 100%;">

  ?>

  </div>
  <?php
}else{
?>
  <br><br><br>

       <div class="alert alert-warning alert-dismissible fade in">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>¡Vaya!</strong> No se ha encontrado ningun resultado en la busqueda.
         </div>

  <br><br><br><br>

<?php
}
  mysqli_close($conexion);


  ?>

</div>

<br><br><br>
