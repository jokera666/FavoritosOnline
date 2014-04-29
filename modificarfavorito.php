<?php 

session_start();

$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$titulo = $_POST['titulo'];
$direccion = $_POST['direccion'];
$categoria = $_POST['categoria'];
$comentario = $_POST['comentario'];
$valoracion = $_POST['valoracion'];

$tituloantiguo = $_SESSION['titulo'];

mysql_select_db("Favoritos",$conexion);
$consulta = mysql_query("UPDATE Favoritos SET titulo='".$titulo."' , direccion='".$direccion."' , categoria='".$categoria."' , comentario='".$comentario."' , valoracion='".$valoracion."' WHERE titulo='".$tituloantiguo."' ");

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