<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Paso</title>
</head>
<body>
<?php

// Set session variables
$_SESSION["numero"]=4;
$_SESSION["user"]= $_REQUEST['nombre'];
$_SESSION["email"] = $_REQUEST['email'];
$_SESSION["fechaPregunta"] = $_REQUEST['fechaPregunta'];
$_SESSION["respondida"] = $_REQUEST['resuelta'];

header('Location: ?p=preguntas/verpreguntas');

?>

</body>
</html>
