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
$_SESSION["nombre"]= $_REQUEST['nombre'];
$_SESSION["trabajo"] = $_REQUEST['trabajo'];
$_SESSION["fechaPresupuesto"] = $_REQUEST['fechaPresupuesto'];
$_SESSION["aceptado"] = $_REQUEST['aceptado'];

header('Location: ?p=admin/presupuestos/verpresupuestos');

?>

</body>
</html>
