

<div class="container" id="home">

  <br><br>

  <div class="section-title text-center">
    <h2 class="bottombrand wow flipInX">Busqueda de <b style="color: #f05f40;">clientes</b></h2>
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




  $rs_contactos = mysqli_query($conexion, "select * from usuarios where usuarios_usuario LIKE '%".$_SESSION['busqueda']."%' || usuarios_poblacion LIKE '%".$_SESSION['busqueda']."%' || usuarios_email LIKE '%".$_SESSION['busqueda']."%' || usuarios_fecha_alta= '".$_SESSION['busqueda']."'");
  $num_total_registros = mysqli_num_rows($rs_contactos);
if($num_total_registros>0){
  //Limito la busqueda
  $TAMANO_PAGINA = 4;

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


  $registros=mysqli_query($conexion,"select usuarios_id, usuarios_nombre,usuarios_apellido1, usuarios_apellido2, usuarios_bloqueado, usuarios_fecha_alta  from usuarios where usuarios_usuario LIKE '%".$_SESSION['busqueda']."%' || usuarios_poblacion LIKE '%".$_SESSION['busqueda']."%' || usuarios_email LIKE '%".$_SESSION['busqueda']."%' || usuarios_fecha_alta= '".$_SESSION['busqueda']."' order by usuarios_fecha_alta  DESC LIMIT ".$inicio."," . $TAMANO_PAGINA) or
    die("Problemas en el select:".mysqli_error($conexion));


  $cant=0;
  while ($reg = mysqli_fetch_array($registros))
  {

  $bloqueado="";
  if($reg['usuarios_bloqueado']==1){
  $bloqueado=" SI ";
  }else{
    $bloqueado=" NO ";

  }
  $codigo=$reg['usuarios_id'];

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
  echo "<input class='form-control' type='checkbox' name='tic[]' id='tic' value='".$reg['usuarios_id']."'>";
  echo "</div>";
  echo "<div class='list-group' style='width:88%; margin-left:6%;'>";

    echo "<a href='?p=usuarios/mostraru&usuarios_id=".$codigo."' class='list-group-item'>";
    echo "<h4 class='list-group-item-heading' style='float:left;'>Cod. ".$reg['usuarios_id']."</h4>";
  echo "<h4 class='list-group-item-heading' style='float:right;'>Bloqueado: ".$bloqueado."</h4><br><br>";
  echo    "<p class='list-group-item-text'>Usuario: ".$reg['usuarios_nombre']." ".$reg['usuarios_apellido1']." ".$reg['usuarios_apellido2']."</p>";
    echo  "<p class='list-group-item-text'>Fecha alta: ".$reg['usuarios_fecha_alta']."</p>";

    echo "</a>";

  echo "</div>";








  $cant++;
  }
  ?>

  <button class="contact submit btn btn-primary btn-xl" style="float:right;"  data-toggle="modal" data-target="#myModal"  type="button" name="buscar" id="bloquear" value="Bloquear" >Bloquear</button>



    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #282f35;">
            <button type="button" class="close" data-dismiss="modal" style="color:white;font-weight:bold;">&times;</button>
            <h3 class="modal-title" style="color:white;font-weight:bold;">¡Atencion!</h3>
          </div>
          <div class="modal-body" >
            <p style="color:black;">¿Esta seguro de bloquear a los usuarios?</p>

          </div>
          <div class="modal-footer" >


            <button type="submit" class="btn btn-primary" style="float:left;">Bloquearr</button>
            </form>


            <button type="button" class="btn btn-primary" data-dismiss="modal" style="float:left;margin-left:7%;">Cancelar</button>


          </div>
        </div>

      </div>
    </div>




  </form>
  <?php
  $self="usuarios2.php";
  if ($total_paginas > 1) {
    ?><ul class="pagination" ><?php
     if ($pagina != 1){
  ?><li class="previous"><?php   echo '<a href="'.$self.'?pagina=0">Inicio</a>'  ?> </li><?php
  ?><li class="previous"><?php   echo '<a href="'.$self.'?pagina='.($pagina-1).'"><span class="glyphicon glyphicon-arrow-left"></a>'  ?> </li><?php
  }




        for ($i=1;$i<=$total_paginas;$i++) {
           if ($pagina == $i){
              //si muestro el índice de la página actual, no coloco enlace
            ?>  <li class="active"><a href="#"><?php echo $pagina; ?></a></li><?php

          }else{
              //si el índice no corresponde con la página mostrada actualmente,
              //coloco el enlace para ir a esa página
            ?><li ><?php  echo '  <a href="'.$self.'?pagina='.$i.'">'.$i.'</a>  ';?></li><?php
        }
      }

        if ($pagina != $total_paginas){
      ?><li class="next"><?php   echo '<a href="'.$self.'?pagina='.($pagina+1).'"><span class="glyphicon glyphicon-arrow-right"></a>'  ?> </li><?php
      ?><li class="previous"><?php   echo '<a href="'.$self.'?pagina='.$total_paginas.'">Final</a>'  ?> </li><?php
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

  ?>












</div>





<br><br><br>
