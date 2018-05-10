<?php
ob_start();
// Start the session
session_start();
    // Pequeña lógica para capturar la pagina que queremos abrir
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'menu';
    // El fragmento de html que contiene la cabecera de nuestra web
if(empty($_SESSION["pass"]) & empty($_SESSION["usuario"]) & empty($_SESSION["perfil"])){
    require_once 'privado/header2.php';
    require_once 'privado/erroruser.php';
}else{
  require_once 'privado/header.php';

  require_once 'privado/'.$pagina . '.php';
}
    // El fragmento de html que contiene el pie de página de nuestra web
   require_once 'privado/footer.php';
ob_end_flush();
?>
