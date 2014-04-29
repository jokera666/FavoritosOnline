<?php 

session_start();
//Recuperar variables

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$titulo = $_GET['titulo'];
$direccion = $_GET['direccion'];
$categoria = $_GET['categoria'];
$comentario = $_GET['comentario'];
$valoracion = $_GET['valoracion'];

$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";


mysql_select_db("Favoritos",$conexion);
$consulta = mysql_query("SELECT * FROM Favoritos WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND titulo='".$titulo."' 
AND direccion='".$direccion."' AND categoria='".$categoria."' AND comentario='".$comentario."' AND valoracion='".$valoracion."'");

echo "
	<table border = 1 width=100%>
	<tr>
	<td><b>Titulo</b></td>
	<td><b>Direccion</b></td>
	<td><b>Categoria</b></td>
	<td><b>comentario</b></td>
	<td><b>Valoracion</b></td>
	<td></td>
	</tr>
	";

while ($fila = mysql_fetch_array($consulta)) 
{
	echo"
	<tr><form action='modificarfavorito.php' method='POST'>
		<td><input type='text' name='titulo' value='".$fila['titulo']."'></td>
		<td><input type='text' name='direccion' value='".$fila['direccion']."'></td>
		<td><select  name='categoria'> 
			<option value='salud'>Salud</option>
			<option value='trabajo'>Trabajo</option> 
			<option value='hobby'>Hobby</option> 
			<option value='personal'>Persoanal</option> 
			<option value='otros'>Otros</option>
			<option value='".$fila['categoria']."' selected>".$fila['categoria']."</option>
		</td> 
		<td><input type='text' name='comentario' value='".$fila['comentario']."'></td>
		<td><input type='text' name='valoracion' value='".$fila['valoracion']."'></td>
		<td><input type='submit' value=Modificar></td>
		</form>
	</tr>
	";
}
echo "</table>";

$_SESSION['titulo'] = $titulo;

mysql_close($conexion);
 ?>