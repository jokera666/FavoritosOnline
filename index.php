<?php 
// relasar la sesion de LOGIN usuario y contraseña

session_start();
$_SESSION['usuario'] = "usuarioU1";
$_SESSION['contrasena'] = "prueba";

echo'
<html>
	<head>
	<meta http-equiv="REFRESH" content="0; url=principal.php">	
	</head>
</html>
';

 ?>