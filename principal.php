<?php 

session_start();
echo "Tu usuario es: ".$_SESSION['usuario']."<br>";
echo "Tu contrasena es: ".$_SESSION['contrasena']."<br>";

// Crear conexion

$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";


mysql_select_db("Favoritos",$conexion);
$consulta = mysql_query(" SELECT * FROM Favoritos"); 


echo "
	<table border = 1 width=100%>
	<tr>
	<td><b>Titulo</b></td>
	<td><b>Direccion</b></td>
	<td><b>Categoria</b></td>
	<td><b>comentario</b></td>
	<td><b>Valoracion</b></td>
	<td></td>
	<td></td>
	</tr>
	";




while($fila = mysql_fetch_array($consulta))
{
	echo "<tr><td>".$fila['titulo']."</td><td>".$fila['direccion']."</td><td>".$fila['categoria']."</td><td>".$fila['comentario']."</td><td>".$fila['valoracion']."</td>
	<td><a href='eliminarfavorito.php?titulo=".$fila['titulo']."&direccion=".$fila['direccion']."&categoria=".$fila['categoria']."&comentario=".$fila['comentario']."&valoracion=".$fila['valoracion']."'>
	Eliminar</a></td>
	<td><a href='formulariomodificar.php?titulo=".$fila['titulo']."&direccion=".$fila['direccion']."&categoria=".$fila['categoria']."&comentario=".$fila['comentario']."&valoracion=".$fila['valoracion']."'>Modificar</a></td></tr>";
}

//Añadir un registro
echo"
	<tr>
		<form action='crearfavorito.php' method='POST'>
		<td><input type='text' name='titulo'></td>
		<td><input type='text' name='direccion'></td>

		<td><select  name='categoria'> 
		<option value='salud'>Salud</option>
		<option value='trabajo'>Trabajo</option> 
		<option value='hobby'>Hobby</option> 
		<option value='personal'>Persoanal</option> 
		<option value='otros'>Otros</option>
		</td> 

		<td><input type='text' name='comentario'></td>
		<td><input type='text' name='valoracion'></td>
		<td><input type='submit' value='Guardar'></td>
		<td></td>

	</tr>

";
echo "</table>";

// Cerrar la conexion
mysql_close($conexion);
?>