

<div class="container" >

  <br><br>

  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">presupuestos</b></h2>
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


    if($_SESSION['nombre']!=""){
      $where.=" presupuestos_nombre LIKE '%".$_SESSION['nombre']."%' ";

    }

    if($_SESSION['trabajo']!=""){
      if($where==""){
          $where.=" presupuestos_encargo LIKE '%".$_SESSION['trabajo']."%' ";
      }else{
        $where.=" and presupuestos_encargo LIKE '%".$_SESSION['trabajo']."%' ";
      }

    }
    if($_SESSION['fechaPresupuesto']!=""){
      if($where==""){
          $where.="  presupuestos_fecha >= '".$_SESSION['fechaPresupuesto']." 00:00:00' ";
      }else{
        $where.="  and presupuestos_fecha >= '".$_SESSION['fechaPresupuesto']." 00:00:00' ";
      }

    }
  $respondida;

  if(isset($_SESSION['aceptado'])){
    $aceptado=1;
    if($where==""){
      $where.=" presupuestos_aceptado = 1 ";
    }else{
      $where.=" and presupuestos_aceptado = 1 ";
    }

  }else if(empty($_SESSION['aceptado'])){
    $aceptado=0;
    if($where==""){
      $where.=" presupuestos_aceptado = 0 ";
    }else{
        $where.=" and presupuestos_aceptado = 0 ";
    }

  }


if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){

  $rs_contactos = mysqli_query($conexion, "select * from presupuestos where ".$where);
  $num_total_registros = mysqli_num_rows($rs_contactos);
}else{
  $rs_contactos = mysqli_query($conexion, "select * from presupuestos where ".$where." and presupuestos_usuario='".$_SESSION['id']."'");
  $num_total_registros = mysqli_num_rows($rs_contactos);

}

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
if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico"){

  $registros=mysqli_query($conexion,"select *  from presupuestos where".$where." order by presupuestos_fecha  DESC LIMIT ".$inicio."," . $TAMANO_PAGINA) or
    die("Problemas en el select:".mysqli_error($conexion));
}else{
  $registros=mysqli_query($conexion,"select *  from presupuestos where".$where." and presupuestos_usuario='".$_SESSION['id']."' order by presupuestos_fecha  DESC LIMIT ".$inicio."," . $TAMANO_PAGINA) or
    die("Problemas en el select:".mysqli_error($conexion));
}

  $cant=0;
  while ($reg = mysqli_fetch_array($registros))
  {

  $aceptado="";
  if($reg['presupuestos_aceptado']==1){
  $aceptado=" SI ";
  }else{
    $aceptado=" NO ";

  }
  $codigo=$reg['presupuestos_id'];

  /*
  <div class="list-group">
    <a href="mostrarP.php?codigoDuda='<?php.$codigo ?>'" class="list-group-item active">"
      <h4 class="list-group-item-heading" style="float:left;"><?php echo "Codigo: ".$reg['codigoDuda']?> </h4>
  <h4 class="list-group-item-heading" style="float:right;"><?php echo "Resuelta: ".$resuelta?> </h4><br><br>
      <p class="list-group-item-text"><?php echo "Usuario: ".$reg['usuario'];?></p>
      <p class="list-group-item-text"><?php echo "Fecha Pregunta: ".$reg['fechaPregunta']?></p>

    </a>
  </div>
  */if($_SESSION["perfil"]=="Administrador"){
  echo"<form class='form-horizontal'  action='?p=admin/presupuestos/borrarpresupuestos' method='post'>";
  echo "<div style='float:left;margin-top:25px;margin-right:0%; z-index:1'>";
  echo "<input class='form-control' type='checkbox' name='tic[]' id='tic' value='".$reg['presupuestos_id']."'>";
  echo "</div>";}
  echo "<div class='list-group' style='width:88%; margin-left:6%;'>";

    echo "<a href='?p=admin/presupuestos/mostrarpresupuesto&presupuestos_id=".$codigo."' class='list-group-item'>";
    echo "<h4 class='list-group-item-heading' style='float:left;'>Nombre: ".$reg['presupuestos_nombre']."</h4>";
  echo "<h4 class='list-group-item-heading' style='float:right;'>Aceptado: ".$aceptado."</h4><br><br>";
    echo  "<p class='list-group-item-text'>Fecha del presupuesto: ".$reg['presupuestos_fecha']."</p>";
echo  "<p class='list-group-item-text'>Honorarios: ".$reg['presupuestos_honorarios']." €</p>";
    echo "</a>";

  echo "</div>";








  $cant++;
  }
  if($_SESSION["perfil"]=="Administrador"){
  ?><button class="contact submit btn btn-primary btn-xl" style="float:right;" data-toggle="modal" data-target="#myModal"  type="button" name="eliminar" id="eliminar" value="Borrar presupuestos" >Borrar presupuestos</button>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #282f35;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;font-weight:bold;">&times;</button>
          <h3 class="modal-title" style="color:white;font-weight:bold;">¡Atencion!</h3>
        </div>
        <div class="modal-body" >
          <p style="color:black;">¿Esta seguro de eliminar los presupuestos?</p>

        </div>
        <div class="modal-footer" >


          <button type="submit" class="btn btn-primary" style="float:left;">Eliminar</button>
          </form>


          <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


        </div>
      </div>

    </div>
  </div>



  </form>
  <?php
}
  $self="?p=admin/presupuestos/verpresupuestos";
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
  <form class='form-horizontal'  action='?p=admin/presupuestos/verpresupuestos' method='post'>
  <label style="float:left;">Numero de registros: </label><br><br>
  <select class="form-control" type="submit" name="numero" style="float:left; width:16%;" onchange = "this.form.submit()"/>
  <?php
  if($TAMANO_PAGINA==4){
    ?><option selected>4</option>
    <option>7</option>
    <option>10</option><?php
  }else if($TAMANO_PAGINA==7){
    ?><option>4</option>
    <option selected>7</option>
    <option>10</option><?php
  }else if($TAMANO_PAGINA==10){
  ?>
  <option>4</option>
  <option>7</option>
    <option selected>10</option><?php
  }
  ?>

  </select>

  </form>
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
