<?php


// Start the session
session_start();


$_SESSION["nick"]=$_GET["nick"];
$_SESSION["pass"]=$_GET["pass"];


header('Location: nuevopass.php');

?>
