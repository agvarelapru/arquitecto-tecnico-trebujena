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
$_SESSION["direccion"]= $_REQUEST['direccion'];
$_SESSION["trabajo"] = $_REQUEST['trabajo'];
$_SESSION["fechaEncargo"] = $_REQUEST['fechaEncargo'];
$_SESSION["finalizado"] = $_REQUEST['finalicado'];

header('Location: ?p=encargos/verencargos');

?>

</body>
</html>
