<?php
$_SESSION["numero"]=4;
$_SESSION["user"]= $_REQUEST['usuario'];
$_SESSION["poblacion"] = $_REQUEST['poblacion'];
$_SESSION["email"] = $_REQUEST['email'];
$_SESSION["fechaAlta"] = $_REQUEST['fechaAlta'];
$_SESSION["bloqueado"] = $_REQUEST['bloqueado'];
header('Location: pagina.php?p=usuarios/usuarios');
?>
