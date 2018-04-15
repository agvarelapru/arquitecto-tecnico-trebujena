
<?php
session_start();//Reanudamos sesion
session_unset();
session_destroy();//Literalmente la destruimos
header("Location: index.html");//redireccionamos al index
?>
