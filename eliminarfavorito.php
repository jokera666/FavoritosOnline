<?php 
session_start();

$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";



$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];


$titulo = $_GET['titulo'];
$direccion = $_GET['direccion'];
$categoria = $_GET['categoria'];
$comentario = $_GET['comentario'];
$valoracion = $_GET['valoracion'];


mysql_select_db("Favoritos",$conexion);
$consulta = mysql_query("DELETE FROM Favoritos WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND titulo='".$titulo."' 
AND direccion='".$direccion."' AND categoria='".$categoria."' AND comentario='".$comentario."' AND valoracion='".$valoracion."'");
mysql_query($consulta,$conexion);

mysql_close($conexion);

echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0; url=principal.php">
	</head>

</html>
';

 ?>