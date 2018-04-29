<?php

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
  //echo "<br><br><br>";
  require_once 'privado/'.$pagina . '.php';
}

    /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
    se produciría un error de archivo no encontrado */

    // Otra opción es validar usando un switch, de esta manera para el valor esperado le indicamos que página cargar


    // El fragmento de html que contiene el pie de página de nuestra web
   require_once 'privado/footer.php';
