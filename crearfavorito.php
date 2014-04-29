<?php 
session_start();

//Crear variables

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$addtitulo = $_POST['titulo'];
$adddireccion = $_POST['direccion'];
$addcategoria = $_POST['categoria'];
$addcomentario = $_POST['comentario'];
$addvaloracion = $_POST['valoracion'];

//Establecer la conexion
$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";

// Añadir nuevos registros en la base da datos


mysql_select_db("Favoritos",$conexion);
$add_registro = "INSERT INTO Favoritos (usuario , contrasena , titulo , direccion , categoria , comentario , valoracion) 
VALUES ('".$usuario."' , '".$contrasena."' , '".$addtitulo."' , '".$adddireccion."' , '".$addcategoria."' , '".$addcomentario."' , '".$addvaloracion."')";
mysql_query($add_registro , $conexion);
mysql_close($conexion);

echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0; url=principal.php">
	</head>

</html>
';

 ?>